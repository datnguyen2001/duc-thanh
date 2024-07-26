<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Mail\ContactFormSubmitted;
use App\Models\ContactModel;
use App\Models\ImageModel;
use App\Models\IntroduceModel;
use App\Models\CategoryModel;
use App\Models\MetaModel;
use App\Models\PolicyModel;
use App\Models\ProductModel;
use App\Models\ProductVideoModel;
use App\Models\VideoModel;
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
        $categories = CategoryModel::all();
        $currentLocale = app()->getLocale();
        foreach ($categories as $category){
            if ($currentLocale == 'vi') {
                $category->names = $category->name;
            } else if ($currentLocale == 'en') {
                $category->names = $category->name_en;
            }
        }
        $meta = MetaModel::where('type',2)->first();

        return view('web.home.index', compact('categories','meta'));
    }

    public function activity()
    {
        $image = ImageModel::where('display',1)->orderBy('created_at','desc')->get();
        $currentLocale = app()->getLocale();
        foreach ($image as $images){
            if ($currentLocale == 'vi') {
                $images->names = $images->name;
                $images->describes = $images->describe;
            } else if ($currentLocale == 'en') {
                $images->names = $images->name_en;
                $images->describes = $images->describe_en;
            }
        }
        $video = VideoModel::where('display',1)->orderBy('created_at','desc')->get();
        foreach ($video as $videos){
            if ($currentLocale == 'vi') {
                $videos->describes = $videos->describe;
            } else if ($currentLocale == 'en') {
                $videos->describes = $videos->describe_en;
            }
        }
        $meta = MetaModel::where('type',3)->first();

        return view('web.activity.index',compact('image','video','meta'));
    }

    public function contact()
    {
        $meta = MetaModel::where('type',6)->first();

        return view('web.contact.index',compact('meta'));
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
        $categories = CategoryModel::with('products')->get();
        $currentLocale = app()->getLocale();
        foreach ($categories as $category){
            if ($currentLocale == 'vi') {
                $category->names = $category->name;
            } else if ($currentLocale == 'en') {
                $category->names = $category->name_en;
            }
            foreach ($category->products as $product) {
                if ($currentLocale == 'vi') {
                    $product->names = $product->name;
                    $product->describes = $product->describe;
                } else if ($currentLocale == 'en') {
                    $product->names = $product->name_en;
                    $product->describes = $product->describe_en;
                }
            }
        }
        $meta = MetaModel::where('type',4)->first();

        return view('web.category.index', compact('categories','meta'));
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
        $meta = MetaModel::where('type',1)->first();

        return view('web.policy.index',compact('data','dataMobile','meta'));
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
        $meta = MetaModel::where('type',5)->first();

        return view('web.introduce.index',compact('data','meta'));
    }

    public function detailProduct($slug)
    {
        $productDetails = ProductModel::where('slug',$slug)->first();

        $currentLocale = app()->getLocale();
        if($currentLocale == 'vi'){
            $productDetails->contents = $productDetails->content;
        } else if ($currentLocale == 'en'){
            $productDetails->contents = $productDetails->content_en;
        }

        $videoProducts = ProductVideoModel::where('product_id', $productDetails->id)->get();
        foreach ($videoProducts as $videoProduct){
            if ($currentLocale == 'vi') {
                $videoProduct->describes = $videoProduct->describe;
            } else if ($currentLocale == 'en') {
                $videoProduct->describes = $videoProduct->describe_en;
            }
        }
        return view('web.product.index', compact('productDetails','videoProducts'));
    }

    public function categoryProduct($slug){
        $categorySlug = CategoryModel::where('slug',$slug)->first();

        $currentLocale = app()->getLocale();
        if ($currentLocale == 'vi') {
            $categorySlug->names = $categorySlug->name;
        }elseif ($currentLocale == 'en'){
            $categorySlug->names = $categorySlug->name_en;
        }

        $categoryProducts = ProductModel::where('category_id',$categorySlug->id)->get();
        foreach ($categoryProducts as $categoryProduct){
            if ($currentLocale == 'vi') {
                $categoryProduct->names = $categoryProduct->name;
                $categoryProduct->describes = $categoryProduct->describe;
            } else if ($currentLocale == 'en') {
                $categoryProduct->names = $categoryProduct->name_en;
                $categoryProduct->describes = $categoryProduct->describe_en;
            }
        }
        return view('web.category-product.index', compact('categoryProducts', 'categorySlug'));
    }

}
