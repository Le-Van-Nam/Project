@extends('admin_layout')
@section('admin_content')
    <div class="form-w3layouts">
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Update thương hiệu sản phẩm
                    </header>
                    <div class="panel-body">
                        <?php
                        $message=Session::get('message');
                        if($message){
                            echo $message;
                            Session::put('message',null);
                        }
                        ?>
                        @foreach($update_brand_product as $key => $value)
                            <div class="position-center">
                                <form role="form" action="{{URL::to('update_brand='.$value->brand_id)}}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tên thương hiệu</label>
                                        <input type="text" value="{{$value->brand_name}}" name="brand_name" class="form-control" id="exampleInputEmail1">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Mô tả thương hiệu</label>
                                        <textarea style="resize:none" rows="5" class="form-control" name="brand_description" id="exampleInputPassword1">{{$value->brand_desc}}</textarea>
                                    </div>
                                    <button type="submit" name="update_brand" class="btn btn-info">Update</button>
                                </form>
                            </div>
                        @endforeach

                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection