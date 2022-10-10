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
        $sales = Http::get($url_sales);

        // dd($sales['sales']['customer']);

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
        $customers = Http::get($url_customer);

        $url_item = config('app.guzzle_url') . "/items";
        $items = Http::get($url_item);

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
        $response = Http::post($url, [
            'customer_id'   => $request->customer_id,
            'date'          => $request->date,
            'qty'           => $request->qty,
            'item_id'       => $request->item_id
        ])->with('message', 'Sale successfully created!');

        // return $response;

        return redirect()->route('sale.index', [
            'response'  => $response
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function show($id_sale)
    {
        $url = config('app.guzzle_url') . '/sales/' . $id_sale;
        $sale = Http::get($url);

        $id_item = $sale['sale']['item_sale'][0]['item_id'];
        $url_item = config('app.guzzle_url') . '/items/' . $id_item;
        $item_name = Http::get($url_item)['item']['name'];

        $id_customer = $sale['sale']['customer_id'];
        $url_customer = config('app.guzzle_url') . '/customers/' . $id_customer;
        $customer_name = Http::get($url_customer)['customer']['name'];
        // dd(['sale']['id_sale']);

        return view('sales.show', [
            'sale' => $sale['sale'],
            'item_name' => $item_name,
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
        $sales = Http::get($url_sale);

        // dd($sales['sale']['item_sale'][0]['qty']);

        $url_customer = config('app.guzzle_url') . "/customers";
        $customers = Http::get($url_customer);

        $url_item = config('app.guzzle_url') . "/items";
        $items = Http::get($url_item);

        return view('sales.edit', [
            'sales'         => $sales['sale'],
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
        $response = Http::patch($url, [
            'customer_id'   => $request->customer_id,
            'date'          => $request->date,
            'qty'           => $request->qty,
            'item_id'       => $request->item_id
        ]);

        return redirect()->route('sale.index', [
            'response'  => $response
        ])->with('message', 'Sale successfully updated!');
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
        $response = Http::delete($url);

        return redirect()->route('sale.index', [
            'response'  => $response
        ])->with('message', 'Sale has been deleted!');
    }
}
