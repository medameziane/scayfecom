<?php

namespace App\Http\Livewire\Admin\SubCategory;

use Livewire\Component;
use App\Models\SubCategory;
use App\Models\Category;
use Illuminate\Support\Str;

class EditSubCategoryComponent extends Component
{
    public $subcategory_id;
    public $subcategory;
    public $slug;
    public $category_id;


    public function generateSlug(){
        $this->slug = Str::slug($this->subcategory);
    }
    public function mount($subcategory_id){
        $update =SubCategory::findOrFail($subcategory_id);
        $this->subcategory = $update->subcategory;
        $this->slug = $update->slug;
        $this->category_id = $update->category_id;
    }

    public function updateSubCategory(){
        $this->validate([
            "subcategory"   => "required",
            "slug"          => "required",
            "category_id"   => "required",
        ]);
        $update                 = SubCategory::find($this->subcategory_id);
        $update->subcategory    =  $this->subcategory;
        $update->slug           =  $this->slug;
        $update->category_id    =  $this->category_id;
        $update->save();
        return redirect()->route('subcategories')->with("success",'Sub Category has been updated successfully');
    }
    public function render()
    {
        $categories = Category::paginate(10);
        return view('livewire.admin.sub-category.edit-sub-category-component',["categories"=>$categories])->layout("layouts.staticadmin");;
    }
}
