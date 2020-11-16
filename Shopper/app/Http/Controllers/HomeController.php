<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
session_start();

class HomeController extends Controller
{
    //
    public function index(){
        $cate_product=DB::table('category')->where('category_status',1)->orderBy('category_id','desc')->get();
        $brand_product=DB::table('brand')->where('brand_status',1)->orderBy('brand_id','desc')->get();
        $all_product=DB::table('product')->where('product_status',1)->orderBy('product_id','desc')->limit(4)->get();
        return view('pages.home')->with('category',$cate_product)->with('brand',$brand_product)->with('all_product',$all_product);
    }
}
