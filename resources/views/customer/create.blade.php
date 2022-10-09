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
                <div class="card shadow p-3 mb-5 rounded" style="background-color: #F6F1EA; border-width:thin">
                    <div class="card-title text-center mt-3">
                        <h1 style="font-weight: bold; color: #5D7487">Create Customer</h1>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('customer.store') }}">
                            @csrf
                            @method('POST')

                            <div class="row mb-3 mx-3">

                                {{-- name --}}
                                <div class="col">
                                    <label class="form-label" for="name">Name</label>
                                    <input id="name" type="text"
                                        class="form-control form-control-lg @error('name') is-invalid @enderror" name="name"
                                        autofocus required>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="row mb-5 mx-3">
                                {{-- domicile --}}
                                <div class="col">
                                    <label class="form-label" for="domicile">Domicile</label>
                                    <input id="domicile" type="text"
                                        class="form-control form-control-lg @error('domicile') is-invalid @enderror" name="domicile"
                                        autofocus required>

                                    @error('domicile')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                {{-- gender --}}
                                <div class="col">
                                    <label class="form-label" for="gender">Gender</label>
                                    <select class="form-select form-select-lg" name="gender" id="gender" required>
                                        <option value="pria">Pria</option>
                                        <option value="wanita">Wanita</option>
                                      </select>

                                    @error('gender')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>


                            </div>

                            {{-- button --}}
                            <div class="col-md text-center">
                                <button type="submit" class="btn btn-primary"
                                    style="width: 12rem; height:3rem; background-color: #5D7487; border-color:#5D7487; border-radius:10px">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
