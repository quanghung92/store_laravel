<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckOutController extends Controller
{
    function getCheckOut() {
        return view('frontend.checkout.checkout');
    }
    function getChekOutConplete() {
        return view('frontend.checkout.complete');
    }
}
