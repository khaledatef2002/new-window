@extends('front.layout.main')

@section('title', __('custom.home'))

@section('content')

    <header class="text-center">
        <video autoplay muted loop playsinline preload="auto">
            <source src="{{ asset('front/videos/window_header.mp4') }}" type="video/mp4">
        </video>
    </header>

    <section id="about" class="py-5 text-white">
        <div class="container py-4">
            <div class="row">
                <div class="col-lg-7 mb-md-0 mb-5">
                    <p class="header_about_warning fw-bold">
                        @lang('custom.best-sa-company')
                    </p>
                    <p class="text-gr">@lang('custom.home-header-description')</p>
                </div>
                <div class="col-lg-5 px-5 d-flex justify-content-center align-items-center gap-4">
                    <div>
                        <img src='{{ asset('front/images/callcenter.png') }}' height="140" alt="@lang('custom.contact-us')">
                    </div>
                    <div>
                        <p class="header_about_warning fw-bold mb-0 fs-4">@lang('custom.contact-us')</p>
                        <p class="mb-0 fs-3 text-gr">0592945557</p>
                        <p class="mb-0 fs-3 text-gr">0592955084</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="counter" class="py-5">
        <div class="container d-flex flex-md-row flex-column justify-content-evenly align-items-center gap-4 text-gr">
            <div class="d-flex align-items-center gap-3">
                <div>
                    <img src="{{ asset('front/images/clients_icon.png') }}" height="70" alt="@lang('custom.clients')">
                </div>
                <div>
                    <p class="mb-0 fs-1"><span class="count-number">1000</span>+</p>
                    <p class="mb-0 fs-5">@lang('custom.clients')</p>
                </div>
            </div>
            <div class="d-flex align-items-center gap-3">
                <div>
                    <img src="{{ asset('front/images/projects_icon.png') }}" height="70" alt="@lang('custom.our-projects')">
                </div>
                <div>
                    <p class="mb-0 fs-1"><span class="count-number">3000</span>+</p>
                    <p class="mb-0 fs-5">@lang('custom.our-projects')</p>
                </div>
            </div>
            <div class="d-flex align-items-center gap-3">
                <div>
                    <img src="{{ asset('front/images/vip_icon.png') }}" height="70" alt="@lang('custom.vip-clients')">
                </div>
                <div>
                    <p class="mb-0 fs-1"><span class="count-number">200</span>+</p>
                    <p class="mb-0 fs-5">@lang('custom.vip-clients')</p>
                </div>
            </div>  
        </div>
  </section>

  <!-- Services -->
    <section id="services" class="py-5">
        <div class="container">
            <div class="title mb-4 mx-auto">
                <h2 class="text-center mb-0 text-white">@lang('custom.our-services')</h2>
                <div class="title-underline-container title-second">
                    <div class="title-underline w-100"></div>
                </div>
            </div>
            <div class="row row-gap-3">
                @if ($services->count() == 0)
                    <div class="text-center w-100 fw-bold text-decoration-underline text-gr">@lang('custom.no-results')</div>
                @else
                    @foreach ($services as $service)
                        <div class="col-lg-3 col-md-4 col-6 px-md-5">
                            <div class="item">
                                <div>
                                    <img src="{{ $service->display_image }}" alt="" style="width:100%;">
                                </div>
                                <div class="text-center text-white">
                                    <p class="fs-4 mt-2 text-gr">{{ $service->title }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="text-center mt-1">
                        <a href="{{ route('front.services.index') }}" class="cta-btn text-decoration-none text-dark">@lang('custom.see-all')</a>
                    </div>
                @endif
            </div>
        </div>
    </section>

    {{-- Portfolio --}}
    <section id="portfolio" class="py-5">
        <div class="container-fluid px-0 overflow-hidden">
            <div class="title mb-4 mx-auto">
                <h2 class="text-center mb-1 text-white">@lang('custom.our-portofolio')</h2>
                <div class="title-underline-container title-second">
                    <div class="title-underline w-100"></div>
                </div>
            </div>
            <div class="row px-2">
                @if ($portofolios->count() == 0)
                    <div class="text-center w-100 fw-bold text-decoration-underline text-gr">@lang('custom.no-results')</div>
                @else
                    <div class="protofolio-carousel owl-carousel owl-theme px-0" dir="ltr">
                        @foreach ($portofolios as $portofolio)
                           <div class="item position-relative" style="width: 400px;aspect-ratio: 1 / 1.1;background-size: cover;background-position: center;background-repeat: no-repeat;background-image: url({{ $portofolio->display_image }});overflow:hidden">
                                <p class="mt-2 position-absolute" style="bottom: 0;right: 15px;color: white;font-weight: bold;font-size: 25px;text-shadow: -2px 1px 2px #636363;">{{ $portofolio->title }}</p>
                            </div> 
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </section>

    <!-- Top Customers -->
    <section id="top-customers" class="py-5 px-2 bg-white">
        <div class="container py-5">
            <div class="title mb-4 mx-auto">
                <h2 class="mb-1 text-decoration-none">@lang('custom.top-customers')</h2>
                <div class="title-underline-container title-second">
                    <div class="title-underline w-100"></div>
                </div>
            </div>
            <div class="row px-3 mt-5">
                @if ($top_customers->count() == 0)
                    <div class="fw-bold text-center w-100 text-decoration-underline text-dark">@lang('custom.no-results')</div>
                @else
                    <div class="customer-carousel owl-carousel owl-theme" dir="ltr">
                        @php($i = 0)
                        @foreach ($top_customers as $customer)
                            <div class="slide" data-slide-index="{{ $i++ }}">
                                <img class="rounded" src="{{ $customer->display_image }}" alt="{{ $customer->customer_name }}">
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </section>

    <!-- Contact Us -->
    <section id="contact" class="py-5">
        <div class="container my-0">
            <div class="header mb-4">
                <div class="title mx-auto">
                    <h3 class="text-center text-white">@lang('custom.contact-us')</h3>
                    <div class="title-underline-container title-second">
                        <div class="title-underline w-100"></div>
                    </div>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-lg-5 px-4 mt-2">
                    <form id="send-contacts" method="POST">
                        <input class="form-control mb-3" type="text" name="full_name" id="full_name" placeholder="@lang('custom.full-name')">
                        <input class="form-control mb-3" type="text" name="email" id="email" placeholder="@lang('custom.email')">
                        <input class="form-control mb-3" type="text" name="phone_number" id="phone_number" placeholder="@lang('custom.phone')">
                        <input class="form-control mb-3" type="text" name="site_url" id="site_url" placeholder="@lang('custom.site')">
                        <button type="submit" class="cta-btn text-dark loader-btn">
                            <p class="mb-0">
                                <i class="fa-solid fa-paper-plane"></i> @lang('custom.send')
                            </p>
                            <div class="loader"></div>
                        </button>
                    </form>
                </div>
                <div class="col-lg-7 px-5 mt-2">
                    <div class="row">
                        <div class="d-flex col-gap-5 flex-wrap my-2 justify-content-start">
                            <div class="d-flex mb-0 flex-wrap">
                                <p class="mb-0 fw-bold"><i class="fa-solid fa-phone ms-1"></i> @lang('custom.phone')</p>
                                <ul class="pe-1 d-flex gap-4" style="list-style:none;">
                                    <li><a href="tel:+966592945557" target="_blank" class="text-gr text-decoration-none"><bdi>{{ $website_settings->phone_number }}</bdi></a></li>
                                    @if($website_settings->phone_number_2)
                                        <li><a href="tel:+966592948084" target="_blank" class="text-gr text-decoration-none"><bdi>0592948084</bdi></a></li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                        <div class="d-flex flex-wrap mb-3">
                            <p class="mb-0 fw-bold"><i class="fa-solid fa-envelope ms-1"></i> @lang('custom.email')&nbsp;</p>
                            <span class="text-gr">{{ $website_settings->email }}</span>
                        </div>
                        <div class="d-flex flex-wrap mb-3">
                            <p class="ms-1 mb-0 fw-bold"><i class="fa-solid fa-location-dot ms-1"></i> @lang('custom.address')&nbsp;</p>
                            <span class="text-gr">{{ $website_settings->location }}</span>
                        </div>
                    </div>
                    <div class="row d-inline-block">
                        <p class="ms-1 fw-bold"><i class="fa-solid fa-share-nodes ms-1"></i> @lang('custom.social') </p>
                        <ul class="d-flex gap-4 flex-wrap justify-content-center" style="list-style: none;">
                            <li>
                                <a href="{{ $website_settings->facebook_url }}">
                                    <i class="fa-brands fa-square-facebook text-white fs-1"></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{ $website_settings->instagram_url }}">
                                    <i class="fa-brands fa-square-instagram text-white fs-1"></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{ $website_settings->linkedin_url }}">
                                    <i class="fab fa-linkedin text-white fs-1"></i>               
                                </a>
                            </li>
                            <li>
                                <a href="{{ $website_settings->snapchat_url }}">
                                    <i class="fab fa-snapchat-square fs-1 text-white"></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{ $website_settings->tiktok_url }}">
                                    <i class="fab fa-tiktok bg-white fs-1 rounded-2" style="color: #1f1f1f;"></i>                
                                </a>
                            </li>
                            <li>
                                <a href="{{ $website_settings->twitter_url }}">
                                    <i class="fa-brands fa-square-x-twitter text-white fs-1"></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{ $website_settings->youtube_url }}">
                                    <i class="fa-brands fa-youtube text-white fs-1"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection