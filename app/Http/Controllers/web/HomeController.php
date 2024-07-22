<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
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
}
