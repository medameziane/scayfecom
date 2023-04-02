<?php

namespace App\Http\Livewire\Admin\Product;

use Livewire\Component;
use App\Models\Product;

class ProductComponent extends Component
{
    public function render()
    {
        $products = Product::orderBy('created_at','desc')->paginate(10);
        return view('livewire.admin.product.product-component',compact("products"))->layout("layouts.staticadmin");
    }
}