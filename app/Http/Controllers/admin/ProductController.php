<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\CategoryModel;
use App\Models\ProductModel;
use App\Models\ProductVideoModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Stichoza\GoogleTranslate\GoogleTranslate;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $titlePage = 'Danh sách sản phẩm';
        $page_menu = 'product';
        $page_sub = null;
        if (isset($request->key_search)) {
            $listData = ProductModel::where('name', 'like', '%' . $request->get('key_search') . '%')
                ->orderBy('created_at', 'desc')->paginate(20);
        } else {
            $listData = ProductModel::orderBy('created_at', 'desc')->paginate(15);
        }

        foreach ($listData as $val) {
            $category = CategoryModel::find($val->category_id);
            $val->name_category = $category ? $category->name : 'Chưa có tên';
        }

        return view('admin.product.index', compact('titlePage', 'page_menu', 'page_sub', 'listData'));
    }

    public function create()
    {
        try {
            $titlePage = 'Thêm sản phẩm';
            $page_menu = 'product';
            $page_sub = null;
            $category = CategoryModel::all();
            return view('admin.product.create', compact('titlePage', 'page_menu', 'page_sub','category'));
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
            $translatedContent = $translator->translate($request->get('content'));
            $translatedDescribe = $translator->translate($request->get('describe'));
            $translatedName = $translator->translate($request->get('title'));
            $product = new ProductModel([
                'name' => $request->get('title'),
                'name_en' => $translatedName,
                'slug' => Str::slug($request->get('title')),
                'category_id' => $request->get('category_id'),
                'describe'=>$request->get('describe'),
                'describe_en'=>$translatedDescribe,
                'content'=>$request->get('content'),
                'content_en'=>$translatedContent,
                'src' => $imagePath,
                'display'=>$display
            ]);
            $product->save();

            return redirect()->route('admin.product.index')->with(['success' => 'Tạo dữ liệu thành công']);
        } catch (\Exception $exception) {
            return back()->with(['error' => $exception->getMessage()]);
        }
    }

    public function delete($id)
    {
        $product = ProductModel::find($id);
        if (isset($product->src) && Storage::exists(str_replace('/storage', 'public', $product->src))) {
            Storage::delete(str_replace('/storage', 'public', $product->src));
        }
        $video = ProductVideoModel::where('product_id',$id)->get();
        foreach ($video as $item){
            if (isset($item->src) && Storage::exists(str_replace('/storage', 'public', $item->src))) {
                Storage::delete(str_replace('/storage', 'public', $item->src));
            }
            $item->delete();
        }
        $product->delete();
        return redirect()->route('admin.product.index')->with(['success' => "Xóa dữ liệu thành công"]);
    }

    public function edit($id)
    {
        try {
            $data = ProductModel::find($id);
            $category = CategoryModel::all();
            $titlePage = 'Cập nhật sản phẩm';
            $page_menu = 'product';
            $page_sub = null;
            return view('admin.product.edit', compact('titlePage', 'page_menu', 'page_sub','data','category'));

        } catch (\Exception $exception) {
            return back()->with(['error' => $exception->getMessage()]);
        }
    }

    public function update($id, Request $request)
    {
        try {
            $product = ProductModel::find($id);

            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $imagePath = Storage::url($file->store('banner', 'public'));
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
            $product->content_en = $translator->translate($request->get('content'));
            $product->describe_en = $translator->translate($request->get('describe'));
            $product->name_en = $translator->translate($request->get('title'));
            $product->name = $request->get('title');
            $product->slug = Str::slug($request->get('title'));
            $product->category_id = $request->get('category_id');
            $product->describe = $request->get('describe');
            $product->content = $request->get('content');
            $product->display=$display;
            $product->save();

            return redirect()->route('admin.product.index')->with(['success' => 'Cập nhật dữ liệu thành công']);
        } catch (\Exception $e) {
            return back()->with(['error' => $e->getMessage()]);
        }
    }

    public function indexVideo($id)
    {
        $product = ProductModel::find($id);
        $titlePage = 'Danh sách video của sản phẩm: '.$product->name;
        $page_menu = 'product';
        $page_sub = null;
        $listData = ProductVideoModel::orderBy('created_at', 'desc')->paginate(15);

        return view('admin.product.video.index', compact('titlePage', 'page_menu', 'page_sub', 'listData','id'));
    }

    public function createVideo($id)
    {
        try {
            $titlePage = 'Thêm video sản phẩm';
            $page_menu = 'product';
            $page_sub = null;

            return view('admin.product.video.create', compact('titlePage', 'page_menu', 'page_sub','id'));
        } catch (\Exception $e) {
            return back()->with(['error' => $e->getMessage()]);
        }
    }

    public function storeVideo(Request $request,$id)
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
            $product = new ProductVideoModel([
                'product_id' => $id,
                'describe'=>$request->get('describe'),
                'describe_en'=>$translatedDescribe,
                'link'=>$request->get('link'),
                'channel_name'=>$request->get('channel_name'),
                'src' => $imagePath,
                'display'=>$display
            ]);
            $product->save();

            return redirect()->route('admin.product-video.index-video',$id)->with(['success' => 'Tạo dữ liệu thành công']);
        } catch (\Exception $exception) {
            return back()->with(['error' => $exception->getMessage()]);
        }
    }

    public function deleteVideo($id)
    {
        $product = ProductVideoModel::find($id);
        if (isset($product->src) && Storage::exists(str_replace('/storage', 'public', $product->src))) {
            Storage::delete(str_replace('/storage', 'public', $product->src));
        }
        $product->delete();
        return redirect()->back()->with(['success' => "Xóa dữ liệu thành công"]);
    }

    public function editVideo($id)
    {
        try {
            $data = ProductVideoModel::find($id);
            $titlePage = 'Cập nhật video';
            $page_menu = 'product';
            $page_sub = null;
            return view('admin.product.video.edit', compact('titlePage', 'page_menu', 'page_sub','data'));

        } catch (\Exception $exception) {
            return back()->with(['error' => $exception->getMessage()]);
        }
    }

    public function updateVideo($id, Request $request)
    {
        try {
            $product = ProductVideoModel::find($id);

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
            $product->channel_name = $request->get('channel_name');
            $product->describe = $request->get('describe');
            $product->link = $request->get('link');
            $product->display=$display;
            $product->save();

            return redirect()->route('admin.product-video.index-video',$product->product_id)->with(['success' => 'Cập nhật dữ liệu thành công']);
        } catch (\Exception $e) {
            return back()->with(['error' => $e->getMessage()]);
        }
    }
}
