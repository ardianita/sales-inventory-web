<?php

namespace App\Helper;

use Illuminate\Support\Facades\Http;

class Auth
{
    public static function user()
    {
        $url = config('app.guzzle_url') . "/user";
        $user = Http::withHeaders([
            'Authorization' => session('token')
        ])->get($url);

        return $user->object();
    }
}
