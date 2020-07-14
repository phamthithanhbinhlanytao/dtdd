<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Comment;
use Hash;
use App\Models\taikhoan;
use App\User;
use Auth;
use DB;

class FrontendController extends Controller
{
    public function getHome(){
    	$data['feature'] = Product::where('prod_featured',1)->orderBy('prod_id','desc')->take(4)->get();
    	$data['new'] = Product::orderBy('prod_id','desc')->take(4)->get();
    	return view('client.home',$data);
    }

    public function getDetail($id){
    	$data['chitiet'] = Product::find($id);
    	$data['comment'] = Comment::where('com_product',$id)->get();
    	return view('client.details',$data);
    }

    public function getCategory($id){
    	$data['cateName'] = Category::find($id);
    	$data['item'] = Product::where('prod_cate',$id)->orderBy('prod_id','desc')->paginate(4);
    	return view('client.category',$data);
    }

    public function postComment(Request $request,$id){
    	$cmt = new Comment;
    	$cmt->com_name= $request->name;
    	$cmt->com_email= $request->email;
    	$cmt->com_content= $request->content;
    	$cmt->com_product= $id;
    	$cmt->save();
    	return back();
    }

    public function getSearch(Request $request){
    	$result = $request->result;
    	$data['tukhoa'] = $result;
    	$result = str_replace(' ','%',$result);
    	$data['items'] = Product::where('prod_name','like','%'.$result.'%')->get();
    	return view('client.search',$data);
    }

    public function getDN(){
        return view('client.login');
    }

    public function postDN(Request $request)
    {
         $arr=['email'=>$request->email,'password'=>$request->password,'level'=>2];
        
        if(Auth::attempt($arr))
            return redirect()->intended('/');
        
        else{
            return back()->withInput()->with('error','Sai mật khẩu hoặc Email');
        }
    }

    public function getDK()
    {
        return view('client.dangky');
    }

    public function postDK(Request $req)
    {
        $this->validate($req,
            [
                'email'=>'required|email|unique:taikhoan,email',
                'password'=>'required|min:3|max:20',  
                'name'=>'required',           
                'level'=>'required'
            ],
            [
                'email.required'=>'Vui lòng nhập email',
                'email.email'=>'Không đúng định dạng email',
                'email.unique'=>'Email đã có người sử dụng',
                'password.required'=>'Vui lòng nhập mật khẩu',
                'password.min'=>'Mật khẩu ít nhất 3 kí tự'
            ]);
        $user = new User();
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->name = $req->name;
        $user->level = $req->level;
        $user->save();
        // return back()->withInput()->with('error','Tạo tài khoản thành công');
        return redirect()->intended('dangnhap');

    }

     public function postDX(){
        Auth::logout();
        return redirect()->intended('/');
    }
}
