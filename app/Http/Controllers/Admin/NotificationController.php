<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function readAll()
    {
        $notifications = Notification::all();
        foreach ($notifications as $notification) {
            $notification->update(['read_at' => now()]);
        }
        
        return response()->json(['readAt' => true]);
    }
}
