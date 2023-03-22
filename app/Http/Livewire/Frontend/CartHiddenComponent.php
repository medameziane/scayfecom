<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Shopping;
use Illuminate\Support\Facades\Auth;

class CartHiddenComponent extends Component
{
    public function render()
    {
        $carts =   Shopping::all()->where('user_id',auth::user()->id)->where("type",1);
        return view('livewire.frontend.cart-hidden-component',compact('carts'));
    }
}
