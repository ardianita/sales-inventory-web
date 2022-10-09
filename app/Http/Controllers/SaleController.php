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
        $url_sales = "http://sales-inventory.test/api/sales";
        $sales = Http::get($url_sales);

        // dd($sales['sales']['customer']);

        $url_items = "http://sales-inventory.test/api/items";
        $items = Http::get($url_items);

        $url_customers = "http://sales-inventory.test/api/customers";
        $customers = Http::get($url_customers);

        return view('sales.index', [
            'sales' => $sales,
            'items' => $items,
            'customers' => $customers,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $url_customer = "http://sales-inventory.test/api/customers";
        $customers = Http::get($url_customer);

        $url_item = "http://sales-inventory.test/api/items";
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
        $url = "http://sales-inventory.test/api/sales";
        $response = Http::post($url, [
            'customer_id'   => $request->customer_id,
            'date'          => $request->date,
            'qty'           => $request->qty,
            'item_id'       => $request->item_id
        ]);

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
        $url = 'http://sales-inventory.test/api/sales/' . $id_sale;
        $sale = Http::get($url);

        // dd(['sale']['id_sale']);

        return view('sales.show', [
            'sale' => $sale['sale'],
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

        $url_sale = "http://sales-inventory.test/api/sales/" . $id_sale;
        $sales = Http::get($url_sale);

        // dd($sales['sale']['item_sale'][0]['qty']);

        $url_customer = "http://sales-inventory.test/api/customers";
        $customers = Http::get($url_customer);

        $url_item = "http://sales-inventory.test/api/items";
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
        $url = "http://sales-inventory.test/api/sales/" . $id_sale;
        $response = Http::patch($url, [
            'customer_id'   => $request->customer_id,
            'date'          => $request->date,
            'qty'           => $request->qty,
            'item_id'       => $request->item_id
        ]);

        return redirect()->route('sale.index', [
            'response'  => $response
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_sale)
    {
        $url = "http://sales-inventory.test/api/sales/" . $id_sale;
        $response = Http::delete($url);

        return redirect()->route('sale.index', [
            'response'  => $response
        ]);
    }
}
