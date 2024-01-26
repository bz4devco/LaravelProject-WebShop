<?php

namespace App\Http\Controllers\Customer\Market;

use Illuminate\Support\Str;
use App\Models\Market\Brand;
use Illuminate\Http\Request;
use App\Models\Market\Product;
use App\Models\Content\Comment;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Market\Compare;
use Illuminate\Support\Facades\Auth;
use App\Models\Market\ProductCategory;
use App\Models\Rating;

class ProductController extends Controller
{
    public function products(Request $request, ProductCategory $category = null)
    {
        // check this category has child
        if ($category) {

            $categoryIds = ($category->children->count() > 0) ? get_category_table_ids(ProductCategory::class, $category->id) : $category->id;

            if ($category->children->count() > 0) {
                array_push($categoryIds, $category->id);
            } else {
                $categoryIds = [$category->id];
            };
        }
        $hasCategoryName = $category ? $category->name : null;


        // check has product category and pass all children id to infinite depth to base query
        $productModel = ($category) ? Product::whereIn('category_id', $categoryIds) : new Product();

        // DATAS FOR COMPACT TO PRODUCTS PAGE IN SADEBAR FILTER
        // *******************************************************

        // get active brands data for sidebar filter
        $brands = Brand::where('status', 1)->orderBy('persian_name', 'asc')->get();

        // get active product categories data for sidebar filter
        $productCategories = ProductCategory::whereNull('parent_id')
            ->where('status', 1)
            ->get();

        // *******************************************************

        //////////////////////////////////////////////////////////////////////////////////////////

        // MANAGMENT FILTER REQUSETS IN PRODUCTS PAGE
        // *******************************************************


        // convert brand id to brand name 
        $selectedBrandsArray = [];
        if ($request->brands) {
            $selectedBrands = ($request->brands) ? Brand::find($request->brands) : '';
            if ($selectedBrands) {
                foreach ($selectedBrands as $selectedBrand) {
                    array_push($selectedBrandsArray, $selectedBrand->persian_name);
                }
            }
        }

        // defined symbol numbers for find by developers switch sort filter
        switch ($request->sort) {
            case '24':
                $column = "created_at";
                $direction = "DESC";
                break;
            case '84':
                $column = "favorite";
                $direction = "DESC";
                break;
            case '34':
                $column = "price";
                $direction = "DESC";
                break;
            case '12':
                $column = "price";
                $direction = "ASC";
                break;
            case '62':
                $column = "view";
                $direction = "DESC";
                break;
            case '47':
                $column = "sold_number";
                $direction = "DESC";
                break;
            default:
                $column = "created_at";
                $direction = "DESC";
                break;
        }


        //////////////////////////////////////////////////////////
        ///////////////// START FILTER QUERIES ///////////////////

        // base query
        if ($request->sort == 84) {

            $query = $productModel->select('products.*', DB::raw('COUNT(product_user.product_id) AS favorite'))
                ->leftjoin('product_user', 'products.id', '=', 'product_user.product_id')
                ->groupBy('products.id')
                ->get();
        }

        $query =  $productModel->where('status', 1)->orderBy($column, $direction)->orderBy('marketable', 'desc');


        //////////////////////////////////////////////////////////
        // search query filter //

        // check search request htmlspecialchars for security query
        $search = isset($request->search) ? checkRequest($request->search) : '';

        // this query when has search request
        $query =  $search ? $query->where('name', 'LIKE', "%" . $search . "%") : $query;

        //////////////////////////////////////////////////////////
        // prices query filter

        // check filter price (max price, min price) and set query
        $query = $request->max_price && $request->min_price ? $query->whereBetween('price', [$request->min_price, $request->max_price]) :
            $query->when($request->min_price, function ($query) use ($request) {
                $query->where('price', '>=', $request->min_price);
            })->when($request->max_price, function ($query) use ($request) {
                $query->where('price', '<=', $request->max_price);
            });

        //////////////////////////////////////////////////////////
        // brands query filter

        // this query when has brands filter request
        $query = $query->when($request->brands, function ($query) use ($request) {
            $query->whereIn('brand_id', $request->brands);
        });

        //////////////////////////////////////////////////////////
        // search on filter bar query filter

        // check search filder bar request htmlspecialchars for security query
        $search_filter = isset($request->fltr_search) ? checkRequest($request->fltr_search) : '';

        // this query when has brands filter request
        $query =  $search_filter ? $query->where('name', 'LIKE', "%" . $search_filter . "%") : $query;


        ///////////////// END FILTER QUERIES ///////////////////
        //////////////////////////////////////////////////////////


        ///////////////// MASTER PRODUCTS ///////////////////
        // master products after filter and compact to products page
        $products = $query->Paginate(16);
        $products->appends($request->query());

        return view('customer.market.product.products', compact('products', 'brands', 'selectedBrandsArray', 'productCategories', 'hasCategoryName'));
    }




