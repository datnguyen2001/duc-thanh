<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\MetaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MetaController extends Controller
{
    public function index()
    {
        $titlePage = 'Danh sách SEO';
        $page_menu = 'seo';
        $page_sub = null;
        $listData = MetaModel::orderBy('id', 'asc')->get();

        return view('admin.seo.index', compact('titlePage', 'page_menu', 'page_sub', 'listData'));
    }

    public function create()
    {
        try {
            $titlePage = 'Thêm seo';
            $page_menu = 'seo';
            $page_sub = null;

            return view('admin.seo.create', compact('titlePage', 'page_menu', 'page_sub'));
        } catch (\Exception $e) {
            return back()->with(['error' => $e->getMessage()]);
        }
    }

    public function store(Request $request)
    {
        try {
            $imagePath = null;
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $imagePath = Storage::url($file->store('banner', 'public'));
            }
            $meta = MetaModel::where('type',$request->get('type'))->first();
            if (isset($meta)){
                return redirect()->back()->with(['error' => 'SEO của trang này đã có vui lòng đến sửa']);
            }
            $category = new MetaModel([
                'title' => $request->get('title'),
                'image'=>$imagePath,
                'description' => $request->get('description'),
                'type' => $request->get('type'),
            ]);
            $category->save();

            return redirect()->route('admin.seo.index')->with(['success' => 'Tạo dữ liệu thành công']);
        } catch (\Exception $exception) {
            return back()->with(['error' => $exception->getMessage()]);
        }
    }

    public function delete($id)
    {
        $category = MetaModel::find($id);
        if (isset($category->image) && Storage::exists(str_replace('/storage', 'public', $category->image))) {
            Storage::delete(str_replace('/storage', 'public', $category->image));
        }
        $category->delete();

        return redirect()->route('admin.seo.index')->with(['success'=>"Xóa dữ liệu thành công"]);
    }

    public function edit($id)
    {
        try {
            $data = MetaModel::find($id);
            if (empty($data)) {
                return back()->with(['error' => 'Dữ liệu không tồn tại']);
            }
            $titlePage = 'Cập nhật SEO';
            $page_menu = 'seo';
            $page_sub = null;

            return view('admin.seo.edit', compact('titlePage', 'page_menu', 'page_sub', 'data'));
        } catch (\Exception $exception) {
            return back()->with(['error' => $exception->getMessage()]);
        }
    }

    public function update($id, Request $request)
    {
        try {
            $category = MetaModel::find($id);
            if ($request->hasFile('file')){
                $file = $request->file('file');
                $imagePath = Storage::url($file->store('banner', 'public'));
                if (isset($category->image) && Storage::exists(str_replace('/storage', 'public', $category->image))) {
                    Storage::delete(str_replace('/storage', 'public', $category->image));
                }
                $category->image = $imagePath;
            }
            $category->title = $request->get('title');
            $category->description = $request->get('description');
            $category->type = $request->get('type');
            $category->save();

            return redirect()->route('admin.seo.index')->with(['success' => 'Cập nhật dữ liệu thành công']);
        } catch (\Exception $e) {
            return back()->with(['error' => $e->getMessage()]);
        }
    }
}
