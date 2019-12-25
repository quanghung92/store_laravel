<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    function getFornEndIndex() {
        echo 'index';
    }
    function getFrontEndAbout() {
        echo 'about';
    }
    function getFrontEndContact() {
        echo 'contact';
    }
}
