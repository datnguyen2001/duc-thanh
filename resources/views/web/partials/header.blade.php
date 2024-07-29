<div class="header-container">
    <header class="header">
        <div class="nav side left">
            <a href="{{route('home')}}">
                <img class="icon home-icon" src="{{asset('assets/images/header/home-icon.png')}}" id="home-icon-desktop" alt="home-icon" />
            </a>
            <img class="icon home-icon" src="{{asset('assets/images/header/mobile-icon.png')}}" id="home-icon-mobile" alt="mobile-icon" />
            <img
                class="border-side left"
                src="{{asset('assets/images/header/left-side.svg')}}"
                alt="border-left"
            />
        </div>
        <div class="nav small separator @if($is_active == 1) active @endif">
            <span>
                <a href="{{route('introduce')}}">{{__('header.about')}}</a>
            </span>
        </div>
        <div class="nav medium separator @if($is_active == 2) active @endif">
            <span>
                <a href="{{route('category')}}">{{__('header.product')}} + </a>
            </span>
        </div>
        <div class="nav large separator">
            <a href="{{route('home')}}" class="w-100 text-center">
                <img class="logo" src="{{asset($setting->logo??'assets/images/header/Logo.png')}}" alt="logo" />
            </a>
        </div>
        <div class="nav medium separator  @if($is_active == 4) active @endif">
            <span>
                <a href="{{route('activity')}}">{{__('header.activity')}} +</a>
            </span>
        </div>
        <div class="nav small separator @if($is_active == 5) active @endif">
            <span>
                <a href="{{route('contact')}}">{{__('header.contact')}}</a>
            </span>
        </div>
        <div class="nav side right">
            <img class="icon search-icon" src="{{asset('assets/images/header/Search.png')}}" alt="search-icon" />
            <img
                class="border-side right"
                src="{{asset('assets/images/header/right-side.svg')}}"
                alt="border-right"
            />
        </div>
        <div class="search-input">
            <input type="text" placeholder="{{__('home.search_placeholder')}}" name="keyword" id="searchKeyword">
            <div class="btn-search-field d-flex" >
                <button class="clear-search-button"></button>
                <button class="search-button-icon" onclick="submitSearch()"><i class="fas fa-search"></i></button>
            </div>
        </div>
        <div class="mobile-menu-item">
            <ul>
                <li><a href="{{route('introduce')}}">{{__('header.about')}}</a></li>
                <li><a href="{{route('category')}}">{{__('header.product')}} + </a></li>
                <li><a href="{{route('activity')}}">{{__('header.activity')}} +</a></li>
                <li><a href="{{route('contact')}}">{{__('header.contact')}}</a></li>
            </ul>
            <img src="{{asset('assets/images/header/underlined-mobile.png')}}" alt="underlined">
        </div>
        <div class="language-change d-flex">
            <div class="lang-vn"><a href="{{route('language', ['vi'])}}">VN</a></div>
            <div class="lang-en"><a href="{{route('language', ['en'])}}">EN</a></div>
        </div>
    </header>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Elements
        const searchIcon = document.querySelector('.search-icon');
        const searchInputContainer = document.querySelector('.search-input');
        const clearSearchButton = document.querySelector('.clear-search-button');
        const homeIconMobile = document.getElementById('home-icon-mobile');
        const mobileMenuItem = document.querySelector('.mobile-menu-item');
        const languageChange = document.querySelector('.language-change');

        // Functions to update language-change position
        function updateLanguageChangePosition() {
            languageChange.classList.remove('search-language', 'menu-item-language');
            if (searchInputContainer.classList.contains('search-show')) {
                languageChange.classList.add('search-language');
            } else if (mobileMenuItem.classList.contains('menu-show')) {
                languageChange.classList.add('menu-item-language');
            }
        }

        // Event Listeners
        searchIcon.addEventListener('click', function() {
            searchInputContainer.classList.add('search-show');
            updateLanguageChangePosition();
        });

        document.addEventListener('click', function(event) {
            if (!searchInputContainer.contains(event.target) && !searchIcon.contains(event.target)) {
                searchInputContainer.classList.remove('search-show');
                updateLanguageChangePosition();
            }
        });

        clearSearchButton.addEventListener('click', function() {
            document.getElementById('searchKeyword').value = '';
            searchInputContainer.classList.remove('search-show');
            updateLanguageChangePosition();
        });

        homeIconMobile.addEventListener('click', function(event) {
            event.stopPropagation();
            mobileMenuItem.classList.toggle('menu-show');
            searchInputContainer.classList.remove('search-show');
            updateLanguageChangePosition();
        });

        document.addEventListener('click', function(event) {
            if (!mobileMenuItem.contains(event.target) && !homeIconMobile.contains(event.target)) {
                mobileMenuItem.classList.remove('menu-show');
                updateLanguageChangePosition();
            }
        });
    });

    function submitSearch() {
        var keyword = document.getElementById('searchKeyword').value;

        if (keyword) {
            // Create a form element
            var form = document.createElement('form');
            form.method = 'GET';
            form.action = '{{ route('search') }}';

            // Get the existing input element
            var input = document.getElementById('searchKeyword');

            // Clone the input element to avoid moving it from the original position
            var clonedInput = input.cloneNode(true);
            clonedInput.value = keyword;

            // Append the cloned input to the form
            form.appendChild(clonedInput);

            // Append the form to the body
            document.body.appendChild(form);

            // Submit the form
            form.submit();
        } else {
            alert('<?php echo __('header.alert_search'); ?>');
        }
    }
    document.getElementById('searchKeyword').addEventListener('keypress', function (event) {
        if (event.keyCode === 13) { // Check for Enter key press
            event.preventDefault(); // Prevent the default form submission
            submitSearch(); // Call the submitSearch function
        }
    });
</script>
