<?php

namespace App\Http\Controllers\Rest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Kamar;

class restController extends Controller
{
    public function index()
    {
    	$kamar = Kamar::all();

    	return response()->json($kamar);
    }
}
