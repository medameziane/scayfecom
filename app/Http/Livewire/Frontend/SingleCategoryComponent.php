<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Category;
class SingleCategoryComponent extends Component
{
    public $category;
    public function mount($category_name){
        $this->category = $category_name;
    }

    public function render(){
        $singleSlide            =   Category::inRandomOrder()->limit(2)->get();
        $singlecategory         =   Category::where('slug',$this->category)->first();
        $data = compact(
            "singleSlide",
            "singlecategory",
        );

        return view('livewire.frontend.single-category-component',$data);
    }
}
