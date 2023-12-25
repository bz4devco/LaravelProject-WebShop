<?php

namespace App\Http\Controllers\Admin\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\Image\ImageService;
use App\Http\Requests\Admin\User\AdminUserRequest;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = User::where('user_type', 1)
        ->orderBy('created_at', 'desc')->simplePaginate(15);
        return view('admin.user.admin-user.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.admin-user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminUserRequest $request, User $admin, ImageService $imageservice)
    {
        $inputs = $request->all();

        // image Upload
        if($request->hasFile('avatar'))
        {
            $imageservice->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'admin-avatar');
            $result = $imageservice->fitAndSave($request->file('avatar'));
            if($result === false)
            {
                return redirect()->route('admin.user.admin-user.create')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }
            $inputs['profile_photo_path'] = $result;
        }
    

        // store data in database
        $inputs['password'] = Hash::make($request->password);
        $inputs['user_type'] = 1;
        $inputs['activation'] = 1;
        $admin->create($inputs);
        return redirect()->route('admin.user.admin-user.index')
        ->with('alert-section-success', 'ادمین جدید شما با موفقیت ثبت شد');
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
    public function edit(User $admin)
    {
        return view('admin.user.admin-user.edit', compact('admin'));        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminUserRequest $request, User $admin, ImageService $imageservice)
    {
        $inputs = $request->all();

        // image Upload
        if($request->hasFile('avatar'))
        {
            if(!empty($admin->profile_photo_path))
            {
                $imageservice->deleteImage($admin->profile_photo_path);
            }
            $imageservice->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'admin-avatar');
            $result = $imageservice->fitAndSave($request->file('avatar'));
            if($result === false)
            {
                return redirect()->route('admin.user.admin-user.create')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }
            $inputs['profile_photo_path'] = $result;
        }

        // store data in database
        $admin->update($inputs);
        return redirect()->route('admin.user.admin-user.index')
        ->with('alert-section-success', 'ادمین به شماره شناسه شماره '.$admin->id.' با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $admin)
    {
        $result = $admin->delete();
        return redirect()->route('admin.user.admin-user.index')
        ->with('alert-section-success', 'ادمین به شماره شناسه'.$admin->email.' با موفقیت حذف شد');
    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function status(User $admin)
    {
        if($admin->user_type == 1){
            $admin->status = $admin->status == 0 ? 1 : 0;
            $result = $admin->save();

            if($result){
                if($admin->status == 0){
                    return response()->json(['status' => true, 'checked' => false, 'id' => $admin->id]);
                }else{
                    return response()->json(['status' => true, 'checked' => true, 'id' => $admin->id]);
                }
            }else{
                return response()->json(['status' => false]);
            }
        }else{
            return response()->json(['status' => false]);
        }
    }
}
