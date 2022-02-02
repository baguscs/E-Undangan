<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\order;

class OrderController extends Controller
{
    public function index()
    {
        $data = order::all();
        return view('home.order.index', compact('data'));
    }
}
