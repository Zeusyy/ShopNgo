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
    public function deleteCart(Request $request, $id){
        $oldCart = Session('Cart') ? Session('Cart') : null;
        $newCart = new Cart($oldCart);
        $newCart->deleteCart($id);

        if(Count($newCart->products)>0)
            $request->session()->put('Cart',$newCart);
        else
            $request->session()->forget('Cart',$newCart); 
        return view('cart.body');
    }

    public function clearCart(Request $request){
        $request->session()->forget('Cart');

        return redirect()->route('cart.index');
    }
}
