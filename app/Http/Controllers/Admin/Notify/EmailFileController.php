<?php

namespace App\Http\Controllers\Admin\Notify;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Notify\EmailFileRequest;
use App\Http\Services\File\FileService;
use App\Models\Notify\Email;
use App\Models\Notify\EmailFile;
use Illuminate\Http\Request;

class EmailFileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Email $email)
    {
        return view('admin.notify.email-file.index', compact('email'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Email $email)
    {
        return view('admin.notify.email-file.create', compact('email'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmailFileRequest $request, EmailFile $email_file, Email $email,FileService $fileService)
    {
        $inputs = $request->all();
        if($request->hasFile('file')){
            $fileService->setExclusiveDirectory('file'. DIRECTORY_SEPARATOR . 'email-files');
            $fileService->setFileSize($request->file('file'));
            $fileSize = $fileService->getFileSize();
            if($request->storage_path == 1){
                $result = $fileService->moveToStorage($request->file('file'));
            }else{
                $result = $fileService->moveToPublic($request->file('file'));
            }
            $fileFormat = $fileService->getFileFormat();

            // set file properties to input value
            $inputs['public_mail_id'] = $email->id;
            $inputs['file_path'] = $result;
            $inputs['file_size'] = $fileSize;
            $inputs['file_type'] = $fileFormat;

            if($result === false){
                return to_route('admin.notify.email-file.create', $email->id)->with('swal-error', 'آپلود فایل با خطا مواجه شد');
            }
        }



        // store data in database
        $email_file->create($inputs);
        return to_route('admin.notify.email-file.index', $email->id)
        ->with('alert-section-success', 'فایل جدید شما با موفقیت ثبت شد');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(EmailFile $file)
    {
        return view('admin.notify.email-file.edit', compact('file'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmailFileRequest $request, EmailFile $file, FileService $fileService)
    {

        $inputs = $request->all();

        if($request->hasFile('file')){
            if (!empty($file->file_path)) {
                if($file->storage_path == 1){
                    $fileService->deleteFile($file->file_path, true);
                }else{
                    $fileService->deleteFile($file->file_path);
                }
            }
            $fileService->setExclusiveDirectory('file'. DIRECTORY_SEPARATOR . 'email-files');
            $fileService->setFileSize($request->file('file'));
            $fileSize = $fileService->getFileSize();
            if($file->storage_path == 1){
                $result = $fileService->moveToStorage($request->file('file'));
            }else{
                $result = $fileService->moveToPublic($request->file('file'));
            }
            $fileFormat = $fileService->getFileFormat();
            
            // set file properties to input value
            $inputs['public_mail_id'] = $file->public_mail_id;
            $inputs['file_path'] = $result;
            $inputs['file_size'] = $fileSize;
            $inputs['file_type'] = $fileFormat;

            if($result === false){
                return to_route('admin.notify.email-file.create', $file->id)->with('swal-error', 'آپلود فایل با خطا مواجه شد');
            }
        }

        $file->update($inputs);

        return to_route('admin.notify.email-file.index', $file->email->id)
        ->with('alert-section-success', 'ویرایش فایل اطلاعالیه ایمیلی با عنوان  '.$file->email->subject.' با موفقیت انجام شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmailFile $file)
    {
        $result = $file->delete();
        return to_route('admin.notify.email-file.index', $file->public_mail_id)
        ->with('alert-section-success', ' فایل اطلاعالیه ایمیلی با عنوان' .$file->email->subject. ' با موفقیت حذف شد');
    }

    
     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function status(EmailFile $file)
    {
        $file->status = $file->status == 0 ? 1 : 0;
        $result = $file->save();

        if($result){
            if($file->status == 0){
                return response()->json(['status' => true, 'checked' => false, 'id' => $file->id]);
            }else{
                return response()->json(['status' => true, 'checked' => true, 'id' => $file->id]);
            }
        }else{
            return response()->json(['status' => false]);
        }
    }
}
