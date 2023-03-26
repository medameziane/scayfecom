<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Shopping;
use Illuminate\Support\Facades\Auth;
class SingleSubCategoryComponent extends Component
{
    public $subcategory;

    public function mount($subcategory_name){
        $this->subcategory = $subcategory_name;
        if($this->subcategory == null){ 
            redirect()->route('home');
        };
    }

    // Add to cart
    public function addcart($product_id){

        if(Shopping::where('product_id',$product_id)->exists()){
            $findid                         = Shopping::where('product_id',$product_id)->first();
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
                $shop->product_id   = $product_id;
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

    public function render()
    {   
        $singlesubcategory      =   SubCategory::where('slug',$this->subcategory)->get();
        return view('livewire.frontend.single-sub-category-component',["singlesubcategory"=>$singlesubcategory]);
    }
}