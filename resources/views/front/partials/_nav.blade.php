<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <div>
            <a class="navbar-brand" href="/"><img src="{{ asset('front/images/window-final logo-1.png') }}" alt=""></a>
            <a class="navbar-brand" href="/"><img src="{{ asset('front/images/sa-vision-2030.png') }}" alt=""></a>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto gap-2 pe-0">
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('front.home') ? 'active' : '' }}" href="{{ route('front.home') }}"><i class="fa-solid fa-house"></i> @lang('custom.home')</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('front.about') ? 'active' : '' }}" href="{{ route('front.about') }}"><i class="fa-solid fa-briefcase"></i> @lang('custom.about')</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('front.services.index') ? 'active' : '' }}" href="{{ route('front.services.index') }}"><i class="fa-solid fa-gear"></i> @lang('custom.services')</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('front.blogs.index') ? 'active' : '' }}" href="{{ route('front.blogs.index') }}"><i class="fa-brands fa-blogger-b"></i> @lang('custom.blog')</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('front.contacts.index') ? 'active' : '' }}" href="{{ route('front.contacts.index') }}"><i class="fa-solid fa-address-book"></i> @lang('custom.contact')</a>
                </li>
            </ul>
            <div class="click-to-contact-container me-2 ms-auto">
                <a href="tel:+966592945557" class="rounded-5 px-3 py-1 background-secondary-color d-inline-block d-flex align-items-center text-white text-decoration-none">
                    <i class="fas fa-headset text-orange-color fs-5 me-1"></i>
                    <div class="content me-2 d-flex flex-column justify-content-center">
                        <span class="fs-9">@lang('custom.click-for-fast-contact')</span>
                        <p class="mb-0 fs-6">+966592945557</p>
                    </div>
                </a>
            </div>
            <div>
                @if (LaravelLocalization::getCurrentLocale() == 'ar')
                    <a class="text-decoration-none" href="{{ LaravelLocalization::getLocalizedURL('en') }}">
                        <img id="lang-image" src="{{ asset('front/images/English_language.png')}}" width="60" class="rounded-2" alt="En">
                    </a>  
                    @else
                    <a class="text-decoration-none" href="{{ LaravelLocalization::getLocalizedURL('ar') }}">
                        <img id="lang-image" src="{{ asset('front/images/saudi.webp')}}" width="60" class="rounded-2" alt="Ar">
                    </a>  
                @endif
            </div>
        </div>
    </div>
</nav>