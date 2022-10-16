@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ route('sale.update', $sales['id_sale']) }}" method="post">
        @csrf
        @method('PATCH')
        <div class="card shadow border-1 rounded mt-5" style="background-color: #242F40;">
            <div class="card-title text-center mt-5">
                <h1 style="font-weight: bold; color: #ECF2F0">Edit Sale</h1>
            </div>
            <div class="card-body mx-4 mb-4">
                <input type="hidden" name="id_sale">
                <div class="row mb-3 mx-5">
                    <label style="color :#ECF2F0" >Customer</label>
                    <div class="col-md">
                        <select name="customer_id" class="form-select">
                            <option selected>--- SELECT CUSTOMER ---</option>
                            @foreach ($customers['customers'] as $customer)
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
                    <label style="color :#ECF2F0" >Date</label>
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
                        <label style="color :#ECF2F0" >Item</label>
                        <select name="item_id" class="form-select" required>
                            <option selected>--- SELECT ITEM ---</option>
                            @foreach ($items['items'] as $item)
                            <option value="{{ $item['id_item'] }}" {{ ($sales['item_sales'][0]['item_id'] === $item['id_item']) ? 'selected' : '' }}>
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
                        <label>Quantity</label>
                        <input type="number" class="form-control @error('qty') is-invalid @enderror" name="qty" value="{{ $sales['item_sales'][0]['qty'] }}" required>

                        @error('qty')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3 mx-5 float-end">
                    <div class="col-md">
                        <button type="submit" class="btn btn-dark border-0" style="width: 12rem; height:3rem; background-color: #5D7487; border-radius:10px">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
