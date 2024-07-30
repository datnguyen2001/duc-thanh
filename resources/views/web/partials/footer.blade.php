<footer class="footer">
    <div class="container">
            <div class="row">
                @php
                    $currentLocale = app()->getLocale();
                    $setting = App\Models\SettingModel::first();
                @endphp
                <div class="information col-lg-8 col-12">
                    <div class="row information-content">
                        <div class="col-lg-6 col-12">
                            <div class="contact-content">
                                <img class="logo w-100" src="{{asset($setting->logo??'assets/images/header/Logo.png')}}" alt="logo" style="max-width: 292px" />
                                <div class="contact-info">
                                    <p><strong>{{__('footer.address')}} </strong> {{$setting->address ?? ''}}</p>
                                    <p><strong>{{__('footer.phone')}} </strong>{{$setting->phone ?? ''}}</p>
                                    <p><strong>Email: </strong>{{$setting->email ?? ''}}</p>
                                    <p><strong>Website: </strong>{{$setting->website ?? ''}}</p>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-6 col-12 d-flex">
                            <div class="introduction col-6">
                                <h5>{{__('footer.introduce')}}</h5>
                                <p><a href="{{route('policy')}}">{{__('footer.policy')}}</a></p>
                                <p><a href="{{route('introduce')}}">{{__('footer.about')}}</a></p>
                                <p><a href="{{route('activity')}}">{{__('footer.activity')}}</a></p>
                                <p><a href="{{route('contact')}}">{{__('footer.contact')}}</a></p>
                            </div>
                            <div class="product col-6">
                                <h5>{{__('footer.product')}}</h5>
                                @php
                                    $currentLocale = app()->getLocale();
                                    $categories = App\Models\CategoryModel::all();
                                @endphp
                                @foreach($categories as $category)
                                    @php
                                        if ($currentLocale == 'vi') {
                                            $category->names = $category->name;
                                        } else if ($currentLocale == 'en') {
                                            $category->names = $category->name_en;
                                        }
                                    @endphp
                                    <p><a href="{{route('category-product', [$category->slug])}}">{{$category->names}}</a></p>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-12 text-center">
                    <div class="social-icons" id="social-icon-desktop">
                        <div class="col-12">
                            <a href="https://zalo.me/{{$setting->zalo ?? ''}}"><img src="{{asset('assets/images/footer/zalo.png')}}" alt="Zalo"></a>
                            <a href="{{$setting->tiktok ?? '#'}}"><img src="{{asset('assets/images/footer/tiktok.png')}}" alt="TikTok"></a>
                        </div>
                        <div class="col-12">
                            <a href="{{$setting->facebook ?? '#'}}"><img src="{{asset('assets/images/footer/fb.png')}}" alt="Facebook"></a>
                            <a href="{{$setting->youtube ?? '#'}}"><img src="{{asset('assets/images/footer/youtube.png')}}" alt="Youtube"></a>
                        </div>
                    </div>
                    <div class="social-icons" id="social-icon-mobile">
                        <img src="{{asset('assets/images/footer/zalo.png')}}" alt="Zalo">
                        <img src="{{asset('assets/images/footer/tiktok.png')}}" alt="TikTok">
                        <img src="{{asset('assets/images/footer/fb.png')}}" alt="Facebook">
                        <img src="{{asset('assets/images/footer/youtube.png')}}" alt="Youtube">
                    </div>
                    <div class="copyright-desktop">
                        Copyright 2024 © Ducthanh. All rights reserved
                    </div>
                </div>

            </div>
        </div>
</footer>
<div class="copyright-mobile">
    Copyright 2024 © Ducthanh. All rights reserved
</div>
