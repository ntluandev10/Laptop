<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductType;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sanpham = Product::all();
        return view('back-end.sanpham.danhsach',compact('sanpham'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $theloai = ProductType::all();
        return view('back-end.sanpham.them',compact('theloai'));
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
            'name' =>'required|unique:products,name',
            'idtype'=>'required',
            'description'=>'required',
            'unitprice'=>'required',
            'promotionprice'=>'required',
            'unit'=>'required',
            'new'=>'required',
        ],[
            'name.required'=>'Nhập tên thể loại',
            'name.unique'=>'Tên thể loại đã tồn tại',
            'description.required'=>'Nhập nội dung',
            'idtype.required'=>'Chọn thể loại',
            'unitprice.required'=>'Nhập đơn giá',
            'promotionprice.required'=>'Nhập giá khuyến mãi',
            'unit.required'=>'Nhập đơn vị',
            'new.required'=>'Nhập nổi bật',
        ]);
        $sanpham = new Product();
        $sanpham->name = $request->name;
        $sanpham->summary = $request->summary;
        $sanpham->description = $request->description;
        $sanpham->id_type = $request->idtype;
        $sanpham->unit_price = $request->unitprice;
        $sanpham->promotion_price = $request->promotionprice;
        $sanpham->unit = $request->unit;
        $sanpham->new = $request->new;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $duoi = $file->getClientOriginalExtension();
            if ($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg') {
                return redirect('admin/sanpham/them')->with('errors','Bạn chỉ được dùng file .JPG .PNG .JPEG');
            }
            $name = $file->getClientOriginalName();
            $hinh = str_random(8)."_".$name;
            while (file_exists("upload/sanpham/".$hinh)) {
                $hinh = str_random(8)."_".$name;
            }
            $file->move("upload/sanpham",$hinh);
            $sanpham->image = $hinh;
        } else {
            $sanpham->image = '';
        }
        $sanpham->save();
        return redirect('admin/sanpham/them')->with('thongbao','Thêm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sanpham = Product::find($id);
        $theloai = ProductType::all();
        return view('back-end.sanpham.sua',compact('sanpham','theloai'));
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
        $sanpham = Product::find($id);

        $this->validate($request,[
            'name' =>'required',
            'idtype'=>'required',
            'description'=>'required',
            'unitprice'=>'required',
            'promotionprice'=>'required',
            'unit'=>'required',
            'new'=>'required',
        ],[
            'name.required'=>'Nhập tên thể loại',
            'description.required'=>'Nhập nội dung',
            'idtype.required'=>'Chọn thể loại',
            'unitprice.required'=>'Nhập đơn giá',
            'promotionprice.required'=>'Nhập giá khuyến mãi',
            'unit.required'=>'Nhập đơn vị',
            'new.required'=>'Nhập nổi bật',
        ]);
        $sanpham->name = $request->name;
        $sanpham->summary = $request->summary;
        $sanpham->description = $request->description;
        $sanpham->id_type = $request->idtype;
        $sanpham->unit_price = $request->unitprice;
        $sanpham->promotion_price = $request->promotionprice;
        $sanpham->unit = $request->unit;
        $sanpham->new = $request->new;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $duoi = $file->getClientOriginalExtension();
            if ($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg') {
                return redirect('admin/sanpham/them')->with('errors','Bạn chỉ được dùng file .JPG .PNG .JPEG');
            }
            $name = $file->getClientOriginalName();
            $hinh = str_random(8)."_".$name;
            while (file_exists("upload/sanpham/".$hinh)) {
                $hinh = str_random(8)."_".$name;
            }
            $file->move("upload/sanpham",$hinh);
            unlink("upload/sanpham/".$sanpham->image);
            $sanpham->image = $hinh;
        } else {
            $sanpham->image = '';
        }
        $sanpham->save();
        return redirect('admin/sanpham/sua/'.$id)->with('thongbao','Sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sanpham = Product::find($id);
        unlink("upload/sanpham/".$sanpham->image);
        $sanpham->delete();
        return redirect('admin/sanpham/danhsach')->with('thongbao','Xóa thành công');
    }
}
