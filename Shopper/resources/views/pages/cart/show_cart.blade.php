@extends('welcome')
@section('content')
    <section id="cart_items">
        <div class="container-fluid">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="{{URL::to('trang-chu')}}">Home</a></li>
                    <li class="active">Shopping Cart</li>
                </ol>
            </div>
            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <form action="{{url('update-cart')}}" method="post">
                        @csrf
                    <thead>
                    <tr class="cart_menu">
                        <td class="image">Image</td>
                        <td class="description">Name</td>
                        <td class="price">Price</td>
                        <td class="quantity">Quantity</td>
                        <td class="total">Total</td>
                        <td></td>
                    </tr>
                    </thead>
                    <tbody>
                    @if(Session::get('cart')==true)
                    @foreach(Session::get('cart') as $key=>$value)
                        @php
                        $subtotal=$value['product_qty']*$value['product_price']


                        @endphp
                    <tr>
                        <td class="cart_product">
                            <img src="{{asset('public/uploads/product/'.$value['product_image'])}}" width="90" alt="{{$value['product_name']}}" />
                        </td>
                        <td class="cart_description">
                            <h4><a href="">{{$value['product_name']}}</a></h4>
                            <p>ID: {{$value['product_id']}}</p>
                        </td>
                        <td class="cart_price">
                            <p>${{number_format($value['product_price'])}}</p>
                        </td>
                        <td class="cart_quantity">
                            <div class="cart_quantity_button">
                                <input class="cart_quantity" type="number" min="1" style="width:50px" name="cart_qty[{{$value['session_id']}}]" value="{{$value['product_qty']}}">
                            </div>
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price">${{number_format($subtotal)}}</p>
                        </td>
                        <td class="cart_delete">
                            <a class="cart_quantity_delete" href="{{url('dele-product/'.$value['session_id'])}}"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                    @endforeach
                        <tr>
                            <td>
                            <input type="submit" name="update_qty" class="btn btn-default btn-sm" value="Update">
                            </td>
                            <td>
                                <a class="btn btn-sm btn-danger" href="{{url('dele_all_cart')}}">Delete</a>
                            </td>
                        </tr>
                        @else
                        <tr>
                            <td colspan="5">
                            @php
                            echo "Please add products";
                            @endphp
                            </td>
                        </tr>
                        </tr>
                        @endif
                    </tbody>
                </form>
                </table>

            </div>
        </div>
    </section>
@endsection