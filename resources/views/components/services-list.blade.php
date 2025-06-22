@if ($services->count() == 0)
    <div class="text-center fw-bold w-100">@lang('custom.no-results')</div>
@else
    @foreach ($services as $service)
        <div class="col-lg-3 col-md-4 col-6 px-md-5 px-2 mb-md-5">
            <div class="services-category-item">
                <div>
                    <img src="{{ $service->display_image }}">
                </div>
                <div class="text-center text-white">
                    <a class="text-decoration-underline fs-5" href="{{ route('front.services.show', $service) }}">{{ $service->title }}</a>
                </div>
            </div>
        </div>
    @endforeach
@endif