<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Models\Product;
use Mail;
class CartController extends Controller
{
    public function getAddCart($id){
    	$product = Product::find($id);
        
    	Cart::add(['id' => $id, 'name' => $product->prod_name, 'qty' => 1,'weight'=>$product->prod_price, 'price' => $product->prod_price, 'options' => ['img' => $product->prod_img]]);
    	return redirect('cart/show');
    }

    public function getShowCart(){
    	$data['total'] = Cart::total();
    	$data['cart'] = Cart::content();
    	return view('client.cart',$data);
    }

    public function getXoaCart($id){
    	if($id=='all')
    		Cart::destroy();
    	else
    		Cart::remove($id);
    	return back();
    }

    public function getUpdateCart(Request $request){
        Cart::update($request->rowId,$request->qty);    
    }

    public function postComplete(Request $request){
        $data['in4'] = $request->all();
        $email = $request->email;
        $data['cart'] = Cart::content();
        $data['total'] = Cart::total();
        Mail::send('client.email',$data,function($message) use($email){
            $message->from('tung716987@gmail.com', 'NghiaB');
 
            $message->to($email,$email);
            $message->cc('171C900084@itf.edu.vn', 'Chu thị Ngọc Bích');
            $message->subject('Xác nhận đặt hàng tại ntn shop');

         });
        return redirect('complete');
    }

    public function getComplete(){
        return view('client.complete');
    }
}
