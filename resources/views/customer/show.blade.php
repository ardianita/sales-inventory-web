@extends('layouts.app')

@section('content')
    {{-- start cards --}}
    <h1 class="text-center">Customer Detail</h1>
    <div class="container">
        <div class="d-flex align-content-center justify-content-center flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 ">
            <div class="shadow rounded mt-3 col-md-9">
                <div class="col-lg-12">
                    <div class="card cards-category-name cards-category border border-0 p-3">


                        <div>
                            <span>Name: </span>
                            <span>{{ $customer['name'] }}</span>
                        </div>

                        <div>
                            <span>Domicile: </span>
                            <span>{{ $customer['domicile'] }}</span>
                        </div>

                        <div>
                            <span>Gender: </span>
                            <span>{{ $customer['gender'] }}</span>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-1">
                            <a href="{{ route('customer.edit', $customer['id_customer']) }}" class="btn btn-warning"
                                style="width: 5rem; margin-bottom: 10px; margin-left: 10px">Edit</a>
                        </div>
                        <div class="col-1">
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#modalDelete"
                                style="width: 5rem; margin-bottom: 10px; margin-left: 10px">Delete
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    {{-- modal delete --}}
    <div class="modal fade" id="modalDelete" tabindex="-1" aria-hidden="true">
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
@endsection
