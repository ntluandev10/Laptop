<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::auth();



Route::get('/',[
	'as'=>'trang-chu',
	'uses'=>'PageController@getIndex'
]);

Route::get('loai-san-pham/{type}',[
	'as'=>'loaisanpham',
	'uses'=>'PageController@getLoaiSp'
]);

Route::get('chi-tiet-san-pham/{id}',[
	'as'=>'chitietsanpham',
	'uses'=>'PageController@getChitiet'
]);

Route::get('lien-he',[
	'as'=>'lienhe',
	'uses'=>'PageController@getLienHe'
]);

Route::get('gioi-thieu',[
	'as'=>'gioithieu',
	'uses'=>'PageController@getGioiThieu'
]);

Route::get('tim-kiem',[
	'as'=>'timkiem',
	'uses'=>'PageController@getTimkiem'
]);

Route::get('add-to-cart/{id}',[
	'as'=>'themgiohang',
	'uses'=>'PageController@getAddtoCart'
]);

Route::get('del-cart/{id}',[
	'as'=>'xoagiohang',
	'uses'=>'PageController@getDelItemCart'
]);
Route::get('dat-hang',[
	'as'=>'dathang',
	'uses'=>'PageController@getCheckout'
]);

Route::post('dat-hang',[
	'as'=>'dathang',
	'uses'=>'PageController@postCheckout'
]);

Route::get('dang-nhap',[
	'as'=>'login',
	'uses'=>'PageController@getLogin'
]);
Route::post('dang-nhap',[
	'as'=>'login',
	'uses'=>'PageController@postLogin'
]);

Route::get('dang-ki',[
	'as'=>'signin',
	'uses'=>'PageController@getSignin'
]);

Route::post('dang-ki',[
	'as'=>'signin',
	'uses'=>'PageController@postSignin'
]);

Route::get('dang-xuat',[
	'as'=>'logout',
	'uses'=>'PageController@postLogout'
]);

Route::get('admin/login',[   
	'as'=>'loginadmin',
	'uses'=>'UsersController@getLogin']
);
Route::post('admin/login',[   
	'as'=>'loginadmin',
	'uses'=>'UsersController@postLogin']
);
Route::get('admin/logout',[   
	'as'=>'logoutadmin',
	'uses'=>'UsersController@getLogout']
);
// --------------------------------cac cong viec trong admin (back-end)--------------------------------------- 
	Route::group(['prefix' => 'admin','middleware' => 'admin'], function() {
		
		Route::get('/home','UsersController@getQuantri');
		 
		Route::group(['prefix' => 'theloai'], function() {
			Route::get('them','TypeproductsController@create');
			Route::post('them','TypeproductsController@store');

			Route::get('danhsach','TypeproductsController@index');
			Route::get('xoa/{id}','TypeproductsController@destroy');
		 
			Route::get('sua/{id}','TypeproductsController@show');
			Route::post('sua/{id}','TypeproductsController@update');
		  });
		  
		Route::group(['prefix' => 'donhang'], function() {
			Route::get('danhsach','BillsController@index');
			Route::get('xoa/{id}','BillsController@destroy');

		  });
		  
		  Route::group(['prefix' => 'sanpham'], function() {
			Route::get('them','ProductsController@create');
			Route::post('them','ProductsController@store');

			Route::get('danhsach','ProductsController@index');
			Route::get('xoa/{id}','ProductsController@destroy');
		 
			Route::get('sua/{id}','ProductsController@show');
			Route::post('sua/{id}','ProductsController@update');
		  });
		  
		  Route::group(['prefix' => 'chitietdonhang'], function() {
			Route::get('them','BilldetailController@create');
			Route::post('them','BilldetailController@store');

			Route::get('danhsach','BilldetailController@index');
			Route::get('xoa/{id}','BilldetailController@destroy');
		 
			Route::get('sua/{id}','BilldetailController@show');
			Route::post('sua/{id}','BilldetailController@update');
		  });
		  
		  Route::group(['prefix' => 'khachhang'], function() {
			Route::get('them','CustomerController@create');
			Route::post('them','CustomerController@store');

			Route::get('danhsach','CustomerController@index');
			Route::get('xoa/{id}','CustomerController@destroy');
		 
			Route::get('sua/{id}','CustomerController@show');
			Route::post('sua/{id}','CustomerController@update');
		  });
		  
		  Route::group(['prefix' => 'tintuc'], function() {
			Route::get('them','NewsController@create');
			Route::post('them','NewsController@store');

			Route::get('danhsach','NewsController@index');
			Route::get('xoa/{id}','NewsController@destroy');
		 
			Route::get('sua/{id}','NewsController@show');
			Route::post('sua/{id}','NewsController@update');
		  });
		  
		  Route::group(['prefix' => 'slide'], function() {
			Route::get('them','SlideController@create');
			Route::post('them','SlideController@store');

			Route::get('danhsach','SlideController@index');
			Route::get('xoa/{id}','SlideController@destroy');
		 
			Route::get('sua/{id}','SlideController@show');
			Route::post('sua/{id}','SlideController@update');
		  });
		  
		  Route::group(['prefix' => 'user'], function() {
			Route::get('them','UsersController@create');
			Route::post('them','UsersController@store');

			Route::get('danhsach','UsersController@index');
			Route::get('xoa/{id}','UsersController@destroy');
		 
			Route::get('sua/{id}','UsersController@show');
			Route::post('sua/{id}','UsersController@update');
	  	});
  });     