@extends('layouts.app')

@section('content')
<link href="{{ asset('css/home.css') }}" rel="stylesheet">
<div class="slide">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img style="max-height: 500px" class="d-block w-100" src="https://cdn.tgdd.vn/2021/11/banner/830-300-830x300-24.png" alt="First slide">
              </div>
              <div class="carousel-item">
                <img style="max-height: 500px" class="d-block w-100" src="https://cdn.tgdd.vn/2021/12/banner/Aseri-830-300-830x300-1.png" alt="Second slide">
              </div>
              <div class="carousel-item">
                <img style="max-height: 500px" class="d-block w-100" src="https://cdn.tgdd.vn/2021/12/banner/830-300-830x300-1.png" alt="Third slide">
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
    </div>
    <div class="banner">
      <div class="d-flex justify-content-center">
        San pham noi bat
      </div>
    </div>
    
    <div class="content container">
      <div class="row">
        @foreach ($products as $product)
          <div class="col-3">
            <div class="card" style="width: 18rem;">
              <img class="card-img-top" src="{{$product->image}}" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title">
                  <a href="{{route('product.show',$product)}}" >{{$product->name}}</a>
                </h5>
                <p class="card-text d-flex justify-content-end">
                  {{$product->money($product->price)}}
                </p>
                
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
    

    <div class="more-btn d-flex justify-content-center">
      <a href="{{route('product.index')}}" type="button" class="btn btn-primary">Xem thêm</a>
    </div>
    

<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div> -->

@endsection
