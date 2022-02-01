<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\customer;

class CustomerController extends Controller
{
    public function index()
    {
        $data = customer::all();
        return view('home.customer.index', compact('data'));
    }

    public function add()
    {
        return view('homer.customer.add');
    }
}
