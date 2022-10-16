@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{ route('item-sale.store', $sales['sale']['id_sale']) }}" method="post">
                @csrf
                <div class="card shadow rounded border-1 mt-4" style="background-color: #242F40;">
                    <div class="card-title text-center mt-5">
                        <h1 style="font-weight: bold; color: #ECF2F0">Add Item</h1>
                    </div>
                    <div class="card-body mx-4 mb-4">
                        <div class="row mb-3 mx-5">
                            <div class="col-md">
                                <label class="form-label" style="color :#ECF2F0">Nota</label>
                                <input type="text" class="form-control @error('sale_id') is-invalid @enderror" name="sale_id" value="{{ $sales['sale']['id_sale'] }}" disabled>

                                @error('sale_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3 mx-5">
                            <div class="col-md-6">
                                <label class="form-label" style="color :#ECF2F0">Item</label>
                                <select name="item_id" class="form-select" required>
                                    <option selected>SELECT ITEM</option>
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
                                <label class="form-label" style="color :#ECF2F0">Quantity</label>
                                <input type="number" class="form-control @error('qty') is-invalid @enderror" name="qty" value="{{ old('qty') }}" required>

                                @error('qty')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3 mx-5">
                            <div class="col-md text-center">
                                <button type="submit" class="btn btn-primary border-0" style="width: 12rem; height:3rem; background-color: #5D7487; border-radius:10px">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
