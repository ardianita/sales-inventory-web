<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $url_sales = config('app.guzzle_url') . "/sales";
        $sales = Http::withHeaders([
            'Authorization' => session('token')
        ])->get($url_sales);

        // return $sales;

        return view('sales.index', [
            'sales' => $sales,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $url_customer = config('app.guzzle_url') . "/customers";
        $customers = Http::withHeaders([
            'Authorization' => session('token')
        ])->get($url_customer);

        $url_item = config('app.guzzle_url') . "/items";
        $items = Http::withHeaders([
            'Authorization' => session('token')
        ])->get($url_item);

        return view('sales.create', [
            'customers' => $customers,
            'items'     => $items
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSaleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $url = config('app.guzzle_url') . "/sales";
        $response = Http::withHeaders([
            'Authorization' => session('token')
        ])->post($url, [
            'customer_id'   => $request->customer_id,
            'date'          => $request->date,
            'qty'           => $request->qty,
            'item_id'       => $request->item_id
        ]);

        // return $response;

        return redirect()->route('sale.index', [
            'response'  => $response
        ])->with('message', $response->json()['meta']['message']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function show(string $id_sale)
    {
        $url = config('app.guzzle_url') . '/sales/' . $id_sale;
        $sales = Http::withHeaders([
            'Authorization' => session('token')
        ])->get($url);

        $url_item = config('app.guzzle_url') . '/items';
        $items = Http::withHeaders([
            'Authorization' => session('token')
        ])->get($url_item);

        $id_customer = $sales['data']['customer_id'];
        $url_customer = config('app.guzzle_url') . '/customers/' . $id_customer;
        $customer_name = Http::withHeaders([
            'Authorization' => session('token')
        ])->get($url_customer)['data']['name'];

        return view('sales.show', [
            'sales' => $sales,
            'items' => $items,
            'customer_name' => $customer_name,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function edit($id_sale)
    {

        $url_sale = config('app.guzzle_url') . "/sales/" . $id_sale;
        $sales = Http::withHeaders([
            'Authorization' => session('token')
        ])->get($url_sale);

        $url_customer = config('app.guzzle_url') . "/customers";
        $customers = Http::withHeaders([
            'Authorization' => session('token')
        ])->get($url_customer);
        // dd($customers['customer']);

        $url_item = config('app.guzzle_url') . "/items";
        $items = Http::withHeaders([
            'Authorization' => session('token')
        ])->get($url_item);

        return view('sales.edit', [
            'sales'         => $sales['data'],
            'customers'     => $customers,
            'items'         => $items,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSaleRequest  $request
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_sale)
    {
        $url = config('app.guzzle_url') . "/sales/" . $id_sale;
        $response = Http::withHeaders([
            'Authorization' => session('token')
        ])->patch($url, [
            'customer_id'   => $request->customer_id,
            'date'          => $request->date
        ]);

        // return $response->meta->message;

        return redirect()->route('sale.index', [
            'response'  => $response
        ])->with('message', $response->json()['meta']['message']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_sale)
    {
        $url = config('app.guzzle_url') . "/sales/" . $id_sale;
        $response = Http::withHeaders([
            'Authorization' => session('token')
        ])->delete($url);

        return redirect()->route('sale.index', [
            'response'  => $response
        ])->with('message', $response->json()['meta']['message']);
    }
}
