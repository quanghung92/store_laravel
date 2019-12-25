<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    function GetOrder() {
        echo 'Order';
    }
    function getDetailOrder() {
        echo 'detail Order';
    }
    function getProcess() {
        echo 'admin';
    }
}
