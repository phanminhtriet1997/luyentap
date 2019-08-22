<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TrangChu extends Controller
{
    public function XinChao(){
    	echo "Chao bajn";
    }

    public function KhoaHoc($ten){
    	echo "Xin chao: ". $ten;
    	return redirect()->route('getForm');
    }

    public function TestRequest(Request $request){
    	if($request->isMethod('post')){
    		echo "Day la phuong thuc post!";
    	}
    	else 
    		  echo "Day la phuong thuc GET";
    }




    public function GetForm(){
    	return view('thamso');
    }
    public function PostForm(Request $request){
    	echo "Ten cua ban laa: ".$request->name;
    }
}
