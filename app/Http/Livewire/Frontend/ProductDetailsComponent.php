<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;

class ProductDetailsComponent extends Component
{
    public  $slug;
    public  $productdetails;
    public function mount($slug){
        $this->slug = $slug;
        $this->productdetails = Product::where('slug',$this->slug)->get();
        if(count($this->productdetails)== 0 || $this->slug == null){
            redirect()->route('home');
        }
    }
    
    public function render()
    {
        $productdetails     = Product::where('slug',$this->slug)->get();
        $subcategory        = SubCategory::where("id",$productdetails[0]->sub_category_id)->get();
        $category           = Category::where("id",$subcategory[0]->category_id)->get();
        $r_products         = Product::where('sub_category_id',$subcategory[0]->id)->inRandomOrder()->limit(5)->get();
        $data = compact(
            "productdetails",
            "subcategory",
            "category",
            "r_products",
        );

        return view('livewire.frontend.product-details-component',$data);
    }
}
