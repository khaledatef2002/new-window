@extends('front.layout.main')

@section('title', __('custom.contact'))

@section('content')

    <section id="contact-form" class="py-4 mb-3">
        <div class="container">
            <div class="header mb-4">
                <!-- <h2 class="text-center ">نـصـمـم ونـبـتـكـر كـل مـاهـو جـذاب</h2> -->
                <div class="title mb-4 mx-auto">
                    <h2 class="text-center mb-2">@lang('custom.contact-us')</h2>
                    <div class="title-underline-container title-second">
                        <div class="title-underline w-100"></div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center" style="min-height:35vh;">
                <div class="col-lg-4 px-4 mt-2" style="position: relative;">
                    <img class="d-none d-sm-block" src="{{ asset('front/images/muslim-man-browsing-smartphone-app-removebg-preview.png') }}" style="position: absolute;left: 50%;top: 50%;transform: translate(-50%, -50%);height: 140%;max-width: 100%;">
                </div>
                <div class="col-lg-5 px-4 mt-2">
                    <form id="send-contacts" method="POST">
                        <input class="form-control mb-3" type="text" name="full_name" id="full_name" placeholder="@lang('custom.full-name')">
                        <input class="form-control mb-3" type="text" name="email" id="email" placeholder="@lang('custom.email')">
                        <input class="form-control mb-3" type="text" name="phone_number" id="phone_number" placeholder="@lang('custom.phone')">
                        <input class="form-control mb-3" type="text" name="site_url" id="site_url" placeholder="@lang('custom.site')">
                        <button type="submit" class="cta-btn px-4 text-dark loader-btn" style="float:left;">
                            <p class="mb-0">
                                <i class="fa-solid fa-paper-plane"></i> @lang('custom.send')
                            </p>
                            <div class="loader"></div>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Us -->
    <section id="contact-form-footer" class="py-5 pt-5">
        <div class="container pt-4">
            <div class="row">
                <div class="col-12 px-5">
                    <div class="row">
                        <div class="d-flex justify-content-center">
                            <p class="mb-0 fw-bold"><i class="fa-solid fa-phone"></i> @lang('custom.phone')</p>
                            <ul class="pe-3 d-flex gap-5" style="list-style:none;">
                                <li><a href="tel:+966592945557" class="text-gr text-decoration-none"><bdi>0592945557</bdi></a></li>
                                <li><a href="tel:+966592948084" class="text-gr text-decoration-none"><bdi>0592948084</bdi></a></li>
                            </ul>
                        </div>
                        <div class="d-flex justify-content-center flex-wrap mb-3">
                            <p class="mb-0 fw-bold"><i class="fa-solid fa-envelope"></i> @lang('custom.email')&nbsp;</p>
                            <span class="text-gr">info@windowadv.com</span>
                        </div>
                        <div class="d-flex justify-content-center flex-wrap mb-2">
                            <p class="ms-1 mb-0 fw-bold"><i class="fa-solid fa-location-dot"></i> @lang('custom.address')&nbsp;</p>
                            <span class="text-gr">7589 شارع هارون الرشيد الفرعي، حي الفيحاء - الرياض 14252</span>
                        </div>
                    </div>
                    <div class="row mt-3 d-flex justify-content-center flex-wrap">
                        <p class="ms-1 text-center mb-1 fw-bold">@lang('custom.social')</p>
                        <ul class="d-flex gap-4 flex-wrap justify-content-center" style="list-style: none;">
                            <li>
                                <a href="https://www.facebook.com/Window.adv">
                                <i class="fa-brands fa-square-facebook text-white fs-1"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.instagram.com/window_adv">
                                <i class="fa-brands fa-square-instagram text-white fs-1"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.linkedin.com/in/windowadv">
                                <i class="fab fa-linkedin text-white fs-1"></i>               
                                </a>
                            </li>
                            <li>
                                <a href="https://www.snapchat.com/add/window_adv">
                                <i class="fab fa-snapchat-square fs-1 text-white"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.tiktok.com/@window_adv">
                                <i class="fab fa-tiktok bg-white fs-1 rounded-2" style="color: #1f1f1f;"></i>                
                                </a>
                            </li>
                            <li>
                                <a href="https://x.com/Window_adv">
                                <i class="fa-brands fa-square-x-twitter text-white fs-1"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.youtube.com/@WindowAdv">
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