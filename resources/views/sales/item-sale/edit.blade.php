@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach ($sales['item_sales'] as $sale)
            @if ($sale['item_id'] === $items['id_item'])
            <form action="{{ route('item-sale.update', ['id_sale' => $sales['id_sale'], 'id' => $sale['item_id']]) }}" method="post">
                @csrf
                @method('PATCH')
                <div class="card shadow border-1 rounded mt-5" style="background-color: #242F40;">
                    <div class="card-title text-center mt-5">
                        <h1 style="font-weight: bold; color: #ECF2F0">Edit Item</h1>
                    </div>
                    <div class="card-body mx-4 mb-4">
                        <div class="row mb-3 mx-5">
                            <div class="col-md">

                                <label style="color :#ECF2F0">Nota</label>
                                <input type="text" class="form-control @error('sale_id') is-invalid @enderror" name="sale_id" value="{{ $sales['id_sale'] }}" disabled>

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
                                <input type="text" class="form-control @error('item_id') is-invalid @enderror" name="item_id" value="{{ $items['name'] }}" disabled>

                                @error('item_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <!-- Quantity -->
                            <div class="col-md-6">
                                <label style="color :#ECF2F0">Quantity</label>
                                <input type="number" class="form-control @error('qty') is-invalid @enderror" name="qty" value="{{ $sale['qty'] }}" required>
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
            @endif
            @endforeach
        </div>
    </div>
</div>
@endsection
