<?php

namespace App\Http\Controllers\Admin\User;

use Illuminate\Http\Request;
use App\Models\User\Permission;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\PermissionRequest;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions  = Permission::orderBy('created_at', 'desc')->paginate(15);
        return view('admin.user.permission.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.permission.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PermissionRequest $request)
    {
        $inputs = $request->all();
        $inputs['status'] = 1;
        $permission = Permission::create($inputs);

        return to_route('admin.user.permission.index')
        ->with('alert-section-success', 'سطح دسترسی جدید شما با موفقیت ثبت شد');
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
    public function edit(Permission $permission)
    {
        return view('admin.user.permission.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PermissionRequest $request, Permission $permission)
    {
        $inputs = $request->all();
        $permission->update($inputs);    
        return to_route('admin.user.permission.index')
        ->with('alert-section-success', 'سطح دسترسی با عنوان '.$permission->title.' با موفقیت ویرایش شد');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        $result = $permission->delete();
        return to_route('admin.user.permission.index')
        ->with('alert-section-success', 'سطح دسترسی با شماره شناسه'.$permission->title.' با موفقیت حذف شد');
    }

      /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function status(Permission $permission)
    {
        $permission->status = $permission->status == 0 ? 1 : 0;
        $result = $permission->save();

        if($result){
            if($permission->status == 0){
                return response()->json(['status' => true, 'checked' => false, 'id' => $permission->title]);
            }else{
                return response()->json(['status' => true, 'checked' => true, 'id' => $permission->title]);
            }
        }else{
            return response()->json(['status' => false]);
        }
    }
}
