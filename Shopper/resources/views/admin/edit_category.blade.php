@extends('admin_layout')
@section('admin_content')
    <div class="form-w3layouts">
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Update mục sản phẩm
                    </header>
                    <div class="panel-body">
                        <?php
                        $message=Session::get('message');
                        if($message){
                            echo $message;
                            Session::put('message',null);
                        }
                        ?>
                        @foreach($update_category_product as $key => $value)
                        <div class="position-center">
                            <form role="form" action="{{URL::to('update_category='.$value->category_id)}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên danh mục</label>
                                    <input type="text" value="{{$value->category_name}}" name="category_name" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả danh mục</label>
                                    <textarea style="resize:none" rows="5" class="form-control" name="category_description" id="exampleInputPassword1">{{$value->category_desc}}</textarea>
                                </div>
                                <button type="submit" name="update_category" class="btn btn-info">Update</button>
                            </form>
                        </div>
                            @endforeach

                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection