<?php

namespace App\Http\Controllers\Admin\Market;

use Illuminate\Http\Request;
use App\Models\Market\Product;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Market\GalleryRequest;
use App\Http\Services\Image\ImageService;
use App\Models\Market\Gallery;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product)
    {
        return view('admin.market.product.gallery.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Product $product)
    {
        return view('admin.market.product.gallery.create', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GalleryRequest $request, Product $product, ImageService $imageservice)
    {
        $inputs = $request->all();

        // image Upload
        if($request->hasFile('image'))
        {
            $imageservice->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'product-gallery');
            $result = $imageservice->createIndexAndSave($request->file('image'), true);
            if($result === false)
            {
                return to_route('admin.market.gallery.create')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }
            $inputs['image'] = $result;
        } else {
            if (isset($inputs['currentImage']) && !empty($product->image)) {
                $image = $product->image;
                $image['currentImage'] = $inputs['currentImage'];
                $inputs['image'] = $image;
            }
        }

        $inputs['product_id'] = $product->id;


        // store data in database
        $gallery = Gallery::create($inputs);
        return to_route('admin.market.product.gallery.index', $product->id)
        ->with('alert-section-success', 'تصویر جدید شما برای محصول با موفقیت ثبت شد');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product, Gallery $gallery)
    {
        $result = $gallery->delete();
        return to_route('admin.market.product.gallery.index', $product->id)
        ->with('alert-section-success', ' تصویر گالری به شناسه '.$gallery->id.' این محصول با موفقیت حذف شد');
    }
}
