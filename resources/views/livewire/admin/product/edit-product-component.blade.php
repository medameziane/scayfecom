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
                  <label for="title" class="details">Title</label>
                  <input type="text" id="title" name="title" wire:model ="title" wire:keyup="generateSlug"/>
                  @error('title')<p class="input-error">The title is required</p>@enderror
                </div>
                <div class="input-box">
                  <label for="slug" class="details">Slug</label>
                  <input type="text" id="slug" name="slug" wire:model ="slug" readonly/>
                  @error('slug')<p class="input-error">The slug is required</p>@enderror
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
                    <select name="subcategory_id" wire:model ="subcategory_id">
                      <option value="" selected>Categories</option>
                        @foreach($subcategories as $subcategory)
                          <option value="{{$subcategory->id}}">{{$subcategory->sub_category}}</option>
                        @endforeach
                    </select>
                    @error('subcategory_id')<p class="input-error">The categoty is required</p>@enderror
                  </div>
                </div> 
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