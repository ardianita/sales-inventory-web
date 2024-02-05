<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ItemSaleController extends Controller
{
    public function create($id_sale)
    {
        $url_sale = config('app.guzzle_url') . '/sales/' . $id_sale;
        $sales = Http::withHeaders([
            'Authorization' => session('token')
        ])->get($url_sale);

        $url_item = config('app.guzzle_url') . '/items';
        $items = Http::withHeaders([
            'Authorization' => session('token')
        ])->get($url_item);

        return view('sales.item-sale.create', [
            'sales' => $sales,
            'items' => $items,
            // 'colors' => explode(', ', $items['data']['color'])
        ]);
    }

    public function store(Request $request, $id_sale)
    {
        $url = config('app.guzzle_url') . "/sales/" . $id_sale . '/item-sales';
        $response = Http::withHeaders([
            'Authorization' => session('token')
        ])->post($url, [
            'sale_id' => $request->id_sale,
            'item_id' => $request->item_id,
            'color' => $request->color,
            'qty' => $request->qty,
        ]);

        if ($response->serverError()) {
            return abort(500);
        }

        if ($response->clientError()) {
            return redirect()->back()->with('message', $response->json()['message']);
        }

        return redirect()->route('sale.show', [
            'response'  => $response,
            'id_sale' => $id_sale
        ])->with('message', $response->json()['meta']['message']);
    }

    public function edit($id_sale, $id)
    {

        $url_sale = config('app.guzzle_url') . '/sales/' . $id_sale;
        $sales = Http::withHeaders([
            'Authorization' => session('token')
        ])->get($url_sale)['data'];

        $url_item = config('app.guzzle_url') . '/items/' . $id;
        $items = Http::withHeaders([
            'Authorization' => session('token')
        ])->get($url_item)['data'];

        $url_color = config('app.guzzle_url') . '/colors';
        $colors = Http::withHeaders([
            'Authorization' => session('token')
        ])->get($url_color)['data'];

        return view('sales.item-sale.edit', [
            'sales' => $sales,
            'items' => $items,
            'colors' => $colors,
        ]);
    }

    public function update(Request $request, $id_sale, $id)
    {

        $url = config('app.guzzle_url') . "/sales/" . $id_sale . '/item-sales/' . $id;
        $response = Http::withHeaders([
            'Authorization' => session('token')
        ])->patch($url, [
            'sale_id' => $request->id_sale,
            'item_id' => $request->id,
            'qty' => $request->qty,
        ]);

        return redirect()->route('sale.show', [
            'response' => $response,
            'id_sale' => $id_sale
        ])->with('message', $response->json()['meta']['message']);
    }

    public function destroy($id_sale, $id)
    {
        $url = config('app.guzzle_url') . "/sales/" . $id_sale . '/item-sales/' . $id;
        $response = Http::withHeaders([
            'Authorization' => session('token')
        ])->delete($url);

        $url_sales = config('app.guzzle_url') . "/sales";
        $sales = Http::withHeaders([
            'Authorization' => session('token')
        ])->get($url_sales)['data'];

        if (array_search($id_sale, array_column($sales, 'id_sale')) === FALSE) {
            return redirect()->route('sale.index', [
                'response' => $response
            ])->with('message', $response->json()['meta']['message']);
        }

        return redirect()->route('sale.show', [
            'response' => $response,
            'id_sale' => $id_sale
        ])->with('message', $response->json()['meta']['message']);
    }
}
