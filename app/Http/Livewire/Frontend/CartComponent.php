<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;

use App\Models\Category;
use App\Models\Shopping;

class CartComponent extends Component
{
    public $product_id;
    public $user_id;
    
    public function render()
    {        
        $categories = Category::all();
        $carts      = Shopping::all()->where("type",1);
        $wishlists  = Shopping::all()->where("type",0);
        return view('livewire.frontend.cart-component')
                ->layout('layouts.app',compact("categories","carts","wishlists"));
    }
}
