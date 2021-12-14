@extends('layouts.app')

@section('content')
<link href="{{ asset('css/product.css') }}" rel="stylesheet">
<div class="container">
    @auth
        @if (Auth::user()->role_id == 1)
            <a href="{{route('product.create')}}" type="button" class="btn btn-success">Thêm sản phẩm</a>
        @endif
    @endauth
    
    
    <div class="row">
        @foreach ($products as $product)
            <div class="card col-4">
                <div class="card-body d-flex justify-content-center">
                    <a href="{{route('product.show',$product)}}" >
                        <img style="max-height:200px" class="img-fluid" src="{{$product->image}}">
                    </a>
                </div>
                <div class="card-body d-flex justify-content-center">
                    <a href="{{route('product.show',$product)}}" >{{$product->name}}</a>
                </div>
                <div class="tien card-footer d-flex justify-content-end">
                    {{$product->money($product->price)}}
                </div>
            </div>

            {{-- {{$product->name}} - {{$product->brand}} - {{$product->money($product->price)}} --}}
        @endforeach
    </div>
</div>
@endsection