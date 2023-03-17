<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;
class HomeComponent extends Component
{

    public function render()
    {
        $products           =   Product::inRandomOrder()->limit(20)->get();
        $categories         =   Category::all();
        $singleCategory     =   Category::inRandomOrder()->limit(1)->get();
        $limitcategories    =   Category::inRandomOrder()->limit(6)->get();
        $productslatestWeek =   Product::inRandomOrder()->limit(2)->get();
        $featuredcategories =   Category::inRandomOrder()->limit(6)->get();
        $bestsellerproducts =   Product::inRandomOrder()->limit(4)->get();
        $hotproducts        =   Product::inRandomOrder()->limit(4)->get();
        $foryouproducts     =   Product::inRandomOrder()->limit(4)->get();
        $popularproducts    =   Product::inRandomOrder()->limit(4)->get();

        $data = compact(
                        "products",
                        "limitcategories",
                        "categories",
                        "singleCategory",
                        "productslatestWeek",
                        "featuredcategories",
                        "bestsellerproducts",
                        "hotproducts",
                        "foryouproducts",
                        "popularproducts",
        );
        
        return view('livewire.frontend.home-component',$data)
                    ->layout('layouts.app',compact("categories"));
    }
}