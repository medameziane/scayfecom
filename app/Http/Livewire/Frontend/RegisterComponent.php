<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Category;

class RegisterComponent extends Component
{
    public function render()
    {        
        $categories = Category::all();
        return view('livewire.frontend.register-component')->layout('layouts.app',compact("categories"));
    }
}
