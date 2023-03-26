<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Shopping;
use Illuminate\Support\Facades\Auth;

class CheckoutComponent extends Component
{
    public function render()
    {        
        $checkouts = Shopping::all()->where('user_id',auth::user()->id)->where("type",1)->sum("subprice");
        return view('livewire.frontend.checkout-component',compact("checkouts"));
    }
}