    public function product(Product $product)
    {
        $userRate = null;

        // related products for slideshow on detail product page
        $relatedProducts = Product::with('category')->whereHas('category', function ($q) use ($product) {
            $q->where('id', $product->category->id);
        })
            ->where('marketable', 1)
            ->take(10)
            ->get()
            ->except($product->id);

        // user rate this product
        if (Auth::check()) {
            $userRate = Rating::where('model_id', auth()->user()->id)
                ->where('rateable_id', $product->id)
                ->first('value');
        }

        // add view count of vist this product
        $product->view += 1;
        $product->save();

        return view('customer.market.product.product', compact('product', 'relatedProducts', 'userRate'));
    }



    public function addComment(Product $product, Request $request)
    {
        if (Auth::check() && auth()->user()->user_type == 0) {

            $request->validate([
                'body' => 'required|max:2000|regex:/^[الف-یa-zA-Z0-9\-۰-۹آء-ي.,، ]+$/u'
            ]);

            $inputs['body'] = str_replace(PHP_EOL, '<br/>', $request->body);
            $inputs['author_id'] = Auth::user()->id;
            $inputs['commentable_id'] = $product->id;
            $inputs['commentable_type'] = Product::class;
            $inputs['stauts'] = 1;
            Comment::create($inputs);
            return back()->with('swal-success', 'دیدگاه شما با موفقیت ثبت شد، با تشکر از شما کاربر گرامی');
        }else{
            return back()->with('swal-danger', 'لطفاً برای افزودن دیدگاه ابتدا به حساب کاربری خود وارد شوید');
        }
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



    public function addToCompare(Product $product)
    {

        $user = Auth::user();

        if ($user->compare->products()->count() >= 4) {
            return back()->with('swal-error', 'به لیست مقایسه خود نمی توانید بیشتر از چهار محصول اضافه نمایید');
        }

        if ($user->compare()->count() > 0) {
            $userCompareList = $user->compare;
        } else {
            $userCompareList = Compare::create(['user_id' => $user->id]);
        }


        if ($product->compares->contains([$userCompareList->id])) {
            return back()->with('swal-error', 'این محصول قبلاً در لیست مقایسه اضافه شده است');
        } else {
            $product->compares()->toggle([$userCompareList->id]);
            return to_route('customer.profile.compare.my-comperes');
        }
    }


    public function addRating(Product $product, Request $request)
    {
        if (Auth::check() && auth()->user()->user_type == 0) {
            $user = Auth::user();
            if ($request->rate <= 5 && $request->rate >= 1) {

                // check اas the customer purchased this product or no
                $productIds = auth()->user()->isUserPurchedProduct($product->id);

                if ($productIds->count() > 0) {
                    $user->rate($product, $request->rate);
                    return response()->json(['status' => 1, 'rate' => $request->rate]);
                } else {
                    return response()->json(['status' => 2]);
                }
            } else {
                return response()->json(['status' => 3]);
            }
        } else {
            return response()->json(['status' => 4]);
        }
    }
}
