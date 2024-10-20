<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\SettingModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Stichoza\GoogleTranslate\GoogleTranslate;

class SettingController extends Controller
{
    public function index()
    {
        $titlePage = 'Cài đặt';
        $page_menu = 'setting';
        $page_sub = null;
        $data = SettingModel::first();

        return view('admin.setting.index',compact('titlePage','page_menu','page_sub','data'));
    }

    public function save(Request $request){
        $setting = SettingModel::first();
        $translator = new GoogleTranslate();
        $translator->setSource('vi');
        $translator->setTarget('en');
        $translatedAddress = $translator->translate($request->get('address'));
        if ($setting){
            if ($request->hasFile('file')){
                $file = $request->file('file');
                $imagePath = Storage::url($file->store('banner', 'public'));
                if (isset($setting->logo) && Storage::exists(str_replace('/storage', 'public', $setting->logo))) {
                    Storage::delete(str_replace('/storage', 'public', $setting->logo));
                }
                $setting->logo = $imagePath;
            }
            $setting->address = $request->get('address');
            $setting->address_en = $translatedAddress;
            $setting->phone = $request->get('phone');
            $setting->email = $request->get('email');
            $setting->website = $request->get('website');
            $setting->zalo = $request->get('zalo');
            $setting->tiktok = $request->get('tiktok');
            $setting->facebook = $request->get('facebook');
            $setting->youtube = $request->get('youtube');
            $setting->map = $request->get('map');
            $setting->save();
        }else{
            $imagePath = null;
            if ($request->hasFile('file')){
                $file = $request->file('file');
                $imagePath = Storage::url($file->store('banner', 'public'));
            }
            $setting = new SettingModel([
                'address'=>$request->get('address'),
                'address_en'=>$translatedAddress,
                'phone'=>$request->get('phone'),
                'email'=>$request->get('email'),
                'logo'=>$imagePath,
                'website'=>$request->get('website'),
                'zalo'=>$request->get('zalo'),
                'tiktok'=>$request->get('tiktok'),
                'facebook'=>$request->get('facebook'),
                'youtube'=>$request->get('youtube'),
                'map'=>$request->get('map'),
            ]);
            $setting->save();
        }

        return redirect()->back()->with(['success'=>"Lưu thông tin thành công"]);
    }
}
