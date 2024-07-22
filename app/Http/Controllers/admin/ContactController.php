<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ContactModel;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $titlePage = 'Danh sách liên hệ';
        $page_menu = 'contact';
        $page_sub = null;
        $listData = ContactModel::orderBy('created_at','desc')->paginate(20);

        return view('admin.contact.index',compact('titlePage','page_menu','page_sub','listData'));
    }

    public function delete($id)
    {
        ContactModel::where('id',$id)->delete();

        return \redirect()->route('admin.contact.index')->with(['success' => 'Xóa dữ liệu thành công']);
    }
}
