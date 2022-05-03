
@extends('master')

@section('content')
<div class="conytainer">

    <div class="row">
        <div class="col-sm-6">
        <img class="detail-img" src="{{$productDetail->gallery}}" alt="">
        </div>
        <div class="col-sm-6">
            <a href="/">Back</a>
            <h2>{{$productDetail->name}}</h2>
            <h3>Price:{{$productDetail->price}} $</h3>
            <h4>Detail: {{$productDetail->description}}</h4>
            <br><br>
            <form action="/add_to_cart" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{$productDetail->id}}">
                <button class="btn btn-primary">Add to Cart</button>
            </form>
         
            <br><br>
            <button class="btn btn-success">Buy Now</button>
            <br><br>
        </div>


    </div>


</div>

@endsection
