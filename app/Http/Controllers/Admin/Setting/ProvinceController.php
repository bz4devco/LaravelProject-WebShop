<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Setting\ProvinceRequest;
use App\Models\Province;
use Illuminate\Http\Request;

class ProvinceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provinces = Province::orderBy('name', 'asc')->paginate(15);

        return view('admin.setting.province.index', compact('provinces'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.setting.province.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProvinceRequest $request, Province $province)
    {
        $inputs = $request->all();

        // store data in database
        $province->create($inputs);
        return to_route('admin.setting.province.index')
            ->with('alert-section-success', 'استان جدید با موفقیت ثبت شد');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Province $province)
    {
        return view('admin.setting.province.edit', compact('province'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProvinceRequest $request, Province $province)
    {
        $inputs = $request->all();

        $province->update($inputs);
        return to_route('admin.setting.province.index')
            ->with('alert-section-success', 'ویرایش استان با نام   ' . $province['name'] . ' با موفقیت انجام شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Province $province)
    {
        $result = $province->delete();
        return to_route('admin.setting.province.index')
            ->with('alert-section-success', ' استان با نام ' . $province->name . ' با موفقیت حذف شد');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function status(Province $province)
    {
        $province->status = $province->status == 0 ? 1 : 0;
        $result = $province->save();

        if ($result) {
            if ($province->status == 0) {
                return response()->json(['status' => true, 'checked' => false, 'id' => $province->name]);
            } else {
                return response()->json(['status' => true, 'checked' => true, 'id' => $province->name]);
            }
        } else {
            return response()->json(['status' => false]);
        }
    }
}
