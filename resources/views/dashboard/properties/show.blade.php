@extends('dashboard.layouts.app')
@section('pageTitle' , __('dashboard.properties'))

@section('content')


<!--begin::Post-->
<div class="post d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
    <div id="kt_content_container" class="container-xxl">
        <!--begin::Category-->
        <div class="card card-flush">
            <!--begin::Card header-->
            <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                <!--begin::Card title-->
                <div class="card-title">
                    <!--begin::Search-->
                    <div class="d-flex align-items-center position-relative my-1">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                      
                        <!--end::Svg Icon-->
                        <h4>تفاصيل العقار</h4>
                    </div>
                    <!--end::Search-->
                </div>
                <!--end::Card title-->
                <div class="card-toolbar">
                    <?php $i=1; ?>
                    @if($property->is_active==1)
                    تمت الموافقة
                    @elseif($property->is_active==2)
                    تم الرفض
                    @else
                    @can('properties.edit')  
                    <button type="button" class="btn btn-primary" data-toggle="modal"
                    data-target="#status{{$i}}">
                    <i class="fa fa-link"></i>
                    اجراء
                   </button>
                    @endcan                                 
                    @endif 
                    @include('dashboard.properties.model')

                  
                 
                </div>
                <!--end::Card toolbar-->
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body pt-0">
                <div class="card-body p-0">
                  <!--begin:::Tabs-->
                <ul class="nav nav-tabs nav-line-tabs nav-line-tabs-2x border-transparent fs-4 fw-semibold mb-15" role="tablist">
                    <!--begin:::Tab item-->
                    <li class="nav-item" role="presentation">
                        <a class="nav-link text-active-primary pb-5 active" data-bs-toggle="tab" href="#kt_ecommerce_settings_general" aria-selected="true" role="tab">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen001.svg-->
                        <span class="svg-icon svg-icon-2 me-2">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11 2.375L2 9.575V20.575C2 21.175 2.4 21.575 3 21.575H9C9.6 21.575 10 21.175 10 20.575V14.575C10 13.975 10.4 13.575 11 13.575H13C13.6 13.575 14 13.975 14 14.575V20.575C14 21.175 14.4 21.575 15 21.575H21C21.6 21.575 22 21.175 22 20.575V9.575L13 2.375C12.4 1.875 11.6 1.875 11 2.375Z" fill="currentColor"></path>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->المعلومات الرئيسية</a>
                    </li>
                    <!--end:::Tab item-->
                   
                    <!--begin:::Tab item-->
                    <li class="nav-item" role="presentation">
                        <a class="nav-link text-active-primary pb-5" data-bs-toggle="tab" href="#kt_ecommerce_settings_localization" aria-selected="false" role="tab" tabindex="-1">
                        <!--begin::Svg Icon | path: icons/duotune/maps/map004.svg-->
                        <span class="svg-icon svg-icon-2 me-2">
                            <span class="menu-icon">
                                <img src="{{ asset('images/cities.png') }}" style="width:25px;height:25px">
                            </span>
                        </span>
                        <!--end::Svg Icon--> @lang('dashboard.property address')</a>
                    </li>
                    <!--end:::Tab item-->
                    <!--begin:::Tab item-->
                    <li class="nav-item" role="presentation">
                        <a class="nav-link text-active-primary pb-5" data-bs-toggle="tab" href="#kt_ecommerce_settings_products" aria-selected="false" role="tab" tabindex="-1">
                        <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm005.svg-->
                        <span class="menu-icon">
                            <img src="{{ asset('images/primary-amenities.png') }}" style="width:25px;height:25px">
                        </span>
                        <!--end::Svg Icon-->@lang('dashboard.primary-amenities')</a>
                    </li>
                    <!--end:::Tab item-->
                    <!--begin:::Tab item-->
                    <li class="nav-item" role="presentation">
                        <a class="nav-link text-active-primary pb-5" data-bs-toggle="tab" href="#kt_ecommerce_settings_features" aria-selected="false" role="tab" tabindex="-1">
                        <!--begin::Svg Icon | path: icons/duotune/communication/com014.svg-->
                        <span class="menu-icon">
                            <img src="{{ asset('images/property-features.png') }}" style="width:25px;height:25px">
                        </span>
                       
                        <!--end::Svg Icon--> @lang('dashboard.property-features')</a>
                    </li>
                    <!--end:::Tab item-->
                      <!--begin:::Tab item-->
                      <li class="nav-item" role="presentation">
                        <a class="nav-link text-active-primary pb-5" data-bs-toggle="tab" href="#kt_ecommerce_settings_condition" aria-selected="false" role="tab" tabindex="-1">
                        <!--begin::Svg Icon | path: icons/duotune/communication/com014.svg-->
                        <span class="menu-icon">
                            <img src="{{ asset('images/terms-and-conditions.png') }}" style="width:25px;height:25px">
                        </span>
                        <!--end::Svg Icon-->@lang('dashboard.booking-conditions')</a>
                    </li>
                    <!--end:::Tab item-->
                      <!--begin:::Tab item-->
                      <li class="nav-item" role="presentation">
                        <a class="nav-link text-active-primary pb-5" data-bs-toggle="tab" href="#kt_ecommerce_settings_image" aria-selected="false" role="tab" tabindex="-1">
                        <!--begin::Svg Icon | path: icons/duotune/communication/com014.svg-->
                        <span class="menu-icon">
                            <img src="{{ asset('images/setting.png') }}" style="width:25px;height:25px">
                        </span>
                        <!--end::Svg Icon-->@lang('dashboard.Images Property')</a>
                    </li>
                    <!--end:::Tab item-->
                    
                </ul>
                <!--end:::Tabs-->
                <!--begin:::Tab content-->
                <div class="tab-content" id="myTabContent">
                    <!--begin:::Tab pane-->
                    <div class="tab-pane fade active show" id="kt_ecommerce_settings_general" role="tabpanel">
                            <!--begin::Form-->
                                <!--begin::Heading-->
                                <div class="row mb-7">
                                    <div class="col-md-9 offset-md-3">
                                        <h2>المعلومات الاساسية</h2>
                                    </div>
                                </div>
                                <!--end::Heading-->

                                    <!--begin::Input group-->
                                    <div class="row fv-row mb-7 fv-plugins-icon-container">
                                        <div class="col-md-3 text-md-end">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                <span class="required">@lang('dashboard.client') </span>
                                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" aria-label="Set the title of the store for SEO." data-kt-initialized="1"></i>
                                            </label>
                                            <!--end::Label-->
                                        </div>
                                        <div class="col-md-9">
                                            <!--begin::Input-->
                                            <input disabled type="text" class="form-control form-control-solid" name="app_name_en" value="{{$property->user->name}}">
                                            <!--end::Input-->
                                        <div class="fv-plugins-message-container invalid-feedback"></div></div>
                                    </div>
                                    <!--end::Input group-->
                               
                                <!--begin::Input group-->
                                <div class="row fv-row mb-7 fv-plugins-icon-container">
                                    <div class="col-md-3 text-md-end">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-semibold form-label mt-3">
                                            <span class="required">@lang('dashboard.title') (@lang('dashboard.ar'))</span>
                                            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" aria-label="Set the title of the store for SEO." data-kt-initialized="1"></i>
                                        </label>
                                        <!--end::Label-->
                                    </div>
                                    <div class="col-md-9">
                                        <!--begin::Input-->
                                        <input disabled type="text" class="form-control form-control-solid" name="app_name_en" value="{{$property->getTranslation('title', 'ar')}}">
                                        <!--end::Input-->
                                    <div class="fv-plugins-message-container invalid-feedback"></div></div>
                                </div>
                                <!--end::Input group-->
    
                                 <!--begin::Input group-->
                                 <div class="row fv-row mb-7 fv-plugins-icon-container">
                                    <div class="col-md-3 text-md-end">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-semibold form-label mt-3">
                                            <span class="required">@lang('dashboard.title') (@lang('dashboard.en'))</span>
                                            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" aria-label="Set the title of the store for SEO." data-kt-initialized="1"></i>
                                        </label>
                                        <!--end::Label-->
                                    </div>
                                    <div class="col-md-9">
                                        <!--begin::Input-->
                                        <input disabled type="text" class="form-control form-control-solid" name="app_name_en" value="{{$property->getTranslation('title', 'en')}}">
                                        <!--end::Input-->
                                    <div class="fv-plugins-message-container invalid-feedback"></div></div>
                                </div>
                                <!--end::Input group-->
    
                                  <!--begin::Input group-->
                                  <div class="row fv-row mb-7 fv-plugins-icon-container">
                                    <div class="col-md-3 text-md-end">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-semibold form-label mt-3">
                                            <span class="required">@lang('dashboard.check_in_time')</span>
                                            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" aria-label="Set the title of the store for SEO." data-kt-initialized="1"></i>
                                        </label>
                                        <!--end::Label-->
                                    </div>
                                    <div class="col-md-9">
                                        <!--begin::Input-->
                                        <input disabled type="text" class="form-control form-control-solid" name="app_name_en" value="{{$property->check_in_time}}">
                                        <!--end::Input-->
                                    <div class="fv-plugins-message-container invalid-feedback"></div></div>
                                </div>
                                <!--end::Input group-->
                                 <!--begin::Input group-->
                                 <div class="row fv-row mb-7 fv-plugins-icon-container">
                                    <div class="col-md-3 text-md-end">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-semibold form-label mt-3">
                                            <span class="required">@lang('dashboard.check_out_time')</span>
                                            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" aria-label="Set the title of the store for SEO." data-kt-initialized="1"></i>
                                        </label>
                                        <!--end::Label-->
                                    </div>
                                    <div class="col-md-9">
                                        <!--begin::Input-->
                                        <input disabled type="text" class="form-control form-control-solid" name="app_name_en" value="{{$property->check_out_time}}">

                                        <!--end::Input-->
                                    <div class="fv-plugins-message-container invalid-feedback"></div></div>
                                </div>
                                <!--end::Input group-->
                                 <!--begin::Input group-->
                                 <div class="row fv-row mb-7 fv-plugins-icon-container">
                                    <div class="col-md-3 text-md-end">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-semibold form-label mt-3">
                                            <span class="required">@lang('dashboard.rate_per_day')</span>
                                            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" aria-label="Set the title of the store for SEO." data-kt-initialized="1"></i>
                                        </label>
                                        <!--end::Label-->
                                    </div>
                                    <div class="col-md-9">
                                        <!--begin::Input-->
                                        <input disabled type="text" class="form-control form-control-solid" name="app_name_en" value="{{$property->rate_per_day}}">
                                        <!--end::Input-->
                                    <div class="fv-plugins-message-container invalid-feedback"></div></div>
                                </div>
                                <!--end::Input group-->
                                  <!--begin::Input group-->
                                  <div class="row fv-row mb-7 fv-plugins-icon-container">
                                    <div class="col-md-3 text-md-end">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-semibold form-label mt-3">
                                            <span class="">@lang('dashboard.property description') (@lang('dashboard.ar'))</span>
                                            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" aria-label="Set the title of the store for SEO." data-kt-initialized="1"></i>
                                        </label>
                                        <!--end::Label-->
                                    </div>
                                    <div class="col-md-9">
                                        <!--begin::Input-->
                                        <input disabled type="text" class="form-control form-control-solid" name="app_name_en" value="{{$property->getTranslation('description', 'ar')}}">
                                        <!--end::Input-->
                                    <div class="fv-plugins-message-container invalid-feedback"></div></div>
                                </div>
                                <!--end::Input group-->
    
                                 <!--begin::Input group-->
                                 <div class="row fv-row mb-7 fv-plugins-icon-container">
                                    <div class="col-md-3 text-md-end">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-semibold form-label mt-3">
                                            <span class="">@lang('dashboard.property description') (@lang('dashboard.en'))</span>
                                            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" aria-label="Set the title of the store for SEO." data-kt-initialized="1"></i>
                                        </label>
                                        <!--end::Label-->
                                    </div>
                                    <div class="col-md-9">
                                        <!--begin::Input-->
                                        <input disabled type="text" class="form-control form-control-solid" name="app_name_en" value="{{$property->getTranslation('description', 'en')}}">
                                        <!--end::Input-->
                                    <div class="fv-plugins-message-container invalid-feedback"></div></div>
                                </div>
                                <!--end::Input group-->
                             
                               
                               
                             <div></div>
                        
                        
                    </div>
                    <div class="tab-pane fade  show" id="kt_ecommerce_settings_localization" role="tabpanel">
                        <!--begin::Form-->
                            <!--begin::Heading-->
                            <div class="row mb-7">
                                <div class="col-md-9 offset-md-3">
                                    <h2>@lang('dashboard.property address')</h2>
                                </div>
                            </div>
                            <!--end::Heading-->
                           
                            <!--begin::Input group-->
                            <div class="row fv-row mb-7 fv-plugins-icon-container">
                                <div class="col-md-3 text-md-end">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-semibold form-label mt-3">
                                        <span class="required">عنوان العقار</span>
                                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" aria-label="Set the title of the store for SEO." data-kt-initialized="1"></i>
                                    </label>
                                    <!--end::Label-->
                                </div>
                                <div class="col-md-9">
                                    <!--begin::Input-->
                                    <input disabled type="text" class="form-control form-control-solid" name="app_name_en" value="{{$property->address}}">
                                    <!--end::Input-->
                                <div class="fv-plugins-message-container invalid-feedback"></div></div>
                            </div>
                            <!--end::Input group-->

                             <!--begin::Input group-->
                             <div class="row fv-row mb-7 fv-plugins-icon-container">
                                <div class="col-md-3 text-md-end">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-semibold form-label mt-3">
                                        <span class="required">مدينة العقار</span>
                                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" aria-label="Set the title of the store for SEO." data-kt-initialized="1"></i>
                                    </label>
                                    <!--end::Label-->
                                </div>
                                <div class="col-md-9">
                                    <!--begin::Input-->
                                    <input disabled type="text" class="form-control form-control-solid" name="app_name_en" value="{{$property->city->name}}">
                                    <!--end::Input-->
                                <div class="fv-plugins-message-container invalid-feedback"></div></div>
                            </div>
                            <!--end::Input group-->

                              <!--begin::Input group-->
                              <div class="row fv-row mb-7 fv-plugins-icon-container">
                                <div class="col-md-3 text-md-end">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-semibold form-label mt-3">
                                        <span class="required">حى العقار</span>
                                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" aria-label="Set the title of the store for SEO." data-kt-initialized="1"></i>
                                    </label>
                                    <!--end::Label-->
                                </div>
                                <div class="col-md-9">
                                    <!--begin::Input-->
                                    <input disabled type="text" class="form-control form-control-solid" name="app_name_en" value="{{$property->neighborhood->name}}">
                                    <!--end::Input-->
                                <div class="fv-plugins-message-container invalid-feedback"></div></div>
                            </div>
                            <!--end::Input group-->
                             <!--begin::Input group-->
                             <div class="row fv-row mb-7 fv-plugins-icon-container">
                                <div class="col-md-3 text-md-end">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-semibold form-label mt-3">
                                        <span class="required">إتجاة العقار</span>
                                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" aria-label="Set the title of the store for SEO." data-kt-initialized="1"></i>
                                    </label>
                                    <!--end::Label-->
                                </div>
                                <div class="col-md-9">
                                    <!--begin::Input-->
                                    @if($property->direction == 'north')
                                     @lang('dashboard.north')
                                    @elseif($property->direction == 'south')
                                    @lang('dashboard.south')

                                    @elseif($property->direction == 'east')
                                    @lang('dashboard.east')

                                    @elseif($property->direction == 'west')
                                    @lang('dashboard.west')


                                    @endif
                                    <!--end::Input-->
                                <div class="fv-plugins-message-container invalid-feedback"></div></div>
                            </div>
                            <!--end::Input group-->
                             <!--begin::Input group-->
                             <div class="row fv-row mb-7 fv-plugins-icon-container">
                                <div class="col-md-3 text-md-end">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-semibold form-label mt-3">
                                        <span class="required">العنوان على الخريطة</span>
                                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" aria-label="Set the title of the store for SEO." data-kt-initialized="1"></i>
                                    </label>
                                    <!--end::Label-->
                                </div>
                                <div class="col-md-9">
                                    <!--begin::Input-->
                                    <input disabled type="text" class="form-control form-control-solid" name="app_name_en" value="{{$property->map}}">
                                    <!--end::Input-->
                                <div class="fv-plugins-message-container invalid-feedback"></div></div>
                            </div>
                            <!--end::Input group-->
                         
                           
                           
                         <div></div>
                    
                        <!--end::Form-->
                    </div>
                    
                    <div class="tab-pane fade  show" id="kt_ecommerce_settings_products" role="tabpanel">
                        <div class="row mb-7">
                            <div class="col-md-9 offset-md-3">
                                <h2>@lang('dashboard.primary-amenities')</h2>
                            </div>

                        </div>
                        @foreach($property->primaryAmenities as $primaryAmenitie)

                            <!--begin::Input group-->
                            <div class="row fv-row mb-7 fv-plugins-icon-container">
                                <div class="col-md-3 text-md-end">
                                    <img src="{{ asset($primaryAmenitie->icon) }}"  style="width:60px;height:60px;border-radius:10px" alt="">

                                </div>
                                <div class="col-md-9">
                                    <!--begin::Input-->
                                    <input disabled type="text" class="form-control form-control-solid" name="app_name_en" value="{{$primaryAmenitie->name}}">
                                    <!--end::Input-->
                                <div class="fv-plugins-message-container invalid-feedback"></div></div>
                            </div>
                            <!--end::Input group-->
                            {{--  --}}
                            @foreach($property->Property_Sub_Amenity as $Property_Sub_Amenity)
                            @if($Property_Sub_Amenity->subAmenities->primary_amenity_id==$primaryAmenitie->id)
                            <div class="row fv-row mb-7 fv-plugins-icon-container">
                                <div class="col-md-3 text-md-end">

                                   
                                </div>
                                <div class="col-md-9">
                                    <!--begin::Input-->
                                    <input disabled type="text" class="form-control form-control-solid" name="app_name_en" value="{{$Property_Sub_Amenity->subAmenities->name}}  ( {{ $Property_Sub_Amenity->number }})">
                                    <!--end::Input-->
                                <div class="fv-plugins-message-container invalid-feedback"></div></div>
                            </div>


                            @endif


                            @endforeach


                            {{--  --}}
                        @endforeach
                    </div>


                    <div class="tab-pane fade  show" id="kt_ecommerce_settings_features" role="tabpanel">
                        <div class="row mb-7">
                            <div class="col-md-9 offset-md-3">
                                <h2>@lang('dashboard.property-features')</h2>
                            </div>

                        </div>
                        @foreach($property->propertyFeatures as $propertyFeature)

                            <!--begin::Input group-->
                            <div class="row fv-row mb-7 fv-plugins-icon-container">
                                <div class="col-md-3 text-md-end">
                                    <img src="{{ asset($propertyFeature->icon) }}"  style="width:60px;height:60px;border-radius:10px" alt="">

                                </div>
                                <div class="col-md-9">
                                    <!--begin::Input-->
                                    <input disabled type="text" class="form-control form-control-solid" name="app_name_en" value="{{$propertyFeature->name}}">
                                    <!--end::Input-->
                                <div class="fv-plugins-message-container invalid-feedback"></div></div>
                            </div>
                            <!--end::Input group-->
                        @endforeach

                    </div>

                    <div class="tab-pane fade  show" id="kt_ecommerce_settings_condition" role="tabpanel">
                        <div class="row mb-7">
                            <div class="col-md-9 offset-md-3">
                                <h2>@lang('dashboard.booking-conditions')</h2>
                            </div>

                        </div>
                        @foreach($property->propertyBookingConditions as $propertyBookingCondition)

                            <!--begin::Input group-->
                            <div class="row fv-row mb-7 fv-plugins-icon-container">
                                <div class="col-md-3 text-md-end">
                                    <img src="{{ asset($propertyBookingCondition->icon) }}"  style="width:60px;height:60px;border-radius:10px" alt="">

                                </div>
                                <div class="col-md-9">
                                    <!--begin::Input-->
                                    <input disabled type="text" class="form-control form-control-solid" name="app_name_en" value="{{$propertyBookingCondition->name}}">
                                    <!--end::Input-->
                                <div class="fv-plugins-message-container invalid-feedback"></div></div>
                            </div>
                            <!--end::Input group-->
                        @endforeach

                    </div>

                    <div class="tab-pane fade  show" id="kt_ecommerce_settings_image" role="tabpanel">
                        <div class="row mb-7">
                            <div class="col-md-9 offset-md-3">
                                <h2>@lang('dashboard.Images Property')</h2>
                            </div>

                        </div>
                        <div class="row fv-row mb-7 fv-plugins-icon-container">

                        @foreach($property->images as $image)

                            <!--begin::Input group-->
                                <div class="col-md-2 text-md-end">
                                    <img src="{{ asset($image->image) }}"  style="width:100px;height:100px;border-radius:10px" alt="">

                                </div>
                              
                            <!--end::Input group-->
                        @endforeach
                    </div>


                    </div>



                    


                    
                    <!--end:::Tab pane-->
                   
                 
                 
                </div>
                <!--end:::Tab content-->
                </div>           
             </div>
            <!--end::Card body-->
        </div>
        <!--end::Category-->
    </div>
    <!--end::Container-->
</div>
<!--end::Post-->
                    
@endsection
