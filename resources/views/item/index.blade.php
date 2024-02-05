@extends('layouts.app')

@section('content')
<div class="container mt-4">
    {{-- notification --}}
    @if (session()->has('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="card shadow">
        <div class="card-body m-5 text-center">
            <h1>Item List</h1>
            <a href="{{ route('item.create') }}" class="btn btn-dark px-3 mb-5 border-0" style="width: auto; background-color: #242F40">Add item</a>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Kode_BRG</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Color</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($items['data'] as $item)
                    <tr>
                        <th>{{ $item['id_item'] }}</th>
                        <th>{{ $item['name'] }}</th>
                        <th>{{ $item['category'] }}</th>
                        <th>{{ $item['color']['name'] }}</th>
                        <th>{{ $item['price'] }}</th>
                        <th>
                            <div class="row justify-content-center">
                                <div class="col-md-3">
                                    <a class="btn btn-primary btn-sm text-uppercase" style="width: 5rem" href="{{ route('item.show', $item['id_item']) }}">Detail</a>
                                </div>
                                <div class="col-md-3">
                                    <a class="btn btn-warning btn-sm text-uppercase" style="width: 5rem" href="{{ route('item.edit', $item['id_item']) }}">Update</a>
                                </div>
                                <div class="col-md-3">
                                    <a class="btn btn-danger btn-sm text-uppercase" style="width: 5rem" data-bs-toggle="modal" data-bs-target="#modalDelete{{$item['id_item']}}">Delete</a>
                                </div>
                            </div>
                        </th>
                    </tr>

                    <div class="modal fade" id="modalDelete{{$item['id_item']}}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header border-0">
                                    <strong class="modal-title">Item Delete Confirmation</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body text-center p-3" style="font-size: 18px">
                                    <span>Are you sure you want to delete </span>
                                    <span><strong>{{$item['name']}}</strong>?</span>
                                </div>

                                <div class="modal-footer border-0 mx-auto">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <form action="{{ route('item.destroy', $item['id_item']) }}" method="POST" class="d-inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <tr>
                        <th colspan="5">No Item.</th>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
