@extends('layouts.app')

@section('content')
<div class="container">
    {{-- notification --}}
    @if (session()->has('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="card">
        <div class="card-body m-5 text-center">
            <h1>Customer List</h1>
            <a href="{{ route('customer.create') }}" class="btn btn-dark px-3 mb-5 border-0" style="width: auto; background-color: #242F40">Add Customer</a>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Domicile</th>
                        <th>Gender</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($customers['customers'] as $customer)
                    <tr>
                        <th>{{ $customer['id_customer'] }}</th>
                        <th>{{ $customer['name'] }}</th>
                        <th>{{ $customer['domicile'] }}</th>
                        <th>{{ ucfirst($customer['gender']) }}</th>
                        <th>
                            <div class="row justify-content-center">
                                <div class="col-md-2">
                                    <a class="btn btn-primary btn-sm text-uppercase" style="width: 5rem" href="{{ route('customer.show', $customer['id_customer']) }}">detail</a>
                                </div>
                                <div class="col-md-2">
                                    <a class="btn btn-warning btn-sm text-uppercase" style="width: 5rem" href="{{ route('customer.edit', $customer['id_customer']) }}">Update</a>
                                </div>
                                <div class="col-md-2">
                                    <a class="btn btn-danger btn-sm text-uppercase" style="width: 5rem" data-bs-toggle="modal" data-bs-target="#modalDelete{{$customer['id_customer']}}">Delete</a>
                                </div>
                            </div>
                        </th>
                    </tr>

                    <div class="modal fade" id="modalDelete{{$customer['id_customer']}}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header border-0">
                                    <strong class="modal-title">Customer Delete Confirmation</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body text-center p-3" style="font-size: 18px">
                                    <span>Are you sure you want to delete </span>
                                    <span><strong>{{$customer['name']}}</strong>?</span>
                                </div>

                                <div class="modal-footer border-0 mx-auto">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <form action="{{ route('customer.destroy', $customer['id_customer']) }}" method="POST" class="d-inline-block">
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
                        <th colspan="5">No Customer.</th>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
