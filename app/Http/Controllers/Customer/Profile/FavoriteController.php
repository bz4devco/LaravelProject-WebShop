<?php

namespace App\Http\Controllers\Customer\Profile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Market\Product;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('customer.profile.favorite.my-favorites');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $user = auth()->user();
        $user->products()->detach($product->id);

        return to_route('customer.profile.favorite.my-favorites')->with('swal-success', 'محصول مورد نظر با موفقیت از لیست علاقه مندی های شما حذف شد');
    }
}
