@extends('dashboard.layouts.app')
@section('pageTitle', isset($property) ? __('dashboard.edit_property') : __('dashboard.create_property'))

@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="toolbar" id="kt_toolbar"></div>
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <div id="kt_content_container" class="container-xxl">
                <div class="card card-flush">
                    <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                        <div class="card-title">
                            <h2>{{ isset($property) ? __('dashboard.edit_property') : __('dashboard.create_property') }}</h2>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <form action="{{ isset($property) ? route('properties.update', $property->id) : route('properties.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @if(isset($property))
                                @method('PUT')
                            @endif
                            <div class="mb-10 fv-row">
                                <label class="form-label">العنوان (AR)</label>
                                <input type="text" name="title[ar]" value="{{ old('title.ar', isset($property) ? $property->getTranslation('title', 'ar') : '') }}" class="form-control mb-2" />
                            </div>
                            <div class="mb-10 fv-row">
                                <label class="form-label">العنوان (EN)</label>
                                <input type="text" name="title[en]" value="{{ old('title.en', isset($property) ? $property->getTranslation('title', 'en') : '') }}" class="form-control mb-2" />
                            </div>
                            <div class="mb-10 fv-row">
                                <label class="form-label">الوصف (AR)</label>
                                <textarea name="description[ar]" class="form-control mb-2">{{ old('description.ar', isset($property) ? $property->getTranslation('description', 'ar') : '') }}</textarea>
                            </div>
                            <div class="mb-10 fv-row">
                                <label class="form-label">الوصف (EN)</label>
                                <textarea name="description[en]" class="form-control mb-2">{{ old('description.en', isset($property) ? $property->getTranslation('description', 'en') : '') }}</textarea>
                            </div>
                            <div class="mb-10 fv-row">
                                <label class="form-label">الخريطة</label>
                                <input type="text" name="map" value="{{ old('map', isset($property) ? $property->map : '') }}" class="form-control mb-2" />
                            </div>
                            <div class="mb-10 fv-row">
                                <label class="form-label">العنوان</label>
                                <input type="text" name="address" value="{{ old('address', isset($property) ? $property->address : '') }}" class="form-control mb-2" />
                            </div>
                            <div class="mb-10 fv-row">
                                <label class="form-label">المدينة</label>
                                <select name="city_id" id="city_id" class="form-select mb-2">
                                    @foreach($cities as $city)
                                        <option value="{{ $city->id }}" {{ isset($property) && $property->city_id == $city->id ? 'selected' : '' }}>
                                            {{ $city->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="mb-10 fv-row">
                                <label class="form-label">الحي</label>
                                <select name="neighborhood_id" id="neighborhood_id" class="form-select mb-2">
                                    @foreach($neighborhoods as $neighborhood)
                                        <option value="{{ $neighborhood->id }}" {{ isset($property) && $property->neighborhood_id == $neighborhood->id ? 'selected' : '' }}>
                                            {{ $neighborhood->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-10 fv-row">
                                <label class="form-label">الاتجاه</label>
                                <select name="direction" class="form-select mb-2">
                                    <option value="north" {{ old('direction', isset($property) && $property->direction == 'north' ? 'selected' : '') }}>شمال</option>
                                    <option value="south" {{ old('direction', isset($property) && $property->direction == 'south' ? 'selected' : '') }}>جنوب</option>
                                    <option value="east" {{ old('direction', isset($property) && $property->direction == 'east' ? 'selected' : '') }}>شرق</option>
                                    <option value="west" {{ old('direction', isset($property) && $property->direction == 'west' ? 'selected' : '') }}>غرب</option>
                                </select>
                            </div>
                           
                            <div class="mb-10 fv-row">
                                <label class="form-label">العميل</label>
                                <select name="user_id" id="user_id" class="form-select mb-2">
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}" {{ isset($property) && $property->user_id == $user->id ? 'selected' : '' }}>
                                            {{ $user->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                          

                            <div class="mb-10 fv-row">
                                <label class="form-label">المرافق الأساسية</label>
                                <select name="primary_amenities[]" multiple id="primary_amenities" class="form-select mb-2" multiple>
                                    @foreach($primaryAmenities as $primaryAmenity)
                                        <option value="{{ $primaryAmenity->id }}" {{ isset($property) && $property->primaryAmenities->contains($primaryAmenity->id) ? 'selected' : '' }}>
                                            {{ $primaryAmenity->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                           
                            <div class="mb-10 fv-row">
                                <label class="form-label">المرافق الفرعية</label>
                                <select name="sub_amenities[]" id="sub_amenities" multiple class="form-select mb-2" multiple>
                                    @foreach($subAmenities as $subAmenity)
                                        <option value="{{ $subAmenity->id }}" {{ isset($property) && $property->subAmenities->contains($subAmenity->id) ? 'selected' : '' }}>
                                            {{ $subAmenity->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-10 fv-row">
                                <label class="form-label">ميزات العقار</label>
                                <select name="property_features[]" id="property_features" multiple class="form-select mb-2" multiple >
                                    @foreach($propertyFeatures as $propertyFeature)
                                        <option value="{{ $propertyFeature->id }}" {{ isset($property) && $property->propertyFeatures->contains($propertyFeature->id) ? 'selected' : '' }}>
                                            {{ $propertyFeature->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            {{--  --}}
                            <div class="mb-10 fv-row">
                                <label class="form-label">@lang('dashboard.booking-conditions')</label>
                                <select name="bookingConditions[]" id="property_conditions" multiple class="form-select mb-2" multiple>
                                    @foreach($bookingConditions as $bookingConditions)
                                        <option value="{{ $bookingConditions->id }}" {{ isset($property) && $property->propertyBookingConditions->contains($bookingConditions->id) ? 'selected' : '' }}>
                                            {{ $bookingConditions->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-5 fv-row">
                                <label class="form-label">@lang('dashboard.check_in_time')</label>
                                <input type="time" name="check_in_time" value="{{old('check_in_time', isset($property) ? $property->check_in_time : '') }}" class="form-control mb-2">
                                
                            </div>
                            <div class="mb-5 fv-row">
                                <label class="form-label">@lang('dashboard.check_out_time')</label>
                                <input type="time" value="{{ old('check_out_time', isset($property) ? $property->check_out_time : '') }}" name="check_out_time" class="form-control mb-2">
                                
                            </div>
                            <div class="mb-5 fv-row">
                                <label class="form-label">@lang('dashboard.rate_per_day')</label>
                                <input type="number" step="4" value="{{ old('rate_per_day', isset($property) ? $property->rate_per_day : '') }}" name="rate_per_day" class="form-control mb-2">
                                
                            </div>




                            {{--  --}}
                            <div class="mb-10 fv-row">
                                <label class="form-label">الصور</label>
                                <input type="file" name="images[]" class="form-control mb-2" multiple />
                                @if(isset($property) && $property->images)
                                    <div class="mt-2">
                                        @foreach($property->images as $image)
                                            <img src="{{ asset($image->image) }}" alt="Property Image" width="100" 
                                            style="width: 100px;height: 100px;border: 1px solid #eee;border-radius: 10px;"/>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary">{{ __('dashboard.save_changes') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
<script>
    $("#neighborhood_id").select2();
    $("#city_id").select2();
    $("#user_id").select2();
    $("#primary_amenities").select2();
    $("#sub_amenities").select2();
    $("#property_features").select2();
    $("#property_conditions").select2();


</script>
@endpush