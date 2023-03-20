<?php

namespace App\Http\Livewire\Admin\Category;

use Livewire\Component;
use App\Models\Category;

class CategoryComponent extends Component
{
    public function render()
    {
        $categories = Category::orderBy("created_at","desc")->paginate(10);
        return view('livewire.admin.category.category-component',compact("categories"))
                ->layout("layouts.staticadmin");
    }
}
