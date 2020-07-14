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

Route::get('/','FrontendController@getHome');

Route::get('detail/{id}/{slug}.html','FrontendController@getDetail');
Route::post('detail/{id}/{slug}.html','FrontendController@postComment');

Route::get('category/{id}/{slug}.html','FrontendController@getCategory');

Route::get('search','FrontendController@getSearch');
Route::get('/sendemail','SendMailController@index');
Route::get('/sendemail/send','SendMailController@send');

Route::group(['prefix'=>'cart'],function(){
	Route::get('add/{id}','CartController@getAddCart');
	Route::get('show','CartController@getShowCart');
	Route::get('xoa/{id}','CartController@getXoaCart');
	Route::get('update','CartController@getUpdateCart');
	Route::post('show','CartController@postComplete');

});
Route::get('complete','CartController@getComplete');
Route::group(['prefix'=>'dangnhap'],function(){
	Route::get('/','FrontendController@getDN');
	Route::post('/','FrontendController@postDN');
	});
Route::group(['prefix'=>'dangki'],function(){
	Route::get('/','FrontendController@getDK');
	Route::post('/','FrontendController@postDK');
});

Route::get('dangxuat','FrontendController@postDX');

Route::group(['namespace'=>'Admin'],function(){
	// Route::group(['prefix'=>'login','middleware'=>'ChecklogIn'],function(){
	// 	Route::get('/','LoginController@getLogin');
	// 	Route::post('/','LoginController@postLogin');

		
	// });
	// Route::get('logout','HomeController@getLogout');

	Route::group(['prefix'=>'admin'],function(){
			Route::get('home','HomeController@getHome');

			Route::group(['prefix'=>'category'],function(){
				Route::get('/','CategoryController@getCate');
				Route::post('/','CategoryController@postCate');

				Route::get('edit/{id}','CategoryController@getEditCate');
				Route::post('edit/{id}','CategoryController@postEditCate');

				Route::get('delete/{id}','CategoryController@getDeleteCate');
			});
			Route::group(['prefix'=>'product'],function(){
				Route::get('/','ProductController@getProduct');

				Route::get('add','ProductController@getAddProduct');
				Route::post('add','ProductController@postAddProduct');

				Route::get('edit/{id}','ProductController@getEditProduct');
				Route::post('edit/{id}','ProductController@postEditProduct');

				Route::get('delete/{id}','ProductController@getDeleteProduct');
			});
		});
	// Route::group(['prefix'=>'client'],function(){
	// 	Route::get('home','HomeClientController@getHome');

	// 	Route::group(['prefix'=>'category'],function(){
	// 		Route::get('/','CategoryClient@getCate');

	// 		Route::get('cart','CartController@getCart');
	// 		Route::post('cart','CartContrller@postCart');

	// 		Route::post('search','SearchController@postSearch');

	// 		Route::get()
	// 	});
	// });
});



