<?php

namespace App\Http\Controllers\Admin\Ticket;

use Illuminate\Http\Request;
use App\Models\Ticket\Ticket;
use App\Models\Ticket\TicketFile;
use App\Http\Controllers\Controller;
use App\Http\Services\File\FileService;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\Ticket\TicketRequest;
use Carbon\Carbon;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = Ticket::orderBy('seen', 'asc')
        ->orderBy('status', 'desc')
        ->orderBy('created_at', 'desc')
        ->simplePaginate(15);
        return view('admin.ticket.index', compact('tickets'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function newTickets()
    {
        
        $tickets = Ticket::where('status', 0)
        ->orderBy('seen', 'asc')
        ->orderBy('created_at', 'desc')->simplePaginate(15);

        foreach($tickets as $newTicket){
            $newTicket->status = 1;
            $result = $newTicket->save();
        }
        return view('admin.ticket.new-ticket', compact('tickets'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function openTickets()
    {
        $tickets = Ticket::where('seen', 1)
        ->orderBy('seen', 'asc')
        ->orderBy('created_at', 'desc')->simplePaginate(15);

        foreach($tickets as $newTicket){
            $newTicket->status = 1;
            $result = $newTicket->save();
        }
        return view('admin.ticket.open-ticket', compact('tickets'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function closeTickets()
    {
        $tickets = Ticket::where('seen', 0)
        ->orderBy('seen', 'asc')
        ->orderBy('created_at', 'desc')->simplePaginate(15);

        foreach($tickets as $newTicket){
            $newTicket->status = 1;
            $result = $newTicket->save();
        }
        return view('admin.ticket.close-ticket', compact('tickets'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {

        // update seen comment when comment showed with admin
        $ticket->where('id', $ticket->id)->update(['seen' => 1]);

        $file = TicketFile::where('ticket_id' , $ticket->id)
        ->where('user_id' , $ticket->user_id)
        ->orWhere('user_id' , $ticket->refrence_id)->first();

        $file = isset($file) ? $file : '';

        return view('admin.ticket.show', compact(['ticket', 'file']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TicketRequest $request, Ticket $ticket ,FileService $fileService)
    {

        if($request->hasFile('file')){
            $fileService->setExclusiveDirectory('file'. DIRECTORY_SEPARATOR . 'ticket-files');
            $fileService->setFileSize($request->file('file'));
            $fileSize = $fileService->getFileSize();
            $result = $fileService->moveToStorage($request->file('file'));

            $fileFormat = $fileService->getFileFormat();

            // set file properties to input value
            $inputs['ticket_id'] = $ticket->id;
            $inputs['user_id'] = 1;
            $inputs['file_path'] = $result;
            $inputs['file_size'] = $fileSize;
            $inputs['file_type'] = $fileFormat;
            $inputs['status'] = 1;

            if($result === false){
                return redirect()->route('admin.ticket.show', $ticket->id)->with('swal-error', 'آپلود فایل با خطا مواجه شد');
            }
            // store data in database
            TicketFile::create($inputs);
        }

        $answer['answer'] = $request->answer;
        $answer['answer_status'] = 1;
        $answer['answer_at'] = Carbon::now();
        
        $ticket->update($answer);
        return redirect()->route('admin.ticket.index')
        ->with('alert-section-success', ' پاسخ تیتک شما به کاربر ' . $ticket->user->full_name . ' ارسال شد');
    }

    public function download(TicketFile $file)
    {
        return Storage::download($file->file_path);
    }   

}
