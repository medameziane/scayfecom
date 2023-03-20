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
    public $title;
    public $slug;
    public $description;
    public $price;
    public $quantity;
    public $subcategory_id;


    public function generateSlug(){
        $this->slug = Str::slug($this->title);
    }

    public function mount($product_id){
        $product                = Product::find($product_id);
        $this->title            = $product->title;
        $this->slug             = $product->slug;
        $this->description      = $product->description;
        $this->price            = $product->price;
        $this->quantity         = $product->quantity;
        $this->subcategory_id   = $product->subcategory_id;
    }
    public function updateProduct(){
        $this->validate([
            "title"             =>  "required",
            "slug"              =>  "required",
            "description"       =>  "required",
            "price"             =>  "required",
            "quantity"          =>  "required",
            "subcategory_id"    =>  "required",
        ]);
        
        // Edit data
        $product                  =  Product::find($this->product_id);
        $product->title           =  $this->title;
        $product->slug            =  $this->slug;
        $product->description     =  $this->description;
        $product->price           =  $this->price;
        $product->quantity        =  $this->quantity;
        $product->subcategory_id  =  $this->subcategory_id;
        $product->save();

        return redirect()->route('products')->with("success",'Your product has been updated successfully');
    }

    public function render(){
        $subcategories = SubCategory::all();
        return view('livewire.admin.product.edit-product-component',["subcategories"=>$subcategories]);
    }
}
