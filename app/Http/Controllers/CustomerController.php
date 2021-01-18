<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $khachhang = Customer::all();
        return view('back-end.khachhang.danhsach',compact('khachhang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back-end.khachhang.them');
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
            'ten' =>'required|unique:type_products,name',
            'noidung'=>'required',
        ],[
            'ten.required'=>'Nhập tên thể loại',
            'ten.unique'=>'Tên thể loại đã tồn tại',
            'noidung.required'=>'Nhập nội dung'
        ]);
        $theloai = new ProductType();
        $theloai->name = $request->ten;
        $theloai->description = $request->noidung;
        if ($request->hasFile('hinh')) {
            $file = $request->file('hinh');
            $duoi = $file->getClientOriginalExtension();
            if ($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg') {
                return redirect('admin/theloai/them')->with('errors','Bạn chỉ được dùng file .JPG .PNG .JPEG');
            }
            $name = $file->getClientOriginalName();
            $hinh = str_random(8)."_".$name;
            while (file_exists("upload/theloai/".$hinh)) {
                $hinh = str_random(8)."_".$name;
            }
            $file->move("upload/theloai",$hinh);
            $theloai->image = $hinh;
        } else {
            $theloai->image = '123';
        }
        $theloai->save();
        return redirect('admin/theloai/them')->with('thongbao','Thêm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $theloai = ProductType::find($id);
        return view('back-end.theloai.sua',compact('theloai'));
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
        $theloai = ProductType::find($id);
        $this->validate($request,[
            'ten' =>'required',
            'noidung'=>'required',
        ],[
            'ten.required'=>'Nhập tên thể loại',
            'noidung.required'=>'Nhập nội dung'
        ]);
        $theloai->name = $request->ten;
        $theloai->description = $request->noidung;
        if ($request->hasFile('hinh')) {
            $file = $request->file('hinh');
            $duoi = $file->getClientOriginalExtension();
            if ($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg') {
                return redirect('admin/theloai/them')->with('errors','Bạn chỉ được dùng file .JPG .PNG .JPEG');
            }
            $name = $file->getClientOriginalName();
            $hinh = str_random(8)."_".$name;
            while (file_exists("upload/theloai/".$hinh)) {
                $hinh = str_random(8)."_".$name;
            }
            $file->move("upload/theloai",$hinh);
            unlink("upload/theloai/".$theloai->image);
            $theloai->image = $hinh;
        } else {
            $theloai->image = '123';
        }
        $theloai->save();
        return redirect('admin/theloai/them')->with('thongbao','Thêm thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $khachhang = Customer::find($id);
        $khachhang->delete();
        return redirect('admin/khachhang/danhsach')->with('thongbao','Xóa thành công');
    }
}
