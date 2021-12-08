@extends('layouts.app')

@section('content')
<link href="{{ asset('css/product.css') }}" rel="stylesheet">

<div class="container">
    <form action="{{route('product.update',$product)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Ten san pham:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{$product->name}}">
        </div>

        <div class="form-group">
            <label for="brand">Thuong hieu:</label>
            <input type="text" class="form-control" id="brand" name="brand" value="{{$product->brand}}">
        </div>

        <div class="form-group">
            <label for="price">Gia tien:</label>
            <input type="number" class="form-control" id="price" name="price" value="{{$product->price}}">
        </div>

        <div class="form-group">
            <label for="display">Man hinh:</label>
            <input type="text" class="form-control" id="display" name="display" value="{{$product->Display}}">
        </div>

        <div class="form-group">
            <label for="os">He dieu hanh:</label>
            <input type="text" class="form-control" id="os" name="os" value="{{$product->OS}}">
        </div>

        <div class="form-group">
            <label for="bcam">Camera sau:</label>
            <input type="text" class="form-control" id="bcam" name="bcam" value="{{$product->BCAM}}">
        </div>

        <div class="form-group">
            <label for="fcam">Camera truoc:</label>
            <input type="text" class="form-control" id="fcam" name="fcam" value="{{$product->FCAM}}">
        </div>

        <div class="form-group">
            <label for="cpu">Chip:</label>
            <input type="text" class="form-control" id="cpu" name="cpu" value="{{$product->CPU}}">
        </div>

        <div class="form-group">
            <label for="ram">RAM:</label>
            <input type="text" class="form-control" id="ram" name="ram" value="{{$product->RAM}}">
        </div>

        <div class="form-group">
            <label for="rom">ROM:</label>
            <input type="text" class="form-control" id="rom" name="rom" value="{{$product->ROM}}">
        </div>

        <div class="form-group">
            <label for="sim">SIM:</label>
            <input type="text" class="form-control" id="sim" name="sim" value="{{$product->SIM}}">
        </div>

        <div class="form-group">
            <label for="battery">Pin, sac:</label>
            <input type="text" class="form-control" id="battery" name="battery" value="{{$product->Battery}}">
        </div>

        <div class="form-group">
            <label for="image">Hinh anh:</label>
            <input type="text" class="form-control" id="image" name="image" value="{{$product->image}}">
        </div>
        
        
        <button type="submit" class="btn btn-success">Submit</button>
    </form>
</div>
@endsection