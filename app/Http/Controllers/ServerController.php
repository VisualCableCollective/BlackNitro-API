<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class ServerController extends Controller
{
    public function auth(Request $request) {
        Log::info("Request from " . $request->getClientIp());


        return [
            "token" => (string) Str::uuid()
        ];
    }
}
