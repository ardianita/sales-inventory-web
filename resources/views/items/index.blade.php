@extends('layouts.app')

@section('content')
<div class="container">
    @if (session()->has('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="card text-center">
        <div class="card-body m-5">
            <h1>Item List</h1>
            <a href="{{ route('item.create') }}" class="btn btn-dark px-3 mb-5 border-0" style="width: auto; background-color: #242F40;">Add item</a>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($items['item'] as $item)
                    <tr>
                        <th>{{ $item['id_item'] }}</th>
                        <th>{{ $item['name'] }}</th>
                        <th>{{ $item['categoty'] }}</th>
                        <th>{{ $item['price'] }}</th>
                        <th>
                            <div class="row justify-content-center">
                                <div class="col-lg-2">
                                    <a class="btn btn-primary btn-sm text-uppercase" style="width: 5rem" href="{{ route('item.show', $item['id_item']) }}">detail</a>
                                </div>
                                <div class="col-lg-2">
                                    <a class="btn btn-warning btn-sm text-uppercase" style="width: 5rem" href="{{ route('item.edit', $item['id_item']) }}">Update</a>
                                </div>
                                <div class="col-lg-2">
                                    <a class="btn btn-danger btn-sm text-uppercase" style="width: 5rem" data-bs-toggle="modal" data-bs-target="#modalDelete{{$item['id_item']}}">Delete</a>
                                </div>
                            </div>
                        </th>
                    </tr>

                    <div class="modal fade" id="modalDelete{{$item['id_item']}}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header border-0">
                                    <strong class="modal-title">item Delete Confirmation</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body text-center p-3" style="font-size: 18px">
                                    <span>Are you sure you want to delete </span>
                                    <span><strong>{{$item['id_item']}}</strong> by <strong>{{ $item['customer']['name'] }}</strong> ?</span>
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
                        <th colspan="7">No items.</th>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
