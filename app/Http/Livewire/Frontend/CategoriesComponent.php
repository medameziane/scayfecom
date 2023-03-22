<?php

namespace App\Http\Livewire\Frontend;
use App\Models\Category;
use Livewire\Component;

class CategoriesComponent extends Component
{
    public function render()
    {
        $categories  =   Category::all();
        return view('livewire.frontend.categories-component',compact("categories"));
    }
}
