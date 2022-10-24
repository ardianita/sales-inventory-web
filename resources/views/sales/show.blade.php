@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex align-content-center justify-content-center flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 ">
        <div class="col-md-5 mt-3">
            @if (session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
        </div>
    </div>
    <div class="d-flex align-content-center justify-content-center flex-wrap flex-md-nowrap pb-2 mb-3 ">
        <div class="shadow rounded col-md-5">
            <div class="card">
                <div class="card-body mx-3 my-5">
                    <h1 class="text-center mb-4">Sale Detail</h1>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Item</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th colspan="2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($sales['sale']['item_sales'] as $item_sale)
                            <tr>
                                <th>
                                    @foreach ($items['items'] as $item)
                                    {{ $item_sale['item_id'] === $item['id_item'] ? $item['name'] : '' }}
                                    @endforeach
                                </th>
                                <th>{{ $item_sale['qty'] }}</th>
                                <th>
                                    @foreach ($items['items'] as $item)
                                    {{ $item_sale['item_id'] === $item['id_item'] ? $item['price'] : '' }}
                                    @endforeach
                                </th>
                                <th>
                                    <div class="row justify-content-center">
                                        <div class="col">
                                            <a class="btn btn-warning btn-sm text-uppercase" style="width: 5rem" href="{{ route('item-sale.edit', [$item_sale['sale_id'], $item_sale['item_id']]) }}">Update</a>
                                        </div>
                                        <div class="col">
                                            <a class="btn btn-danger btn-sm text-uppercase" style="width: 5rem" data-bs-toggle="modal" data-bs-target="#modalDelete{{$item_sale['id']}}">Delete</a>
                                        </div>
                                    </div>
                                </th>
                            </tr>

                            <div class="modal fade" id="modalDelete{{$item_sale['id']}}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header border-0">
                                            <strong class="modal-title">Item Sale Delete Confirmation</strong>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body text-center p-3" style="font-size: 18px">
                                            <span>Are you sure you want to delete </span>
                                            <span><strong>
                                                    @foreach ($items['items'] as $item)
                                                    {{ $item_sale['item_id'] === $item['id_item'] ? $item['name'] : '' }}
                                                    @endforeach
                                                </strong> ?</span>
                                        </div>

                                        <div class="modal-footer border-0 mx-auto">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            <form action="{{ route('item-sale.destroy', [$sales['sale']['id_sale'], $item_sale['id']]) }}" method="POST" class="d-inline-block">
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

                            </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <div class="row mt-2 mx-5">
                        <a class="btn btn-sm btn-dark px-3 mb-5 border-0" href="{{ route('item-sale.create', $sales['sale']['id_sale']) }}" style="background-color: #242F40">Add Item</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
