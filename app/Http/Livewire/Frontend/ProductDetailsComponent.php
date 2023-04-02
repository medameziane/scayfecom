<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Shopping;
use Illuminate\Support\Facades\Auth;

class ProductDetailsComponent extends Component
{
    public  $slug,$productdetails,$quantity = 1;

    public function mount($slug){
        $this->slug = $slug;
        $this->productdetails   = Product::where('slug',$this->slug)->get();
        $cart                   = Shopping::where('product_id',$this->productdetails[0]->id)->first();
        if($cart){
            $this->quantity     = $cart->quantity;
        }
        if(count($this->productdetails) == 0 || $this->slug == null){
            redirect()->route('home');
        }
    }

    public function plus(){
        $this->quantity ++;
            $this->dispatchBrowserEvent('message', [
                'text'  =>  "The quantity has been updated successfully",
                'type'  =>  "success",
                ]
            );
    }
    
    public function minus(){
        if($this->quantity == 1){
            $this->quantity = 1;
        }else{
            $this->quantity -- ;
                $this->dispatchBrowserEvent('message', [
                'text'  =>  "The quantity has been updated successfully",
                'type'  =>  "success",
                ]
            );
        }
    }

    // Add to cart
    public function addcart($product_id){
        if(Auth::user()){
            if(Shopping::where('product_id',$product_id)->exists()){
                $findid                         = Shopping::where('product_id',$product_id)->first();
                $getid = $findid->id;
                $updatequantity                 = Shopping::find($getid);
                $updatequantity->quantity       = $this->quantity;
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
                $shop               = new Shopping();
                $shop->product_id   = $product_id;
                $shop->user_id      = Auth::user()->id;
                $shop->quantity     = $this->quantity;
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
            }
        }else{
            return redirect()->Route("login");
        }
        $this->skipRender();
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
