<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Category;

class LoginComponent extends Component
{
    public function render()
    {        
        $categories = Category::all();
        return view('livewire.frontend.login-component')->layout('layouts.app',compact("categories"));
    }
}
