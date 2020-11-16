<?php

namespace App\Http\Controllers;
use App\Models\product;
use Illuminate\Support\Facades\DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
session_start();

class ProductController extends Controller
{
    public function add_product(){
        $cate_product=DB::table('category')->orderBy('category_name','desc')->get();
        $brand_product=DB::table('brand')->orderBy('brand_name','desc')->get();
        return view('admin.add_product')->with('cate_product',$cate_product)->with('brand_product',$brand_product);

    }
    public function all_product(){
        $all_product=DB::table('product')->join('category','product.category_id','category.category_id')->join('brand','product.brand_id','brand.brand_id')
            ->orderBy('product.product_id','desc')->paginate(2);
        $manager_product=view('admin.all_product')->with('all_product',$all_product);
        return view('admin_layout')->with('admin.all_product',$manager_product);
    }
    public function save_product(Request $request){
        $data=array();
        $data['product_name']=$request->product_name;
        $data['product_price']=$request->product_price;
        $data['product_desc']=$request->product_description;
        $data['product_content']=$request->product_content;
        $data['category_id']=$request->product_cate;
        $data['brand_id']=$request->product_brand;
        $data['product_status']=$request->product_status;
        $get_image=$request->file('product_image');
        if($get_image){
            $get_image_name=$get_image->getClientOriginalName();
            $name_image=current(explode('.',$get_image_name));
            $new_image=$name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/product',$new_image);
            $data['product_image']=$new_image;
            DB::table('product')->insert($data);
            Session::put('message','Thêm sản phẩm thành công');
            return redirect('add-product');
        }else{
            $data['product_image']="";
        }
        DB::table('product')->insert($data);
        Session::put('message','Thêm sản phẩm thành công');
        return redirect('add-product');
    }
    public function unactive_product($product_id){
        DB::table('product')->where('product_id',$product_id)->update(['product_status'=>1]);
        return redirect('all-product');

    }
    public function active_product($product_id){
        DB::table('product')->where('product_id',$product_id)->update(['product_status'=>0]);
        return redirect('all-product');

    }
    public function update_product($product_id){
        $cate_product=DB::table('category')->orderBy('category_id','desc')->get();
        $brand_product=DB::table('brand')->orderBy('brand_id','desc')->get();
        $update_product=DB::table('product')->where('product_id',$product_id)->get();
        $manager_product=view('admin.edit_product')->with('update_product',$update_product)->with('cate_product',$cate_product)
            ->with('brand_product',$brand_product);
        return view('admin_layout')->with('admin.edit_product',$manager_product);
    }
    public function edit_product(Request $request,$product_id){
        $data=array();
        $data['product_name']=$request->product_name;
        $data['product_price']=$request->product_price;
        $data['product_desc']=$request->product_description;
        $data['product_content']=$request->product_content;
        $data['category_id']=$request->product_cate;
        $data['brand_id']=$request->product_brand;
        $get_image=$request->file('product_image');
        if($get_image){
            $get_image_name=$get_image->getClientOriginalName();
            $name_image=current(explode('.',$get_image_name));
            $new_image=$name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/product',$new_image);
            $data['product_image']=$new_image;
            $yen=DB::table('product')->where('product_id',$product_id)->update($data);
            Session::put('message','update sản phẩm thành công');
            return redirect('all-product');
        }
        DB::table('product')->where('product_id',$product_id)->update($data);
        Session::put('message','update sản phẩm thành công');
        return redirect('all-product');

    }
    public function delete_product($product_id){
        $name=product::find($product_id);
        $imge='public/uploads/product/'.$name->product_image;
        if(file_exists($imge)){
            @unlink($imge);
        }
        $name->delete();
        Session::put('message','Xóa sản phẩm thành công');
        return redirect('all-product');
    }
    //end page
    //start detail
    public function detail_product($product_id){
        $cate_product=DB::table('category')->where('category_status',1)->orderBy('category_id','desc')->get();
        $brand_product=DB::table('brand')->where('brand_status',1)->orderBy('brand_id','desc')->get();
        $detail_product=DB::table('product')->join('category','product.category_id','category.category_id')->join('brand','product.brand_id','brand.brand_id')
            ->where('product.product_id',$product_id)->get();
        foreach($detail_product as $key =>$value){
            $category_id=$value->category_id;
        }
        $related_product=DB::table('product')->join('category','product.category_id','category.category_id')->join('brand','product.brand_id','brand.brand_id')
            ->where('category.category_id',$category_id)->whereNotIn('product.product_id',[$product_id])->get();
        return view('pages.product.show_detail')->with('category',$cate_product)
            ->with('brand',$brand_product)->with('detail_product',$detail_product)->with('relate',$related_product);

    }
}
