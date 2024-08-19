@extends('dashboard.layouts.app')
@section('pageTitle' , isset($bookingCondition) ? __('dashboard.edit_title', ['page_title' => __('dashboard.booking-conditions')]) : __('dashboard.create_title', ['page_title' => __('dashboard.bookingCondition')]))

@section('content')


    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Toolbar-->
        <div class="toolbar" id="kt_toolbar">
           
        </div>
        <!--end::Toolbar-->
        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container-xxl">
                <!--begin::Form-->
                <form id="kt_ecommerce_add_product_form" action="{{ isset($bookingCondition) ? route('booking-conditions.update', $bookingCondition->id) : route('booking-conditions.store') }}" method="POST"
                    class="form d-flex flex-column flex-lg-row store" data-kt-redirect="{{route('booking-conditions.index')}}" enctype='multipart/form-data'>

            


                    @csrf
                    @if(isset($bookingCondition))
                        @method('PUT')
                    @endif
                 
                    <!--begin::Main column-->
                    <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                        <!--begin:::Tabs-->
                        <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-bold mb-n2">
                            <!--begin:::Tab item-->
                            <li class="nav-item">
                                <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab"
                                    href="#kt_ecommerce_add_product_ar">@lang('dashboard.AR')</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-active-primary pb-4 " data-bs-toggle="tab"
                                    href="#kt_ecommerce_add_product_en">@lang('dashboard.EN')</a>
                            </li>
                            <!--end:::Tab item-->
                        </ul>
                        <!--end:::Tabs-->
                        <!--begin::Tab content-->
                        <div class="tab-content">
                            <!--begin::Tab pane-->
                            <div class="tab-pane fade show active" id="kt_ecommerce_add_product_ar" role="tab-panel">
                                <div class="d-flex flex-column gap-7 gap-lg-10">
                                    <!--begin::General options-->
                                    <div class="card card-flush py-4">
                                        <!--begin::Card header-->
                                        <div class="card-header">
                                            <div class="card-title">
                                                <h2>@lang('dashboard.arabic_data')</h2>
                                            </div>
                                        </div>
                                        <!--end::Card header-->
                                        <!--begin::Card body-->
                                        <div class="card-body pt-0">
                                            <!--begin::Input group-->
                                            <div class="mb-10 fv-row">
                                                <!--begin::Label-->
                                                <label class="required form-label">@lang('dashboard.name')</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" name="name[ar]" value="{{ old('name.ar', isset($bookingCondition) ? $bookingCondition->getTranslations('name')['ar'] : '') }}"
                                                    class="form-control mb-2" placeholder="@lang('dashboard.name')"
                                                    />
                                                <!--end::Input-->
                                                <!--begin::Description-->
                                                <div class="text-muted fs-7">@lang('dashboard.name_desc' , ['page_title' => __('dashboard.booking-conditions')])</div>
                                                <!--end::Description-->
                                            </div>
                                            <!--end::Input group-->
                                 
                                            <!--begin::Input group-->
                                            <div>
                                                <!--begin::Label-->
                                                <label class="form-label">@lang('dashboard.description')</label>
                                                <!--end::Label-->
                                                <!--begin::Editor-->
                                                <textarea id="kt_ecommerce_add_product_description_ar" name="desc[ar]" class="form-control form-control-solid"
                                                    style="height: 249px;">{{ old('desc.ar', isset($bookingCondition) && $bookingCondition->desc ? $bookingCondition->getTranslations('desc')['ar'] : '') }}</textarea>
                                                <!--end::Editor-->
                                                <!--begin::Description-->
                                                <div class="text-muted fs-7">@lang('dashboard.desc_requirments' ,['page_title' => __('dashboard.booking-conditions')])</div>
                                                <!--end::Description-->
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                        <!--end::Card header-->
                                    </div>
                                    <!--end::General options-->
                                </div>
                            </div>
                            <!--end::Tab pane-->
                      
                            <!--begin::Tab pane-->
                            <div class="tab-pane fade" id="kt_ecommerce_add_product_en" role="tab-panel">
                                <div class="d-flex flex-column gap-7 gap-lg-10">
                                    <!--begin::Inventory-->
                                    <div class="card card-flush py-4">
                                        <!--begin::Card header-->
                                        <div class="card-header">
                                            <div class="card-title">
                                                <h2>@lang('dashboard.english_data')</h2>
                                            </div>
                                        </div>
                                        <!--end::Card header-->
                                        <!--begin::Card body-->
                                        <div class="card-body pt-0">
                                            <!--begin::Input group-->
                                            <div class="mb-10 fv-row">
                                                <!--begin::Label-->
                                                <label class="required form-label">@lang('dashboard.name')</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" name="name[en]" value="{{ old('name.en', isset($bookingCondition) ? $bookingCondition->getTranslations('name')['en'] : '') }}"
                                                    class="form-control mb-2" placeholder="@lang('dashboard.name')"
                                                    />
                                                <!--end::Input-->
                                                <!--begin::Description-->
                                                <div class="text-muted fs-7">@lang('dashboard.name_desc' , ['page_title' => __('dashboard.booking-conditions')])</div>
                                                <!--end::Description-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div>
                                                <!--begin::Label-->
                                                <label class="form-label">@lang('dashboard.description')</label>
                                                <!--end::Label-->
                                                <!--begin::Editor-->
                                                <textarea id="kt_ecommerce_add_product_description_en" name="desc[en]" class="form-control form-control-solid"
                                                    style="height: 249px;">{{ old('desc.en', isset($bookingCondition) && $bookingCondition->desc ? $bookingCondition->getTranslations('desc')['en'] : '') }}</textarea>
                                                <!--end::Editor-->
                                                <!--begin::Description-->
                                                <div class="text-muted fs-7">@lang('dashboard.desc_requirments' ,['page_title' => __('dashboard.booking-conditions')])</div>
                                                <!--end::Description-->
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                        <!--end::Card header-->
                                    </div>
                                    <!--end::Inventory-->
                                </div>
                            </div>
                            <!--end::Tab pane-->
                        </div>
                        <!--end::Tab content-->
                        <div class="d-flex justify-content-end">
                            <!--begin::Button-->
                            <a href="{{ route('cities.index') }}" id="kt_ecommerce_add_bookingCondition_cancel"
                                class="btn btn-light me-5">@lang('dashboard.cancel')</a>
                            <!--end::Button-->
                            <!--begin::Button-->
                            <button type="submit" id="kt_ecommerce_add_product_submit" class="btn btn-primary">
                                <span class="indicator-label">@lang('dashboard.save_changes')</span>
                                <span class="indicator-progress">@lang('dashboard.please_wait')
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                            <!--end::Button-->
                        </div>
                    </div>
                    <!--end::Main column-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Post-->
    </div>
    <!--end::Content-->
@section('scripts')
@endsection

@endsection
