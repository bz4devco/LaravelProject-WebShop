<?php

namespace App\Http\Controllers\Admin\Setting;

use Illuminate\Http\Request;
use App\Models\Setting\Setting;
use Database\Seeders\SettingSeeder;
use App\Http\Controllers\Controller;
use App\Http\Services\Image\ImageService;
use App\Http\Requests\Admin\Setting\SettingRequest;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = Setting::all();
        if($settings->first() === null){
            $default = new SettingSeeder();
            $default->run();
        }

        $settings = Setting::orderBy('id', 'desc')->simplePaginate(15);

        return view('admin.setting.index', compact('settings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $default = new SettingSeeder();
        $default->run();

        return redirect()->route('admin.setting.index')
        ->with('alert-section-success', 'تنظیم جدید با تنظیمات پایه ایجاد شد')
        ->with('alert-section-info', 'توجه : جهت تکمیل تنظیمات تکمیلی به ویرایش تنظیمات جدید ایجاد شده مراجعه نمایید.');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        return view('admin.setting.edit', compact('setting'));
    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SettingRequest $request, Setting $setting, ImageService $imageservice)
    {
        $inputs = $request->all();

            // update image of icon
            if ($request->hasFile('icon')) {
                if (!empty($setting->icon)) {
                    $imageservice->deleteImage($setting->icon);
                }
                $imageservice->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'setting');
                $imageservice->setImageName('icon');
                $result = $imageservice->save($request->file('icon'));

                if ($result === false) {
                    return redirect()->route('admin.setting.edit', $setting->id)->with('swal-error', 'آپلود آیکون با خطا مواجه شد');
                }
                $inputs['icon'] = $result;
            }

            // update image of logo
            if ($request->hasFile('logo')) {
                if (!empty($setting->logo)) {
                    $imageservice->deleteImage($setting->logo);
                }
                $imageservice->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'setting');
                $imageservice->setImageName('logo');
                $result = $imageservice->save($request->file('logo'));

                if ($result === false) {
                    return redirect()->route('admin.setting.edit')->with('swal-error', 'آپلود لوگو با خطا مواجه شد');
                }
                $inputs['logo'] = $result;
            }


        $setting->update($inputs);
        return redirect()->route('admin.setting.index')
        ->with('alert-section-success', 'ویرایش تنظیمات شماره   '.$setting['id'].' با موفقیت انجام شد');
    }

      /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        $result = $setting->delete();
        return redirect()->route('admin.setting.index')
        ->with('alert-section-success', 'تنظیمت شماره '.$setting->id.' با موفقیت حذف شد');
    }

    
     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function status(Setting $setting)
    {
        $setting->status = $setting->status == 0 ? 1 : 0;
        $result = $setting->save();

        if($result){
            if($setting->status == 0){
                return response()->json(['status' => true, 'checked' => false, 'id' => $setting->id]);
            }else{
                return response()->json(['status' => true, 'checked' => true, 'id' => $setting->id]);
            }
        }else{
            return response()->json(['status' => false]);
        }
    }
}
