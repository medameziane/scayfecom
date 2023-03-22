<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;

use App\Models\Shopping;

class CartComponent extends Component
{
    public $product_id;
    public $user_id;

    public function Destroy($cart_id){
        $cart = Shopping::findOrFail($cart_id);
        $cart->delete();
        return redirect()->route("cart");
    }
    
    public function render()
    {        
        $carts      = Shopping::all()->where("type",1);
        return view('livewire.frontend.cart-component',compact('carts'));
    }
}
