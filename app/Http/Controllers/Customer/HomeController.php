<?php

namespace App\Http\Controllers\Customer;

use App\Models\Content\Page;
use App\Models\Market\Brand;
use Illuminate\Http\Request;
use App\Models\Content\Banner;
use App\Models\Market\Product;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Market\ProductCategory;
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

        //datas from four banner
        $fourBanners = Banner::where('position', 4)
            ->where('status', 1)
            ->orderBy('sort', 'asc')
            ->take(4)
            ->get();

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
            ->orderBy('view', 'DESC')
            ->take(10)
            ->get();

        //datas from offer products
        $offerProducts = Product::where('status', 1)
            ->where('marketable', 1)
            ->latest()
            ->take(10)
            ->get();

        //datas from popular products
        $popularProducts = Product::select('products.*', DB::raw('COUNT(product_user.product_id) AS favorite'))
            ->leftjoin('product_user', 'products.id', '=', 'product_user.product_id')
            ->groupBy('products.id')
            ->orderBy('favorite', 'desc')
            ->take(10)
            ->get();

        /////////// Products


        return view('customer.home', compact(
            'slideShowImages',
            'topBanners',
            'middleBanners',
            'bottomBanner',
            'brands',
            'mostVisitedProducts',
            'offerProducts',
            'popularProducts',
            'fourBanners'
        ));
    }


    public function page(Page $page)
    {
        return view('customer.page', compact('page'));
    }



    public function addToFavorite(Product $product)
    {
        if (Auth::check() && auth()->user()->user_type == 0) {
            $product->user()->toggle([Auth::user()->id]);
            if ($product->user->contains(Auth::user()->id)) {
                return response()->json(['status' => 1]);
            } else {
                return response()->json(['status' => 2]);
            }
        } else {
            return response()->json(['status' => 3]);
        }
    }


    public function searchAjax(Request $request, Product $product, Brand $brand, ProductCategory $productCategory)
    {
        $productsResult = $product->where('name', 'LIKE', '%' . $request->input('search') . '%')
            ->where('status', 1)
            ->where('marketable', 1)
            ->take(5)
            ->orderBy('created_at', 'desc')
            ->get(['id', 'name', 'slug']);

        $brandsResult = $brand->where('persian_name', 'LIKE', '%' . $request->input('search') . '%')
            ->orWhere('orginal_name', 'LIKE', '%' . $request->input('search') . '%')
            ->where('status', 1)
            ->take(5)
            ->orderBy('created_at', 'desc')
            ->get(['id', 'persian_name']);

        $categorysResult = $productCategory->where('name', 'LIKE', '%' . $request->input('search') . '%')
            ->where('status', 1)
            ->take(5)
            ->orderBy('created_at', 'desc')
            ->get(['id', 'name']);

        return response()->json(['products' => $productsResult, 'categorys' => $categorysResult, 'brands' => $brandsResult]);
    }
}
