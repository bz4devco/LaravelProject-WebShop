<?php

namespace App\Http\Controllers\Admin\Market;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Market\Product;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Market\StoreRequest;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->simplePaginate(15);
        return view('admin.market.store.index', compact('products'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request, Product $product)
    {
        $product->marketable_number += $request->marketable_number;
        $product->save();

        // now time for Log info
        $date = jalaliDate(Carbon::now());

        Log::info("Inventory Increase : receiver => {$request->receiver}, deliverer => {$request->deliverer}, description => {$request->description}, add => {$request->marketable_number}, date => {$date}");

        return redirect()->route('admin.market.store.index')
        ->with('alert-section-success', 'موجودی جدید کالای '. $product->name .' با موفقیت ثبت شد');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('admin.market.store.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRequest $request, Product $product)
    {

        $product->update($request->all());

        // now time for Log info
        $date = jalaliDate(Carbon::now());

        Log::info("
        Inventory Modification : marketable_number => {$request->marketable_number}, sold_number => {$request->sold_number}, frozen_number => {$request->frozen_number}, date => {$date} ");

        return redirect()->route('admin.market.store.index')
        ->with('alert-section-success', 'موجودی کالای '. $product->name .' با موفقیت ویرایش شد');
    }




    public function addToStore(Product $product)
    {
        return view('admin.market.store.add-to-store', compact('product'));
    }


}
