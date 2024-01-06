<?php

namespace App\Http\Controllers\Customer;

use App\Models\Market\Brand;
use Illuminate\Http\Request;
use App\Models\Content\Banner;
use App\Models\Market\Product;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function home()
    {
        /////////// Banners
        
        //datas from banner slider top
        $slideShowImages = Banner::where('position', 0)
        ->where('status', 1)
        ->orderBy('sort', 'asc')
        ->limit(6)
        ->get();
        
        //datas from top banners before main slider top
        $topBanners = Banner::where('position', 1)
        ->where('status', 1)
        ->orderBy('sort', 'asc')
        ->take(2)
        ->get();

        //datas from middle banners
        $middleBanners = Banner::where('position', 2)
        ->where('status', 1)
        ->orderBy('sort', 'asc')
        ->take(2)
        ->get();

        //datas from bottom banner
        $bottomBanner = Banner::where('position', 3)
        ->where('status', 1)
        ->orderBy('sort', 'asc')
        ->first();

        /////////// Banners
        
        ////////////////////////////////////////////////////

        /////////// Brands

        //datas from bottom brand slider
        $brands = Brand::where('status', 1)
        ->take(15)
        ->get();

        /////////// Brands
                
        ////////////////////////////////////////////////////

        /////////// Products

        //datas from most visited products
        $mostVisitedProducts = Product::where('status', 1)
        ->where('marketable', 1)
        ->latest()
        ->take(10)
        ->get();

        //datas from offer products
        $offerProducts = Product::where('status', 1)
        ->where('marketable', 1)
        ->latest()
        ->take(10)
        ->get();
        
        /////////// Products


        return view('customer.home', compact('slideShowImages','topBanners','middleBanners','bottomBanner','brands','mostVisitedProducts','offerProducts'));
    }


    public function addToFavorite(Product $product)
    {
        if(Auth::check()){
            $product->user()->toggle([Auth::user()->id]);
            if($product->user->contains(Auth::user()->id))
            {
                return response()->json(['status' => 1]);
            }
            else{
                return response()->json(['status' => 2]);
            }
        }
        else{
            return response()->json(['status' => 3]);
        }
    }
}
