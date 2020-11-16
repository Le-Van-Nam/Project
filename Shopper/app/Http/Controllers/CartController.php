<?php

namespace App\Http\Controllers;
use App\Models\product;
use Illuminate\Support\Facades\DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
session_start();

class CartController extends Controller
{
    public function dele_product($session_id){
        $cart=Session::get('cart');
        if($cart==true){
            foreach($cart as $key=>$val){
                if($val['session_id']==$session_id){
                    unset($cart[$key]);
                }
            }
            Session::put('cart',$cart);
            return redirect()->back()->with('message','Successful delete');
        }else{
            return redirect()->back()->with('message','Successful delete');
        }
    }
    public function update_cart(Request $request){
        $data=$request->all();
        $cart=Session::get('cart');
        if($cart==true){
            foreach($data['cart_qty'] as $key =>$qty){
                foreach($cart as $session =>$val){
                    if($val['session_id']==$key){
                        $cart[$session]['product_qty']=$qty;
                    }

                }
            }
            Session::put('cart',$cart);
            return redirect()->back()->with('message','Successful update');
        }else{
            return redirect()->back()->with('message','Error update');
        }

    }
    public function dele_all_cart(){
        $cart=Session::get('cart');
        if($cart==true){
            Session::forget('cart');
        }
    }
    public function gio_hang(Request $request){
        //seo
        $meta_desc="Giỏ hàng của bạn";
        $meta_keyword="Giỏ hàng";
        $url_canoncial=$request->url();
        $cate_product=DB::table('category')->where('category_status',1)->orderBy('category_id','desc')->get();
       $brand_product=DB::table('brand')->where('brand_status',1)->orderBy('brand_id','desc')->get();
        return view('pages.cart.show_cart')->with('category',$cate_product)
            ->with('brand',$brand_product)->with('meta_desc',$meta_desc)
            ->with('meta_keyword',$meta_keyword)->with('url_cononcial',$url_canoncial);
    }
    public function save_cart_ajax(Request $request){
        $data = $request->all();
        $session_id = substr(md5(microtime()),rand(0,26),5);
        $cart = Session::get('cart');
        if($cart==true){
            $is_avaiable = 0;
            foreach($cart as $key => $val){
                if($val['product_id']==$data['cart_product_id']){
                    $is_avaiable++;
                }
            }
            if($is_avaiable == 0){
                $cart[] = array(
                    'session_id' => $session_id,
                    'product_name' => $data['cart_product_name'],
                    'product_id' => $data['cart_product_id'],
                    'product_image' => $data['cart_product_image'],
                    'product_qty' => $data['cart_product_qty'],
                    'product_price' => $data['cart_product_price'],
                );
                Session::put('cart',$cart);
            }
        }else{
            $cart[] = array(
                'session_id' => $session_id,
                'product_name' => $data['cart_product_name'],
                'product_id' => $data['cart_product_id'],
                'product_image' => $data['cart_product_image'],
                'product_qty' => $data['cart_product_qty'],
                'product_price' => $data['cart_product_price'],

            );
            Session::put('cart',$cart);
        }

        Session::save();

    }
//    public function save_cart(Request $request){
//        $productid=$request->productid_hidden;
//        $quanity=$request->qty;
//        $cate_product=DB::table('category')->where('category_status',1)->orderBy('category_id','desc')->get();
//        $brand_product=DB::table('brand')->where('brand_status',1)->orderBy('brand_id','desc')->get();
//        $product_info=DB::table('product')->where('product_id',$productid)->get();
//        return view('pages.cart.show_cart')->with('category',$cate_product)->with('brand',$brand_product);
//
//    }
}
