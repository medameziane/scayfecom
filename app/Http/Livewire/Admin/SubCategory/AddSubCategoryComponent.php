<?php

namespace App\Http\Livewire\Admin\SubCategory;

use Livewire\Component;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;


class AddSubCategoryComponent extends Component
{
    public $subcategory;
    public $slug;
    public $category_id;

    public function generateSlug(){
        $this->slug = Str::slug($this->subcategory);
    }

    public function addSubCategory(){
        $this->validate([
            "subcategory"    =>  "required",
            "slug"           =>  "required",
            "category_id"    =>  "required",
        ]);
        
        // Insert data
        $subcategory                    =  new SubCategory();
        $subcategory->subcategory         =  $this->subcategory;
        $subcategory->slug             =  $this->slug;
        $subcategory->category_id          =  $this->category_id;
        $subcategory->save();

        return redirect()->route('subcategories')->with("success",'New sub category has been added successfully');
    }

    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.sub-category.add-sub-category-component',compact("categories"))->layout("layouts.staticadmin");;
    }
}
