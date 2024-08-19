@extends('dashboard.layouts.app')

@section('content')
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-xxl">
            <!--begin::Card-->
            <div class="card card-flush">
                <!--begin::Card body-->
                <div class="card-body">
                    <!--begin:::Tabs-->
                    <ul class="nav nav-tabs nav-line-tabs nav-line-tabs-2x border-transparent fs-4 fw-semibold mb-15"
                        role="tablist">
                        <!--begin:::Tab item-->
                        <li class="nav-item" role="presentation">
                            <a class="nav-link text-active-primary pb-5 active" data-bs-toggle="tab"
                                href="#kt_ecommerce_settings_general" aria-selected="true" role="tab">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen001.svg-->
                                <span class="svg-icon svg-icon-2 me-2">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M11 2.375L2 9.575V20.575C2 21.175 2.4 21.575 3 21.575H9C9.6 21.575 10 21.175 10 20.575V14.575C10 13.975 10.4 13.575 11 13.575H13C13.6 13.575 14 13.975 14 14.575V20.575C14 21.175 14.4 21.575 15 21.575H21C21.6 21.575 22 21.175 22 20.575V9.575L13 2.375C12.4 1.875 11.6 1.875 11 2.375Z"
                                            fill="currentColor"></path>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->@lang('dashboard.notification')
                            </a>
                        </li>
                        <!--end:::Tab item-->

                      

                    </ul>
                    <!--end:::Tabs-->
                    <!--begin:::Tab content-->
                    <div class="tab-content" id="myTabContent">
                        <!--begin:::Tab pane-->
                        <div class="tab-pane fade active show" id="kt_ecommerce_settings_general" role="tabpanel">
                            <!--begin::Form-->
                            <form method="POST" class="form fv-plugins-bootstrap5 fv-plugins-framework notify-form"
                                action="{{ route('send-notification') }}">
                                @csrf
                                <input type="hidden" name="type" value="notify">
                                <!--begin::Heading-->
                                <div class="row mb-7">
                                    <div class="col-md-9 offset-md-3">
                                        <h2>@lang('dashboard.notification_data')</h2>
                                    </div>
                                </div>
                                <!--end::Heading-->
                                <!--begin::Input group-->
                                <div class="row fv-row mb-7 fv-plugins-icon-container">
                                    <div class="col-md-3 text-md-end">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-semibold form-label mt-3">
                                            <span class="required">@lang('dashboard.notification_title_ar')</span>
                                            
                                        </label>
                                        <!--end::Label-->
                                    </div>
                                    <div class="col-md-9">
                                        <!--begin::Input-->
                                        <input type="text" class="form-control form-control-solid" name="title_ar"
                                            value="">
                                        <!--end::Input-->
                                        <div class="fv-plugins-message-container invalid-feedback"></div>
                                    </div>
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="row fv-row mb-7">
                                    <div class="col-md-3 text-md-end">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-semibold form-label mt-3">
                                            <span>@lang('dashboard.notification_message_ar')</span>
                                            
                                        </label>
                                        <!--end::Label-->
                                    </div>
                                    <div class="col-md-9">
                                        <!--begin::Input-->
                                        <textarea class="form-control form-control-solid" name="body_ar"></textarea>
                                        <!--end::Input-->
                                    </div>
                                </div>
                                <!--end::Input group-->


                                <!--begin::Input group-->
                                <div class="row fv-row mb-7 fv-plugins-icon-container">
                                    <div class="col-md-3 text-md-end">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-semibold form-label mt-3">
                                            <span class="required">@lang('dashboard.notification_title_en')</span>
                                            
                                        </label>
                                        <!--end::Label-->
                                    </div>
                                    <div class="col-md-9">
                                        <!--begin::Input-->
                                        <input type="text" class="form-control form-control-solid" name="title_en"
                                            value="">
                                        <!--end::Input-->
                                        <div class="fv-plugins-message-container invalid-feedback"></div>
                                    </div>
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="row fv-row mb-7">
                                    <div class="col-md-3 text-md-end">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-semibold form-label mt-3">
                                            <span>@lang('dashboard.notification_message_en')</span>
                                            
                                        </label>
                                        <!--end::Label-->
                                    </div>
                                    <div class="col-md-9">
                                        <!--begin::Input-->
                                        <textarea class="form-control form-control-solid" name="body_en"></textarea>
                                        <!--end::Input-->
                                    </div>
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="row fv-row mb-7">
                                    <!--begin::Label-->
                                    <label class="col-md-3 text-md-end">@lang('dashboard.send_to')</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-md-9">
                                        <select name="user_type" aria-label="Select a Currency" data-control="select2"
                                            data-placeholder="@lang('dashboard.send_to')"
                                            class="form-select form-select-solid form-select-lg select2-hidden-accessible"
                                            data-select2-id="select2-data-19-dyeg" tabindex="-1" aria-hidden="true">
                                            <option value="" data-select2-id="select2-data-21-t9jb">
                                                @lang('dashboard.send_to')</option>
                                            <option value="all_users">كل المستخدمين</option>
                                        </select>
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Action buttons-->
                                <div class="row py-5">
                                    <div class="col-md-9 offset-md-3">
                                        <div class="d-flex">
                                            <!--begin::Button-->
                                            <button type="reset" data-kt-ecommerce-settings-type="cancel"
                                                class="btn btn-light me-3">@lang('dashboard.cancel')</button>
                                            <!--end::Button-->
                                            <!--begin::Button-->
                                            <button type="submit" id="kt_ecommerce_add_product_submit"
                                                data-kt-ecommerce-settings-type="submit" class="btn btn-primary">
                                                <span class="indicator-label">@lang('dashboard.save_changes')</span>
                                                <span class="indicator-progress">@lang('dashboard.please_wait')
                                                    <span
                                                        class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                            </button>
                                            <!--end::Button-->
                                        </div>
                                    </div>
                                </div>
                                <!--end::Action buttons-->
                                <div>

                                </div>
                            </form>
                            <!--end::Form-->
                        </div>
                        <!--end:::Tab pane-->
                     


                    </div>
                    <!--end:::Tab content-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Content container-->
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $(document).on('submit', '.notify-form', function(e) {
                e.preventDefault();
                var url = $(this).attr('action')
                $.ajax({
                    url: url,
                    method: 'post',
                    data: new FormData($(this)[0]),
                    dataType: 'json',
                    processData: false,
                    contentType: false,
                    beforeSend: function() {
                        $(".send-notify-button").html(
                            '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>'
                            ).attr('disable', true)
                    },
                    success: (response) => {
                        $(".text-danger").remove()
                        $('.store input').removeClass('border-danger')
                        $(".send-notify-button").html("ارسال").attr('disable', false)
                        Swal.fire({
                            position: 'top-start',
                            type: 'success',
                            title: 'تمت الارسال بنجاح',
                            showConfirmButton: false,
                            timer: 1500,
                            confirmButtonClass: 'btn btn-primary',
                            buttonsStyling: false,
                        })
                        $(this).trigger("reset")
                    },
                    error: function(xhr) {
                        $(".send-notify-button").html("ارسال").attr('disable', false)
                        $(".text-danger").remove()
                        $('.store input').removeClass('border-danger')

                        $.each(xhr.responseJSON.errors, function(key, value) {
                            $('.store input[name=' + key + ']').addClass(
                                'border-danger')
                            $('.store input[name=' + key + ']').after(
                                `<span class="mt-5 text-danger">${value}</span>`);
                            $('.store select[name=' + key + ']').after(
                                `<span class="mt-5 text-danger">${value}</span>`);
                        });
                    },
                });

            });
        });
    </script>
@endsection
