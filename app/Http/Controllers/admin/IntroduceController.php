<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\IntroduceModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Stichoza\GoogleTranslate\GoogleTranslate;

class IntroduceController extends Controller
{
    public function index()
    {
        $titlePage = 'Danh sách giới thiệu';
        $page_menu = 'introduce';
        $page_sub = null;
        $listData = IntroduceModel::orderBy('index', 'asc')->paginate(10);

        return view('admin.introduce.index', compact('titlePage', 'page_menu', 'listData', 'page_sub'));
    }

    public function create()
    {
        $titlePage = 'Thêm giới thiệu';
        $page_menu = 'introduce';
        $page_sub = null;

        return view('admin.introduce.create', compact('titlePage', 'page_menu', 'page_sub'));
    }

    public function store(Request $request)
    {
        try {
            $translator = new GoogleTranslate();
            $translator->setSource('vi');
            $translator->setTarget('en');
            $translatedContent = $translator->translate($request->get('content'));
            $translatedName = $translator->translate($request->get('name'));
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $imagePath = Storage::url($file->store('banner', 'public'));
            }else{
                return back()->with(['info'=>'Vui lòng thêm ảnh desktop để tiếp tục']);
            }
            $news = new IntroduceModel();
            $news->name = $request->get('name');
            $news->name_en = $translatedName;
            $news->index = $request->get('index');
            $news->content = $request->get('content');
            $news->content_en = $translatedContent;
            $news->src = $imagePath;
            $news->save();

            return \redirect()->route('admin.introduce.index')->with(['success' => 'Thêm dữ liệu thành công']);

        } catch (\Exception $exception) {
            dd($exception);
        }
    }

    public function delete($id)
    {
        $news = IntroduceModel::find($id);
        if (isset($news->src) && Storage::exists(str_replace('/storage', 'public', $news->src))) {
            Storage::delete(str_replace('/storage', 'public', $news->src));
        }
        $news->delete();

        return \redirect()->route('admin.introduce.index')->with(['success' => 'Xóa dữ liệu thành công']);
    }

    public function edit($id)
    {
        $news = IntroduceModel::find($id);
        $titlePage = 'Sửa giới thiệu';
        $page_menu = 'introduce';
        $page_sub = null;
        return view('admin.introduce.edit', compact('news', 'titlePage', 'page_menu', 'page_sub'));

    }

    public function update($id, Request $request)
    {
        try {
            $translator = new GoogleTranslate();
            $translator->setSource('vi');
            $translator->setTarget('en');
            $translatedContent = $translator->translate($request->get('content'));
            $translatedName = $translator->translate($request->get('name'));

            $news = IntroduceModel::find($id);
            if (empty($news)) {
                return back()->with(['error' => 'Dữ liệu không tồn tại']);
            }
            if ($request->hasFile('file')){
                $file = $request->file('file');
                $imagePath = Storage::url($file->store('banner', 'public'));
                if (isset($news->src) && Storage::exists(str_replace('/storage', 'public', $news->src))) {
                    Storage::delete(str_replace('/storage', 'public', $news->src));
                }
                $news->src = $imagePath;
            }
            $news->name = $request->get('name');
            $news->name_en = $translatedName;
            $news->index = $request->get('index');
            $news->content = $request->get('content');
            $news->content_en = $translatedContent;
            $news->save();
            return \redirect()->route('admin.introduce.index')->with(['success' => 'Sửa dữ liệu thành công']);
        } catch (\Exception $exception) {
            return back()->with(['error' => $exception->getMessage()]);
        }
    }
}
