<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Shopping;

class CartHiddenComponent extends Component
{
    public function render()
    {
        $carts =   Shopping::all()->where("type",1);
        return view('livewire.frontend.cart-hidden-component',compact('carts'));
    }
}
