<?php

namespace App\Http\Controllers\Admin\Ticket;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Ticket\Ticket;
use App\Models\Ticket\TicketAdmin;
use Hamcrest\Type\IsNumeric;

class TicketAdminController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = User::where('user_type', 1)->orderBy('first_name', 'asc')->paginate(15);
        return view('admin.ticket.admin.index', compact('admins'));
    }

            /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function set(User $admin ,TicketAdmin $ticketAdmin)
    {
        if($admin->user_type == 1){
           
            $result = $ticketAdmin->where('user_id', $admin->id)->first() ?
            $ticketAdmin->where(['user_id' => $admin->id])->forceDelete() :
            $ticketAdmin->create(['user_id' => $admin->id]);

            if(is_numeric($result)){
                return response()->json(['set' => true, 'checked' => false, 'fullName' => $admin->full_name]);
            }else{
                return response()->json(['set' => true, 'checked' => true, 'fullName' => $admin->full_name]);
            }
        }else{
            return response()->json(['set' => false]);
        }

    }


}
