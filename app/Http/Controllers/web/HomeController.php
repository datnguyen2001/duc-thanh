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

    public function policy()
    {
        $data = PolicyModel::orderBy('index','asc')->get();
        $dataMobile = PolicyModel::orderBy('index','asc')->paginate(1);
        return view('web.policy.index',compact('data','dataMobile'));
    }
}
