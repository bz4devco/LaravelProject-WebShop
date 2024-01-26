<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Market\Order;
use App\Models\Market\OrderItem;
use App\Models\User;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $actuveUsers = User::activeUsers();
        $adminUsers = User::adminUsers();
        $salesMonth = OrderItem::salesMonth()->first();
        $sendOrders = Order::sendOrders()->first();

        return View('admin.index', compact('actuveUsers', 'salesMonth', 'adminUsers', 'sendOrders'));
    }
}
