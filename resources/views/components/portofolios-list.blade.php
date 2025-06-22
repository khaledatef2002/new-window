@if ($portofolios->count() == 0)
    <div class='fs-1 fw-bold text-center mt-5'>@lang('custom.no-results')!</div>
@else 
    @foreach ($portofolios as $portofolio)
        <div class="col-lg-3 col-md-4 col-6">
            <div class="porto-image position-relative d-flex justify-content-center align-items-center" onclick="zoom_image(this)" style="">
                <img src="{{ $portofolio->display_image }}" alt="" style="min-width:100%;min-height:100%;">
            </div>
        </div>
    @endforeach
@endif