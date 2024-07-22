<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\PolicyModel;
use Illuminate\Http\Request;
use Stichoza\GoogleTranslate\GoogleTranslate;

class PolicyController extends Controller
{
    public function index()
    {
        $titlePage = 'Danh sách chính sách bảo mật';
        $page_menu = 'policy';
        $page_sub = null;
        $listData = PolicyModel::orderBy('index', 'asc')->paginate(10);

        return view('admin.policy.index', compact('titlePage', 'page_menu', 'listData', 'page_sub'));
    }

    public function create()
    {
        $titlePage = 'Thêm chính sách';
        $page_menu = 'policy';
        $page_sub = null;

        return view('admin.policy.create', compact('titlePage', 'page_menu', 'page_sub'));
    }

    public function store(Request $request)
    {
        try {
            $translator = new GoogleTranslate();
            $translator->setSource('vi');
            $translator->setTarget('en');
            $translatedContent = $translator->translate($request->get('content'));
            $translatedName = $translator->translate($request->get('name'));

            $news = new PolicyModel();
            $news->name = $request->get('name');
            $news->name_en = $translatedName;
            $news->index = $request->get('index');
            $news->content = $request->get('content');
            $news->content_en = $translatedContent;
            $news->save();

            return \redirect()->route('admin.policy.index')->with(['success' => 'Thêm chính sách thành công']);

        } catch (\Exception $exception) {
            dd($exception);
        }
    }

    public function delete($id)
    {
        PolicyModel::where('id', $id)->delete();
        return \redirect()->route('admin.policy.index')->with(['success' => 'Xóa chính sách thành công']);
    }

    public function edit($id)
    {
        $news = PolicyModel::find($id);
        $titlePage = 'Chính sách';
        $page_menu = 'policy';
        $page_sub = null;
        return view('admin.policy.edit', compact('news', 'titlePage', 'page_menu', 'page_sub'));

    }

    public function update($id, Request $request)
    {
        try {
            $translator = new GoogleTranslate();
            $translator->setSource('vi');
            $translator->setTarget('en');
            $translatedContent = $translator->translate($request->get('content'));
            $translatedName = $translator->translate($request->get('name'));

            $news = PolicyModel::find($id);
            if (empty($news)) {
                return back()->with(['error' => 'Chính sách không tồn tại']);
            }
            $news->name = $request->get('name');
            $news->name_en = $translatedName;
            $news->index = $request->get('index');
            $news->content = $request->get('content');
            $news->content_en = $translatedContent;
            $news->save();
            return \redirect()->route('admin.policy.index')->with(['success' => 'Sửa chính sách thành công']);
        } catch (\Exception $exception) {
            return back()->with(['error' => $exception->getMessage()]);
        }
    }
}
