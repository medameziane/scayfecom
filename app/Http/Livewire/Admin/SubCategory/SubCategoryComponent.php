<?php

namespace App\Http\Livewire\Admin\SubCategory;

use Livewire\Component;
use App\Models\SubCategory;

class SubCategoryComponent extends Component
{
    public $subcategory_id;
    public function Destroy($subcategory_id){
        $delete = SubCategory::findOrFail($subcategory_id);
        $delete->delete();
        return redirect()->route('subcategories')->with("success",'Sub Category has been deleted successfully');
    }
    public function render()
    {
        $subcategories = SubCategory::orderBy("created_at","desc")->paginate(10);
        return view('livewire.admin.sub-category.sub-category-component',compact("subcategories"))
                ->layout("layouts.staticadmin");;
    }
}
