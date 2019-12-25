<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckOutController extends Controller
{
    function getCheckOut() {
        echo 'checkout';
    }
    function getChekOutConplete() {
        echo 'complete';
    }
}
