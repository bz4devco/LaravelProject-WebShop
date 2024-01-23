<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Models\City;
use App\Models\Province;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Setting\CityRequest;

class CityController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Province $province)
    {
        $cities = City::where('province_id', $province->id)
        ->orderBy('name', 'asc')->paginate(15);

        return view('admin.setting.city.index', compact('cities', 'province'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Province $province)
    {
        return view('admin.setting.city.create', compact('province'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CityRequest $request, Province $province, City $city)
    {
        $inputs = $request->all();
        $inputs['province_id'] = $province->id;

        // store data in database
        $city->create($inputs);
        return to_route('admin.setting.city.index', $province->id)
            ->with('alert-section-success', 'شهرستان جدید با موفقیت ثبت شد');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Province $province, City $city)
    {
        return view('admin.setting.city.edit', compact('province','city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CityRequest $request, Province $province, City $city)
    {
        $inputs = $request->all();

        $city->update($inputs);
        return to_route('admin.setting.city.index', $province->id)
            ->with('alert-section-success', 'ویرایش شهراستان با نام   ' . $city['name'] . ' با موفقیت انجام شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Province $province, City $city)
    {
        $result = $city->delete();
        return to_route('admin.setting.city.index', $province->id)
            ->with('alert-section-success', ' شهراستان با نام ' . $city->name . ' با موفقیت حذف شد');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function status(City $city)
    {
        $city->status = $city->status == 0 ? 1 : 0;
        $result = $city->save();

        if ($result) {
            if ($city->status == 0) {
                return response()->json(['status' => true, 'checked' => false, 'id' => $city->name]);
            } else {
                return response()->json(['status' => true, 'checked' => true, 'id' => $city->name]);
            }
        } else {
            return response()->json(['status' => false]);
        }
    }
}
