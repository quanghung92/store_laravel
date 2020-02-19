<?php

namespace App\Http\Controllers\BackEnd;
use App\models\Order;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    function GetOrder() {
        $data['order']= Order::where('state',2)->orderBy('id','desc')->get();
        return view('backend.order.order',$data);
    }
    function getDetailOrder($order_id) {
        $data['order']= order::find($order_id);

        return view('backend.order.detailorder',$data);
    }
    //paid order- sử lý đơn hàng
    function getPaidOrder($order_id ) {
        $order= order::find($order_id);
        $order->state=1;
        $order->save();
        return redirect('/admin/order/process');

    }
    // hiển thị chi tiết đơn hàng
    function getProcess() {
        $data['order']= Order::where('state',1)->orderBy('updated_at','desc')->get();
        return view('backend.order.processed',$data);
    }
}
