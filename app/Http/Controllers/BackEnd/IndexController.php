<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\models\Order;

class IndexController extends Controller
{
    function getIndex() {

        $monthNow= Carbon::now()->month;// lấy ra tháng hiện tại
        $yearNow=Carbon::now()->year;
        $data['month']=$monthNow;
        $data['order']=Order::where('state',1)->whereMonth('updated_at',$monthNow)->whereYear('updated_at',$yearNow);
        for ($i=1; $i <= $monthNow; $i++) {
            $data['dt']['Tháng '.$i]=Order::where('state',1)->whereMonth('updated_at',$i)->whereYear('updated_at',$yearNow)->sum('total');

        }

        return view('backend.index',$data);
    }
}
