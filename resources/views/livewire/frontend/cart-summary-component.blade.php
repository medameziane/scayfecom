<div class="border p-3 mt-4 mt-lg-0 rounded">
    <h4 class="header-title mb-3">Order Summary</h4>
    <table class="table mb-3 table-responsive">
        <tbody>
            <tr>
                <td>Shipping :</td>
                <td>Free Shipping</td>
            </tr>
            <tr>
                <td>Total :</td>
                <td>
                    <span wire:loading.remove>
                        <span>{{$totalprices}}$</span>
                    </span>

                    <span wire:loading>
                        Updating total ... <i class="fa-solid fa-spinner fa-spin"></i>
                    </span>
                </td>
            </tr>
        </tbody>
    </table>
    <a href="{{route('checkout')}}" class="btn-action py-2 w-100">Proceed To Checkout</a>
</div>