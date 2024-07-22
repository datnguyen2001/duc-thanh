<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\CategoryModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Stichoza\GoogleTranslate\GoogleTranslate;

class CategoryController extends Controller
{
    public function index()
    {
        $titlePage = 'Danh sách danh mục sản phẩm';
        $page_menu = 'category';
        $page_sub = null;
        $listData = CategoryModel::orderBy('index', 'asc')->paginate(20);

        return view('admin.category.index', compact('titlePage', 'page_menu', 'page_sub', 'listData'));
    }

    public function create()
    {
        try {
            $titlePage = 'Thêm danh mục';
            $page_menu = 'category';
            $page_sub = null;

            return view('admin.category.create', compact('titlePage', 'page_menu', 'page_sub'));
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
            $translator = new GoogleTranslate();
            $translator->setSource('vi');
            $translator->setTarget('en');
            $translatedName = $translator->translate($request->get('title'));
            $category = new CategoryModel([
                'name' => $request->get('title'),
                'name_en'=>$translatedName,
                'slug' => Str::slug($request->get('title')),
                'src'=>$imagePath,
                'index' => $request->get('index'),
            ]);
            $category->save();

            return redirect()->route('admin.category.index')->with(['success' => 'Tạo dữ liệu thành công']);
        } catch (\Exception $exception) {
            return back()->with(['error' => $exception->getMessage()]);
        }
    }

    public function delete($id)
    {
        $category = CategoryModel::find($id);
        if (isset($category->src) && Storage::exists(str_replace('/storage', 'public', $category->src))) {
            Storage::delete(str_replace('/storage', 'public', $category->src));
        }
        $category->delete();

        return redirect()->route('admin.category.index')->with(['success'=>"Xóa dữ liệu thành công"]);
    }

    public function edit($id)
    {
        try {
            $data = CategoryModel::find($id);
            if (empty($data)) {
                return back()->with(['error' => 'Dữ liệu không tồn tại']);
            }
            $titlePage = 'Cập nhật danh mục';
            $page_menu = 'category';
            $page_sub = null;

            return view('admin.category.edit', compact('titlePage', 'page_menu', 'page_sub', 'data'));
        } catch (\Exception $exception) {
            return back()->with(['error' => $exception->getMessage()]);
        }
    }

    public function update($id, Request $request)
    {
        try {
            $category = CategoryModel::find($id);
            if ($request->hasFile('file')){
                $file = $request->file('file');
                $imagePath = Storage::url($file->store('banner', 'public'));
                if (isset($category->src) && Storage::exists(str_replace('/storage', 'public', $category->src))) {
                    Storage::delete(str_replace('/storage', 'public', $category->src));
                }
                $category->src = $imagePath;
            }
            $translator = new GoogleTranslate();
            $translator->setSource('vi');
            $translator->setTarget('en');
            $category->name_en = $translator->translate($request->get('title'));
            $category->name = $request->get('title');
            $category->slug = Str::slug($request->get('title'));
            $category->index = $request->get('index');
            $category->save();

            return redirect()->route('admin.category.index')->with(['success' => 'Cập nhật dữ liệu thành công']);
        } catch (\Exception $e) {
            return back()->with(['error' => $e->getMessage()]);
        }
    }
}
