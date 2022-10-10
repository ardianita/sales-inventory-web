<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Http;

class ItemController extends Controller
{
    public function index()
    {
        $url_items = config('app.guzzle_url') . "/items";
        $items = Http::get($url_items);

        // dd($sales['sales']['customer']);

        return view('items.index', [
            'items' => $items,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('items.create');
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
            'name'   => $request->customer_id,
            'category'          => $request->date,
            'price'           => $request->qty,
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
    public function show($id_item)
    {
        $url = config('app.guzzle_url') . '/items/' . $id_item;
        $item = Http::get($url);

        // dd(['sale']['id_sale']);

        return view('items.show', [
            'item' => $item['item'],
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function edit($id_item)
    {
        $url = config('app.guzzle_url') . '/items/' . $id_item;
        $customer = Http::get($url);

        return view('item.edit', [
            'item' => $customer['data'],
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSaleRequest  $request
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_item)
    {
        $url = config('app.guzzle_url') . '/items/' . $id_item;
        $response = Http::patch($url, [
            'name'    => $request->name,
            'category' => $request->category,
            'price'  => $request->price,
        ]);
        return redirect()->route('item.index', [
            'response' => $response,
            'id_item' => $response['item']['id_item'],
        ])->with('success-update-item', 'Item successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_item)
    {
        $url = config('app.guzzle_url') . "/items/" . $id_item;
        $response = Http::delete($url);

        return redirect()->route('item.index', [
            'response'  => $response
        ])->with('message', 'Item has been deleted!');
    }
}
