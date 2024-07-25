<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Mail\ContactFormSubmitted;
use App\Models\ContactModel;
use App\Models\IntroduceModel;
use App\Models\PolicyModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


class HomeController extends Controller
{
    public function language(Request $request,$language)
    {
        if ($language){
            Session::put('language',$language);
        }
        return redirect()->back();
    }

    public function home()
    {

        return view('web.home.index');
    }

    public function activity()
    {
        return view('web.activity.index');
    }

    public function contact()
    {
        return view('web.contact.index');
    }

    public function saveContact(Request $request)
    {
        $messages = [
            'required' => ':attribute là bắt buộc.',
            'string' => ':attribute phải là chuỗi ký tự.',
            'max' => ':attribute không được vượt quá :max ký tự.',
            'min' => ':attribute phải có ít nhất :min ký tự.',
            'email' => ':attribute phải là một địa chỉ email hợp lệ.',
            'regex' => ':attribute không đúng định dạng.',
        ];

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'phone' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:10', 'max:15'],
            'email' => 'required|email',
            'message' => 'nullable|string|max:3000',
        ], $messages);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->messages()->first(),
            ], 200);
        }

        $contact = new ContactModel();
        $contact->name = $request->get('name');
        $contact->phone = $request->get('phone');
        $contact->email = $request->get('email');
        $contact->content = $request->get('content');
        $contact->save();
        Mail::to($request->get('email'))->send(new ContactFormSubmitted($contact));

        return response()->json([
            'success' => true,
            'message' => 'Gửi thông tin liên hệ thành công',
        ], 200);
    }

    public function category()
    {
        return view('web.category.index');
    }

    public function policy()
    {
        $data = PolicyModel::orderBy('index','asc')->get();
        $currentLocale = app()->getLocale();
        foreach ($data as $datas){
            if ($currentLocale == 'vi') {
                $datas->names = $datas->name;
                $datas->contents = $datas->content;
            } else if ($currentLocale == 'en') {
                $datas->names = $datas->name_en;
                $datas->contents = $datas->content_en;
            }
        }
        $dataMobile = PolicyModel::orderBy('index','asc')->paginate(1);
        foreach ($dataMobile as $dataMobiles){
            if ($currentLocale == 'vi') {
                $dataMobiles->names = $datas->name;
                $dataMobiles->contents = $datas->content;
            } else if ($currentLocale == 'en') {
                $dataMobiles->names = $datas->name_en;
                $dataMobiles->contents = $datas->content_en;
            }
        }

        return view('web.policy.index',compact('data','dataMobile'));
    }

    public function introduce()
    {
        $data = IntroduceModel::orderBy('index','asc')->get();
        $currentLocale = app()->getLocale();
        foreach ($data as $datas){
            if ($currentLocale == 'vi') {
                $datas->names = $datas->name;
                $datas->contents = $datas->content;
            } else if ($currentLocale == 'en') {
                $datas->names = $datas->name_en;
                $datas->contents = $datas->content_en;
            }
        }

        return view('web.introduce.index',compact('$data'));
    }

    public function detailProduct()
    {

        return view('web.product.index');
    }

}
