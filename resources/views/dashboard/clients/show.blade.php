@extends('dashboard.layouts.app')
@section('pageTitle' , __('dashboard.clients'))

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
                        <h4>تفاصيل العميل</h4>
                    </div>
                    <!--end::Search-->
                </div>
                <!--end::Card title-->
                <div class="card-toolbar"> 
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
                        <a class="nav-link text-active-primary pb-5" data-bs-toggle="tab" href="#kt_ecommerce_settings_properties" aria-selected="false" role="tab" tabindex="-1">
                        <!--begin::Svg Icon | path: icons/duotune/maps/map004.svg-->
                        <span class="svg-icon svg-icon-2 me-2">
                            <span class="menu-icon">
                                <img src="{{ asset('images/properties.png') }}" style="width:25px;height:25px">
                            </span>
                        </span>
                        <!--end::Svg Icon--> @lang('dashboard.properties')</a>
                    </li>
                    <!--end:::Tab item-->
                
                 
                      <!--begin:::Tab item-->
                      <li class="nav-item" role="presentation">
                        <a class="nav-link text-active-primary pb-5" data-bs-toggle="tab" href="#kt_ecommerce_settings_bookings" aria-selected="false" role="tab" tabindex="-1">
                        <!--begin::Svg Icon | path: icons/duotune/communication/com014.svg-->
                        <span class="menu-icon">
                            <img src="{{ asset('images/booking.png') }}" style="width:25px;height:25px">
                        </span>
                        <!--end::Svg Icon-->@lang('dashboard.bookings')</a>
                    </li>
                    <!--end:::Tab item-->
                      <!--begin:::Tab item-->
                      <li class="nav-item" role="presentation">
                        <a class="nav-link text-active-primary pb-5" data-bs-toggle="tab" href="#kt_ecommerce_settings_payments" aria-selected="false" role="tab" tabindex="-1">
                        <!--begin::Svg Icon | path: icons/duotune/communication/com014.svg-->
                        <span class="menu-icon">
                            <img src="{{ asset('images/payment-method.png') }}" style="width:25px;height:25px">
                        </span>
                        <!--end::Svg Icon-->@lang('dashboard.payments')</a>
                    </li>
                    <!--end:::Tab item-->
                       <!--begin:::Tab item-->
                       <li class="nav-item" role="presentation">
                        <a class="nav-link text-active-primary pb-5" data-bs-toggle="tab" href="#kt_ecommerce_settings_bank_accounts" aria-selected="false" role="tab" tabindex="-1">
                        <!--begin::Svg Icon | path: icons/duotune/communication/com014.svg-->
                        <span class="menu-icon">
                            <img src="{{ asset('images/accounting.png') }}" style="width:25px;height:25px">
                        </span>
                       
                        <!--end::Svg Icon--> @lang('dashboard.bank_accounts')</a>
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
                                <div class="card-body border-top p-9">
                                    <!--begin::Input group-->
                                    <div class="row mb-6">
                                        <!--begin::Label-->
                                        <label class="col-lg-4 col-form-label fw-bold fs-6">الصورة</label>
                                        <!--end::Label-->
                                        <!--begin::Col-->
                                        <div class="col-lg-8">
                                            <!--begin::Image input-->
                                            <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: e url('assets/media/svg/avatars/blank.svg')">
                                                <!--begin::Preview existing avatar-->
                                                <div class="image-input-wrapper w-125px h-125px" style="background-image: @if(isset($client)) url({{$client->image}}) @else url(assets/media/avatars/300-1.jpg) @endif"></div>
                                                <!--end::Preview existing avatar-->
                                              
                                            </div>
                                            <!--end::Image input-->
                                            <!--begin::Hint-->
                                            <!--end::Hint-->
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="row mb-6">
                                        <!--begin::Label-->
                                        <label class="col-lg-4 col-form-label required fw-bold fs-6">اسم المستخدم</label>
                                        <!--end::Label-->
                                        <!--begin::Col-->
                                        <div class="col-lg-8">
                                            <!--begin::Row-->
                                                <!--begin::Col-->
                                                <div class="col-lg-12 fv-row fv-plugins-icon-container">
                                                    <input disabled type="text" name="name"  required class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="اسم المستخدم" value="{{ isset($client) ? $client->name : old('name') }}">
                                                <div class="fv-plugins-message-container invalid-feedback"></div></div>
                                                <!--end::Col-->
                                               
                                            <!--end::Row-->
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Input group-->
                                    
            
                                     <!--begin::Input group-->
                                     <div class="row mb-6 text-right">
                                        <!--begin::Label-->
                                        <label class="col-lg-4 col-form-label fw-bold fs-6">
                                            <span class="required">البريد الالكتروني</span>
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Col-->
                                        <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                            <input disabled style="text-align:right" required type="email" name="email" class="text-right form-control form-control-lg form-control-solid" placeholder="البريد الالكتروني" value="{{ isset($client) ? $client->email : old('email') }}">
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Input group-->
                                     <!--begin::Input group-->
                                     <div class="row mb-6 text-right">
                                        <!--begin::Label-->
                                        <label class="col-lg-4 col-form-label fw-bold fs-6">
                                            <span class="">رقم المستخدم</span>
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Col-->
                                        <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                            <input disabled style="text-align:right"  type="tel" name="phone"  class="text-right form-control form-control-lg form-control-solid" placeholder="رقم الهاتف" value="{{ isset($client) ? $client->phone : old('phone') }}">
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Input group-->
                                  
                                    
                                 <!--begin::Input group-->
                                 
                                   
                                    <!--begin::Input group-->
                                    <div class="row mb-0 mt-5">
                                        <!--begin::Label-->
                                        <label class="col-lg-4 col-form-label fw-bold fs-6">حساب مفعل</label>
                                        <!--begin::Label-->
                                        <!--begin::Label-->
                                        <div class="col-lg-8 d-flex align-items-center">
                                            <div class="form-check form-check-solid form-switch fv-row">
                                                <input disabled class="form-check-input w-45px h-30px" type="checkbox" 
                                                    @if(isset($client))
                                                        {{$client->is_active == '1' ? 'selected' : ''}}
                                                    @else 
                                                         {{old('is_active') == '1' ? 'selected' : ''}}
                                                    @endif
                                                id="is_active" name="is_active" checked="checked">
                                                <label class="form-check-label" for="is_active"></label>
                                            </div>
                                        </div>
                                        <!--begin::Label-->
                                    </div>
                              
                                </div>
                                <!--end::Card body-->

                                 
                               
                             <div></div>
                        
                        
                    </div>

                    <div class="tab-pane fade  show" id="kt_ecommerce_settings_properties" role="tabpanel">
                        {{--  --}}
                        <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_category_table">
                            <!--begin::Table head-->
                            <thead>
                                <!--begin::Table row-->
                                <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                    <th class="w-10px pe-2">
                                        <div class="form-check form-check-sm form-check-custom form-check-solid me-3" >
                                            <input class="form-check-input" id="checkedAll"  type="checkbox" data-kt-check="true" data-kt-check-target="#kt_ecommerce_category_table .form-check-input" value="1" />
                                        </div>
                                    </th>
                                    <th class="">العنوان</th>
                                    <th class="">@lang('dashboard.city')</th>
                                    <th class="">الحي</th>
                                    <th class="">الاتجاة</th>
                                    <th class="">العميل</th>
                                    <th class="">صورة</th>
                                    <th class="">الحالة</th>
        
                                    {{-- <th class="text-end min-w-70px">@lang('dashboard.actions')</th> --}}
                                </tr>
                                <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody class="fw-bold text-gray-600">
                                @foreach ($client->properties as $i=>$property)
                                    <!--begin::Table row-->
                                    <tr data-id="{{$property->id}}">
                                        <!--begin::Checkbox-->
                                        <td>
                                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                                <input class="form-check-input checkSingle" type="checkbox" value="1" id="{{$property->id}}"/>
                                            </div>
                                        </td>
                                        <!--end::Checkbox-->
                                        <!--begin::Property-->
                                        <td>
                                            <div class="d-flex">
                                                <div class="ms-5">
                                                    <!--begin::Title-->
                                                    <a href="{{ route('properties.show', $property->id) }}" class="text-gray-800 text-hover-primary fs-5 fw-bolder mb-1" data-kt-ecommerce-category-filter="category_name">{{$property->title}}</a>
                                                    <!--end::Title-->
                                                    <!--begin::Description-->
                                                    <div class="text-muted fs-7 fw-bolder">{{$property->description}}</div>
                                                    <!--end::Description-->
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <!--begin::City-->
                                            <div class="badge badge-light-success">{{$property->city->name}}</div>
                                            <!--end::City-->
                                        </td>
                                        <td>
                                            <!--begin::Neighborhood-->
                                            <div class="badge badge-light-success">{{$property->neighborhood->name}}</div>
                                            <!--end::Neighborhood-->
                                        </td>
                                        <td>
                                            <!--begin::Direction-->
                                            <div class="badge badge-light-success">{{ __('dashboard.' . $property->direction) }}</div>
                                            <!--end::Direction-->
                                        </td>
                                        <td>
                                            <!--begin::User-->
                                            <div class="badge badge-light-success">{{$property->user->name}}</div>
                                            <!--end::User-->
                                        </td>
                                        <td>
                                            @if($property->images->first())
                                                <img src="{{ asset($property->images->first()->image) }}"  style="width:60px;height:60px;border-radius:10px" alt="">
                                            @endif 
                                        </td>
                                        <td>
                                            @if($property->is_active==1)
                                            تمت الموافقة
                                            @elseif($property->is_active==2)
                                            تم الرفض
                                            @else
                                            @can('properties.edit')  
                                            <button type="button" class="btn btn-info pull-center" data-toggle="modal"
                                            data-target="#status{{$i}}">
                                            <i class="fa fa-link"></i>
                                            اجراء
                                           </button>
        
                                            {{-- <div class="menu-item px-3">
                                                <a href="{{route('properties.active', $property->id)}}" class="menu-link px-3">الموافقة</a>
                                            </div> --}}
                                            @endcan                                 
                                            @endif 
                                        </td>
                                        <!--begin::Actions=-->
                                        {{-- <td class="text-end">
                                            <a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                                الاجرائات
                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                            <span class="svg-icon svg-icon-5 m-0">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon--></a>
                                            <!--begin::Menu-->
                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
                                                <!--begin::Menu item-->
                                                @can('properties.edit')
                                                <div class="menu-item px-3">
                                                    <a href="{{route('properties.edit', $property->id)}}" class="menu-link px-3">تعديل</a>
                                                </div>
                                                <!--end::Menu item-->
                                                @endcan 
                                                <!--begin::Menu item-->
                                                @can('properties.destroy')
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3" data-kt-ecommerce-category-filter="delete_row" data-url="{{route('properties.destroy', $property->id)}}" data-id="{{$property->id}}">حذف</a>
                                                </div>
                                                <!--end::Menu item-->
                                                @endcan 
                                            </div>
                                            <!--end::Menu-->
                                        </td> --}}
                                        <!--end::Actions=-->
                                        
                                    </tr>
                                    <!--end::Table row-->
                                    {{--  --}}
                                    @include('dashboard.properties.model')
        
        
        
                                    {{--  --}}
                                @endforeach
                            </tbody>
                            <!--end::Table body-->
                        </table>
                        {{--  --}}
                    </div>
                    <div class="tab-pane fade  show" id="kt_ecommerce_settings_bookings" role="tabpanel">
                        <table class="table align-middle table-row-dashed fs-6 gy-10" id="kt_ecommerce_category_table">
                            <!--begin::Table head-->
                            <thead>
                                <!--begin::Table row-->
                                <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                    <th class="w-10px pe-2">
                                        <div class="form-check form-check-sm form-check-custom form-check-solid me-3" >
                                            <input class="form-check-input" id="checkedAll"  type="checkbox" data-kt-check="true" data-kt-check-target="#kt_ecommerce_category_table .form-check-input" value="1" />
                                        </div>
                                    </th>
                                    <th class="min-w-250px">اسم العقار</th>
                                    {{-- <th class="min-w-250px"> صاحب العقار</th> --}}
                                    <th class="min-w-250px"> المستاجر</th>
                                  
                                    <th class="min-w-250px">السعر</th>
                                    <th class="min-w-250px">حالةالدفع</th>
        
        
        
                                    <th class="text-end min-w-70px">@lang('dashboard.actions')</th>
                                </tr>
                                <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody class="fw-bold text-gray-600">
                                @foreach ($client->bookings as $booking)
                                    <!--begin::Table row-->
                                    <tr data-id="{{$booking->id}}">
                                        <!--begin::Checkbox-->
                                        <td>
                                            <div class="form-check form-check-sm form-check-custom form-check-solid ">
                                                <input class="form-check-input checkSingle" type="checkbox" value="1" id="{{$booking->id}}"/>
                                            </div>
                                        </td>
                                        <!--end::Checkbox-->
                                        <!--begin::Category=-->
                                        <td>
                                            <div class="d-flex">
                                                <div class="ms-5">
                                                    <!--begin::Title-->
                                                    <a href="{{ route('bookings.edit', $booking->id) }}" class="text-gray-800 text-hover-primary fs-5 fw-bolder mb-1" data-kt-ecommerce-category-filter="category_name">{{$booking->property->title}}</a>
                                                    <!--end::Title-->
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <!--begin::Badges-->
                                            <div class="d-flex align-items-center">
                                                {{$booking->client->name}}
                                            </div>
                                            <!--end::Badges-->
                                        </td>
                                      
                                        <td>{{$booking->total_price}}</td>
                                        <td>{{$booking->payment->status}}</td>
        
        
                                      
                                        <!--begin::Action=-->
                                        <td class="text-end">
                                            <a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">أجرائات
                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                            <span class="svg-icon svg-icon-5 m-0">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon--></a>
                                            <!--begin::Menu-->
                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
                                                <!--begin::Menu item-->
                                                @can('bookings.edit')
                                                <div class="menu-item px-3">
                                                    <a href="{{route('bookings.edit', $booking->id)}}" class="menu-link px-3">تعديل</a>
                                                </div>
                                                @endcan 
                                                <!--end::Menu item-->
                                                @can('bookings.destroy')
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3" data-kt-ecommerce-category-filter="delete_row" data-url="{{route('bookings.destroy', $booking->id)}}" data-id="{{$booking->id}}">حذف</a>
                                                </div>
                                                @endcan 
                                                <!--end::Menu item-->
                                            </div>
                                            <!--end::Menu-->
                                        </td>
                                        <!--end::Action=-->
                                    </tr>
                                    <!--end::Table row-->
                                @endforeach
                            </tbody>
                            <!--end::Table body-->
                        </table>
                    </div>

                    <div class="tab-pane fade  show" id="kt_ecommerce_settings_payments" role="tabpanel">
                        <table class="table align-middle table-row-dashed fs-6 gy-10" id="kt_ecommerce_category_table">
                            <!--begin::Table head-->
                            <thead>
                                <!--begin::Table row-->
                                <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                    <th class="w-10px pe-2">
                                        <div class="form-check form-check-sm form-check-custom form-check-solid me-3" >
                                            <input class="form-check-input" id="checkedAll"  type="checkbox" data-kt-check="true" data-kt-check-target="#kt_ecommerce_category_table .form-check-input" value="1" />
                                        </div>
                                    </th>
                                    <th class="min-w-250px">اسم العقار</th>
                                    {{-- <th class="min-w-250px"> صاحب العقار</th> --}}
                                    <th class="min-w-250px"> المستاجر</th>
                                  
                                    <th class="min-w-250px">السعر</th>
                                    <th class="min-w-250px">حالةالدفع 
        
                                    </th>
        
        
        
                                    <th class="text-end min-w-70px">@lang('dashboard.actions')</th>
                                </tr>
                                <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody class="fw-bold text-gray-600">
                                @foreach ($client->payments as $Payment)
                                    <!--begin::Table row-->
                                    <tr data-id="{{$Payment->id}}">
                                        <!--begin::Checkbox-->
                                        <td>
                                            <div class="form-check form-check-sm form-check-custom form-check-solid ">
                                                <input class="form-check-input checkSingle" type="checkbox" value="1" id="{{$Payment->id}}"/>
                                            </div>
                                        </td>
                                        <!--end::Checkbox-->
                                        <!--begin::Category=-->
                                        <td>
                                            <div class="d-flex">
                                                <div class="ms-5">
                                                    <!--begin::Title-->
                                                    <a href="{{ route('payments.edit', $Payment->id) }}" class="text-gray-800 text-hover-primary fs-5 fw-bolder mb-1" data-kt-ecommerce-category-filter="category_name">{{$Payment->booking->property->title}}</a>
                                                    <!--end::Title-->
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <!--begin::Badges-->
                                            <div class="d-flex align-items-center">
                                                {{$Payment->booking->client->name}}
                                            </div>
                                            <!--end::Badges-->
                                        </td>
                                      
                                        <td>{{$Payment->amount}}</td>
                                        <td>{{$Payment->status}}</td>
                                        @if($Payment->status=='pending')
                                        <td>
                                            @can('bookings.edit')
                                            <div class="menu-item px-3">
                                                <a href="{{route('payments.edit', $Payment->id)}}" class="menu-link px-3">الدفع</a>
                                            </div>
                                            @endcan 
                                        </td>
                                        @endif
        
        
        
        
                                      
                                        <!--begin::Action=-->
                                        {{-- <td class="text-end">
                                            <a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">أجرائات
                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                            <span class="svg-icon svg-icon-5 m-0">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon--></a>
                                            <!--begin::Menu-->
                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
                                                <!--begin::Menu item-->
                                                @can('bookings.edit')
                                                <div class="menu-item px-3">
                                                    <a href="{{route('bookings.edit', $booking->id)}}" class="menu-link px-3">تعديل</a>
                                                </div>
                                                @endcan 
                                                <!--end::Menu item-->
                                                @can('bookings.destroy')
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3" data-kt-ecommerce-category-filter="delete_row" data-url="{{route('bookings.destroy', $booking->id)}}" data-id="{{$booking->id}}">حذف</a>
                                                </div>
                                                @endcan 
                                                <!--end::Menu item-->
                                            </div>
                                            <!--end::Menu-->
                                        </td> --}}
                                        <!--end::Action=-->
                                    </tr>
                                    <!--end::Table row-->
                                @endforeach
                            </tbody>
                            <!--end::Table body-->
                        </table>
                    </div>
                    <div class="tab-pane fade  show" id="kt_ecommerce_settings_bank_accounts" role="tabpanel">
                        <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_category_table">
                            <!--begin::Table head-->
                            <thead>
                                <!--begin::Table row-->
                                <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                    <th class="w-10px pe-2">
                                        <div class="form-check form-check-sm form-check-custom form-check-solid me-3" >
                                            <input class="form-check-input" id="checkedAll"  type="checkbox" data-kt-check="true" data-kt-check-target="#kt_ecommerce_category_table .form-check-input" value="1" />
                                        </div>
                                    </th>
                                    <th class="min-w-150px">@lang('dashboard.name')</th>
                                    <th class="min-w-150px">البنك</th>
                                    <th class="min-w-150px">رقم الحساب</th>
        
        
                                    <th class="text-end min-w-70px">@lang('dashboard.actions')</th>
                                </tr>
                                <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody class="fw-bold text-gray-600">
                                @foreach ($client->bank_accounts as $bank)
                                    <!--begin::Table row-->
                                    <tr data-id="{{$bank->id}}">
                                        <!--begin::Checkbox-->
                                        <td>
                                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                                <input class="form-check-input checkSingle" type="checkbox" value="1" id="{{$bank->id}}"/>
                                            </div>
                                        </td>
                                        <!--end::Checkbox-->
                                        <!--begin::Category=-->
                                        <td>
                                            <div class="d-flex">
                                                <!--begin::Thumbnail-->
                                            
                                                <!--end::Thumbnail-->
                                                <div class="ms-5">
                                                    <!--begin::Title-->
                                                    <a href="{{ route('bank-accounts.edit', $bank->id) }}" class="text-gray-800 text-hover-primary fs-5 fw-bolder mb-1" data-kt-ecommerce-category-filter="category_name">{{$bank->user->name}}</a>
                                                    <!--end::Title-->
                                                    <!--begin::Description-->
                                                    <!--end::Description-->
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <!--begin::Badges-->
                                            <div class="badge badge-light-success">{{$bank->bank->name}}</div>
        
                                            <!--end::Badges-->
                                        </td>
                                        <td>
                                            <div class="badge badge-light-success">{{$bank->account_number}}</div>
        
                                        </td>
                                        <!--end::Category=-->
                                        <!--begin::Action=-->
                                        <td class="text-end">
                                            <a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                            {{ __('dashboard.actions') }}
                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                            <span class="svg-icon svg-icon-5 m-0">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon--></a>
                                            <!--begin::Menu-->
                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
                                                <!--begin::Menu item-->
                                                @can('bank-accounts.edit')
                                                <div class="menu-item px-3">
                                                    <a href="{{route('bank-accounts.edit', $bank->id)}}" class="menu-link px-3">{{ __('dashboard.edit') }}</a>
                                                </div>
                                                @endcan 
                                                <!--end::Menu item-->
                                                @can('bank-accounts.destroy')
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3" data-kt-ecommerce-category-filter="delete_row" data-url="{{route('bank-accounts.destroy', $bank->id)}}" data-id="{{$bank->id}}">{{ __('dashboard.delete') }}</a>
                                                </div>
                                                @endcan 
                                                <!--end::Menu item-->
                                            </div>
                                            <!--end::Menu-->
                                        </td>
                                        <!--end::Action=-->
                                    </tr>
                                    <!--end::Table row-->
                                @endforeach
                            </tbody>
                            <!--end::Table body-->
                        </table>
                    </div>

                    


                    

                    


                    
                  


                 
                

                    





                    


                    
                   
                 
                 
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
