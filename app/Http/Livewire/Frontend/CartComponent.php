<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;

use App\Models\Category;

class CartComponent extends Component
{
    public function render()
    {        
        $categories = Category::all();
        return view('livewire.frontend.cart-component')->layout('layouts.app',compact("categories"));
    }
}
