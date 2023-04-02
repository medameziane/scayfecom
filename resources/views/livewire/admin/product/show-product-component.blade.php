@section('sub-header',"Product details")
<div class="product-details-section">     
  <div class="box-content">
    <div class="box-header">
        <a href="{{route('products.edit',['product_id'=>$product->id])}}" class="btn btn-success">Edit product</a>
        <a href="{{route('products')}}" class="btn btn-danger">Go back</a>
    </div>
    <div class="box-body">
        <div class="details-section">
            <div class="details-left">
                <img src="{{asset('images/products/'.$product->image)}}" alt="">
            </div>
            <div class="details-right">
                <div class="more-details">
                    <div class="items">
                        <h2 class="title">{{$product->title}}</h2>
                        <span class="item-title">Added at</span>
                        <span class="item-data">{{$product->created_at}}</span>
                        <span class="item-title">Price</span>
                        <span class="item-data item-numeric">{{$product->price}}</span>
                        <span class="item-title">Quantity</span>
                        <div class="item-data item-numeric">{{$product->quantity}} <span class="text-success">in stock</span></div>
                        <span class="item-title">Category</span>
                        <span class="item-data">{{$product->SubCategory->category->category}} -> {{$product->SubCategory->subcategory}}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="more-details">
            <div class="items">
                <span class="title">Description</span>
                <span class="item-data">{{$product->description}}</span>
            </div>
        </div>
    </div>
  </div>
</div>