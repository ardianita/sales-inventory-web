@extends('layouts.app')

@section('content')

<style>


</style>
<div class="row mb-3">
    <div class="col-lg-12 margin-tb">
        <div class="text-center">
            <h1>Customer List</h1>
            <a href="{{ route('customer.create') }}" class="btn btn-dark px-3"
                style="width: auto; background-color: #6493AE; border-color: #6493AE">Add Customer</a>
        </div>
    </div>
</div>



<div class="container-fluid mb-5" style="margin-bottom: 150px !important">
    <div class="row mr-4">
        @foreach ($customers['data'] as $customer)

        <div class="col-xl-3 col-md-6 mb-4 hvr-grow ">
                <div class="card shadow  py-0 rounded-lg ">
                    <div class="card-body py-2 px-2">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class=" font-weight-bold mt- 2 text-primary text-center text-uppercase mb-1">
                                    {{ $customer['name'] }}
                                </div>
                                <div class="h6 mb-0 text-gray-800 text-center">{{ $customer['domicile'] }}</div>
                                <div class="h6 mb-0 text-gray-800 text-center">{{ $customer['gender'] }}</div>

                                <div class="row justify-content-between">
                                    <div class="col">
                                        <a href="{{ route('customer.show', $customer['id_customer']) }}" class="btn btn-primary"
                                            style="width: 5rem; margin-bottom: 10px; margin-left: 10px">Detail</a>
                                    </div>
                                    <div class="col">
                                        <a href="{{ route('customer.edit', $customer['id_customer']) }}" class="btn btn-warning"
                                            style="width: 5rem; margin-bottom: 10px; margin-left: 10px">Edit</a>
                                    </div>
                                    <div class="col">
                                        <button type="button" class="btn btn-danger" style="width: 5rem" data-bs-toggle="modal"
                                            data-bs-target="#modalDelete{{$customer['id_customer']}}">Delete
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        {{-- modal delete --}}
        <div class="modal fade" id="modalDelete{{$customer['id_customer']}}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header border-0">
                        <strong class="modal-title">Customer Delete Confirmation</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center p-3" style="font-size: 18px">
                        <span>This action can not be undone. Are you sure you want to delete </span>
                        <span><strong>{{$customer['name']}}</strong>?</span>
                    </div>

                    <div class="modal-footer border-0 mx-auto">
                            <button type="button" class="btn" style="border-color: #D14F47; color: #D14F47;" data-bs-dismiss="modal">Cancel</button>

                            <form action="{{ route('customer.destroy', $customer['id_customer']) }}" method="POST"
                            class="d-inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>


@endsection
