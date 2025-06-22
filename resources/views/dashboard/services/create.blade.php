@extends('dashboard.layouts.app')

@section('title', __('dashboard.services.create'))

@section('content')

<div class="card">
    <div class="card-body">
        <div class="row g-2">
            <div class="col-sm-auto ms-auto">
                <a href="{{ route('dashboard.services.index') }}"><button class="btn btn-light"><i class="ri-arrow-go-forward-fill me-1 align-bottom"></i> @lang('dashboard.return')</button></a>
            </div>
            <!--end col-->
        </div>
        <!--end row-->
    </div>
</div>
<form id="create-services-form">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="mb-4">
                        <div class="text-center">
                            <p class="mb-0 fw-bold">@lang('dashboard.image')</p>
                            <div class="position-relative d-inline-block auto-image-show">
                                <div class="position-absolute top-100 start-100 translate-middle">
                                    <label for="image" class="mb-0" data-bs-toggle="tooltip" data-bs-placement="right" title="Select Image">
                                        <div class="avatar-xs">
                                            <div class="avatar-title bg-light border rounded-circle text-muted cursor-pointer">
                                                <i class="ri-image-fill"></i>
                                            </div>
                                        </div>
                                    </label>
                                    <input class="form-control d-none" name="image" id="image" type="file" accept="image/png, image/gif, image/jpeg, image/webp">
                                </div>
                                <div class="avatar-lg">
                                    <div class="avatar-title bg-light rounded">
                                        <img src="" id="product-img" style="min-height: 100%;min-width: 100%;" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="gap-2 mb-3 flex-fill">
                        <label for="title.ar">@lang('dashboard.ar.name')</label>
                        <input id="title.ar" type="text" class="form-control" name="ar[title]">
                    </div>
                    <div class="gap-2 mb-3 flex-fill">
                        <label for="title.en">@lang('dashboard.en.name')</label>
                        <input id="title.en" type="text" class="form-control" name="en[title]">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="card">
            <div class="dropzone border-0">
                <div class="card-header d-flex justify-content-between align-items-center p-0">
                    <h3 class="mb-0">@lang('dashboard.portofolio')</h3>
                    <div class="dz-message dz-clickable m-0" style="width:fit-content;height:fit-content;">
                        <p class="btn btn-success mb-0 py-1 px-3 mb-1">Upload <i class="fs-4 ri-upload-cloud-2-fill"></i></p>
                    </div>
                </div>
                <div class="card-body">
                    <div class="fallback">
                        <input name="file" type="file" multiple="multiple">
                    </div>
                    <p id="noAttachments" class="fs-4 mb-0 text-center" style="color: gray;">@lang('dashboard.no_portofolio')</p>
                </div>

                <ul class="list-unstyled mb-0" id="dropzone-preview">
                    <li class="mt-2" id="dropzone-preview-list">
                        <!-- This is used as the file preview template -->
                        <div class="border rounded">
                            <div class="d-flex p-2">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar-sm bg-light rounded">
                                        <img data-dz-thumbnail class="img-fluid rounded d-block" src="{{ asset('back/images/document.png') }}" alt="Dropzone-Image" />
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <div class="pt-1">
                                        <h5 class="fs-14 mb-1" data-dz-name>&nbsp;</h5>
                                        <p class="fs-13 text-muted mb-0" data-dz-size></p>
                                        <strong class="error text-danger" data-dz-errormessage></strong>
                                    </div>
                                </div>
                                <div class="flex-shrink-0 ms-3">
                                    <button data-dz-remove class="btn btn-sm btn-danger">Delete</button>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>                                      
            </div>
        </div>
    </div>
    <div class="row">
        <div class="text-end mb-3">
            <button type="submit" class="btn btn-success w-sm loader-btn ms-auto">
                <p class="mb-0">@lang('dashboard.create')</p>
                <div class="loader"></div>
            </button>
        </div>
    </div>
</form>

@endsection

@section('additional-js-libs')
    

@endsection

@section('custom-js')
    <script src="{{ asset('back/js/services-module.js') }}" type="module"></script>
    <script>
        let dropzonePreviewNode = document.querySelector("#dropzone-preview-list");
        dropzonePreviewNode.id = "";
        let previewTemplate = dropzonePreviewNode.parentNode.innerHTML;
        dropzonePreviewNode.parentNode.removeChild(dropzonePreviewNode);
        let dropzone = new Dropzone(".dropzone", {
            url: "#",
            autoProcessQueue: false,
            uploadMultiple: true,
            parallelUploads: 5,
            maxFilesize: 1024 * 2,
            acceptedFiles: ".jpg,.jpeg,.png,.gif,.wepb",
            previewTemplate: previewTemplate,
            previewsContainer: "#dropzone-preview",
            init: function() {
                let dropzoneInstance = this;
                let noAttachmentsMessage = document.getElementById("noAttachments");

                // Show "No Attachments" when Dropzone is empty
                function updateAttachmentMessage() {
                    noAttachmentsMessage.style.display = dropzoneInstance.files.length === 0 ? "block" : "none";
                }

                // Update message when a file is added
                this.on("addedfile", function() {
                    updateAttachmentMessage();
                });

                // Update message when a file is removed
                this.on("removedfile", function() {
                    updateAttachmentMessage();
                });

                // Initial state
                updateAttachmentMessage();
            }
        });
    </script>
@endsection