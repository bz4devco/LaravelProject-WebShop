<?php

namespace App\Http\Controllers\Admin\Content;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Content\menuRequest;
use App\Models\Content\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::orderBy('created_at', 'desc')->simplePaginate(15);
        return view('admin.content.menu.index', compact('menus'));   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menus = Menu::where('parent_id', null)->orderBy('name', 'asc')->get();
        return view('admin.content.menu.create', compact('menus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(menuRequest $request, Menu $menu)
    {
        $menu->create($request->all());
        return to_route('admin.content.menu.index')
            ->with('alert-section-success', 'منوی جدید شما با موفقیت ثبت شد');    
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
    public function edit(Menu $menu)
    {
        $parentsMenu = Menu::where('parent_id', null)->orderBy('name', 'asc')->get()->except($menu->id);
        return view('admin.content.menu.edit', compact('menu', 'parentsMenu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MenuRequest $request, Menu $menu)
    {
        $hasmenu = $menu->where('id', $menu->id)->first();

        if($hasmenu->children->count() > 0)
        {
            return to_route('admin.content.menu.index')
            ->with('alert-section-error', ' منوی شماره ' . $menu->id . 'دارای زیر منو می باشد و تغییر والد آن برای زیر منو ها مشکل ایجاد خواهد کرد. (چند سطحی شدن منو امکان پذیر نیست)');
        }
        $menu->update($request->all());
        return to_route('admin.content.menu.index')
            ->with('alert-section-success', 'ویرایش منوی شماره  ' . $menu['id'] . ' با موفقیت انجام شد');    
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {   
        $hasmenu = $menu->where('id', $menu->id)->first();
        if($hasmenu->children->count() > 0)
        {
            return to_route('admin.content.menu.index')
            ->with('alert-section-error', ' منوی شماره ' . $menu->id . ' داری زیر منو می باشد، جهت حذف منوی انتخاب شده ابتدا زیر منوی های مربوط به این منو را حذف و یا در ویرایش اقدام به تغییر منوی والد نمایید. (این منو دارای زیر منو است و حذف آن برای زیر منوها مشکل ایجاد خواهد کرد) ');
        }
        $result = $menu->delete();
        return to_route('admin.content.menu.index')
            ->with('alert-section-success', ' منوی شماره ' . $menu->id . ' با موفقیت حذف شد');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function status(Menu $menu)
    {
        $menu->status = $menu->status == 0 ? 1 : 0;
        $result = $menu->save();

        if ($result) {
            if ($menu->status == 0) {
                return response()->json(['status' => true, 'checked' => false, 'id' => $menu->id]);
            } else {
                return response()->json(['status' => true, 'checked' => true, 'id' => $menu->id]);
            }
        } else {
            return response()->json(['status' => false]);
        }
    }
}
