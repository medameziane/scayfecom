<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Category;
use App\Models\SubCategory;

class SingleCategoryComponent extends Component
{
    public $category;
    public $subcategory;

    public function mount($category_name,$subcategory_name = null){
        $this->category = $category_name;
        $this->subcategory = $subcategory_name;
        if($this->category == null && $this->subcategory == null){ 
            redirect()->route('home');
        };
    }

    public function render(){
        $singleSlide            =   Category::inRandomOrder()->limit(2)->get();
        $singlecategory         =   Category::where('slug',$this->category)->get();
        $singlesubcategory      =   SubCategory::where('slug',$this->subcategory)->get();
        $data = compact(
            "singleSlide",
            "singlecategory",
        );

        if($this->subcategory != null){
            return view('livewire.frontend.shop-component',compact("singlesubcategory"));
        }else{
            return view('livewire.frontend.single-category-component',$data);
        }
    }
}
