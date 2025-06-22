@extends('front.layout.main')

@section('title', $service->title)

@section('content')

    <div class="d-flex flex-column" style="min-height:100vh;">  
        <section id="services-header" class="py-4 mb-4">
            <div class="container">
                <div class="row">
                    <div class="title pt-3">
                        <h1 class="mb-2">{{ $service->title }}</h1>
                        <div class="title-underline-container">
                            <div class="title-underline w-100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="portofolio" class="py-4 pt-5 bg-light flex-fill">
            <div class="container-fluid">
                <div id="porto-data" class="row px-2 row-gap-2">
                    <x-portofolios-list :portofolios="$portofolios" />
                    <div class="PortofolioLoader justify-content-center w-100">
                        <span class="loader"></span>
                    </div>
                </div>
        </section>

        <!-- Image Model -->
        <div id="porto-modal" class="modal" tabindex="-1">
            <div class="modal-dialog my-0 vh-100 d-flex align-items-center" style="max-width: 100%;">
                <div class="modal-content d-flex justify-content-center align-items-center" style="background: transparent;border: 0;">
                    <div class="modal-body position-relative" style="width: fit-content;">
                        <button class="bg-transparent border-0 text-white fw-bold position-absolute m-1 fs-3" type="button" data-bs-dismiss="modal" aria-label="Close">X</button>
                        <img class="rounded" src="" alt="" srcset="" style="width: auto;max-height: 90vh;max-width: 100%;">
                    </div>
                </div>
            </div>
        </div>

@endsection

@section('js-after')
    <script>
        const lang = document.querySelector('html').getAttribute('lang')
        let LastPortofolioId = {{ $portofolios->last()?->id | null }}
        const SERVICE_ID = {{ $service->id }}
    </script>
@endsection