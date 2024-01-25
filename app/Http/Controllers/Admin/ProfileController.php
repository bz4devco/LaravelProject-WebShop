<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\Image\ImageService;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.profile.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {

        $user = $user->where('user_type', 1)
            ->where('id', $user->id)
            ->where('status', 1)
            ->first();

        if ($user && ($user->id  == auth()->user()->id)) {
            return view('admin.profile.edit', compact('user'));
        } else {
            return to_route('admin.profile.index', auth()->user())->with('swal-error', 'کاربری یافت نشد');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user, ImageService $imageService)
    {
        $user = $user->where('user_type', 1)
            ->where('id', auth()->user()->id)
            ->where('activation', 1)
            ->where('status', 1)
            ->first();

        if ($user) {
            $inputs = [
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'profile_photo_path' => $request->avatar,
            ];

            // image Upload
            if ($request->hasFile('avatar')) {
                if (!empty($user->profile_photo_path)) {
                    $imageService->deleteImage($user->profile_photo_path);
                }
                $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'admin-avatar');
                $result = $imageService->fitAndSave($request->file('avatar'));
                if ($result === false) {
                    return to_route('admin.profile.edit', $user->id)->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
                }
                $inputs['profile_photo_path'] = $result;
            }

            // store data in database
            $user->update($inputs);

            return to_route('admin.profile.index')->with('alert-section-success', 'پروفایل شما با موفقیت ویرایش شد');
        } else {
            return to_route('admin.home')->with('swal-error', 'کاربری یافت نشد');
        }
    }
}
