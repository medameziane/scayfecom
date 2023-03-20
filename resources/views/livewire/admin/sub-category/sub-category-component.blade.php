@section('sub-header',"Sub Categoreis")
<div class="sub-categories-section">     
    <div class="box-content">
        <div class="box-header"><a href="{{route('subcategory.add')}}" class="btn btn-primary">Add sub category</a></div>
        <div class="box-body">
            <table class="table table-bordered table-responsive">
                @if($message = Session::get("success"))
                    <div class="alert alert-success handle-event">{{$message}}</div>
                @endif
                <thead class="table-dark">
                    <tr>
                        <td>#id</td>
                        <td>Sub Category</td>
                        <td>Category</td>
                        <td>Actions</td>
                    </tr>
                </thead>
                <tbody class="table-body">
                    @foreach ($subcategories as $subcategory)
                    <tr class="align-middle">
                        <td>{{$subcategory->id}}</td>
                        <td>{{$subcategory->subcategory}}</td>
                        <td>{{$subcategory->category->category}}</td>
                        <td>
                            <div class="table-actions">
                                <a href="{{route('subcategory.edit',['subcategory_id'=>$subcategory->id])}}" class="btn btn-success btn-sm">Edit </a>
                                <a onclick='if(!confirm("Are you sure")){return false}' href="{{route('subcategory.delete',['subcategory_id'=>$subcategory->id])}}" class="btn btn-danger btn-sm">Delete </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$subcategories->links("pagination::bootstrap-5")}}
        </div>
    </div>
</div>