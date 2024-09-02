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
                        <span class="svg-icon svg-icon-1 position-absolute ms-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
                                <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                        <input type="text" data-kt-ecommerce-category-filter="search" class="form-control form-control-solid w-250px ps-14" placeholder="@lang('dashboard.search_title', ['page_title' => __('dashboard.properties')])" />
                    </div>
                    <!--end::Search-->
                </div>
                <!--end::Card title-->
                <div class="card-toolbar">
                    @can('properties.create')
                    <!--begin::Add customer-->
                    <a href="{{ route('properties.create')}}" class="btn btn-primary">@lang('dashboard.create_title', ['page_title' => __('dashboard.properties')])</a>
                    <!--end::Add customer-->
                    @endcan 
                    @can('properties.deleteAll')
                    <span class="w-5px h-2px"></span>
                    <button type="button" data-route="{{route('properties.deleteAll')}}" 
                    class="btn btn-danger delete_all_button">
                        <i class="feather icon-trash"></i>@lang('dashboard.delete_selected')</button>
                    @endcan 
                </div>
                <!--end::Card toolbar-->
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body pt-0">
                <!--begin::Table-->
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

                            <th class="text-end min-w-70px">@lang('dashboard.actions')</th>
                        </tr>
                        <!--end::Table row-->
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    <tbody class="fw-bold text-gray-600">
                        @foreach ($properties as $i=>$property)
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
                                <td class="text-end">
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
                                </td>
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
                <!--end::Table-->
                {{ $properties->links() }}
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Category-->
    </div>
    <!--end::Container-->
</div>
<!--end::Post-->
                    
@endsection
