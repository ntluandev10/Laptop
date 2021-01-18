<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tintuc = News::all();
        return view('back-end.tintuc.danhsach',compact('tintuc'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back-end.tintuc.them');
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
            'title' =>'required|unique:news,title',
            'content'=>'required',
        ],[
            'title.required'=>'Nhập tiêu đề',
            'title.unique'=>'Tin tức đã tồn tại',
            'content.required'=>'Nhập nội dung'
        ]);
        $tintuc = new News();
        $tintuc->title = $request->title;
        $tintuc->content = $request->content;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $duoi = $file->getClientOriginalExtension();
            if ($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg') {
                return redirect('admin/tintuc/them')->with('errors','Bạn chỉ được dùng file .JPG .PNG .JPEG');
            }
            $name = $file->getClientOriginalName();
            $hinh = str_random(8)."_".$name;
            while (file_exists("upload/tintuc/".$hinh)) {
                $hinh = str_random(8)."_".$name;
            }
            $file->move("upload/tintuc",$hinh);
            $tintuc->image = $hinh;
        } else {
            $tintuc->image = '';
        }
        $tintuc->save();
        return redirect('admin/tintuc/them')->with('thongbao','Thêm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tintuc = News::find($id);
        return view('back-end.tintuc.sua',compact('tintuc'));
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
        $tintuc = News::find($id);
        $this->validate($request,[
            'title' =>'required',
            'content'=>'required',
        ],[
            'title.required'=>'Nhập tiêu đề',
            'content.required'=>'Nhập nội dung'
        ]);
        $tintuc->title = $request->title;
        $tintuc->content = $request->content;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $duoi = $file->getClientOriginalExtension();
            if ($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg') {
                return redirect('admin/tintuc/them')->with('errors','Bạn chỉ được dùng file .JPG .PNG .JPEG');
            }
            $name = $file->getClientOriginalName();
            $hinh = str_random(8)."_".$name;
            while (file_exists("upload/tintuc/".$hinh)) {
                $hinh = str_random(8)."_".$name;
            }
            $file->move("upload/tintuc",$hinh);
            unlink("upload/tintuc/".$tintuc->image);
            $tintuc->image = $hinh;
        } else {
            $tintuc->image = '';
        }
        $tintuc->save();
        return redirect('admin/tintuc/sua/'.$id)->with('thongbao','Sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tintuc = News::find($id);
        unlink("upload/tintuc/".$tintuc->image);
        $tintuc->delete();
        return redirect('admin/tintuc/danhsach')->with('thongbao','Xóa thành công');
    }
}
