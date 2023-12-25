<?php

namespace App\Http\Controllers\Admin\Ticket;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Ticket\TicketCategoryRequest;
use App\Models\Ticket\TicketCategory;

class TicketCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ticketCategories = TicketCategory::orderBy('created_at', 'desc')->simplePaginate(15);
        return view('admin.ticket.category.index', compact('ticketCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ticket.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TicketCategoryRequest $request, TicketCategory $ticketCategory)
    {
        $ticketCategory->create($request->all());
        return redirect()->route('admin.ticket.category.index')
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
    public function edit(TicketCategory $ticketCategory)
    {
        return view('admin.ticket.category.edit',  compact('ticketCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TicketCategoryRequest $request, TicketCategory $ticketCategory)
    {
        $ticketCategory->update($request->all());
        return redirect()->route('admin.ticket.category.index')
        ->with('alert-section-success', 'ویرایش دسته بندی شماره   '.$ticketCategory['id'].' با موفقیت انجام شد');
    }

   /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TicketCategory $ticketCategory)
    {
        $result = $ticketCategory->delete();
        return redirect()->route('admin.ticket.category.index')
        ->with('alert-section-success', ' دسته بندی شماره '.$ticketCategory->id.' با موفقیت حذف شد');
    }

        /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function status(TicketCategory $ticketCategory)
    {
        
        $ticketCategory->status = $ticketCategory->status == 0 ? 1 : 0;
        $result = $ticketCategory->save();

        if($result){
            if($ticketCategory->status == 0){
                return response()->json(['status' => true, 'checked' => false, 'id' => $ticketCategory->id]);
            }else{
                return response()->json(['status' => true, 'checked' => true, 'id' => $ticketCategory->id]);
            }
        }else{
            return response()->json(['status' => false]);
        }
    }
}
