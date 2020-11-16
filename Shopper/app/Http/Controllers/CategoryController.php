<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
session_start();

class CategoryController extends Controller
{
    public function add_category(){
        return view('admin.add_category');

    }
    public function all_category(){
        $all_category=DB::table('category')->paginate(2);
        $manager_category=view('admin.all_category')->with('all_category_product',$all_category);
        return view('admin_layout')->with('admin.all_category',$manager_category);
    }
    public function save_category(Request $request){
        $data=array();
        $data['category_name']=$request->category_name;
        $data['category_desc']=$request->category_description;
        $data['category_status']=$request->category_status;
        DB::table('category')->insert($data);
        Session::put('message','Thêm danh mục thành công');
        return redirect('add-category');
    }
    public function unactive_category($category_id){
        DB::table('category')->where('category_id',$category_id)->update(['category_status'=>1]);
        return redirect('all-category');

    }
    public function active_category($category_id){
        DB::table('category')->where('category_id',$category_id)->update(['category_status'=>0]);
        return redirect('all-category');

    }
    public function update_category($category_id){
        $update_category=DB::table('category')->where('category_id',$category_id)->get();
        $manager_category=view('admin.edit_category')->with('update_category_product',$update_category);
        return view('admin_layout')->with('admin.edit_category',$manager_category);
    }
    public function edit_category(Request $request,$category_id){
        $data=array();
        $data['category_name']=$request->category_name;
        $data['category_desc']=$request->category_description;
        DB::table('category')->where('category_id',$category_id)->update($data);
        Session::put('message','update mục thành công');
        return redirect('all-category');

    }
    public function delete_category($category_id){
        DB::table('category')->where('category_id',$category_id)->delete();
        Session::put('message','Xóa danh mục thành công');
        return redirect('all-category');
    }
    //end Function admin page
    //start frontend
    public function show_category_home($category_id){
        $cate_product=DB::table('category')->where('category_status',1)->orderBy('category_id','desc')->get();
        $brand_product=DB::table('brand')->where('brand_status',1)->orderBy('brand_id','desc')->get();
        $category_by_id=DB::table('product')->join('category','product.category_id','category.category_id')
            ->where('product.category_id',$category_id)->get();
        $category_name=DB::table('category')->where('category.category_id',$category_id)->distinct()->get();

        return view('pages.category.show_category')->with('category',$cate_product)->with('brand',$brand_product)->
        with('category_by_id',$category_by_id)->with('category_name',$category_name);

    }

}
