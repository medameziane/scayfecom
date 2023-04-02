<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Shopping;
use Illuminate\Support\Facades\Auth;

class CartComponent extends Component
{

    public function readData(){
        $carts = Shopping::all()->where('user_id',auth::user()->id)->where("type",1);
        return $carts;
    }
    
    public function plus($product_id){
        $findid                     = Shopping::where('product_id',$product_id)->first();
        $getid                      = $findid->id;
        $updatequantity             = Shopping::find($getid);
        if($findid->quantity == $findid->product->quantity){
            $this->dispatchBrowserEvent('message', [
                'text'  =>  "Sorry, the required quantity is not currently in stock",
                'type'  =>  "warning",
                ]
            );
        }else{
            $updatequantity->quantity   = $updatequantity->quantity + 1;
            $updatequantity->subprice   = $updatequantity->quantity * $updatequantity->product->price;
            $updatequantity->save();
            $this->emit('cardupdated');
            $this->emit('hiddencartupdated');
            $this->emit("totalPrices");
            $this->dispatchBrowserEvent('message', [
                'text'  =>  "The quantity has been updated successfully",
                'type'  =>  "success",
                ]
            );
        }
    }

    public function minus($product_id){
        $findid                     = Shopping::where('product_id',$product_id)->first();
        $getid                      = $findid->id;
        $updatequantity             = Shopping::find($getid);
        $updatequantity->quantity   = $updatequantity->quantity - 1;
        $updatequantity->subprice   = $updatequantity->quantity * $updatequantity->product->price;
        if($updatequantity->quantity < 1){
            $updatequantity->quantity   = 1;
            $updatequantity->subprice   = $updatequantity->quantity * $updatequantity->product->price;
            $this->dispatchBrowserEvent('message', [
                'text'  =>  "The quantity must be one or more",
                'type'  =>  "warning",
                ]
            );
        }else{
            $this->dispatchBrowserEvent('message', [
                'text'  =>  "The quantity has been updated successfully",
                'type'  =>  "success",
                ]
            );
            $updatequantity->save();
            $this->emit('cardupdated');
            $this->emit('hiddencartupdated');
            $this->emit("totalPrices");
        }
    }

    public function delete($id){
        $findItem = Shopping::findOrFail($id)->delete();
        $this->emit('cardupdated');
        $this->emit('hiddencartupdated');
        $this->emit("totalPrices");
        $this->dispatchBrowserEvent('message', [
            'text'  => "The item has been removed successfully",
            'type'  =>'error',
            ]
        );
    }
    
    public function render()
    {   
        return view('livewire.frontend.cart-component',['carts'=>$this->readData()]);
    }
}