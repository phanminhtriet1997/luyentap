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

Route::get('/', function () {
    return "Hello mimi";
});

Route::get("hello/{ten}", function($ten){
	return "Xin chao ".$ten;
});

Route::get('namsinh/{ns}', function($ns){
	$tuoi = date("Y") - $ns;
	return "Tuoi cua ban hien tai la: ".$tuoi;
})->where(['ns'=>'[0-9]{0,100}']);

Route::get('home', function(){
	return view('home');
})->name('homeNe');

Route::get('GoiController','TrangChu@XinChao');
Route::get('GoiTen/{ten}','TrangChu@KhoaHoc');
Route::get('request','TrangChu@TestRequest');

Route::get('Form', 'TrangChu@GetForm')->name('getForm');
Route::post('Form', 'TrangChu@PostForm');