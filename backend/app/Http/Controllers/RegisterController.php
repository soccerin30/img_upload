<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function post(Request $request)
    {
        $filename = $request->img;
        $img_data =  base64_decode($filename);
        return response()->json([
            'message' => "success"
        ], 200);
    }
}
