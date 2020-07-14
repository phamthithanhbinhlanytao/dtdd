<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use App\Http\Controllers\Controller;

class SendMailController extends Controller
{
    function index(){
    	return view('client.dathang');
    }

    function send(Request $request)
    {
    	$this->validate($request , [
    		'name'=>'require',
    		'email'=>'require|email',
    		'phone'=>'require',
    		'add'=>'require'
    	]);

    	$data = array('name' => $request->name ,'add'=>$request->add );

    	Mail::to('tung716987@gmail.com')->send(new SendMail($data));

    	return back()->with('success','đặt hàng thành công');
    }
}
