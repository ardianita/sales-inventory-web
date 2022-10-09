@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ route('sale.update', $sales['id_sale']) }}" method="post">
        @csrf
        @method('PATCH')
        <div class="card">
            <div class="card-body my-5">
                <h1 class="text-center fw-bold" style="color: #5D7487;">Update Sale</h1>
                <input type="hidden" name="id_sale">
                <div class="row mb-3 mx-5">
                    <label>Customer</label>
                    <div class="col-md">
                        <select name="customer_id" class="form-select">
                            <option selected>--- SELECT CUSTOMER ---</option>
                            @foreach ($customers['data'] as $customer)
                            <option value="{{ $customer['id_customer'] }}" {{ ($sales['customer_id'] === $customer['id_customer']) ? 'selected' : '' }}>
                                {{ $customer['name'] }}
                            </option>
                            @endforeach
                        </select>
                        @error('customer_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3 mx-5">
                    <label>Date</label>
                    <div class="col-md">
                        <input type="date" class="form-control @error('date') is-invalid @enderror" name="date" value="{{ $sales['date'] }}">

                        @error('date')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3 mx-5">
                    <div class="col-md-6">
                        <label>Item</label>
                        <select name="item_id" class="form-select" required>
                            <option selected>--- SELECT ITEM ---</option>
                            @foreach ($items['items'] as $item)
                            <option value="{{ $item['id_item'] }}" {{ ($sales['item_sale'][0]['item_id'] === $item['id_item']) ? 'selected' : '' }}>
                                {{ $item['name'] }}
                            </option>
                            @endforeach
                        </select>
                        @error('item_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label>Qty</label>
                        <input type="text" class="form-control @error('qty') is-invalid @enderror" name="qty" value="{{ $sales['item_sale'][0]['qty'] }}" required>

                        @error('qty')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3 mx-5 float-end">
                    <div class="col-md">
                        <form><input type="button" value="Cancel" onclick="history.back()" class="btn btn-danger"></form>
                        <button type="submit" class="btn btn-light border-0 text-white" style="background-color:#5D7487;">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
