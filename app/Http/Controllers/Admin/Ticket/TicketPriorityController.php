<?php

namespace App\Http\Controllers\Admin\Ticket;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Ticket\TicketPriorityRequest;
use App\Models\Ticket\TicketCategory;
use App\Models\Ticket\TicketPriority;
use Illuminate\Http\Request;

class TicketPriorityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ticketPriorities = TicketPriority::orderBy('created_at', 'desc')->simplePaginate(15);
        return view('admin.ticket.priority.index', compact('ticketPriorities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ticket.priority.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TicketPriorityRequest $request, TicketPriority $ticketPriority)
    {
        $ticketPriority->create($request->all());
        return redirect()->route('admin.ticket.priority.index')
        ->with('alert-section-success', 'دسته بندی جدید شما با موفقیت ایجاد شد ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( TicketPriority $ticketPriority)
    {
        return view('admin.ticket.priority.create',  compact($ticketPriority));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TicketPriorityRequest $request, TicketPriority $ticketPriority)
    {
        $ticketPriority->update($request->all());
        return redirect()->route('admin.ticket.priority.index')
        ->with('alert-section-success', 'ویرایش اولویت شماره   '.$ticketPriority['id'].' با موفقیت انجام شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TicketPriority $ticketPriority)
    {
        $result = $ticketPriority->delete();
        return redirect()->route('admin.ticket.priority.index')
        ->with('alert-section-success', ' اولویت شماره '.$ticketPriority->id.' با موفقیت حذف شد');
    }

        /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function status(TicketPriority $ticketPriority)
    {
        
        $ticketPriority->status = $ticketPriority->status == 0 ? 1 : 0;
        $result = $ticketPriority->save();

        if($result){
            if($ticketPriority->status == 0){
                return response()->json(['status' => true, 'checked' => false, 'id' => $ticketPriority->id]);
            }else{
                return response()->json(['status' => true, 'checked' => true, 'id' => $ticketPriority->id]);
            }
        }else{
            return response()->json(['status' => false]);
        }
    }
}
