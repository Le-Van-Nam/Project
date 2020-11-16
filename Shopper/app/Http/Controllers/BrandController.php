<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
session_start();

class BrandController extends Controller
{
    public function add_brand(){
        return view('admin.add_brand');

    }
    public function all_brand(){
        $all_brand=DB::table('brand')->paginate(2);
        $manager_brand=view('admin.all_brand')->with('all_brand_product',$all_brand);
        return view('admin_layout')->with('admin.all_brand',$manager_brand);
    }
    public function save_brand(Request $request){
        $data=array();
        $data['brand_name']=$request->brand_name;
        $data['brand_desc']=$request->brand_description;
        $data['brand_status']=$request->brand_status;
        DB::table('brand')->insert($data);
        Session::put('message','Thêm thương hiệu thành công');
        return redirect('add-brand');
    }
    public function unactive_brand($brand_id){
        DB::table('brand')->where('brand_id',$brand_id)->update(['brand_status'=>1]);
        return redirect('all-brand');

    }
    public function active_brand($brand_id){
        DB::table('brand')->where('brand_id',$brand_id)->update(['brand_status'=>0]);
        return redirect('all-brand');

    }
    public function update_brand($brand_id){
        $update_brand=DB::table('brand')->where('brand_id',$brand_id)->get();
        $manager_brand=view('admin.edit_brand')->with('update_brand_product',$update_brand);
        return view('admin_layout')->with('admin.edit_brand',$manager_brand);
    }
    public function edit_brand(Request $request,$brand_id){
        $data=array();
        $data['brand_name']=$request->brand_name;
        $data['brand_desc']=$request->brand_description;
        DB::table('brand')->where('brand_id',$brand_id)->update($data);
        Session::put('message','update thương hiệu thành công');
        return redirect('all-brand');

    }
    public function delete_brand($brand_id){
        DB::table('brand')->where('brand_id',$brand_id)->delete();
        Session::put('message','Xóa thương hiệu thành công');
        return redirect('all-brand');
    }
    public function show_brand_home($brand_id){
        $cate_product=DB::table('category')->where('category_status',1)->orderBy('category_id','desc')->get();
        $brand_product=DB::table('brand')->where('brand_status',1)->orderBy('brand_id','desc')->get();
        $brand_by_id=DB::table('product')->join('brand','product.brand_id','brand.brand_id')
            ->where('product.brand_id',$brand_id)->get();
        $brand_name=DB::table('brand')->where('brand.brand_id',$brand_id)->distinct()->get();
        return view('pages.brand.show_brand')->with('category',$cate_product)->with('brand',$brand_product)->
        with('brand_by_id',$brand_by_id)->with('brand_name',$brand_name);

    }
}
