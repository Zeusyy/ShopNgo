@extends('layouts.app')
@section('content')


@if(Session::has('Cart') != null)

<link href="{{ asset('css/cart.css') }}" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

<style>
    .ajs-message.ajs-custom {
        color: #ffffff;
        /* background-color: #d9edf7;   */
        background: rgba(91, 189, 114, 0.95);
        border-color: #31708f;
    }
</style>

<div class="mt-4 container bg-white rounded padding-bottom-3x mb-1">
    <!-- Alert-->
    @if(session()->has('error'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>{{__('payment.Fail')}}</strong>{{__('payment.CheckMomo')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    
    <!-- Shopping Cart-->
    <div id="change">
        <div class="table-responsive shopping-cart">
            <table class="table">
                <thead>
                    <tr>
                        {{-- {{__('cart.Product')}} --}}
                        <th></th>
                        <th class="text-center">{{__('Quantity')}}</th>
                        <th class="text-center">{{__('Price')}}</th>

                        <th class="text-center">
                            <a class="btn btn-sm btn-outline-danger" href="{{route('cart.clear')}}">Clear cart</a>
                        </th>
                    </tr>
                </thead>
                <tbody>  
                    @foreach (Session::get('Cart')->products as $product)
                    <tr>
                        <td>
                            <div class="product-item">
                                
                                <a class="product-thumb" href=""><img style="width: 200px; height: 160px"
                                        src="{{$product['productInfo']->image}}" alt="Product"></a>
                                <div class="product-info">
                                    <h4 class="product-title"><a href="">{{$product['productInfo']->name}}</a></h4>
                                    <div>
                                        sadnsa
                                    </div>
                                </div>
                            </div>
                        </td>
                        
                        <td class="text-center">
                            {{-- <div class="count-input">
                                <input class="form-control" type="text" value="{{$product['quantity']}}">
                            </div> --}}
                            <div class="quantity">
                                <span class="pro-qty">
                                   
                                    <input disabled data-price="" data-day="1" data-date="" data-id="" id="1" type="text" value="{{$product['quantity']}}">
                                   
                                    {{-- <input disabled data-price="{{$product['price']}}" data-day="{{$product['productInfo']->day}}" data-date="{{$product['productInfo']->checkin_date}}" data-id="{{$product['productInfo']->product_code}}" id="product-{{$product['productInfo']->product_code}}" type="text" value="{{$product['quantity']}}"> --}}
                                    
                                </span>
                            </div>
                        </td>

                        <td class="text-center text-lg text-medium">{{Session::get('Cart')->money($product['price'])}}</td>

                        <td class="text-center">
                            <a class="remove-from-cart" href="#!" data-toggle="tooltip" title=""
                                data-original-title="Remove item">
                                <div class="remove">
                                    <i class=" fa fa-trash" data-id="{{$product['productInfo']->id}}"></i>
                                </div>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="shopping-cart-footer">
            <div class="column">
                {{-- <form class="coupon-form" method="post">
                    <input class="form-control form-control-sm" type="text" placeholder="Coupon code" required="">
                    <button class="btn btn-outline-primary btn-sm" type="submit">Apply Coupon</button>
                </form> --}}
            </div>
            <div class="column text-lg">{{__('Total')}}: 
                <span class="text-medium">{{Session::get('Cart')->totalPrice}}</span>
                {{-- <span>{{Session::get('Cart')->usd(Session::get('Cart')->totalPrice)}}</span>  --}}
                <input id="totalUSD" type="hidden" value="1.000.000">
            </div>
        </div>

        <div class="shopping-cart-footer">
            <div class="column">
                {{--  --}}
                
            </div>
            <div class="column">
                <a class="update btn btn-primary" href="#!" data-toast="" data-toast-type="success" data-toast-position="topRight"
                    data-toast-icon="icon-circle-check" data-toast-title="Your cart"
                    data-toast-message="is updated successfully!">
                    {{__('Update Cart')}}
                </a>
                
                <a class="checkout btn btn-success" href="#!">{{__('Checkout')}}</a>
                
            </div>
        </div>
        <div class="shopping-cart-footer">
            {{-- <div class="column">
                {{__('cart.paypal')}}
            </div>
            <div class="column">
                <div id="paypal-button"></div>

            </div> --}}
        </div>
    </div>

    
</div>
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

{{-- <script>
    
    var proQty = $('.pro-qty');
    // proQty.prepend('<span class="dec qtybtn">-</span>');
    // proQty.append('<span class="inc qtybtn">+</span>');

    // $(".qtybtn").click(function() {
    //     alert( "Handler for .click() called." );
    // });
    console.log(proQty);
    proQty.on('click', '.qtybtn', function () {
        console.log('test');
        var $button = $(this);
        var oldValue = $button.parent().find('input').val();
        if ($button.hasClass('inc')) {
            var newVal = parseFloat(oldValue) + 1;
            
        } else {
            // Don't allow decrementing below zero
            if (oldValue > 0) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 0;
            }
        }
        
        $button.parent().find('input').val(newVal);
        console.log('click');
    });

</script> --}}

<script>
    $(document).ready(function(){
        $("#change").on("click", ".remove i", function () {
        console.log('test');
        $.ajax({
            url: '/deleteCart/' + $(this).data('id'),
            type: 'GET',
        }).done(function (respone) {
            // var icon = '<span class="bi bi-bag-dash"></span>';
            $("#change").empty();
            $("#change").html(respone);
            // var noti = $( "#noti" ).val();
            // alertify.notify(icon+ " " + noti, 'custom');
            console.log('delete');
        });

        // $.ajax({
        //     url: "cartQuantity" ,
        //     type:'GET',   
        // }).done(function(respone){
        //     $('#CartCount').text(respone);
            
        // });
        });
    });
</script>


<script>
    // function updateCart(){
    //     var list= [];
    //     $("table tbody tr td").each(function(){
    //         $(this).find("input").each(function(){
    //             var element = {key: $(this).data("id"),value: $(this).val()};
    //             list.push(element);
    //         });
    //     });

    //     console.log(list);
    //     var list1 = [1,2,3]
    //     $.ajax({
    //         url: "updateCart",
    //         type:'POST',
    //         data:{
    //             "_token": "{{ csrf_token() }}",
    //             "data": list,
    //         }
    //     }).done(function(respone){
    //         var icon = '<span class="bi bi-bag-dash"></span>';
    //         $("#change").empty();
    //         $("#change").html(respone);
    //         var noti = $( "#noti" ).val();
    //         // alertify.notify(icon+ " " + noti, 'custom');
    //     });
    //     $.ajax({
    //         url: "cartQuantity" ,
    //         type:'GET',   
    //     }).done(function(respone){
    //         $('#CartCount').text(respone);
            
    //     });
    // }
    
    
    $("#change").on("click", ".remove i", function () {
        console.log('test');
        $.ajax({
            url: '/deleteCart/' + $(this).data('id'),
            type: 'GET',
        }).done(function (respone) {
            // var icon = '<span class="bi bi-bag-dash"></span>';
            $("#change").empty();
            $("#change").html(respone);
            // var noti = $( "#noti" ).val();
            // alertify.notify(icon+ " " + noti, 'custom');
            console.log('delete');
        });

        // $.ajax({
        //     url: "cartQuantity" ,
        //     type:'GET',   
        // }).done(function(respone){
        //     $('#CartCount').text(respone);
            
        // });
    });

    
    // so luong tung mon trong gio hang
    
    // $(".update").on("click",function(){
    //     updateCart();
        
    // });

    // function checkout(payment){
    //     // updateCart();
    //     var list= [];
        
    //     $("table tbody tr td").each(function(){
    //         $(this).find("input").each(function(){
    //             var element = {key: $(this).data("id"),value: $(this).val(),day: $(this).data("day"),price: $(this).data("price"),date: $(this).data("date")};
    //             list.push(element);
    //         });
    //     });
    //     // var list1 = [1,2,3];
    //     console.log(list);
    //     $.ajax({
    //         url: "booking",
    //         type:'POST',
    //         data:{
    //             "_token": "{{ csrf_token() }}",
    //             "data": list,
    //             "payment": payment,
    //         }
    //     }).done(function(respone){
    //         // console.log(respone);
    //         if(payment == 4)
    //         {
    //             if(respone == 'error')
    //                 {
    //                     alertify.error('Error');
    //                 }
    //             else
    //                 location.href = respone;
    //                 // console.log(respone);
    //         }
    //         else
    //             {
    //                 location.href = '/receipt';
    //             }
    //     });
    // }

    // $(".checkout").on("click",function(){
    //     var payment =$('input[name="payment"]:checked').val();

    //     checkout(payment);
    // });

</script>

@else
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body cart">
                    <div class="col-sm-12 empty-cart-cls text-center"> <img src="https://i.imgur.com/dCdflKN.png" width="130" height="130" class="img-fluid mb-4 mr-3">
                        <h3><strong>Khong co hang</strong></h3>
                        <h4>Hay mua gi do</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

@endsection