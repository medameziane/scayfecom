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

    public function incrementCartCount($id){
        $this->product_id = $id;
    }

    // Add to cart
    public function addcart(){

        if(Shopping::where('product_id',$this->product_id)->exists()){
            $findid                         = Shopping::where('product_id',$this->product_id)->first();
            $getid = $findid->id;
            $updatequantity                 = Shopping::find($getid);
            $updatequantity->quantity       = $updatequantity->quantity + 1;
            $updatequantity->subprice       = $updatequantity->quantity * $updatequantity->product->price;
            $updatequantity->save();
            $this->emit('cardupdated');
            $this->emit('hiddencartupdated');
            $this->dispatchBrowserEvent('message', [
                'text'  => "The product already added",
                'type'  =>'warning',
                ]
            );
            
        }else{

            if(Auth::user()){
                $shop               = new Shopping();
                $shop->product_id   = $this->product_id;
                $shop->user_id      = Auth::user()->id;
                $shop->quantity     = 1;
                $shop->subprice     = $shop->quantity * $shop->product->price;
                $shop->type         = 1;
                $shop->save();
                $this->emit('cardupdated');
                $this->emit('hiddencartupdated');
                $this->dispatchBrowserEvent('message', [
                    'text'  =>  "The product has been added successfully",
                    'type'  =>  'success',
                    ]
                );
            }else{
                return redirect()->Route("login");
            }
        }
        $this->skipRender();
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
        
        return view('livewire.frontend.home-component',$data);
    }
}