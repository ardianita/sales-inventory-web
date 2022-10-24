@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ route('sale.store') }}" method="post">
        @csrf
        <div class="card shadow rounded border-1 mt-4" style="background-color: #242F40;">
            <div class="card-title text-center mt-5">
                <h1 style="font-weight: bold; color: #ECF2F0">Create Sale</h1>
            </div>
            <div class="card-body mx-4 mb-4">
                <div class="row mb-3 mx-5">
                    <div class="col-md">
                        <label class="form-label" style="color :#ECF2F0">Customer</label>
                        <select name="customer_id" class="form-select" required>
                            <option selected>SELECT CUSTOMER</option>
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
                    <div class="col-md">
                        <label class="form-label" style="color :#ECF2F0">Date</label>
                        <input type="date" class="form-control @error('date') is-invalid @enderror" name="date" value="{{ old('date') }}" required>

                        @error('date')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3 mx-5">
                    <div class="col-md-4">
                        <label class="form-label" style="color :#ECF2F0">Item</label>
                        <select name="item_id" class="form-select" required>
                            <option selected>SELECT ITEM</option>
                            @foreach ($items['data'] as $item)
                            <option value="{{ $item['id_item'] }}">
                                {{ $item['name'] }} - {{ $item['price'] }}
                            </option>
                            @endforeach
                        </select>
                        @error('item_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label class="form-label" style="color :#ECF2F0">Color</label>
                        <input type="text" class="form-control @error('color') is-invalid @enderror" name="qty" value="{{ old('color') }}" required>

                        @error('color')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label class="form-label" style="color :#ECF2F0">Quantity</label>
                        <input type="number" class="form-control @error('qty') is-invalid @enderror" name="qty" value="{{ old('qty') }}" required>

                        @error('qty')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3 mx-5 float-end">
                    <div class="col-md">
                        <button type="submit" class="btn btn-primary border-0" style="width: 12rem; height:3rem; background-color: #5D7487; border-radius:10px">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
