@extends('layouts.app')

@section('content')
    {{-- success notification --}}
    @if (session()->has('success-update-profile'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success-update-profile') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="mb-3" style="font-weight: 700;">
                    <h1>Create Customer</h1>
                </h1>

                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('customer.store') }}">
                            @csrf
                            @method('POST')

                            <div class="d-flex flex-column mb-3 mx-5">

                                {{-- name --}}
                                <div class="p-2">
                                    <label for="name">Name</label>
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="d-flex flex-column mb-3 mx-5">
                                {{-- domicile --}}
                                <div class="p-2">
                                    <label for="domicile">Domicile</label>
                                    <input id="domicile" type="text"
                                        class="form-control @error('domicile') is-invalid @enderror" name="domicile"
                                        value="" autofocus>

                                    @error('domicile')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                {{-- gender --}}
                                <div class="p-2">
                                    <label for="gender">Gender</label>
                                    <input id="gender" type="text"
                                        class="form-control @error('gender') is-invalid @enderror" name="gender"
                                        value="" autofocus>

                                    @error('gender')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- button --}}
                            <div class="row mb-3 mx-5 float-end">
                                <div class="col-md">
                                    <button type="submit" class="btn btn-primary"
                                        style="width: 12rem; height:2.5rem; background-color: #5DAAC4; border-color:#5DAAC4;">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
