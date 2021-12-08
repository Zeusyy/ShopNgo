@extends('layouts.app')

@section('content')
<link href="{{ asset('css/product.css') }}" rel="stylesheet">

<div class="container">
    <form action="{{route('product.store')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Ten san pham:</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>

        <div class="form-group">
            <label for="brand">Thuong hieu:</label>
            <input type="text" class="form-control" id="brand" name="brand">
        </div>

        <div class="form-group">
            <label for="price">Gia tien:</label>
            <input type="number" class="form-control" id="price" name="price">
        </div>

        <div class="form-group">
            <label for="display">Man hinh:</label>
            <input type="text" class="form-control" id="display" name="display">
        </div>

        <div class="form-group">
            <label for="os">He dieu hanh:</label>
            <input type="text" class="form-control" id="os" name="os">
        </div>

        <div class="form-group">
            <label for="bcam">Camera sau:</label>
            <input type="text" class="form-control" id="bcam" name="bcam">
        </div>

        <div class="form-group">
            <label for="fcam">Camera truoc:</label>
            <input type="text" class="form-control" id="fcam" name="fcam">
        </div>

        <div class="form-group">
            <label for="cpu">Chip:</label>
            <input type="text" class="form-control" id="cpu" name="cpu">
        </div>

        <div class="form-group">
            <label for="ram">RAM:</label>
            <input type="text" class="form-control" id="ram" name="ram">
        </div>

        <div class="form-group">
            <label for="rom">ROM:</label>
            <input type="text" class="form-control" id="rom" name="rom">
        </div>

        <div class="form-group">
            <label for="sim">SIM:</label>
            <input type="text" class="form-control" id="sim" name="sim">
        </div>

        <div class="form-group">
            <label for="battery">Pin, sac:</label>
            <input type="text" class="form-control" id="battery" name="battery">
        </div>

        <div class="form-group">
            <label for="image">Hinh anh:</label>
            <input type="text" class="form-control" id="image" name="image">
        </div>
        
        
        <button type="submit" class="btn btn-success">Submit</button>
    </form>
</div>
@endsection