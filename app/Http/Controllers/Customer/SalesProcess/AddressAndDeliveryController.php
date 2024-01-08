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
use App\Http\Requests\Customer\SalesProcess\ChooseAddressAndDeliveryRequest;
use App\Models\Market\CommonDiscount;
use App\Models\Market\Order;

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





    public function chooseAddressAndDelivery(ChooseAddressAndDeliveryRequest $request)
    {
        $user = auth()->user();
        $inputs = $request->all();
        
        
        ////////////////////////////////////////////////

        // calc price order
        $cartItems = CartItem::where('user_id', $user->id)->get();
        $totalProductPrice = 0;
        $totalDiscount = 0;
        $totalFinalPrice = 0;
        $totalFinalDiscountPriceWithNumbers = 0;

        foreach($cartItems as $cartItem)
        {
            $totalProductPrice += $cartItem->cartItemProductPrice();
            $totalDiscount += $cartItem->cartItemProductDiscount();
            $totalFinalPrice += $cartItem->cartItemFinalPrice();
            $totalFinalDiscountPriceWithNumbers += $cartItem->cartItemFinalDiscount();
        }

        // calc common discount
        $commonDiscount = CommonDiscount::where([['status', 1],['end_date', '>', now()],['start_date', '<', now()]])->first();

        if($commonDiscount){
            // set address info fields to order talbe
            $inputs['common_discount_id'] = $commonDiscount->id;
            $inputs['common_discount_object'] = json_encode([
                'title' => $commonDiscount->title,
                'percentage' => $commonDiscount->percentage ,
                'minimal_order_amount' => $commonDiscount->minimal_order_amount ,
                'discount_ceiling' => $commonDiscount->discount_ceiling ,
            ]);




            $commonPercentageDiscountAmount = $totalFinalPrice * ($commonDiscount->percentage / 100);
            if($commonPercentageDiscountAmount > $commonDiscount->discount_ceiling)
            {
                $commonPercentageDiscountAmount = $commonDiscount->discount_ceiling;
            }

            if($commonDiscount != null and $totalFinalPrice >= $commonDiscount->minimal_order_amount)
            {
                $finalPrice = $totalFinalPrice - $commonPercentageDiscountAmount;
            }

            else{
                $finalPrice = $totalFinalPrice;
            }
        }else{
            $commonPercentageDiscountAmount = 0;
            $finalPrice = $totalFinalPrice;
        }


        //////////////////////////////////////////////
        // set address info fields to order talbe
        $user_address = Address::where('id', $request->address_id)
        ->where('user_id', auth()->user()->id)
        ->where('status', 1)
        ->first();
        $inputs['address_object'] = json_encode([
            'province' => $user_address->city->province->name,
            'city' => $user_address->city->name ,
            'address' => $user_address->address ,
            'no' => $user_address->no ,
            'unit' => $user_address->unit ,
            'postal_code' => $user_address->postal_code,
            'recipient_first_name' => $user_address->recipient_first_name,
            'recipient_last_name' => $user_address->recipient_last_name,
            'mobile' => $user_address->mobile,
        ]);


        //////////////////////////////////////////////
        // set delivery info fields to order talbe

        $delivery_selected = Delivery::where('id', $request->delivery_id)
        ->where('status', 1)
        ->first();
        $inputs['delivery_object'] = json_encode([
            'name' => $delivery_selected->name,
            'amount' => $delivery_selected->amount ,
            'delivery_time' => $delivery_selected->delivery_time ,
            'delivery_time_unit' => $delivery_selected->delivery_time_unit ,
        ]);
        
        $inputs['delivery_amount'] = $delivery_selected->amount;
        $inputs['delivery_stauts'] = 0;

        // calc final price after increase delivery amount
        // order_final_amount + dilicery_amount

        $finalPrice += $inputs['delivery_amount']; 


        //////////////////////////////////////////////
        
        $inputs['user_id'] = $user->id;
        $inputs['order_final_amount'] = $finalPrice;
        $inputs['order_discount_amount'] = $totalFinalDiscountPriceWithNumbers;
        $inputs['order_common_discount_amount'] = $commonPercentageDiscountAmount;
        $inputs['order_total_products_discount_amount'] = $inputs['order_discount_amount'] + $inputs['order_common_discount_amount'];



        $order = Order::updateOrCreate(
            ['user_id' => $user->id, 'order_status' => 0],
            $inputs
        );

        return redirect()->route('customer.sales-process.payment');
    }




    //////////////////////////////////////////////////////



    // start managment methods for cutomers adddress
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
        return redirect()->route('customer.sales-process.address-and-delivery')->with('swal-success', 'آدرس  شما با موفقیت ویرایش شد');
    }

    public function deleteAddress(Address $address)
    {
        $address->delete();

        return redirect()->route('customer.sales-process.address-and-delivery')->with('swal-success', 'آدرس شما با موفقیت حذف شد');
    }
    // start managment methods for cutomers adddress

}
