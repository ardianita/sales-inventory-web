<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CustomerController extends Controller
{

    public function create()
    {
        return view('customer.create');
    }

    public function store(Request $request)
    {
        $url = config('app.guzzle_url') . '/customers';
        $response = Http::withHeaders([
            'Authorization' => session('token')
        ])->post($url, [
            'name' => $request->name,
            'domicile' => $request->domicile,
            'gender' => $request->gender,
        ]);

        return redirect()->route('customer.index', [
            'response' => $response,
        ])->with('message', $response->json()['meta']['message']);
    }

    public function edit($id_customer)
    {
        $url = config('app.guzzle_url') . '/customers/' . $id_customer;
        $customer = Http::withHeaders([
            'Authorization' => session('token')
        ])->get($url);

        return view('customer.edit', [
            'customer' => $customer['data'],
        ]);
    }

    public function update(Request $request, $id_customer)
    {
        $url = config('app.guzzle_url') . '/customers/' . $id_customer;
        $response = Http::withHeaders([
            'Authorization' => session('token')
        ])->patch($url, [
            'name' => $request->name,
            'domicile' => $request->domicile,
            'gender' => $request->gender,
        ]);

        return redirect()->route('customer.index', [
            'response' => $response,
        ])->with('message', $response->json()['meta']['message']);
    }

    public function show($id_customer)
    {
        $url = config('app.guzzle_url') . '/customers/' . $id_customer;
        $customer = Http::withHeaders([
            'Authorization' => session('token')
        ])->get($url);

        return view('customer.show', [
            'customer' => $customer['data'],
        ]);
    }

    public function index()
    {
        $url = config('app.guzzle_url') . '/customers';

        $customers =  Http::withHeaders([
            'Authorization' => session('token')
        ])->get($url);

        return view('customer.index', [
            'customers' => $customers,
        ]);
    }

    public function destroy($id_customer)
    {
        $url = config('app.guzzle_url') . '/customers/' . $id_customer;

        $delete = Http::withHeaders([
            'Authorization' => session('token')
        ])->delete($url);

        return redirect()->route('customer.index', [
            'delete' => $delete,
        ])->with('message', $delete->json()['meta']['message']);
    }
}
