@extends('admin_layout')
@section('admin_content')
    <div class="form-w3layouts">
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Thêm thương hiệu sản phẩm
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
                            <form role="form" action="{{URL::to('save_brand')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên thương hiệu</label>
                                    <input type="text" name="brand_name" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả mô tả thương thiệu</label>
                                    <textarea style="resize:none" rows="5" class="form-control" name="brand_description" id="exampleInputPassword1" placeholder="Mô tả danh mục"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Hiển thị</label>
                                    <select name="brand_status" class="form-control input-sm m-bot15">
                                        <option value="0">Ẩn</option>
                                        <option value="1">Hiển thị</option>
                                    </select>
                                </div>
                                <button type="submit" name="add_category" class="btn btn-info">Thêm thương hiệu</button>
                            </form>
                        </div>

                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection