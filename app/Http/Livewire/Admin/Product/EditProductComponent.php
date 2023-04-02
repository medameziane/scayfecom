<?php

namespace App\Http\Livewire\Admin\Product;

use Livewire\Component;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class EditProductComponent extends Component
{
    use WithFileUploads;
    public $product_id;
    public $name;
    public $slug;
    public $description;
    public $price;
    public $quantity;
    public $sub_category_id;

    public function generateSlug(){
        $this->slug = Str::slug($this->name);
    }

    public function mount($product_id){
        $product                    = Product::find($product_id);
        $this->name                 = $product->name;
        $this->slug                 = $product->slug;
        $this->description          = $product->description;
        $this->price                = $product->price;
        $this->quantity             = $product->quantity;
        $this->sub_category_id      = $product->sub_category_id;
    }
    public function updateProduct(){
        $this->validate([
            "name"              =>  "required",
            "slug"              =>  "required",
            "description"       =>  "required",
            "price"             =>  "required",
            "quantity"          =>  "required",
            "sub_category_id"   =>  "required",
        ]);
        
        // Edit data
        $product                        =  Product::find($this->product_id);
        $product->name                  =  $this->name;
        $product->slug                  =  $this->slug;
        $product->description           =  $this->description;
        $product->price                 =  $this->price;
        $product->quantity              =  $this->quantity;
        $product->sub_category_id       =  $this->sub_category_id;
        $product->save();
        return redirect()->route('products')->with("success",'Your product has been updated successfully');
    }

    public function render(){
        $subcategories = SubCategory::all();
        return view('livewire.admin.product.edit-product-component',["subcategories"=>$subcategories])->layout("layouts.staticadmin");
    }
}
