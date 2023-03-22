<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Shopping;
use Illuminate\Support\Facades\Auth;
class ShoppingCountComponent extends Component
{
    public $cartcount;
    public $wishlistcount;
    
    public function checkcart(){
        if(Auth::check()){
            return $this->cartcount     = Shopping::all()->where('user_id',auth::user()->id)->where('type',1)->count();
        }else{
            return $this->cartcount = 0;
        }
    }

    public function checkwishlist(){
        if(Auth::check()){
            return $this->wishlistcount = Shopping::all()->where('user_id',auth::user()->id)->where('type',0)->count();
        }else{
            return $this->wishlistcount = 0;
        }
    }

    public function render()
    {
        $this->cartcount    = $this->checkcart();
        $this->wishlistcount = $this->checkwishlist();
        return view('livewire.frontend.shopping-count-component',["cartcount"=>$this->cartcount],[["wishlistcount"=>$this->wishlistcount]]);
    }
}