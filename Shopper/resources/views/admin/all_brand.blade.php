@extends('admin_layout')
@section('admin_content')
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Liệt kê thương hiệu sản phẩm
            </div>
            <div class="row w3-res-tb">
                <div class="col-sm-3">
                    <div class="input-group">
                        <input type="text" class="input-sm form-control" placeholder="Search">
                        <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="button">Go!</button>
          </span>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <div class="panel-body">
                    <?php
                    $message=Session::get('message');
                    if($message){
                        echo $message;
                        Session::put('message',null);
                    }
                    ?>
                    <table class="table table-striped b-t b-light">
                        <thead>
                        <tr>
                            <th style="width:20px;">
                            </th>
                            <th>Tên thương hiệu</th>
                            <th>Hiển thị</th>
                            <th style="width:30px;"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($all_brand_product as $key=>$value)
                            <tr>
                                <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                                <td>{{$value->brand_name}}</td>
                                <td><span class="text-ellipsis">
                            <?php
                                        if($value->brand_status==0){
                                        ?>
                                        <a href="{{URL::to('unactive-brand='.$value->brand_id)}}"><span class="fa fa-thumbs-down" style="font-size:25px;color:red"></span></a>
                                        <?php }else{ ?>
                                        <a href="{{URL::to('active-brand='.$value->brand_id)}}"><span class="fa fa-thumbs-up" style="font-size:25px;color:green"></span></a>
                                        <?php } ?>

                            </span></td>
                                <td>
                                    <a href="{{URL::to('update-brand='.$value->brand_id)}}" class="active" ui-toggle-class="">
                                        <i class="fa fa-pencil-square-o text-success text-active"></i>
                                    </a>
                                    <a onclick="return confirm('Are you sure to delete?')" href="{{URL::to('delete-brand='.$value->brand_id)}}" class="active" ui-toggle-class="">
                                        <i class="fa fa-times text-danger text"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <footer class="panel-footer">
                    <div class="row">
                        <span>{!!$all_brand_product->render()!!}</span>
                    </div>
                </footer>
            </div>
        </div>
@endsection