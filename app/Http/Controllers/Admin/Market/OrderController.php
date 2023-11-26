<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
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
        return view('admin.market.order.total-order');
    }

    public function newOrder()
    {
        return view('admin.market.order.new-order');
    }

    public function sending()
    {
        return view('admin.market.order.sending-order');
    }

    public function canceled()
    {
        return view('admin.market.order.canceled-order');
    }

    public function unpaind()
    {
        return view('admin.market.order.unpaind-order');
    }

    public function returned()
    {
        return view('admin.market.order.returned-order');
    }


    //////////////////////////////////////////////////////
    

    public function show($id)
    {
        return view('admin.market.order.show-order');
    }

    public function changeSendStatus($id)
    {
        return view('admin.market.order.change-send-status');
    }

    public function changeOrderStatus($id)
    {
        return view('admin.market.order.change-order-status');
    }

    public function cancelOrder($id)
    {
        return view('admin.market.order.cancel-order');
    }

  

 
}
