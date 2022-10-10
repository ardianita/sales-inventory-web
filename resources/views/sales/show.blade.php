@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex align-content-center justify-content-center flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 ">
        <div class="shadow rounded mt-3 col-md-5">
            <div class="card">
                <div class="card-body mx-3 my-5">
                    <h1 class="text-center mb-4">Detail</h1>
                    <div class="row my-1 mx-5">
                        <div class="col-md text-end">ID</div>
                        <div class="col-md">
                            <input value="{{ $sale['id_sale'] }}" disabled>
                        </div>
                    </div>
                    <div class="row my-1 mx-5">
                        <div class="col-md text-end">Customer</div>
                        <div class="col-md">
                            <input value="{{ $customer_name }}" disabled>

                        </div>
                    </div>
                    <div class="row my-1 mx-5">
                        <div class="col-md text-end">Date</div>
                        <div class="col-md">
                            <input value="{{ $sale['date'] }}" disabled>
                        </div>
                    </div>
                    <div class="row my-1 mx-5">
                        <div class="col-md text-end">Item</div>
                        <div class="col-md">
                            <input value="{{ $item_name  }}" disabled>
                        </div>
                    </div>
                    <div class="row my-1 mx-5">
                        <div class="col-md text-end">Qty</div>
                        <div class="col-md">
                            <input value="{{ $sale['item_sale'][0]['qty'] }}" disabled>
                        </div>
                    </div>
                    <div class="row my-1 mx-5">
                        <div class="col-md text-end">Total</div>
                        <div class="col-md">
                            <input value="{{ $sale['subtotal'] }}" disabled>
                        </div>
                    </div>
                    <div class="row mt-2 mx-5 float-end">
                        <div class="col-md">
                            <form>
                                <input type="button" value="Back" onclick="history.back()" class="btn btn-sm btn-dark px-3 mb-5 border-0" style="width: 5rem; background-color: #242F40">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
