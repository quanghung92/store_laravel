<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    function getFornEndIndex() {
        return view('frontend.index');
    }
    function getFrontEndAbout() {
        return view('frontend.contact');
    }
    function getFrontEndContact() {
        return view('frontend.about');
    }
}
