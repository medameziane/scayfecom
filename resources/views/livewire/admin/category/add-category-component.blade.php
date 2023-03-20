@section('sub-header',"Add Category")
<div class="add-category-section">     
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
            <form wire:submit.prevent = 'addCategory' enctype="multipart/form-data">
              @csrf
              <div class="form-details">
                <div class="input-box">
                  <label for="category" class="details">Category name</label>
                  <input type="text" id="category" name="category" wire:model ="category" wire:keyup="generateSlug"/>
                  @error('category')<p class="input-error">{{$message}}</p>@enderror
                </div>
                
                {{-- Category Image --}}
                <div class="input-section">
                  <div class="input-image">
                    <input type="file" name="image" class="hidden-input-file" id="image" wire:model ="image"/>
                    <label for="image" class="details">
                      <i class="fa-solid fa-cloud-arrow-up icon-input-image"></i>
                      <p class="text-input-image">Upload product photo</p>
                    </label>
                  </div>
                  <div class="preview-image input-image">
                    <img id="preview-image-before-upload" src="{{asset('admin/assets/images/no-preview.jpg')}}" style="max-height: 250px;">
                  </div>
                </div>
                @error('image')<p class="input-error">{{$message}}</p>@enderror  

              </div>
              <div class="form-actions">
                <input type="submit" class="btn btn-primary" value="Add" />
                <input type="reset" class="btn btn-danger" value="Cancel" />
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>