<?php

namespace App\Http\Livewire\Admin\Category;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
class AddCategoryComponent extends Component
{
    use WithFileUploads;

    public $category;
    public $slug;
    public $image;

    public function generateSlug(){
        $this->slug = Str::slug($this->category);
    }

    public function addCategory(){
        $this->validate([
            "category"   =>  "required",
            "slug"       =>  "required",
            "image"      =>  "image",
        ]);

        // Change image name
        $imageName  =  time().'.'.$this->image->extension();
        
        // Insert data
        $category                  =  new Category();
        $category->category        =  $this->category;
        $category->slug            =  $this->slug;
        $category->image           =  $this->image;
        $category->save();

        $this->image->storeAs("categories",$imageName);

        return redirect()->route('categories')->with("success",'New category has been added successfully');
    }

    public function render(){
        return view('livewire.admin.category.add-category-component')->layout("layouts.staticadmin");
    }
}