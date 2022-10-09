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
                            <form id="delete-cust" action="{{ route('customer.destroy', $customer['id_customer']) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    style="width: 5rem; margin-bottom: 10px; margin-left: 10px">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    {{-- end cards --}}
@endsection
