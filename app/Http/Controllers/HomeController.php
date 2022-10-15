<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $url_sales = config('app.guzzle_url') . "/sales";
        $sales = Http::get($url_sales);

        $url_items      = config('app.guzzle_url') . "/items";
        $items = Http::get($url_items);

        $url_customers  = config('app.guzzle_url') . "/customers";
        $customers = Http::get($url_customers);

        return view('home', [
            'items'     => $items,
            'sales'     => $sales,
            'customers' => $customers
        ]);
    }
}
