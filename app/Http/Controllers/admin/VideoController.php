<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\VideoModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Stichoza\GoogleTranslate\GoogleTranslate;

class VideoController extends Controller
{
    public function index()
    {
        $titlePage = 'Danh sách video ';
        $page_menu = 'work';
        $page_sub = 'video';
        $listData = VideoModel::orderBy('created_at', 'desc')->paginate(15);

        return view('admin.video.index', compact('titlePage', 'page_menu', 'page_sub', 'listData'));
    }

    public function create()
    {
        try {
            $titlePage = 'Thêm video ';
            $page_menu = 'work';
            $page_sub = 'video';

            return view('admin.video.create', compact('titlePage', 'page_menu', 'page_sub'));
        } catch (\Exception $e) {
            return back()->with(['error' => $e->getMessage()]);
        }
    }

    public function store(Request $request)
    {
        try {
            if ($request->get('display') == 'on'){
                $display = 1;
            }else{
                $display = 0;
            }
            $translator = new GoogleTranslate();
            $translator->setSource('vi');
            $translator->setTarget('en');
            $translatedDescribe = $translator->translate($request->get('describe'));
            $product = new VideoModel([
                'describe'=>$request->get('describe'),
                'describe_en'=>$translatedDescribe,
                'link'=>$request->get('link'),
                'channel_name'=>$request->get('channel_name'),
                'src' => $request->get('src'),
                'display'=>$display
            ]);
            $product->save();

            return redirect()->route('admin.video.index')->with(['success' => 'Tạo dữ liệu thành công']);
        } catch (\Exception $exception) {
            return back()->with(['error' => $exception->getMessage()]);
        }
    }

    public function delete($id)
    {
        $product = VideoModel::find($id);
        if (isset($product->src) && Storage::exists(str_replace('/storage', 'public', $product->src))) {
            Storage::delete(str_replace('/storage', 'public', $product->src));
        }
        $product->delete();
        return redirect()->back()->with(['success' => "Xóa dữ liệu thành công"]);
    }

    public function edit($id)
    {
        try {
            $data = VideoModel::find($id);
            $titlePage = 'Cập nhật video';
            $page_menu = 'work';
            $page_sub = 'video';
            return view('admin.video.edit', compact('titlePage', 'page_menu', 'page_sub','data'));

        } catch (\Exception $exception) {
            return back()->with(['error' => $exception->getMessage()]);
        }
    }

    public function update($id, Request $request)
    {
        try {
            $product = VideoModel::find($id);

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
            $product->src = $request->get('src');
            $product->display=$display;
            $product->save();

            return redirect()->route('admin.video.index')->with(['success' => 'Cập nhật dữ liệu thành công']);
        } catch (\Exception $e) {
            return back()->with(['error' => $e->getMessage()]);
        }
    }
}
