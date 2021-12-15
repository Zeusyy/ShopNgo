<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //

    public function index() {
        return view('cart.index');
    }

    public function add(Request $request, $id) {

        $product = Product::find($id);

        if($product != null)
            {
                $oldCart = Session('Cart') ? Session('Cart') : null;
                $newCart = new Cart($oldCart);

                $test = $newCart->addCart($product,$product->id);
                
                
                $request->session()->put('Cart',$newCart);

                return $test ;
            }
        else{
                return __('Fail');
            }
        
    }
}
