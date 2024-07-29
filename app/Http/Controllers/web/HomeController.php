<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Mail\ContactFormSubmitted;
use App\Models\BannerModel;
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
        $banners = BannerModel::all();
        $categories = CategoryModel::all();
        $imageProduct = ImageModel::first();
        $videoProduct = VideoModel::first();

        $currentLocale = app()->getLocale();
        foreach ($categories as $category){
            if ($currentLocale == 'vi') {
                $category->names = $category->name;
            } else if ($currentLocale == 'en') {
                $category->names = $category->name_en;
            }
        }
        $meta = MetaModel::where('type',2)->first();
        $is_active = 7;

        return view('web.home.index', compact('categories','meta', 'imageProduct', 'videoProduct', 'banners','is_active'));
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
        $is_active = 4;

        return view('web.activity.index',compact('image','video','meta','is_active'));
    }

    public function contact()
    {
        $meta = MetaModel::where('type',6)->first();
        $is_active = 6;

        return view('web.contact.index',compact('meta','is_active'));
    }

    public function saveContact(Request $request)
    {
        $currentLocale = app()->getLocale();
        if ($currentLocale == 'vi') {
                $messages = [
                    'name.required' => 'Họ và tên là bắt buộc.',
                    'phone.required' => 'Số điện thoại là bắt buộc.',
                    'phone.regex' => 'Số điện thoại không đúng định dạng.',
                    'phone.min' => 'Số điện thoại phải có ít nhất 10 ký tự.',
                    'phone.max' => 'Số điện thoại không được vượt quá 11 ký tự.',
                    'email.required' => 'Email là bắt buộc.',
                    'email.email' => 'Email phải là một địa chỉ email hợp lệ.',
                    'content.required' => 'Lời nhắn là bắt buộc.',
                    'content.string' => 'Tin nhắn phải là chuỗi ký tự.',
                    'content.max' => 'Tin nhắn không được vượt quá 3000 ký tự.',
                ];
        }else if ($currentLocale == 'en') {
            $messages = [
                'name.required' => 'Name is required.',
                'phone.required' => 'Phone is required.',
                'phone.regex' => 'Phone number format is incorrect.',
                'phone.min' => 'Phone number must be at least 10 characters.',
                'phone.max' => 'Phone number must not exceed 11 characters.',
                'email.required' => 'Email is required.',
                'email.email' => 'Email must be a valid email address.',
                'content.required' => 'Message is required.',
                'content.string' => 'Message must be text.',
                'content.max' => 'Messages must not exceed 3000 characters.',
            ];
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'phone' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:10', 'max:15'],
            'email' => 'required|email',
            'content' => 'required|nullable|string|max:3000',
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
        if ($currentLocale == 'vi') {
            return response()->json([
                'success' => true,
                'message' => 'Gửi thông tin liên hệ thành công',
            ], 200);
        }else if ($currentLocale == 'en') {
            return response()->json([
                'success' => true,
                'message' => 'Contact information sent successfully',
            ], 200);
        }
    }

    public function category()
    {
        $categories = CategoryModel::with('products')->get();
        $categories = $categories->filter(function($category) {
            return $category->products->isNotEmpty();
        });

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
        $is_active = 2;

        return view('web.category.index', compact('categories','meta','is_active'));
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
        $is_active = 8;

        return view('web.policy.index',compact('data','dataMobile','meta','is_active'));
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
        $is_active = 1;

        return view('web.introduce.index',compact('data','meta','is_active'));
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
        $is_active = 2;

        return view('web.product.index', compact('productDetails','videoProducts','is_active'));
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
        $is_active = 2;

        return view('web.category-product.index', compact('categoryProducts', 'categorySlug','is_active'));
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        $currentLocale = app()->getLocale();

        if ($currentLocale == 'vi') {
            $categoryProducts = ProductModel::where('name', 'LIKE', '%' . $keyword . '%')->get();
            $image = ImageModel::where('name', 'LIKE', '%' . $keyword . '%')->get();
            $video = VideoModel::where('channel_name', 'LIKE', '%' . $keyword . '%')->get();
        } else if ($currentLocale == 'en') {
            $categoryProducts = ProductModel::where('name_en', 'LIKE', '%' . $keyword . '%')->get();
            $image = ImageModel::where('name_en', 'LIKE', '%' . $keyword . '%')->get();
            $video = VideoModel::where('channel_name', 'LIKE', '%' . $keyword . '%')->get();
        } else {
            $categoryProducts = collect();
            $image = collect();
            $video = collect();
        }

        foreach ($categoryProducts as $categoryProduct){
            if ($currentLocale == 'vi') {
                $categoryProduct->names = $categoryProduct->name;
                $categoryProduct->describes = $categoryProduct->describe;
            } else if ($currentLocale == 'en') {
                $categoryProduct->names = $categoryProduct->name_en;
                $categoryProduct->describes = $categoryProduct->describe_en;
            }
        }

        foreach ($image as $images){
            if ($currentLocale == 'vi') {
                $images->names = $images->name;
                $images->describes = $images->describe;
            } else if ($currentLocale == 'en') {
                $images->names = $images->name_en;
                $images->describes = $images->describe_en;
            }
        }

        foreach ($video as $videos){
            if ($currentLocale == 'vi') {
                $videos->describes = $videos->describe;
            } else if ($currentLocale == 'en') {
                $videos->describes = $videos->describe_en;
            }
        }
        $is_active = 3;

        return view('web.search.index', compact('categoryProducts', 'image', 'video','is_active'));
    }
}
