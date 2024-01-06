<?php

namespace App\Http\Controllers\Customer\Market;

use App\Http\Controllers\Controller;
use App\Models\Content\Comment;
use App\Models\Market\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function product(Product $product)
    {
        // related products for slideshow on detail product page
        $relatedProducts = Product::where('status', 1)
        ->where('marketable', 1)
        ->latest()
        ->take(10)
        ->get();
        

        Auth::loginUsingId(6);

        return view('customer.market.product.product', compact('product', 'relatedProducts'));
    }


    public function addComment(Product $product, Request $request)
    {
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
