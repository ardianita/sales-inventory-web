<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $url = config('app.guzzle_url') . '/login';

        $response = Http::post($url, [
            'email' => $request->email,
            'password' => $request->password,
        ]);

        if ($response->status() == 200) {
            session(['token' => $response->json()['token']]);
            return redirect('home');
        } else {
            return redirect()->back()->with('error', $response->json()['message']);
        }
    }

    public function logout()
    {

        $url = config('app.guzzle_url') . '/logout';

        Http::withHeaders([
            'Authorization' => session('token')
        ])->post($url);

        session()->flush();

        return redirect('login');
    }
}
