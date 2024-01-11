<?php

namespace App\Http\Controllers\Admin\Content;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Content\PageRequest;
use App\Models\Content\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::orderBy('created_at', 'desc')->simplePaginate(15);
        return view('admin.content.page.index', compact('pages'));        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.content.page.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PageRequest $request, page $page)
    {
        $inputs = $request->all();
        $inputs['slug'] = trim(str_replace(' ', '-' , 'slug'));
        $page->create($inputs);
        return to_route('admin.content.page.index')
        ->with('alert-section-success', 'پیج جدید شما با موفقیت ثبت شد');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        return view('admin.content.page.edit', compact('page'));        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PageRequest $request, Page $page)
    {
        $page->update($request->all());
        return to_route('admin.content.page.index')
        ->with('alert-section-success', 'ویرایش پیج شماره  '.$page['id'].' با موفقیت انجام شد');
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        $result = $page->delete();
        return to_route('admin.content.page.index')
        ->with('alert-section-success', ' پیج شماره '.$page->id.' با موفقیت حذف شد');    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function status(Page $page)
    {
        $page->status = $page->status == 0 ? 1 : 0;
        $result = $page->save();

        if($result){
            if($page->status == 0){
                return response()->json(['status' => true, 'checked' => false, 'id' => $page->id]);
            }else{
                return response()->json(['status' => true, 'checked' => true, 'id' => $page->id]);
            }
        }else{
            return response()->json(['status' => false]);
        }
    }
}
