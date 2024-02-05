@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex align-content-center justify-content-center flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 ">
        <div class="shadow rounded mt-3 col-md-5">
            <div class="card">
                <div class="card-body mx-3 my-5">
                    <h1 class="text-center mb-4">Item Detail</h1>
                    <div class="row my-1 mx-5">
                        <div class="col-md">ID</div>
                        <div class="col-md">
                            <input value="{{ $item['id_item'] }}" disabled>
                        </div>
                    </div>
                    <div class="row my-1 mx-5">
                        <div class="col-md">Name</div>
                        <div class="col-md">
                            <input value="{{ $item['name'] }}" disabled>
                        </div>
                    </div>
                    <div class="row my-1 mx-5">
                        <div class="col-md">Category</div>
                        <div class="col-md">
                            <input value="{{ $item['category'] }}" disabled>
                        </div>
                    </div>
                    <div class="row my-1 mx-5">
                        <div class="col-md">Color</div>
                        <div class="col-md">
                            <input value="{{ $item['color']['name'] }}" disabled>
                        </div>
                    </div>
                    <div class="row my-1 mx-5">
                        <div class="col-md">Price</div>
                        <div class="col-md">
                            <input value="{{ $item['price'] }}" disabled>
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
