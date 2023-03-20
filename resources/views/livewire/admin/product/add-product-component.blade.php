@section('sub-header',"Add product")
<div class="add-product-section">     
  <div class="box-content">
    <div class="box-header">
        {{-- <a href="{{route('products.show',['product_id'=>$product->id])}}" class="btn btn-warning">Product details</a> --}}
        <a href="{{route('products')}}" class="btn btn-danger">Go back</a>
    </div>
    <div class="box-body">
      <div class="form-section">
        <div class="add-form">
          {{-- <div class="title">Add<i class="fa-solid fa-tags"></i></div> --}}
          <div class="form-content">
            <form wire:submit.prevent ='addProduct' enctype="multipart/form-data">

              @csrf
              <div class="form-details">

                {{-- Product name --}}
                <div class="input-box">
                  <label for="name" class="details">Product Name</label>
                  <input type="text" id="name" name="name" placeholder="Enter Product Name" wire:model ="name" wire:keyup="generateSlug"/>
                  @error('name')<p class="input-error">{{$message}}</p>@enderror
                </div>

                {{-- Product Description --}}
                <div class="input-box">
                  <label for="description" class="details">Description</label>
                  <textarea id="description" name="description" placeholder="Enter Product Description" wire:model ="description"></textarea>
                  @error('description')<p class="input-error">{{$message}}</p>@enderror
                </div>

                <div class="group-input">

                  {{-- Product Price --}}
                  <div class="input-box">
                    <label for="price" class="details">Price</label>
                    <input type="number" id="price" name="price" placeholder="Enter Product Price" wire:model ="price"/>
                    @error('price')<p class="input-error">{{$message}}</p>@enderror
                  </div>

                  {{-- Product Quantity --}}
                  <div class="input-box">
                    <label for="quantity" class="details">Quantity</label>
                    <input type="number" id="quantity" placeholder="Enter Quantity" name="quantity" wire:model ="quantity"/>
                    @error('quantity')<p class="input-error">{{$message}}</p>@enderror
                  </div>

                  {{-- Product Category --}}
                  <div class="input-box">
                    <label class="details">Select Categoty</label>
                    <select name="sub_category_id" wire:model ="sub_category_id">
                      <option value="" selected>Categories</option>
                        @foreach($subcategories as $subcategory)
                          <option value="{{$subcategory->id}}">{{$subcategory->subcategory}}</option>
                        @endforeach
                    </select>
                    @error('sub_category_id')<p class="input-error">{{$message}}</p>@enderror
                  </div>

                </div>

                {{-- Product Image --}}
                <div class="input-section">
                  <div class="input-image">
                    <input type="file" name="image" class="hidden-input-file" id="image" wire:model ="image"/>
                    <label for="image" class="details">
                      <i class="fa-solid fa-cloud-arrow-up icon-input-image"></i>
                      <p class="text-input-image">Upload product photo</p>
                    </label>
                  </div>
                  <div class="preview-image input-image">
                    <img id="preview-image-before-upload" src="https://t3.ftcdn.net/jpg/04/62/93/66/360_F_462936689_BpEEcxfgMuYPfTaIAOC1tCDurmsno7Sp.jpg" alt="preview image" style="max-height: 250px;">
                  </div>
                </div>
                @error('image')<p class="input-error">{{$message}}</p>@enderror   

              </div>

              <div class="form-actions">
                <input type="submit" class="btn-action" value="Add Product" />
                <input type="reset" class="btn btn-danger" value="Cancel" />
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>