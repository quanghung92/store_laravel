<?php

namespace App\Http\Controllers\FrontEnd;
use App\Http\Requests\CheckoutRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckOutController extends Controller
{
    function getCheckOut() {
        return view('frontend.checkout.checkout');
    }

    function postCheckOut(CheckoutRequest $r) {
        dd($r->all());
    }


    function getChekOutConplete() {
        return view('frontend.checkout.complete');
    }
}
