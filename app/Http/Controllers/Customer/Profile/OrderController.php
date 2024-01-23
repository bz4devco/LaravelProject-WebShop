<?php

namespace App\Http\Controllers\Customer\Profile;

use App\Http\Controllers\Controller;
use App\Models\Market\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{

    public function index()
    {
        if (isset(request()->type)) {
            $orders = auth()->user()->orders()
                ->where('order_status', request()->type)
                ->orderBy('id', 'desc')->get();
        } else {
            $orders = auth()->user()->orders()
                ->orderBy('id', 'desc')->get();
        }
        return view('customer.profile.order.orders', compact('orders'));
    }
}
