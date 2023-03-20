@section('sub-header',"Categoreis")
<div class="categories-section">     
    <div class="box-content">
        <div class="box-header"><a href="{{route('category.add')}}" class="btn btn-primary">Add category</a></div>
        <div class="box-body">
            <table class="table table-bordered table-responsive">
                @if($message = Session::get("success"))
                    <div class="alert alert-success handle-event">{{$message}}</div>
                @endif
                <thead class="table-dark">
                    <tr>
                        <td>#id</td>
                        <td>Category</td>
                        <td>Actions</td>
                    </tr>
                </thead>
                <tbody class="table-body">
                    @foreach ($categories as $category)
                    <tr class="align-middle">
                        <td>{{$category->id}}</td>
                        <td>{{$category->category}}</td>
                        <td>
                            <div class="table-actions">
                                <a href="{{route('category.edit',['category_id'=>$category->id])}}" class="btn btn-success btn-sm">Edit </a>
                                <a onclick='if(!confirm("Are you sure")){return false}' href="{{route('category.delete',['category_id'=>$category->id])}}" class="btn btn-danger btn-sm">Delete </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$categories->links("pagination::bootstrap-5")}}
        </div>
    </div>
</div>
