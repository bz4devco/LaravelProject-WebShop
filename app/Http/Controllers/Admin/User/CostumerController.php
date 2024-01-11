<?php

namespace App\Http\Controllers\Admin\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Services\Image\ImageService;
use App\Http\Requests\Admin\User\CostumerRequest;
use App\Notifications\NewUserRegistered;

class CostumerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $costumers  = User::where('user_type', 0)
            ->orderBy('created_at', 'desc')->simplePaginate(15);
        return view('admin.user.costumer.index', compact('costumers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.costumer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CostumerRequest $request, User $costumer, ImageService $imageservice)
    {
        $inputs = $request->all();

        // image Upload
        if ($request->hasFile('avatar')) {
            $imageservice->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'costumer-avatar');
            $result = $imageservice->fitAndSave($request->file('avatar'));
            if ($result === false) {
                return to_route('admin.user.costumer.create')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }
            $inputs['profile_photo_path'] = $result;
        }


        // store data in database
        $inputs['password'] = Hash::make($request->password);
        $inputs['user_type'] = 0;
        $inputs['activation'] = 1;
        $costumer->create($inputs);
        $details = [
            'message' => 'یک کاربر جدید در سایت ثبت نام کرد'
        ];
        $adminUser = User::find(1);
        $adminUser->notify(new NewUserRegistered($details));
        return to_route('admin.user.costumer.index')
            ->with('alert-section-success', 'مشتری جدید شما با موفقیت ثبت شد');
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
    public function edit(User $costumer)
    {
        return view('admin.user.costumer.edit', compact('costumer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CostumerRequest $request, User $costumer, ImageService $imageservice)
    {
        $inputs = $request->all();

        // image Upload
        if ($request->hasFile('avatar')) {
            if (!empty($costumer->profile_photo_path)) {
                $imageservice->deleteImage($costumer->profile_photo_path);
            }
            $imageservice->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'costumer-avatar');
            $result = $imageservice->fitAndSave($request->file('avatar'));
            if ($result === false) {
                return to_route('admin.user.costumer.create')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }
            $inputs['profile_photo_path'] = $result;
        }

        // update data in database
        $costumer->update($inputs);
        return to_route('admin.user.costumer.index')
            ->with('alert-section-success', 'مشتری به شماره شناسه شماره ' . $costumer->id . ' با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $costumer)
    {
        $result = $costumer->delete();
        return to_route('admin.user.costumer.index')
            ->with('alert-section-success', ' مشتری با ایمیل کاربری ' . $costumer->email . ' با موفقیت حذف شد');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function status(User $costumer)
    {
        if ($costumer->user_type == 0) {
            $costumer->status = $costumer->status == 0 ? 1 : 0;
            $result = $costumer->save();

            if ($result) {
                if ($costumer->status == 0) {
                    return response()->json(['status' => true, 'checked' => false, 'id' => $costumer->id]);
                } else {
                    return response()->json(['status' => true, 'checked' => true, 'id' => $costumer->id]);
                }
            } else {
                return response()->json(['status' => false]);
            }
        } else {
            return response()->json(['status' => false]);
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function activation(User $costumer)
    {
        if ($costumer->user_type == 0) {
            $costumer->activation = $costumer->activation == 0 ? 1 : 0;
            $result = $costumer->save();

            if ($result) {
                if ($costumer->activation == 0) {
                    return response()->json(['status' => true, 'checked' => false, 'id' => $costumer->email ?? $costumer->mobile]);
                } else {
                    return response()->json(['status' => true, 'checked' => true, 'id' => $costumer->email ?? $costumer->mobile]);
                }
            } else {
                return response()->json(['status' => false]);
            }
        } else {
            return response()->json(['status' => false]);
        }
    }
}
