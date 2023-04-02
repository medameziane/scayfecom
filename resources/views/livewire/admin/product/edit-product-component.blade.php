@section('sub-header',"Edit product")
<div class="add-product-section">     
  <div class="box-content">
    <div class="box-header">
        <span></span>
        <a href="{{route('products')}}" class="btn btn-danger">Go back</a>
    </div>
    <div class="box-body">
      <div class="form-section">
        <div class="add-form">
          {{-- <div class="title">Add<i class="fa-solid fa-tags"></i></div> --}}
          <div class="form-content">
            <form wire:submit.prevent = 'updateProduct' enctype="multipart/form-data">
              @csrf
              <div class="form-details">
                <div class="input-box">
                  <label for="name" class="details">Product Name</label>
                  <input type="text" id="name" name="name" wire:model ="name" wire:keyup="generateSlug"/>
                  @error('name')<p class="input-error">The name is required</p>@enderror
                </div>
                <div class="input-box">
                  <label for="description" class="details">Description</label>
                  <textarea id="description" name="description" wire:model ="description"></textarea>
                  @error('description')<p class="input-error">The description is required</p>@enderror
                </div>
                <div class="group-input">
                  <div class="input-box">
                    <label for="price" class="details">Price</label>
                    <input type="number" id="price" name="price" wire:model ="price"/>
                    @error('price')<p class="input-error">The price is required</p>@enderror
                  </div>

                  <div class="input-box">
                    <label for="quantity" class="details">Quantity</label>
                    <input type="number" id="quantity" name="quantity" wire:model ="quantity"/>
                    @error('quantity')<p class="input-error">The quantity is required</p>@enderror
                  </div>
                  
                  <div class="input-box">
                    <label class="details">Select Categoty</label>
                    <select name="sub_category_id" wire:model ="sub_category_id">
                        @foreach($subcategories as $subcategory)
                          <option value="{{$subcategory->id}}" @if ($subcategory->id === $this->sub_category_id)selected
                          @endif>{{$subcategory->subcategory}}</option>
                        @endforeach
                    </select>
                    @error('subcategory_id')<p class="input-error">The categoty is required</p>@enderror
                  </div>
                </div>

                {{-- Product Image --}}
                <div class="input-section">
                  <div class="input-image">
                    <input type="file" name="image" class="hidden-input-file" id="image" wire:model ="image"/>
                    <label for="image" class="details">
                      <i class="fa-solid fa-cloud-arrow-up icon-input-image"></i>
                      <p class="text-input-image">Click here to update product photo</p>
                    </label>
                  </div>
                  <div class="preview-image input-image">
                    <span wire:loading.remove wire:target="image" wire:key="image">
                      @if ($image)
                        <img src="{{asset('images/products/'.$image)}}" width="100" style="max-height: 250px;" class="mt-2">
                        {{-- <img src="{{ $image->temporaryUrl() }}" width="100" style="max-height: 250px;" class="mt-2"> --}}
                      @else
                        <img id="preview-image-before-upload" src="{{asset('admin/assets/images/no-preview.jpg')}}" style="max-height: 250px;">
                      @endif
                    </span>
                    <span wire:loading wire:target="image" wire:key="image">
                      Uploading...
                    </span>
                  </div>
                </div>
                @error('image')<p class="input-error">{{$message}}</p>@enderror   

              </div>
              <div class="form-actions">
                <input type="submit" class="btn btn-success" value="Update"/>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>