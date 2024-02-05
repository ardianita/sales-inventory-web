<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Http;

class ItemController extends Controller
{
    public function index()
    {
        $url = config('app.guzzle_url') . '/items';
        $items = Http::withHeaders([
            'Authorization' => session('token')
        ])->get($url);

        // dd($items['data'][0]['color']['name']);

        return view('item.index', [
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
        $url = config('app.guzzle_url') . '/colors';
        $colors =  Http::withHeaders([
            'Authorization' => session('token')
        ])->get($url);

        return view('item.create', [
            'colors' => $colors,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreItemRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $url = config('app.guzzle_url') . '/items';

        $response = Http::withHeaders([
            'Authorization' => session('token')
        ])->post($url, [
            'name' => $request->name,
            'category' => $request->category,
            'color_id' => $request->color_id,
            'price' => $request->price,

        ]);

        if ($response->serverError()) {
            return abort(500);
        }

        if ($response->clientError()) {
            return redirect()->back()->with('message', $response->json()['message']);
        }

        return redirect()->route('item.index', [
            'response' => $response,
        ])->with('message', $response->json()['meta']['message']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show($id_item)
    {
        $url = config('app.guzzle_url') . '/items/' . $id_item;
        $items = Http::withHeaders([
            'Authorization' => session('token')
        ])->get($url);

        return view('item.show', [
            'item' => $items['data'],
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item $item
     * @return \Illuminate\Http\Response
     */
    public function edit($id_item)
    {
        $url = config('app.guzzle_url') . '/items/' . $id_item;
        $item = Http::withHeaders([
            'Authorization' => session('token')
        ])->get($url);

        $url_color = config('app.guzzle_url') . '/colors';
        $colors = Http::withHeaders([
            'Authorization' => session('token')
        ])->get($url_color);

        return view('item.edit', [
            'item' => $item['data'],
            'colors' => $colors
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateItemRequest  $request
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_item)
    {
        $url = config('app.guzzle_url') . '/items/' . $id_item;

        $response = Http::withHeaders([
            'Authorization' => session('token')
        ])->patch($url, [
            'name' => $request->name,
            'category' => $request->category,
            'color_id' => $request->color_id,
            'price' => $request->price,
        ]);

        if ($response->serverError()) {
            return abort(500);
        }

        if ($response->clientError()) {
            return redirect()->back()->with('message', $response->json()['message']);
        }

        return redirect()->route('item.index', [
            'response' => $response,
        ])->with('message', $response->json()['meta']['message']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_item)
    {
        $url = config('app.guzzle_url') . '/items/' . $id_item;
        $delete = Http::withHeaders([
            'Authorization' => session('token')
        ])->delete($url);

        return redirect()->route('item.index', [
            'delete' => $delete,
        ])->with('message', $delete->json()['meta']['message']);
    }
}
