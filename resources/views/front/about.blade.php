@extends('front.layout.main')

@section('title', __('front.custom'))

@section('content')

    <section id="about" class="py-4 about2">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="title mb-3 mx-0">
                        <h2 class="text-white">@lang('custom.our-story-title')</h2>
                        <div class="title-underline-container">
                            <div class="title-underline title-underline w-100"></div>
                        </div>
                    </div>
                    <p class="text-gr">
                        @lang('custom.our-story')
                    </p>
                </div>
                <div class="col-lg-5 px-5">
                    <video autoplay muted loop playsinline preload="auto">
                        <source src="{{ asset('front/videos/window_about.mp4') }}" type="video/mp4">
                    </video>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-light pb-4">
        <div class="container">
            <div class="row">
                <p class="mb-0 text-center text-dark">
                    @lang('custom.our-story-2')
                </p>
            </div>
        </div>
    </section>

    <section id="vission" class="py-4">
        <div class="container">
            <div class="row">
                <div class="title mb-4 mx-auto">
                    <h2 class="text-center">@lang('custom.our-services')</h2>
                    <div class="title-underline-container title-second">
                        <div class="title-underline w-100"></div>
                    </div>
                </div>
                <p class="text-center">
                    @lang('custom.our-services-body')
                </p>
            </div>
        </div>
    </section>

    <section id="message" class="py-4 bg-light">
        <div class="container">
            <div class="row">
                <div class="title mb-4 mx-auto">
                    <h2 class="text-center">@lang('custom.our-message')</h2>
                    <div class="title-underline-container title-second">
                        <div class="title-underline w-100"></div>
                    </div>
                </div>
                <p class="text-center">@lang('custom.our-message-body')</p>
            </div>
        </div>
    </section>

    <section id="vission" class="py-4">
        <div class="container">
            <div class="row">
                <div class="title mb-4 mx-auto">
                    <h2 class="text-center">@lang('custom.our-vision')</h2>
                    <div class="title-underline-container title-second">
                        <div class="title-underline w-100"></div>
                    </div>
                </div>
                <p class="text-center">@lang('custom.our-vision-body')</p>
            </div>
        </div>
    </section>

    <section id="principals" class="py-4 bg-light">
        <div class="container">
            <div class="row">
                <div class="title mb-4 mx-auto">
                    <h2 class="text-center">@lang('custom.our-principals')</h2>
                    <div class="title-underline-container title-second">
                        <div class="title-underline w-100"></div>
                    </div>
                </div>
                @lang('custom.our-principals-body')
            </div>
        </div>
    </section>

    <section id="strategie" class="py-4">
        <div class="container">
            <div class="row">
                <div class="title mb-4 mx-auto">
                    <h2 class="text-center">@lang('custom.our-strategie')</h2>
                    <div class="title-underline-container title-second">
                        <div class="title-underline w-100"></div>
                    </div>
                </div>
                @lang('custom.our-strategie-body')
            </div>
        </div>
    </section>

@endsection