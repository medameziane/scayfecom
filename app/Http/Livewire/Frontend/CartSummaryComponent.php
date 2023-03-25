<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Shopping;
use Illuminate\Support\Facades\Auth;

class CartSummaryComponent extends Component
{
    public $totalPrices;
    protected $listeners = ["totalPrices" => "totalPrices"];

    public function totalPrices(){
        if(Auth::check()){
            return $this->totalPrices = Shopping::all()->where('user_id',auth::user()->id)->where("type",1)->sum("subprice");
        }else{
            return $this->totalPrices = 0;
        }
    }
    public function render()
    {
        $this->totalPrices = $this->totalPrices();
        return view('livewire.frontend.cart-summary-component',
                ["totalprices" => $this->totalPrices]);
    }
}
