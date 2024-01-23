<?php

namespace App\Http\Controllers\Admin\User;

use App\Models\User;
use App\Models\User\Role;
use Illuminate\Http\Request;
use App\Models\User\Permission;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Services\Image\ImageService;
use App\Http\Requests\Admin\User\AdminUserRequest;

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
            ->orderBy('created_at', 'desc')->paginate(15);
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
        if ($request->hasFile('avatar')) {
            $imageservice->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'admin-avatar');
            $result = $imageservice->fitAndSave($request->file('avatar'));
            if ($result === false) {
                return to_route('admin.user.admin-user.create')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }
            $inputs['profile_photo_path'] = $result;
        }


        // store data in database
        $inputs['password'] = Hash::make($request->password);
        $inputs['user_type'] = 1;
        $inputs['activation'] = 1;
        $admin->create($inputs);
        return to_route('admin.user.admin-user.index')
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function roles(User $admin)
    {
        $roles = Role::where('status', 1)->get();
        return view('admin.user.admin-user.roles', compact('admin', 'roles'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function rolesStore(Request $request, User $admin)
    {
        $request->validate([
            'roles' => 'required|exists:roles,id|array'
        ]);
        
        $inputs = $request->all();

        // store roles in role_user table
        $admin->roles()->sync($request->roles);

        return to_route('admin.user.admin-user.index')
            ->with('alert-section-success', 'نقش ادمین با مشخصات '. ($admin->email ?? $admin->mobile) . ' با موفقیت تخصیص داده شد');
    }


        /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function permissions(User $admin)
    {
        $permissions = Permission::where('status', 1)->get();
        return view('admin.user.admin-user.permissions', compact('admin', 'permissions'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function permissionsStore(Request $request, User $admin)
    {
        $request->validate([
            'permissions' => 'required|exists:permissions,id|array'
        ]);
        
        $inputs = $request->all();

        // store permissions in permission_user table
        $admin->permissions()->sync($request->permissions);

        return to_route('admin.user.admin-user.index')
            ->with('alert-section-success', 'سطح دسترسی ادمین با مشخصات '. ($admin->email ?? $admin->mobile) . ' با موفقیت تخصیص داده شد');
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
        if ($request->hasFile('avatar')) {
            if (!empty($admin->profile_photo_path)) {
                $imageservice->deleteImage($admin->profile_photo_path);
            }
            $imageservice->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'admin-avatar');
            $result = $imageservice->fitAndSave($request->file('avatar'));
            if ($result === false) {
                return to_route('admin.user.admin-user.create')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }
            $inputs['profile_photo_path'] = $result;
        }

        // store data in database
        $admin->update($inputs);
        return to_route('admin.user.admin-user.index')
            ->with('alert-section-success', 'ادمین با مشخصات ' . ($admin->email ?? $admin->mobile) . ' با موفقیت ویرایش شد');
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
        return to_route('admin.user.admin-user.index')
            ->with('alert-section-success', 'ادمین با مشخصات' . ($admin->email ?? $admin->mobile) . ' با موفقیت حذف شد');
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
        if ($admin->user_type == 1) {
            $admin->status = $admin->status == 0 ? 1 : 0;
            $result = $admin->save();

            if ($result) {
                if ($admin->status == 0) {
                    return response()->json(['status' => true, 'checked' => false, 'id' => ($admin->email ?? $admin->mobile)]);
                } else {
                    return response()->json(['status' => true, 'checked' => true, 'id' => ($admin->email ?? $admin->mobile)]);
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
    public function activation(User $admin)
    {
        if ($admin->user_type == 1) {
            $admin->activation    = $admin->activation == 0 ? 1 : 0;
            $result = $admin->save();

            if ($result) {
                if ($admin->activation == 0) {
                    return response()->json(['status' => true, 'checked' => false, 'id' => $admin->email ?? $admin->mobile]);
                } else {
                    return response()->json(['status' => true, 'checked' => true, 'id' => $admin->email ?? $admin->mobile]);
                }
            } else {
                return response()->json(['status' => false]);
            }
        } else {
            return response()->json(['status' => false]);
        }
    }
}
