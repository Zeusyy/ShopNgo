@if (Session::has('Cart') != null)
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
@else
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                
                <div class="card-body cart">
                    <div class="col-sm-12 empty-cart-cls text-center"> <img src="https://i.imgur.com/dCdflKN.png" width="130" height="130" class="img-fluid mb-4 mr-3">
                        <h3><strong>{{__('cart.Empty')}}</strong></h3>
                        <h4>{{__('cart.Add something')}}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif