<?php

namespace App\Http\Livewire\Admin\Product;

use Livewire\Component;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class AddProductComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $slug;
    public $description;
    public $price;
    public $quantity;
    public $image;
    public $sub_category_id;


    public function generateSlug(){
        $this->slug = Str::slug($this->name);
    }

    public function addProduct(){
        $this->validate([
            "name"              =>  "required",
            "slug"              =>  "required",
            "description"       =>  ['required','min:10'],
            "price"             =>  "required | integer ",
            "quantity"          =>  "required | integer ",
            "image"             =>  "image",
            "sub_category_id"   =>  "required",
        ]);

        // Change image name
        $imageName                  =  time().'.'.$this->image->extension();
        
        // Insert data
        $product                    =  new Product();
        $product->name              =  $this->name;
        $product->slug              =  $this->slug;
        $product->description       =  $this->description;
        $product->price             =  $this->price;
        $product->quantity          =  $this->quantity;
        $product->image             =  $imageName;
        $product->sub_category_id   =  $this->sub_category_id;
        $product->save();

        // Move image to target location (product)
        $this->image->storeAs("images/products",$imageName);
        return redirect()->route('products')->with("success",'New product has been added successfully');
    }

    public function render(){
        $subcategories  = SubCategory::all();
        $categories     = Category::all();
        $data = compact("subcategories","categories");
        return view('livewire.admin.product.add-product-component',$data)
                ->layout("layouts.staticadmin");;
    }
}
