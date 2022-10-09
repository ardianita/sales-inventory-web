@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h1 class="text-center fw-bold" style="color: #5D7487;">Sales List</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Customer</th>
                        <th>Date</th>
                        <th>Item</th>
                        <th>Qty</th>
                        <th>Subtotal</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($sales['sales'] as $sale)
                    <tr>
                        <th>{{ $sale['id_sale'] }}</th>
                        <th>{{ $sale['customer']['name'] }}</th>
                        <th>{{ $sale['date'] }}</th>
                        @foreach ($sale['item_sale'] as $data)
                        <th>{{ $data['item_id'] }}</th>
                        <th>{{ $data['qty'] }}</th>
                        @endforeach
                        <th>{{ $sale['subtotal'] }}</th>
                        <th>
                            <div class="row">
                                <div class="col-md-3">
                                    <a class="btn btn-warning btn-sm text-uppercase" href="{{ route('sale.show', $sale['id_sale']) }}">detail</a>
                                </div>
                                <div class="col-md-3">
                                    <a class="btn btn-warning btn-sm text-uppercase" href="{{ route('sale.edit', $sale['id_sale']) }}">Update</a>
                                </div>
                                <div class="col-md-3">
                                    <form action="{{ route('sale.destroy', $sale['id_sale']) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="id_sale">
                                        <button class="btn btn-danger btn-sm text-uppercase">hapus</button>
                                    </form>
                                </div>
                            </div>
                        </th>
                    </tr>
                    @empty
                    <tr>
                        <th colspan="3">No Sales.</th>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
