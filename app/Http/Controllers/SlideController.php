<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slide = Slide::all();
        return view('back-end.slide.danhsach',compact('slide'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back-end.slide.them');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'link' =>'required',
        ],[
            'link.required'=>'Nhập link',
        ]);
        $slide = new Slide();
        $slide->link = $request->link;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $duoi = $file->getClientOriginalExtension();
            if ($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg') {
                return redirect('admin/slide/them')->with('errors','Bạn chỉ được dùng file .JPG .PNG .JPEG');
            }
            $name = $file->getClientOriginalName();
            $hinh = str_random(8)."_".$name;
            while (file_exists("upload/slide/".$hinh)) {
                $hinh = str_random(8)."_".$name;
            }
            $file->move("upload/slide",$hinh);
            $slide->image = $hinh;
        } else {
            $slide->image = '';
        }
        $slide->save();
        return redirect('admin/slide/them')->with('thongbao','Thêm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $slide = Slide::find($id);
        return view('back-end.slide.sua',compact('slide'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $slide = Slide::find($id);
        $this->validate($request,[
            'link' =>'required',
        ],[
            'link.required'=>'Nhập link',
        ]);
        $slide->link = $request->link;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $duoi = $file->getClientOriginalExtension();
            if ($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg') {
                return redirect('admin/slide/them')->with('errors','Bạn chỉ được dùng file .JPG .PNG .JPEG');
            }
            $name = $file->getClientOriginalName();
            $hinh = str_random(8)."_".$name;
            while (file_exists("upload/slide/".$hinh)) {
                $hinh = str_random(8)."_".$name;
            }
            $file->move("upload/slide",$hinh);
            unlink("upload/slide/".$slide->image);
            $slide->image = $hinh;
        } else {
            $slide->image = '';
        }
        $slide->save();
        return redirect('admin/slide/sua/'.$id)->with('thongbao','Sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
