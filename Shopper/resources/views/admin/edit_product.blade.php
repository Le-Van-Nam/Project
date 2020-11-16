@extends('admin_layout')
@section('admin_content')
    <div class="form-w3layouts">
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Update sản phẩm
                    </header>
                    <div class="panel-body">
                        <?php
                        $message=Session::get('message');
                        if($message){
                            echo $message;
                            Session::put('message',null);
                        }
                        ?>
                        <div class="position-center">
                            @foreach($update_product as $key =>$pro)
                            <form role="form" action="{{URL::to('update_product='.$pro->product_id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên sản phẩm</label>
                                    <input type="text" name="product_name" class="form-control" id="exampleInputEmail1" value="{{$pro->product_name}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giá sản phẩm</label>
                                    <input type="text" name="product_price" class="form-control" id="exampleInputEmail1" value="{{$pro->product_price}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh</label>
                                    <input type="file" name="product_image" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                                    <img src="{{URL::to('public/uploads/product/'.$pro->product_image)}}" height="50" width="50"/>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputdesc">Mô tả sản phẩm</label>
                                    <textarea style="resize:none" rows="5" class="form-control" name="product_description" id="exampleInputdesc" placeholder="Mô tả sản phẩm">{{$pro->product_desc}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputdesc">Nội dung sản phẩm</label>
                                    <textarea style="resize:none" rows="5" class="form-control" name="product_content" id="exampleInputdesc" placeholder="Nội dung content">{{$pro->product_content}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Danh mục sản phẩm</label>
                                    <select name="product_cate" class="form-control input-sm m-bot15">
                                        @foreach($cate_product as $key =>$cate)
                                            @if($cate->category_id==$pro->category_id)
                                            <option selected value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                            @else
                                                <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                             @endif
                                        @endforeach
                                    </select>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Thương hiệu sản phẩm</label>
                                    <select name="product_brand" class="form-control input-sm m-bot15">
                                        @foreach($brand_product as $key =>$brand)
                                            @if($brand->brand_id==$pro->brand_id)
                                            <option selected value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                            @else
                                                <option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" name="add_product" class="btn btn-info">Update</button>
                            </form>
                        </div>
                        @endforeach

                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection