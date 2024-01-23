<?php

namespace App\Http\Controllers\Customer\Profile;

use App\Models\Address;
use App\Models\Province;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Customer\profile\AddressRequest;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $addresses = Address::where('user_id', Auth::user()->id)
            ->where('status', 1)->orderBy('created_at', 'desc')
            ->get();

        $provinces = Province::where('status', 1)->orderBy('name', 'asc')->get();

        return view('customer.profile.address.my-address', compact('addresses', 'provinces'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddressRequest $request)
    {

        $inputs = $request->all();
        if (isset($inputs['mobile'])) {
            // filter mobile format
            $inputs['mobile'] = "0" . preg_replace('/[^0-9]/', '', $inputs['mobile']);
            $inputs['mobile'] = substr($inputs['mobile'], 0, 2) === '98' ? substr($inputs['mobile'], 2) : $inputs['mobile'];
            $inputs['mobile'] = convertPersianToEnglish($inputs['mobile']);
        } else {
            if (isset($inputs['receiver']) && $inputs['receiver'] == 'on') {
                $inputs['recipient_first_name'] = auth()->user()->first_name;
                $inputs['recipient_last_name'] = auth()->user()->last_name;
                $inputs['mobile'] = auth()->user()->mobile;
            }
        }

        $inputs['postal_code'] = convertPersianToEnglish($inputs['postal_code']);
        $inputs['status'] = 1;
        $inputs['user_id'] = auth()->user()->id;
        $address = Address::create($inputs);
        return back()->with('swal-success', 'آدرس جدید شما با موفقیت ثبت شد');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Address $address)
    {
        $provinces = Province::where('status', 1)->orderBy('name', 'asc')->get();

        return view('customer.profile.address.edit-address', compact('address', 'provinces'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AddressRequest $request, Address $address)
    {
        $inputs = $request->all();

        if (isset($inputs['mobile'])) {
            // filter mobile format
            $inputs['mobile'] = "0" . preg_replace('/[^0-9]/', '', $inputs['mobile']);
            $inputs['mobile'] = substr($inputs['mobile'], 0, 2) === '98' ? substr($inputs['mobile'], 2) : $inputs['mobile'];
            $inputs['mobile'] = convertPersianToEnglish($inputs['mobile']);
        } else {
            if (isset($inputs['receiver']) && $inputs['receiver'] == 'on') {
                $inputs['recipient_first_name'] = auth()->user()->first_name;
                $inputs['recipient_last_name'] = auth()->user()->last_name;
                $inputs['mobile'] = auth()->user()->mobile;
            }
        }

        $result = $address->update($inputs);
        return to_route('customer.profile.address.my-address')->with('swal-success', 'آدرس  شما با موفیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Address $address)
    {
        $address->delete();
        return to_route('customer.profile.address.my-address')->with('swal-success', 'آدرس شما با موفقیت حذف شد');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCities(Province $province)
    {
        $cities = $province->cities;
        if ($cities != null) {
            return response()->json(['status' => true, 'cities' => $cities]);
        } else {
            return response()->json(['status' => false, 'cities' => null]);
        }
    }
}
