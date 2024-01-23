<?php

namespace App\Http\Controllers\Customer\Profile;

use Illuminate\Http\Request;
use App\Models\Ticket\Ticket;
use App\Models\Ticket\TicketFile;
use App\Http\Controllers\Controller;
use App\Models\Ticket\TicketCategory;
use App\Models\Ticket\TicketPriority;
use App\Http\Services\File\FileService;
use App\Http\Services\Image\ImageService;
use App\Http\Requests\Customer\Profile\TicketRequest;
use Illuminate\Support\Facades\DB;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = Ticket::where('user_id', auth()->user()->id)
            ->orderBy('seen_user', 'asc')
            ->orderBy('answer', 'desc')
            ->orderBy('seen', 'desc')
            ->orderBy('created_at', 'desc')
            ->get();

        $ticketCategories = TicketCategory::where('status', 1)->get();
        $ticketPriorities = TicketPriority::where('status', 1)->get();

        return view('customer.profile.ticket.my-tickets', compact('tickets', 'ticketCategories', 'ticketPriorities'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TicketRequest $request, FileService $fileService)
    {
        DB::transaction(function () use ($request, $fileService) {

            $inputs = $request->all();
            $inputs['user_id'] = auth()->user()->id;

            $createResult = Ticket::create($inputs);

            if ($request->hasFile('file_attachment') && $createResult) {
                $fileService->setExclusiveDirectory('file' . DIRECTORY_SEPARATOR . 'ticket-files');
                $fileService->setFileSize($request->file('file_attachment'));
                $fileSize = $fileService->getFileSize();
                $result = $fileService->moveToPublic($request->file('file_attachment'));

                $fileFormat = $fileService->getFileFormat();

                // set file properties to input value
                $inputs['ticket_id'] = $createResult->id;
                $inputs['user_id']   = auth()->user()->id;
                $inputs['file_path'] = $result;
                $inputs['file_size'] = $fileSize;
                $inputs['file_type'] = $fileFormat;
                $inputs['status']    = 1;
                
                // store data in database
                TicketFile::create($inputs);
            }
        });
        return to_route('customer.profile.ticket.my-tickets')->with('swal-success', 'تیکت شما با موفقیت ارسال شد');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        if ($ticket->answer) {
            $ticket->seen_user = 1;
            $ticket->save();
        }
        return view('customer.profile.ticket.show-tickets', compact('ticket'));
    }
}
