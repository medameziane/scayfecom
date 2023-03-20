@section('sub-header',"Edit Sub Category")
<div class="edit-sub-category-section">     
  <div class="box-content">
    <div class="box-header">
        <span></span>
        <a href="{{route('subcategories')}}" class="btn btn-danger">Go back</a>
    </div>
    <div class="box-body">
      <div class="form-section">
        <div class="add-form">
          <div class="form-content">
            <form wire:submit.prevent = 'updateSubCategory' enctype="multipart/form-data">
              @csrf
              <div class="form-details">
                <div class="input-box">
                  <label for="subcategory" class="details">SubCategory name</label>
                  <input type="text" id="subcategory" name="subcategory" wire:model ="subcategory" wire:keyup="generateSlug"/>
                  @error('subcategory')<p class="input-error">{{$message}}</p>@enderror
                </div>
                <div class="input-box">
                  <label for="slug" class="details">Slug</label>
                  <input type="text" id="slug" name="slug" wire:model ="slug" readonly/>
                  @error('slug')<p class="input-error">{{$message}}</p>@enderror
                </div>
                <div class="input-box">
                    <label class="details">Select Categoty</label>
                    <select name="category_id" wire:model ="category_id">
                      <option value="" selected>Categories</option>
                        @foreach($categories as $category)
                          <option value="{{$category->id}}">{{$category->category}}</option>
                        @endforeach
                    </select>
                    @error('category_id')<p class="input-error">{{$message}}</p>@enderror
                  </div>
              </div>
              <div class="form-actions">
                <input type="submit" class="btn btn-success" value="Update" />
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>