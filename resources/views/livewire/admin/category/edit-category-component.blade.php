@section('sub-header',"Edit Category")
<div class="edit-category-section">     
  <div class="box-content">
    <div class="box-header">
        <span></span>
        <a href="{{route('categories')}}" class="btn btn-danger">Go back</a>
    </div>
    <div class="box-body">
      <div class="form-section">
        <div class="add-form">
          {{-- <div class="title">Add<i class="fa-solid fa-tags"></i></div> --}}
          <div class="form-content">
            <form wire:submit.prevent = 'updateCategory' enctype="multipart/form-data">
              @csrf
              <div class="form-details">
                <div class="input-box">
                  <label for="category" class="details">Category name</label>
                  <input type="text" id="category" name="category" wire:model ="category" wire:keyup="generateSlug"/>
                  @error('category')<p class="input-error">{{$message}}</p>@enderror
                </div>
                <div class="input-box">
                  <label for="slug" class="details">slug name</label>
                  <input type="text" id="slug" name="slug" wire:model ="slug" readonly/>
                  @error('slug')<p class="input-error">{{$message}}</p>@enderror
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