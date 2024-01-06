<?php

namespace App\Http\Controllers\Customer\SalesProcess;

use App\Models\Address;
use App\Models\Province;
use Illuminate\Http\Request;
use App\Models\Market\CartItem;
use App\Models\Market\Delivery;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Customer\SalesProcess\AddressRequest;

class AddressAndDeliveryController extends Controller
{
    public function addressAndDelivery()
    {
        if (Auth::check()) {

            $addresses = Address::where('user_id', Auth::user()->id)
                ->where('status', 1)->orderBy('created_at', 'desc')
                ->get();

            $deliverys = Delivery::where('status', 1)->orderBy('created_at', 'desc')->get();

            $provinces = Province::where('status', 1)->orderBy('name', 'asc')->get();

            $cartItems = CartItem::where('user_id', Auth::user()->id)->get();

            return view('customer.sales-process.address-and-delivery', compact('addresses', 'deliverys', 'provinces', 'cartItems'));
        } else {
            return redirect()->route('auth.customer.login-register-form');
        }
    }


    public function addAddress(AddressRequest $request)
    {

        $inputs = $request->all();

        if(isset($inputs['mobile'])){
             // filter mobile format
             $inputs['mobile'] = "0" . preg_replace('/[^0-9]/', '', $inputs['mobile']);
             $inputs['mobile'] = substr($inputs['mobile'], 0, 2) === '98' ? substr($inputs['mobile'], 2) : $inputs['mobile'];
             $inputs['mobile'] = convertPersianToEnglish($inputs['mobile']);
        }else{
            if(isset($inputs['receiver']) && $inputs['receiver'] == 'on'){
                $inputs['recipient_first_name'] = auth()->user()->first_name;
                $inputs['recipient_last_name'] = auth()->user()->last_name;
                $inputs['mobile'] = auth()->user()->mobile;
            }
        }

        $inputs['postal_code '] = convertPersianToEnglish($inputs['postal_code ']);
        $inputs['status'] = 1;
        $inputs['user_id'] = auth()->user()->id;
        $address = Address::create($inputs);
        return back()->with('swal-success', 'آدرس جدید شما با موفقیت ثبت شد');
    }

        // return redirect()->route('customer.sales-process.payment');

    public function getCities(Province $province){
        $cities = $province->cities;
        if($cities != null)
        {
            return response()->json(['status' => true, 'cities' => $cities]);
        }
        else
        {
            return response()->json(['status' => false, 'cities' => null]);
        }
    }


    public function editAddress(Address $address)
    {
        if (Auth::check()) {
            $provinces = Province::where('status', 1)->orderBy('name', 'asc')->get();


            return view('customer.sales-process.edit-address', compact('address', 'provinces'));
        } else {
            return redirect()->route('auth.customer.login-register-form');
        }
    }

    public function updateAddress(AddressRequest $request, Address $address)
    {

        $inputs = $request->all();

        if(isset($inputs['mobile'])){
             // filter mobile format
             $inputs['mobile'] = "0" . preg_replace('/[^0-9]/', '', $inputs['mobile']);
             $inputs['mobile'] = substr($inputs['mobile'], 0, 2) === '98' ? substr($inputs['mobile'], 2) : $inputs['mobile'];
             $inputs['mobile'] = convertPersianToEnglish($inputs['mobile']);
        }else{
            if(isset($inputs['receiver']) && $inputs['receiver'] == 'on'){
                $inputs['recipient_first_name'] = auth()->user()->first_name;
                $inputs['recipient_last_name'] = auth()->user()->last_name;
                $inputs['mobile'] = auth()->user()->mobile;
            }
        }

        $result = $address->update($inputs);
        return redirect()->route('customer.sales-process.address-and-delivery')->with('swal-success', 'آدرس  شما با موفیت ویرایش شد');
    }

    public function deleteAddress(Address $address)
    {
        $address->delete();

        return redirect()->route('customer.sales-process.address-and-delivery')->with('swal-success', 'آدرس شما با موفقیت حذف شد');
    }
}
