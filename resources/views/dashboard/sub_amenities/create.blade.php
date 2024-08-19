@extends('dashboard.layouts.app')
@section('pageTitle', isset($subAmenity) ? 'تعديل ميزات العقار' : 'إنشاء ميزات العقار')

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
                <form id="kt_ecommerce_add_product_form" action="{{ isset($subAmenity) ? route('sub-amenities.update', $subAmenity->id) : route('sub-amenities.store') }}" method="POST"
                    class="form d-flex flex-column flex-lg-row store" data-kt-redirect="{{route('sub-amenities.index')}}" enctype='multipart/form-data'>

                    @csrf
                    @if(isset($subAmenity))
                        @method('PUT')
                    @endif
                    <!--begin::Main column-->
                    <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                        <!--begin:::Tabs-->
                        <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-bold mb-n2">
                            <!--begin:::Tab item-->
                            <li class="nav-item">
                                <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab" href="#kt_ecommerce_add_sub_amenity">عام</a>
                            </li>
                            <!--end:::Tab item-->
                        </ul>
                        <!--end:::Tabs-->
                        <!--begin::Tab content-->
                        <div class="tab-content">
                            <!--begin::Tab pane-->
                            <div class="tab-pane fade show active" id="kt_ecommerce_add_sub_amenity" role="tabpanel">
                                <div class="d-flex flex-column gap-7 gap-lg-10">
                                    <!--begin::General options-->
                                    <div class="card card-flush py-4">
                                        <!--begin::Card header-->
                                        <div class="card-header">
                                            <div class="card-title">
                                                <h2>عام</h2>
                                            </div>
                                        </div>
                                        <!--end::Card header-->
                                        <!--begin::Card body-->
                                        <div class="card-body pt-0">
                                            <!--begin::Input group-->
                                            <div class="mb-10 fv-row">
                                                <!--begin::Label-->
                                                <label class="required form-label">الميزة الأساسية</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <select name="primary_amenity_id" class="form-select mb-2">
                                                    @foreach($primaryAmenities as $primaryAmenity)
                                                        <option value="{{ $primaryAmenity->id }}" {{ isset($subAmenity) && $subAmenity->primary_amenity_id == $primaryAmenity->id ? 'selected' : '' }}>
                                                            {{ $primaryAmenity->name }} / {{ $primaryAmenity->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->

                                            <!--begin::Input group-->
                                            <div class="mb-5 fv-row">
                                                <!--begin::Label-->
                                                <label class="required form-label">الاسم</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <div class="row">
                                                    <div class="col-6">
                                                        <input type="text" name="name[ar]" value="{{ old('name.ar', isset($subAmenity) ? $subAmenity->getTranslation('name', 'ar') : '') }}" class="form-control mb-2" placeholder="الاسم بالعربية" />
                                                    </div>
                                                    <div class="col-6">
                                                        <input type="text" name="name[en]" value="{{ old('name.en', isset($subAmenity) ? $subAmenity->getTranslation('name', 'en') : '') }}" class="form-control mb-2" placeholder="الاسم بالإنجليزية" />
                                                    </div>
                                                </div>
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->

                                            <!--begin::Input group-->
                                            <div class="mb-10 fv-row">
                                                <!--begin::Label-->
                                                <label class="required form-label">النوع</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <select name="type" id="type" class="form-select mb-2">
                                                    <option value="numeric" {{ old('type', isset($subAmenity) && $subAmenity->type == 'numeric' ? 'selected' : '') }}>رقمي</option>
                                                    <option value="select" {{ old('type', isset($subAmenity) && $subAmenity->type == 'select' ? 'selected' : '') }}>اختيار</option>
                                                    <option value="multiselect" {{ old('type', isset($subAmenity) && $subAmenity->type == 'multiselect' ? 'selected' : '') }}>متعدد</option>
                                                    <option value="boolean" {{ old('type', isset($subAmenity) && $subAmenity->type == 'boolean' ? 'selected' : '') }}>نعم/لا</option>
                                                    <option value="dimension" {{ old('type', isset($subAmenity) && $subAmenity->type == 'dimension' ? 'selected' : '') }}>الأبعاد</option>
                                                </select>
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->

                                           <!--begin::Input group-->
                                            <div class="mb-10 fv-row" id="options-group" style="{{ old('type', isset($subAmenity) && ($subAmenity->type == 'select' || $subAmenity->type == 'multiselect') ? 'block' : 'none') }}">
                                                <!--begin::Label-->
                                                <label class="form-label">الخيارات</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <div id="options-container">
                                                    <!-- Options will be appended here dynamically -->
                                                    @if(old('options.ar') || isset($subAmenity) && ($subAmenity->type == 'select' || $subAmenity->type == 'multiselect'))
                                                        @foreach(old('options.ar', $subAmenity->options ?? []) as $index => $option)
                                                            <div class="d-flex mb-2">
                                                                <input type="text" name="options[ar][]" class="form-control me-2" placeholder="الخيار بالعربية" value="{{ old('options.ar.' . $index, $option->getTranslations('name')['ar'] ?? '') }}" />
                                                                <input type="text" name="options[en][]" class="form-control" placeholder="الخيار بالإنجليزية" value="{{ old('options.en.' . $index, $option->getTranslations('name')['en'] ?? '') }}" />
                                                                <button type="button" class="btn btn-danger ms-2 remove-option">-</button>
                                                            </div>
                                                        @endforeach
                                                    @endif
                                                </div>
                                                <button type="button" class="btn btn-primary" id="add-option">+</button>
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->


                                            <!--begin::Input group-->
                                            <div class="mb-10 fv-row">
                                                <!--begin::Label-->
                                                <label class="required form-label">مطلوب</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <select name="is_required" class="form-select mb-2">
                                                    <option value="1" {{ old('is_required', isset($subAmenity) && $subAmenity->is_required ? 'selected' : '') }}>نعم</option>
                                                    <option value="0" {{ old('is_required', isset($subAmenity) && !$subAmenity->is_required ? 'selected' : '') }}>لا</option>
                                                </select>
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                        <!--end::Card body-->
                                    </div>
                                    <!--end::General options-->
                                </div>
                            </div>
                            <!--end::Tab pane-->
                        </div>
                        <!--end::Tab content-->
                        <div class="d-flex justify-content-end">
                            <!--begin::Button-->
                            <a href="{{ route('sub-amenities.index') }}" id="kt_ecommerce_add_product_cancel"
                                class="btn btn-light me-5">إلغاء</a>
                            <!--end::Button-->
                            <!--begin::Button-->
                            <button type="submit" id="kt_ecommerce_add_product_submit" class="btn btn-primary">
                                <span class="indicator-label">حفظ التغييرات</span>
                                <span class="indicator-progress">الرجاء الانتظار
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

@endsection
@section('scripts')
    <script>
        document.getElementById('type').addEventListener('change', function () {
            var type = this.value;
            var optionsGroup = document.getElementById('options-group');
            if (type === 'select' || type === 'multiselect') {
                optionsGroup.style.display = 'block';
            } else {
                optionsGroup.style.display = 'none';
                document.getElementById('options-container').innerHTML = '';
            }
        });

        document.getElementById('add-option').addEventListener('click', function () {
            var optionsContainer = document.getElementById('options-container');
            var newOption = document.createElement('div');
            newOption.className = 'd-flex mb-2';
            newOption.innerHTML = `
                <input type="text" name="options[ar][]" class="form-control me-2" placeholder="الخيار بالعربية" />
                <input type="text" name="options[en][]" class="form-control" placeholder="الخيار بالإنجليزية" />
                <button type="button" class="btn btn-danger ms-2 remove-option">-</button>
            `;
            optionsContainer.appendChild(newOption);
        });

        document.addEventListener('click', function (e) {
            if (e.target && e.target.classList.contains('remove-option')) {
                e.target.closest('.d-flex').remove();
            }
        });

        document.addEventListener('DOMContentLoaded', function () {
            var type = document.getElementById('type').value;
            if (type === 'select' || type === 'multiselect') {
                document.getElementById('options-group').style.display = 'block';
            }
        });
    </script>
@endsection