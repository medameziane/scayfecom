<?php

namespace App\Http\Livewire\Admin\Product;

use Livewire\Component;
use App\Models\Product;

class ShowProductComponent extends Component
{
    public $product_id;
    public $product;
    public function mount($product_id){
        $this->product = Product::find($this->product_id);
    }
    
    public function render()
    {
        return view('livewire.admin.product.show-product-component',["product"=>$this->product]);
    }
}
