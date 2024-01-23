<?php

namespace App\Http\Controllers\Customer\Profile;

use Illuminate\Http\Request;
use App\Models\Market\Product;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CompareController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productsHasToCompare = auth()->user()->compare->products()
        ->get()
        ->pluck('id')
        ->toArray();
        
        $products = Product::where('marketable', 1)->where('status', 1)->get()->except($productsHasToCompare);

        return view('customer.profile.compere.my-comperes', compact('products'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $user = Auth::user();
        $product->compares()->toggle([$user->compare->id]);

        return to_route('customer.profile.compare.my-comperes');
    }
}
