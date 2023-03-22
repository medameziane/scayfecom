<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Shopping;

class CheckoutComponent extends Component
{
    public function render()
    {        
        $checkouts  = Shopping::all()->where("type",1);
        return view('livewire.frontend.checkout-component',compact("checkouts"));
    }
}
