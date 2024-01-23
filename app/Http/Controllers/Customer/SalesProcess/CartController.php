<?php

namespace App\Http\Controllers\Customer\SalesProcess;

use Illuminate\Http\Request;
use App\Models\Market\Product;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Market\CartItem;

class CartController extends Controller
{
    public function cart()
    {
        $cartItems = CartItem::where('user_id', Auth::user()->id)->get();
        $cartItemsids = CartItem::where('user_id', Auth::user()->id)->pluck('product_id')
            ->toArray();

        // related products for slideshow on detail product page
        $relatedProductidsArray = Product::whereIn('id', $cartItemsids)
            ->where('status', 1)
            ->where('marketable', 1)
            ->pluck('related_product')
            ->collapse()
            ->toArray();

        $relatedProducts = Product::whereIn('id', $relatedProductidsArray)
            ->where('marketable', 1)
            ->latest()
            ->take(10)
            ->get();


        return view('customer.sales-process.cart', compact('cartItems', 'relatedProducts'));
    }



    public function updateCart(Request $request)
    {
        $request->validate([
            'number.*' => 'required|min:1|numeric'
        ]);

        $inputs = $request->all();



        $cartItems = CartItem::where('user_id', Auth::user()->id)->get();
        foreach ($cartItems as $cartItem) {
            if (isset($inputs['number'][$cartItem->id]) && $inputs['number'][$cartItem->id] > $cartItem->product->marketable_number) {
                return back()->with('swal-error', 'تعداد انتخابی شما از تعداد موجودی محصول  ' . $cartItem->product->name . ' در انبار بیشتر است');
            }
            if (isset($inputs['number'][$cartItem->id])) {
                $cartItem->update(['number' => $inputs['number'][$cartItem->id]]);
            }
        }
        return to_route('customer.sales-process.address-and-delivery');
    }




    public function addToCart(Product $product, Request $request)
    {
        $request->validate([
            'color' => 'nullable|exists:product_colors,id|numeric',
            'guarantee' => 'nullable|exists:guarantees,id|numeric',
            'number' => 'required|numeric|min:1'
        ]);

        $cartItems = CartItem::where('product_id', $product->id)
            ->where('user_id', auth()->user()->id)
            ->get();

        if (!isset($request->color)) {
            $request->color = null;
        }

        if (!isset($request->guarantee)) {
            $request->guarantee = null;
        }
        if ($request->number > $product->marketable_number) {
            return back()->with('swal-error', 'تعداد انتخابی شما از تعداد موجودی محصول در انبار بیشتر است');
        }

        foreach ($cartItems as $cartItem) {
            if ($cartItem->color_id == $request->color && $cartItem->guarantee_id == $request->guarantee) {
                if ($cartItem->number != $request->number) {
                    $cartItem->update(['number' => $request->number]);
                } else {
                    return back()->with('swal-error', 'این محصول با همین ویژگی های انتخاب شده قبلاً در سبد خرید شما ثبت شده است');
                }
                return back()->with('swal-success', 'محصول در سبد خرید شما با موفقیت بروزرسانی شد');
            }
        }

        $inputs = [];

        $inputs['color_id'] = $request->color;
        $inputs['guarantee_id'] = $request->guarantee;
        $inputs['number'] = $request->number;
        $inputs['user_id'] = auth()->user()->id;
        $inputs['product_id'] = $product->id;

        CartItem::create($inputs);

        return back()->with('swal-success', 'محصول با موقیت به سبد خرید شما اضافه شد');
    }



    public function removeFromCart(CartItem $cartItem)
    {
        if ($cartItem->user_id === Auth::user()->id) {
            $cartItem->delete();
        }

        return back()->with('swal-success', 'محصول با موقیت از سبد خرید شما حذف شد');
    }
}
