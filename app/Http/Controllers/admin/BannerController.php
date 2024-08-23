<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\BannerModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    public function index($page)
    {
        $titlePage = 'Danh sách banner';
        $page_menu = 'banner';
        $page_sub = null;
        $listData = BannerModel::where('page', $page)->orderBy('index', 'asc')->paginate(10);

        return view('admin.banner.index', compact('titlePage', 'page_menu', 'page_sub', 'listData', 'page'));
    }

    public function create ($page)
    {
        try{
            $titlePage = 'Thêm banner';
            $page_menu = 'banner';
            $page_sub = null;

            return view('admin.banner.create', compact('titlePage', 'page_menu', 'page_sub', 'page'));
        }catch (\Exception $e){
            return back()->with(['error' => $e->getMessage()]);
        }
    }

    public function store (Request $request, $page)
    {
        try{
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $imagePath = Storage::url($file->store('banner', 'public'));
            }else{
                return back()->with(['info'=>'Vui lòng thêm ảnh desktop để tiếp tục']);
            }
            if ($request->hasFile('file_mobile')) {
                $file = $request->file('file_mobile');
                $imagePathMobile = Storage::url($file->store('banner', 'public'));
            }else{
                return back()->with(['info'=>'Vui lòng thêm ảnh mobile để tiếp tục']);
            }
            if ($request->get('display') == 'on'){
                $display = 1;
            }else{
                $display = 0;
            }
            $banner = new BannerModel([
                'src' => $imagePath,
                'src_mobile' => $imagePathMobile,
                'display' => $display,
                'index' => $request->get('index'),
                'page' => $page,
            ]);
            $banner->save();
            return redirect()->route('admin.banner.index', ['page' => $page])->with(['success' => 'Tạo banner thành công']);
        }catch (\Exception $exception){
            return back()->with(['error' => $exception->getMessage()]);
        }
    }

    public function delete($page, $id)
    {
        $banner = BannerModel::where('id', $id)->where('page', $page)->first();

        if ($banner) {
            if (isset($banner->src) && Storage::exists(str_replace('/storage', 'public', $banner->src))) {
                Storage::delete(str_replace('/storage', 'public', $banner->src));
            }
            if (isset($banner->src_mobile) && Storage::exists(str_replace('/storage', 'public', $banner->src_mobile))) {
                Storage::delete(str_replace('/storage', 'public', $banner->src_mobile));
            }
            $banner->delete();
            return redirect()->route('admin.banner.index', ['page' => $page])->with(['success' => "Xóa dữ liệu thành công"]);
        }

        return redirect()->route('admin.banner.index', ['page' => $page])->with(['error' => "Banner không tồn tại hoặc không thuộc về trang này"]);
    }


    public function edit($page, $id)
    {
        try {
            $banner = BannerModel::where('id', $id)->where('page', $page)->first();
            if (empty($banner)) {
                return back()->with(['error' => 'Banner không tồn tại']);
            }
            $titlePage = 'Sửa banner';
            $page_menu = 'banner';
            $page_sub = null;
            return view('admin.banner.edit', compact('titlePage', 'page_menu', 'page_sub', 'banner', 'page'));
        } catch (\Exception $exception) {
            return back()->with(['error' => $exception->getMessage()]);
        }
    }

    public function update ($page, $id, Request $request)
    {
        try{
            $banner = BannerModel::where('id', $id)->where('page', $page)->first();
            if (empty($banner)){
                return back()->with(['error' => 'Banner không tồn tại']);
            }
            if ($request->hasFile('file')){
                $file = $request->file('file');
                $imagePath = Storage::url($file->store('banner', 'public'));
                if (isset($banner->src) && Storage::exists(str_replace('/storage', 'public', $banner->src))) {
                    Storage::delete(str_replace('/storage', 'public', $banner->src));
                }
                $banner->src = $imagePath;
            }
            if ($request->hasFile('file_mobile')){
                $file = $request->file('file_mobile');
                $imagePathMobile = Storage::url($file->store('banner', 'public'));
                if (isset($banner->src_mobile) && Storage::exists(str_replace('/storage', 'public', $banner->src_mobile))) {
                    Storage::delete(str_replace('/storage', 'public', $banner->src_mobile));
                }
                $banner->src_mobile = $imagePathMobile;
            }
            if ($request->get('display') == 'on'){
                $display = 1;
            }else{
                $display = 0;
            }
            $banner->index = $request->get('index');
            $banner->display = $display;
            $banner->save();
            return redirect()->route('admin.banner.index', ['page' => $page])->with(['success' => 'Cập nhật banner thành công']);
        }catch (\Exception $e){
            return back()->with(['error' => $e->getMessage()]);
        }
    }
}
