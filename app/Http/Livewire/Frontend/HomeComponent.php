<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;
use App\Models\Shopping;
use Illuminate\Support\Facades\Auth;
class HomeComponent extends Component
{
    public $product_id;
    public $cartcount;
    public $counter;


    public function productid($id){
        $this->product_id = $id;
        $this->counter ++;
    }

    public function mount(){
        $carts = Shopping::all()->where('type',1)->count();
        $this->counter = $carts;
    }

    // Add to cart
    public function addcart(){

        if(Shopping::where('product_id',$this->product_id)->exists()){
            return redirect('/')->with("exist",'This product already exist');
        }else{
            $shop = new Shopping();
            $shop->product_id   = $this->product_id;
            $shop->user_id      = Auth::user()->id;
            $shop->type         = 1;
            $shop->save();
        }
    }

    // Add to wishlist
    public function addwishlist(){
        $shop = new Shopping();
        $shop->product_id   = $this->product_id;
        $shop->user_id      = Auth::user()->id;
        $shop->type         = 0;
        $shop->save();
    }

    public function render(){
        $products           =   Product::inRandomOrder()->limit(20)->get();
        $categories         =   Category::all();
        $carts              =   Shopping::all()->where('type',1);
        $wishlists          =   Shopping::all()->where('type',0);
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
            "carts",
        );
        
        return view('livewire.frontend.home-component',$data)
                    ->layout('layouts.app',compact("categories","carts","wishlists"));
    }
}