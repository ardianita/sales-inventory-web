@extends('layouts.app')

@section('content')
<div class="container mt-4">
    @if (session()->has('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="card text-center card shadow">
        <div class="card-body m-5">
            <h1>Sales List</h1>
            <a href="{{ route('sale.create') }}" class="btn btn-dark px-3 mb-5 border-0" style="width: auto; background-color: #242F40;">Add Sale</a>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Customer</th>
                        <th>Date</th>
                        <th>Item</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($sales['sales'] as $sale)
                    <tr>
                        <th>{{ $sale['id_sale'] }}</th>
                        <th>{{ $sale['customer']['name'] }}</th>
                        <th>{{ $sale['date'] }}</th>
                        <th>{{ $sale['subtotal'] }}</th>
                        <th>
                            <div class="row justify-content-center">
                                <div class="col-lg-2">
                                    <a class="btn btn-primary btn-sm text-uppercase" style="width: 5rem" href="{{ route('sale.show', $sale['id_sale']) }}">detail</a>
                                </div>
                                <div class="col-lg-2">
                                    <a class="btn btn-warning btn-sm text-uppercase" style="width: 5rem" href="{{ route('sale.edit', $sale['id_sale']) }}">Update</a>
                                </div>
                                <div class="col-lg-2">
                                    <a class="btn btn-danger btn-sm text-uppercase" style="width: 5rem" data-bs-toggle="modal" data-bs-target="#modalDelete{{$sale['id_sale']}}">Delete</a>
                                </div>
                            </div>
                        </th>
                    </tr>

                    <div class="modal fade" id="modalDelete{{$sale['id_sale']}}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header border-0">
                                    <strong class="modal-title">Sale Delete Confirmation</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body text-center p-3" style="font-size: 18px">
                                    <span>Are you sure you want to delete </span>
                                    <span><strong>{{$sale['id_sale']}}</strong> by <strong>{{ $sale['customer']['name'] }}</strong> ?</span>
                                </div>

                                <div class="modal-footer border-0 mx-auto">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <form action="{{ route('sale.destroy', $sale['id_sale']) }}" method="POST" class="d-inline-block">
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
                        <th colspan="7">No Sales.</th>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
