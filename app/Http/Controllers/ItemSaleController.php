<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ItemSaleController extends Controller
{
    public function create($id_sale)
    {
        $url_sale = config('app.guzzle_url') . '/sales/' . $id_sale;
        $sales = Http::get($url_sale);

        $url_item = config('app.guzzle_url') . '/items';
        $items = Http::get($url_item);

        return view('sales.item-sale.create', [
            'sales' => $sales,
            'items' => $items
        ]);
    }

    public function store(Request $request, $id_sale)
    {
        $url = config('app.guzzle_url') . "/sales/" . $id_sale . '/item-sales';
        $response = Http::post($url, [
            'sale_id' => $request->id_sale,
            'item_id' => $request->item_id,
            'qty' => $request->qty,
        ]);

        return redirect()->route('sale.show', [
            'response'  => $response,
            'id_sale' => $id_sale
        ])->with('message', $response->json()['message']);
    }

    public function edit($id_sale, $id)
    {

        $url_sale = config('app.guzzle_url') . '/sales/' . $id_sale;
        $sales = Http::get($url_sale)['sale'];

        $url_item = config('app.guzzle_url') . '/items/' . $id;
        $items = Http::get($url_item)['item'];

        // $url = config('app.guzzle_url') . '/sales/' . $id_sale . '/item-sales/' . $items['id_item'];
        // $item = Http::get($url)->json();
        // return ($item);

        return view('sales.item-sale.edit', [
            'sales' => $sales,
            'items' => $items,
        ]);
    }

    public function update(Request $request, $id_sale, $id)
    {

        $url = config('app.guzzle_url') . "/sales/" . $id_sale . '/item-sales/' . $id;
        $response = Http::patch($url, [
            'sale_id' => $request->id_sale,
            'item_id' => $request->id,
            'qty' => $request->qty,
        ]);

        // dd($response);

        return redirect()->route('sale.show', [
            'response' => $response,
            'id_sale' => $id_sale
        ])->with('message', $response->json()['message']);
    }

    public function destroy($id_sale, $id)
    {
        $url = config('app.guzzle_url') . "/sales/" . $id_sale . '/item-sales/' . $id;
        $response = Http::delete($url);

        if ($id_sale === null) {
            return redirect()->route('sale.index', [
                'response' => $response
            ])->with('message', $response->json()['message']);
        }

        return redirect()->route('sale.show', [
            'response' => $response,
            'id_sale' => $id_sale
        ])->with('message', $response->json()['message']);
    }
}
