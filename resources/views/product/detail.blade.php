@extends('layouts.app')

@section('content')
<link href="{{ asset('css/product.css') }}" rel="stylesheet">

<div class="container">
    <h1>{{$product->name}}</h1>
    @auth
        @if (Auth::user()->role_id == 1)
            <div class="row">
                <a href="{{route('product.edit',$product)}}" type="button" class="btn btn-primary">Sửa</a>
            
            <form action="{{route('product.destroy',$product)}}" method="POST">
                @csrf
                @method('Delete')
                <button  type="submit" class="btn btn-danger">Xoá</button>
            </form>
            </div>
        @endif
    @endauth
    

    <div class="row">
        
        <div class="col-7">
            

        <img style="height:400px" class="" src="{{$product->image}}">

        @if ($product->description != null)
            <p>{{$product->description}}</p>
        @endif
        </div>

        <div class="col-5 ">
            <div class="row">
                <p class="price col-12 d-flex justify-content-center">{{$product->money($product->price)}}</p>
                
                <div class="col-12">
                    <table class="table table-borderless">
                        
                        <tbody>
                        <tr>
                            <td>Màn hình:</td>
                            <td>{{$product->Display}}</td>
                        </tr>
                        <tr>
                            <td>Hệ điều hành:</td>
                            <td>{{$product->OS}}</td>
                        </tr>
                        <tr>
                            <td>Camera sau:</td>
                            <td>{{$product->BCAM}}</td>
                        </tr>
                        <tr>
                            <td class="col-6">Camera trước:</td>
                            <td>{{$product->FCAM}}</td>
                        </tr>
                        <tr>
                            <td>Chip:</td>
                            <td>{{$product->CPU}}</td>
                        </tr>
                        <tr>
                            <td>RAM:</td>
                            <td>{{$product->RAM}}</td>
                        </tr>
                        <tr>
                            <td>Bộ nhớ trong:</td>
                            <td>{{$product->ROM}}</td>
                        </tr>
                        <tr>
                            <td>SIM:</td>
                            <td>{{$product->SIM}}</td>
                        </tr>
                        <tr>
                            <td>Pin, Sạc:</td>
                            <td>{{$product->Battery}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        
        </div>
        
    </div>
    
</div>
@endsection