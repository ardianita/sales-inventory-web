@extends('layouts.app')

@section('content')
<div class="container mt-4">

    {{-- notification --}}
    @if (session()->has('message'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow p-3 mb-5 rounded" style="background-color: #242F40; border-width:thin">
                <div class="card-title text-center mt-3">
                    <h1 style="font-weight: bold; color: #ECF2F0">Edit Items</h1>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('item.update', $item['id_item']) }}">
                        @csrf
                        @method('PATCH')

                        <div class="row mb-3 mx-3">

                            {{-- name --}}
                            <div class="col">
                                <label class="form-label" style="color :#ECF2F0" for="name">Name</label>
                                <input id="name" type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" name="name" value="{{ $item['name'] }}" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3 mx-3">
                            {{-- category --}}
                            <div class="col">
                                <label class="form-label" style="color :#ECF2F0" for="category">Category</label>
                                <input id="category" type="text" class="form-control form-control-lg @error('category') is-invalid @enderror" name="category" value="{{ $item['category'] }}" autofocus>

                                @error('category')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 pb-5 mx-3">
                            {{-- price --}}
                            <div class="col">
                                <label class="form-label" style="color :#ECF2F0" for="price">Price</label>
                                <input id="price" type="number" class="form-control form-control-lg @error('price') is-invalid @enderror" name="price" value="{{ $item['price'] }}" autofocus>

                                @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>


                        {{-- button --}}
                        <div class="col-md text-center">
                            <button type="submit" class="btn btn-primary" style="width: 12rem; height:3rem; background-color: #5D7487; border-color:#5D7487; border-radius:10px">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
