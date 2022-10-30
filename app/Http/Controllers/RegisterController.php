<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $url = config('app.guzzle_url') . '/register';

        $response = Http::post($url, [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        if ($response->status() == 200) {
            return redirect()->route('login', [
                'response' => $response,
            ])->with('message', $response->json()['message']);
        } else {
            return redirect()->back()->with('message', $response->json()['message']);
        }
    }
}
