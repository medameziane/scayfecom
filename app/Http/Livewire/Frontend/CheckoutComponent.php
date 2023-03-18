<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;

use App\Models\Category;

class CheckoutComponent extends Component
{
    public function render()
    {        
        $categories = Category::all();
        return view('livewire.frontend.checkout-component')->layout('layouts.app',compact("categories"));
    }
}
