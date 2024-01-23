<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Models\Market\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function total()
    {
        $orders = Order::orderBy('seen', 'asc')
        ->orderBy('created_at', 'desc')->paginate(15);
        foreach ($orders as $order) {
            if($order->seen == 0){
                $order->seen = 1;
                $order->save();
                $order->seen = 0;
            }
        }
        return view('admin.market.order.total-order', compact('orders'));
    }

    public function newOrder()
    {
        $orders = Order::where('seen', 0)->orderBy('created_at', 'desc')->paginate(15);
        foreach ($orders as $order) {
            $order->seen = 1;
            $order->save();
            $order->seen = 0;
        }
        return view('admin.market.order.new-order', compact('orders'));
    }

    public function sending()
    {
        $orders = Order::where('delivery_status', 1)->orderBy('created_at', 'desc')->paginate(15);
        return view('admin.market.order.sending-order', compact('orders'));
    }

    public function canceled()
    {
        $orders = Order::where('order_status', 3)->orderBy('created_at', 'desc')->paginate(15);
        return view('admin.market.order.canceled-order', compact('orders'));
    }

    public function unpaind()
    {
        $orders = Order::where('payment_status', 0)->orderBy('created_at', 'desc')->paginate(15);
        return view('admin.market.order.unpaind-order', compact('orders'));
    }

    public function returned()
    {
        $orders = Order::where('order_status', 4)->orderBy('created_at', 'desc')->paginate(15);
        return view('admin.market.order.returned-order', compact('orders'));
    }


    //////////////////////////////////////////////////////
    

    public function show(Order $order)
    {
        return view('admin.market.order.show-order', compact('order'));
    }

    public function detail(Order $order)
    {
        return view('admin.market.order.detail-order', compact('order'));
    }

    public function changeSendStatus(Order $order)
    {
        switch($order->delivery_status){
            case 0:
                $order->delivery_status = 1;
                break;
            case 1:
                $order->delivery_status = 2;
                break;
            case 2:
                $order->delivery_status = 3;
                $order->delivery_date = Carbon::now();
                break;
            default:
                $order->delivery_status = 0;
                break;
        }
        $order->save();

        return back();
    }

    public function changeOrderStatus(Order $order)
    {
        switch($order->order_status){
            case 0:
                $order->order_status = 1;
                break;
            case 1:
                $order->order_status = 2;
                break;
            case 2:
                $order->order_status = 3;
                break;
            case 3:
                $order->order_status = 4;
                break;
            default:
                $order->order_status = 0;
                break;
        }
        $order->save();
        
        return back();
    }

    public function cancelOrder(Order $order)
    {
        $order->order_status = 3;  
        $order->save();
        
        return back();
    }

}
