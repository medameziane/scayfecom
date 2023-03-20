<?php

namespace App\Http\Livewire\Admin\Category;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Str;

class EditCategoryComponent extends Component
{
    public $category_id;
    public $category;
    public $slug;

    public function generateSlug(){
        $this->slug = Str::slug($this->category);
    }

    public function mount($category_id){
        $category               =   Category::find($category_id);
        $this->category         =   $category->category;
        $this->slug             =   $category->slug;
    }

    public function updateCategory(){
        $this->validate([
            "category"  => ["required"],
            "slug"      => ["required"],
        ]);
        
        $category               = Category::find($this->category_id);
        $category->category     = $this->category;
        $category->slug         = $this->slug;
        $category->save();

        return redirect()->route('categories')->with("success",'Category has been updated successfully');
    }
    public function render()
    {
        return view('livewire.admin.category.edit-category-component')->layout("layouts.staticadmin");;
    }
}
