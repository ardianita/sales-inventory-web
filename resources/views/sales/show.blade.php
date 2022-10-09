@extends('layouts.app')

@section('content')
<h1 class="text-center">Sale Detail</h1>
<div class="container">
    <div class="d-flex align-content-center justify-content-center flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 ">
        <div class="shadow rounded mt-3 col-md-8">
            <div class="card">
                <div class="card-body mb-3 px-3 py-4">
                    <div class="row my-1">
                        <div class="col-md-4 mx-5 text-center">ID</div>
                        <div class="col-md-6 ">{{ $sale['id_sale'] }}</div>
                    </div>
                    <div class="row my-1">
                        <div class="col-md-4 mx-5 text-center">Customer</div>
                        <div class="col-md-6">{{ $sale['customer']['name'] }}</div>
                    </div>
                    <div class="row my-1">
                        <div class="col-md-4 mx-5 text-center">Date</div>
                        <div class="col-md-6">{{ $sale['date'] }}</div>
                    </div>
                    <div class="row my-1">
                        <div class="col-md-4 mx-5 text-center">Item</div>
                        <div class="col-md-6">{{ $sale['item_sale'][0]['item_id'] }}</div>
                    </div>
                    <div class="row my-1">
                        <div class="col-md-4 mx-5 text-center">Qty</div>
                        <div class="col-md-6">{{ $sale['item_sale'][0]['qty'] }}</div>
                    </div>
                    <div class="row my-1">
                        <div class="col-md-4 mx-5 text-center">Total</div>
                        <div class="col-md-6">{{ $sale['subtotal'] }}</div>
                    </div>
                    <div class="row my-1">
                        <div class="col-md-3">
                            <form>
                                <input type="button" value="Back" onclick="history.back()" class="btn btn-primary mb-2 ">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
