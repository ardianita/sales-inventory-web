@extends('layouts.app')

@section('content')
<div class="container">
    {{-- create success notification --}}
    @if (session()->has('success-create-customer'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success-create-customer') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    {{-- update success notification --}}
    @if (session()->has('success-update-customer'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success-update-customer') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="d-flex align-content-center justify-content-center flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 ">
        <div class="shadow rounded mt-3 col-md-5">
            <div class="card">
                <div class="card-body mx-3 my-5">
                    <h1 class="text-center mb-4">Detail</h1>
                    <div class="row my-1 mx-5">
                        <div class="col-md text-end">ID</div>
                        <div class="col-md">
                            <input value="{{ $customer['id_customer'] }}" disabled>
                        </div>
                    </div>
                    <div class="row my-1 mx-5">
                        <div class="col-md text-end">Name</div>
                        <div class="col-md">
                            <input value="{{ $customer['name'] }}" disabled>
                        </div>
                    </div>
                    <div class="row my-1 mx-5">
                        <div class="col-md text-end">Gender</div>
                        <div class="col-md">
                            <input value="{{ ucfirst($customer['gender']) }}" disabled>
                        </div>
                    </div>
                    <div class="row my-1 mx-5">
                        <div class="col-md text-end">Domicile</div>
                        <div class="col-md">
                            <input value="{{ $customer['domicile'] }}" disabled>
                        </div>
                    </div>
                    <div class="row mt-2 mx-5 float-end">
                        <div class="col-md">
                            <form>
                                <input type="button" value="Back" onclick="history.back()" class="btn btn-sm btn-dark px-3 mb-5 border-0" style="width: 5rem; background-color: #242F40">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
