<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Shopping;
use Illuminate\Support\Facades\Auth;

class CartComponent extends Component
{
    public $carts;
    
    public function plus($product_id){
        $findid                     = Shopping::where('product_id',$product_id)->first();
        $getid = $findid->id;
        $updatequantity             = Shopping::find($getid);
        $updatequantity->quantity   = $updatequantity->quantity + 1;
        $updatequantity->save();
        $carts = Shopping::all()->where('user_id',auth::user()->id)->where("type",1);
        // session()->flash('updated', "the item has been updated successfully");
    }

    public function minus($product_id){
        $findid                     = Shopping::where('product_id',$product_id)->first();
        $getid = $findid->id;
        $updatequantity             = Shopping::find($getid);
        $updatequantity->quantity   = $updatequantity->quantity + 1;
        $updatequantity->save();
        // session()->flash('updated', "the item has been updated successfully");
    }

    public function delete($cart_id){
        $cart = Shopping::findOrFail($cart_id)->delete();
        if($cart){
            $this->render();
            session()->flash('deleted', "the item has been removed successfully");
        }
    }
    
    public function render()
    {   
        $this->carts = Shopping::all()->where('user_id',auth::user()->id)->where("type",1);
        return view('livewire.frontend.cart-component',['carts'=>$this->carts]);
    }
}
