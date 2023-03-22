<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Shopping;

class WishlistComponent extends Component
{
    public function render()
    {
        $wishlists  = Shopping::where("type",0);
        return view('livewire.frontend.wishlist-component');
    }
}