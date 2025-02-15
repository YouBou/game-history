<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class HogeController extends Controller
{
    public function get(): JsonResponse
    {
        return response()->json(['message' => 'Hello, World!']);
    }
}
