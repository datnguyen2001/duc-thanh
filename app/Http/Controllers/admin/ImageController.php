<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ImageModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Stichoza\GoogleTranslate\GoogleTranslate;

class ImageController extends Controller
{
    public function index()
    {
        $titlePage = 'Danh sách hình ảnh ';
        $page_menu = 'work';
        $page_sub = 'image';
        $listData = ImageModel::orderBy('created_at', 'desc')->paginate(15);

        return view('admin.image.index', compact('titlePage', 'page_menu', 'page_sub', 'listData'));
    }

    public function create()
    {
        try {
            $titlePage = 'Thêm hình ảnh ';
            $page_menu = 'work';
            $page_sub = 'image';

            return view('admin.image.create', compact('titlePage', 'page_menu', 'page_sub'));
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
                $imagePath = Storage::url($file->store('product', 'public'));
            }else{
                return redirect()->back()->with(['error'=>'Vui lòng thêm hình ảnh để tiếp tục']);
            }
            if ($request->get('display') == 'on'){
                $display = 1;
            }else{
                $display = 0;
            }
            $translator = new GoogleTranslate();
            $translator->setSource('vi');
            $translator->setTarget('en');
            $translatedDescribe = $translator->translate($request->get('describe'));
            $translatedName = $translator->translate($request->get('name'));
            $image = new ImageModel([
                'describe'=>$request->get('describe'),
                'describe_en'=>$translatedDescribe,
                'link'=>$request->get('link'),
                'name'=>$request->get('name'),
                'name_en'=>$translatedName,
                'src' => $imagePath,
                'display'=>$display
            ]);
            $image->save();

            return redirect()->route('admin.image.index')->with(['success' => 'Tạo dữ liệu thành công']);
        } catch (\Exception $exception) {
            return back()->with(['error' => $exception->getMessage()]);
        }
    }

    public function delete($id)
    {
        $product = ImageModel::find($id);
        if (isset($product->src) && Storage::exists(str_replace('/storage', 'public', $product->src))) {
            Storage::delete(str_replace('/storage', 'public', $product->src));
        }
        $product->delete();
        return redirect()->back()->with(['success' => "Xóa dữ liệu thành công"]);
    }

    public function edit($id)
    {
        try {
            $data = ImageModel::find($id);
            $titlePage = 'Cập nhật hình ảnh';
            $page_menu = 'work';
            $page_sub = 'image';
            return view('admin.image.edit', compact('titlePage', 'page_menu', 'page_sub','data'));

        } catch (\Exception $exception) {
            return back()->with(['error' => $exception->getMessage()]);
        }
    }

    public function update($id, Request $request)
    {
        try {
            $product = ImageModel::find($id);

            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $imagePath = Storage::url($file->store('product', 'public'));
                if (isset($product->src) && Storage::exists(str_replace('/storage', 'public', $product->src))) {
                    Storage::delete(str_replace('/storage', 'public', $product->src));
                }
                $product->src = $imagePath;
            }
            if ($request->get('display') == 'on'){
                $display = 1;
            }else{
                $display = 0;
            }
            $translator = new GoogleTranslate();
            $translator->setSource('vi');
            $translator->setTarget('en');
            $product->describe_en = $translator->translate($request->get('describe'));
            $product->name_en = $translator->translate($request->get('name'));
            $product->name = $request->get('name');
            $product->describe = $request->get('describe');
            $product->link = $request->get('link');
            $product->display=$display;
            $product->save();

            return redirect()->route('admin.image.index')->with(['success' => 'Cập nhật dữ liệu thành công']);
        } catch (\Exception $e) {
            return back()->with(['error' => $e->getMessage()]);
        }
    }
}
