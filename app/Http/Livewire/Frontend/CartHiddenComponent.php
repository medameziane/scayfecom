<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Shopping;
use Illuminate\Support\Facades\Auth;

class CartHiddenComponent extends Component
{
    public $carts = [];
    protected $listeners = ['hiddencartupdated'=>"checkcart"];

    public function checkcart(){
        if(Auth::check()){
            return $this->carts =  Shopping::all()->where('user_id',auth::user()->id)->where("type",1);
        }else{
            return $this->carts = [];
        }
    }
    public function render()
    {
        $this->carts = $this->checkcart();
        return view('livewire.frontend.cart-hidden-component',["carts" => $this->carts]);
    }
}
