@section('sub-header',"Products")
<div class="products-section">     
    <div class="box-content">
        <div class="box-header"><a href="{{route('products.add')}}" class="btn-action">Add product</a></div>
        <div class="box-body">
            <table class="table table-bordered table-responsive">
                @if($message = Session::get("success"))
                    <div class="alert alert-success handle-event">{{$message}}</div>
                @endif
                <thead class="table-dark">
                    <tr>
                    <td>Product</td>
                    <td>Price</td>
                    <td>Quantity</td>
                    {{-- <td>Tag</td> --}}
                    <td>Status</td>
                    <td>Actions</td>
                    </tr>
                </thead>
                <tbody class="table-body">
                    @foreach ($products as $product)
                    <tr class="align-middle">
                        <td>
                            <a href="{{route('products.show',['product_id'=>$product->id])}}" class="body-child-content">
                                <img src="{{asset('images/products/'.$product->image)}}" alt="{{$product->name}}">
                                {{$product->name}}
                            </a>
                        </td>
                        <td>{{$product->price}} $</td>
                        <td><span class="text-success">{{$product->quantity}} in stock</span></td>
                        {{-- <td><a href="{{$product->subcategory->id}}">{{$product->subcategory->subcategory}}</a></td> --}}
                        <td>
                            @if ($product->status === 1)
                                <span class="text-success">Active</span>
                            @else
                                <span class="text-danger">Inactive</span>
                            @endif
                        </td>
                        <td>
                        <div class="table-actions">
                            <a href="{{route('products.edit',['product_id'=>$product->id])}}" class="text-success">Edit </a>
                            <a href="#" class="text-danger">Delete </a>
                        </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$products->links("pagination::bootstrap-5")}}
        </div>
    </div>
</div>
