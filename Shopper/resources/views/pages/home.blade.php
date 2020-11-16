@extends('welcome')
@section('content')
<div class="features_items"><!--features_items-->
    <h2 class="title text-center">New Items</h2>
    @foreach($all_product as $key =>$value)
    <div class="col-sm-4">
        <div class="product-image-wrapper">
            <div class="single-products">
                <div class="productinfo text-center">
                    <form>
                        @csrf
                        <input type="hidden" value="{{$value->product_id}}" class="{{'cart_product_id_'.$value->product_id}}">
                        <input type="hidden" value="{{$value->product_name}}" class="{{'cart_product_name_'.$value->product_id}}">
                        <input type="hidden" value="{{$value->product_image}}" class="{{'cart_product_image_'.$value->product_id}}">
                        <input type="hidden" value="{{$value->product_price}}" class="{{'cart_product_price_'.$value->product_id}}">
                        <input type="hidden" value="1" class="cart_product_qty_{{$value->product_id}}">
                    <a href="{{URL::to('chi-tiet-san-pham/'.$value->product_id)}}">
                    <img src="{{URL::to('public/uploads/product/'.$value->product_image)}}" alt="" />
                    <h2>{{'$'.number_format($value->product_price)}}</h2>
                    <p>{{$value->product_name}}</p>
                    </a>
                     <button class="btn btn-default add-to-cart" name="add-to-cart" data-id_product="{{$value->product_id}}" ><i class="fa fa-shopping-cart"></i>Add to cart</button>
                </form>
                </div>
            </div>
            <div class="choose">
                <ul class="nav nav-pills nav-justified">
                    <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                    <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                </ul>
            </div>
        </div>
    </div>
        @endforeach
</div><!--features_items-->
@endsection