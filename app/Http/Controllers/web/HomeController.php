<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\PolicyModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


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
}
