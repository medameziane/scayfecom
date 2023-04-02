<?php

namespace App\Http\Livewire\Admin\Product;

use Livewire\Component;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class AddProductComponent extends Component{
    use WithFileUploads;
    public $name;
    public $slug;
    public $description;
    public $price;
    public $quantity;
    public $image;
    public $sub_category_id;
    public $category_id;
    public $subcategories = [];

    public function generateSlug(){
        $this->slug = Str::slug($this->name);
    }

    public function addProduct(){
        $this->validate([
            "name"              =>  "required | max:70",
            "slug"              =>  "required",
            "description"       =>  ['required','min:10'],
            "price"             =>  "required | integer ",
            "quantity"          =>  "required | integer ",
            "image"             =>  "image | required",
            "sub_category_id"   =>  "required",
        ]);

        // Change image name
        $imageName  =  time().'.'.$this->image->extension();
        
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
        $this->image->storeAs("products",$imageName);
        return redirect()->route('products')->with("success",'New product has been added successfully');
    }

    public function render(){
        if(!empty($this->category_id)){
            $this->subcategories  = SubCategory::where("category_id",$this->category_id)->get();
        }

        $categories     = Category::all();
        $subcategories  = ["subcategories" => $this->subcategories];
        $data = compact("categories","subcategories");
        
        return view('livewire.admin.product.add-product-component',$data)->layout("layouts.staticadmin");
    }
}
