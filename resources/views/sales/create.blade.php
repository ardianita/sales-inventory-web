@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ route('sale.store') }}" method="post">
        @csrf
        <div class="card">
            <div class="card-body my-5">
                <h1 class="text-center fw-bold" style="color: #5D7487;">Create Sale</h1>
                <div class="row mb-3 mx-5">
                    <label>Customer</label>
                    <div class="col-md">
                        <select name="customer_id" class="form-select" required>
                            <option selected>--- SELECT CUSTOMER ---</option>
                            @foreach ($customers['data'] as $customer)
                            <option value="{{ $customer['id_customer'] }}">
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
                        <input type="date" class="form-control @error('date') is-invalid @enderror" name="date" value="{{ old('date') }}" required>

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
                            <option value="{{ $item['id_item'] }}">
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
                        <input type="text" class="form-control @error('qty') is-invalid @enderror" name="qty" value="{{ old('qty') }}" required>

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
