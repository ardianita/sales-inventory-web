@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{ route('item-sale.update', [$sales['sale']['id_sale'], $item_sale['id']]) }}">
                @csrf
                @method('PATCH')
                <div class="card shadow border-1 rounded mt-5" style="background-color: #242F40;">
                    <div class="card-title text-center mt-5">
                        <h1 style="font-weight: bold; color: #ECF2F0">Edit Item</h1>
                    </div>
                    <div class="card-body mx-4 mb-4">
                        <input type="hidden" value="{{ $item_sale['id'] }}">
                        <div class="row mb-3 mx-5">
                            <div class="col-md">

                                <label style="color :#ECF2F0">Nota</label>
                                <input type="text" class="form-control @error('sale_id') is-invalid @enderror" name="sale_id" value="{{ $sales['sale']['id_sale'] }}" disabled>

                                @error('sale_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Item -->
                        <div class="row mb-3 mx-5">
                            <div class="col-md-6">
                                <label style="color :#ECF2F0">Item</label>
                                <input type="text" class="form-control @error('item_id') is-invalid @enderror" name="item_id" value="{{ $item_name }}" disabled>

                                @error('item_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <!-- Quantity -->
                            <div class="col-md-6">
                                <label style="color :#ECF2F0">Quantity</label>
                                <input type="number" class="form-control @error('qty') is-invalid @enderror" name="qty" value="{{ $item_sale['qty'] }}" required>

                                @error('qty')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3 mx-5">
                            <div class="col-md text-center">
                                <button type="submit" class="btn btn-dark border-0" style="width: 12rem; height:3rem; background-color: #5D7487; border-radius:10px">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
