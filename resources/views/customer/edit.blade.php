@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow p-3 mb-5 rounded" style="background-color: #F6F1EA; border-width:thin">
                    <div class="card-title text-center mt-3">
                        <h1 style="font-weight: bold; color: #5D7487">Edit Customer</h1>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('customer.update', $customer['id_customer']) }}">
                            @csrf
                            @method('PATCH')

                            <div class="row mb-3 mx-3">

                                {{-- name --}}
                                <div class="col">
                                    <label class="form-label" for="name">Name</label>
                                    <input id="name" type="text"
                                        class="form-control form-control-lg @error('name') is-invalid @enderror" name="name"
                                        value="{{ $customer['name'] }}" autofocus>

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
                                        value="{{ $customer['domicile'] }}" autofocus>

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
                                        <option value="pria" {{ $customer['gender'] == 'pria' ? 'selected' : '' }}>Pria</option>
                                        <option value="wanita" {{ $customer['gender'] == 'wanita' ? 'selected' : '' }}>Wanita</option>
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
                                    style="width: 12rem; height:3rem; background-color: #5D7487; border-color:#5D7487; border-radius:10px">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
