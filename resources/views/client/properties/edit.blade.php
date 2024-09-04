@extends('client.layouts.app')

@section('content')
<style>
    .select-img {
    display: flex;
    flex-wrap: wrap;
}

.box-icon {
    width: 48%; /* Adjust this value depending on the spacing */
    margin: 1%; /* Add some margin for spacing */
}

.inner {
    display: flex;
    align-items: center;
}

.icon {
    margin-right: 10px;
}
textarea, input[type=text], input[type=password], input[type=datetime], input[type=datetime-local], input[type=date], input[type=month], input[type=time], input[type=week], input[type=number], input[type=email], input[type=url], input[type=search], input[type=tel], input[type=color]
{
    color:black!important
}

@media (max-width: 768px) {
    .box-icon {
        width: 100%; /* On smaller screens, make each item take up full width */
    }
}
    </style>

  <div class="dashboard__content">
    <section class="flat-title2 " >
        <div class="container7">
            <div class="row">                      
                <div class="col-lg-12">
                        <div class="title-group fs-30 lh-45 fw-7">@lang('dashboard.properties')</div>
                        
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                </div> 
            </div>
        </div>
    </section>
    <section class="flat-upload-photo" >
        <div class="container7">
            <div class="row">                      
                <div class="col-lg-12">
                    <div class="tf-map bg-white">
                        <h3 class="titles">@lang('dashboard.property address')</h3>
                        <div class="info-box info-wg">
                            <form  action="{{ isset($property) ? route('client-properties.update', $property->id) : route('client-properties.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @if(isset($property))
                                    @method('PUT')
                                @endif        
                                <div class="inner-1 select-group">
                                <label class="title-user fw-6">@lang('dashboard.Location on map')</label>
                                <div>
                                    <iframe class="map-content" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d927767.3399049372!2d46.163081231815035!3d24.723750059422045!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e2f03890d489399%3A0xba974d1c98e79fd5!2sRiyadh%20Saudi%20Arabia!5e0!3m2!1sen!2seg!4v1724504854658!5m2!1sen!2seg" allowfullscreen="" loading="lazy"></iframe>
                                </div>
                                <input type="text" name="map" placeholder="@lang('dashboard.enter') @lang('dashboard.Location on map')" value="{{ old('map', isset($property) ? $property->map : '') }}" class="form-control mb-2" />
                                @error('map')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>
                    </div>  
                    <div class="tf-infomation bg-white">
                        <h3 class="titles">@lang('dashboard.Confirm the property address')</h3>
                        <input type="text" name="address" placeholder="@lang('dashboard.enter') @lang('dashboard.address')" value="{{ old('address', isset($property) ? $property->address : '') }}" class="form-control mb-2" />
                        @error('address')
                        <span class="invalid-feedback text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <div class="info-box info-wg">
                        <div class="inner-2 form-wg flex">
                            <!-- City Selection -->
                            <div class="wg-box2 select-group">
                                <label class="title-user fw-6">@lang('dashboard.city')</label>
                                <div class="nice-select city" tabindex="0">
                                    <span class="current">
                                        {{ isset($property) && $property->city ? $property->city->name : __('dashboard.select') . ' ' . __('dashboard.city') }}
                                    </span>
                                    <ul class="list">
                                        <li data-value class="option selected">
                                            @lang('dashboard.select') @lang('dashboard.city')
                                        </li>
                                        @foreach ($cities as $city)
                                            <li data-value="{{ $city->id }}" class="option {{ old('city_id', isset($property) && $property->city_id == $city->id ? 'selected' : '') }}">
                                                {{ $city->name }}
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <input type="hidden" id="city-id" required name="city_id" value="{{ old('city_id', isset($property) ? $property->city_id : '') }}">
                                <div id="cityError" style="color: red; display: none;">
                                    @lang('dashboard.Please select') @lang('dashboard.city').
                                </div>
                                @error('city_id')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                    
                            <!-- Neighborhood Selection -->
                            <div class="wg-box2 select-group">
                                <label class="title-user fw-6">@lang('dashboard.neighborhood')</label>
                                <div class="nice-select neighborhood" tabindex="0">
                                    <span class="current">
                                        {{ isset($property) && $property->neighborhood ? $property->neighborhood->name : __('dashboard.select') . ' ' . __('dashboard.neighborhood') }}
                                    </span>
                                    <ul class="list">
                                        <li data-value="" class="option @if(!isset($property->neighborhood_id)) selected @endif">
                                            @lang('dashboard.select') @lang('dashboard.neighborhood')
                                        </li>
                                        @foreach($neighborhoods as $neighborhood)
                                            <li data-value="{{ $neighborhood->id }}" class="option {{ old('neighborhood_id', isset($property) && $property->neighborhood_id == $neighborhood->id ? 'selected' : '') }}">
                                                {{ $neighborhood->name }}
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <input type="hidden" id="neighborhood-id" name="neighborhood_id" value="{{ old('neighborhood_id', isset($property) ? $property->neighborhood_id : '') }}">
                                <div id="neighborhoodError" style="color: red; display: none;">
                                    @lang('dashboard.Please select') @lang('dashboard.neighborhood').
                                </div>
                                @error('neighborhood_id')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!-- Direction Selection -->
                            <div class="wg-box2 select-group">
                                <label class="title-user fw-6">@lang('dashboard.direction')</label>
                                <div class="nice-select direction" tabindex="0">
                                    <span class="current">
                                        {{ isset($property) ? __('dashboard.' . $property->direction) : __('dashboard.select') . ' ' . __('dashboard.direction') }}
                                    </span>
                                    <ul class="list">
                                        <li data-value class="option selected">
                                            @lang('dashboard.select') @lang('dashboard.direction')
                                        </li>
                                        <li data-value="north" class="option {{ old('direction', isset($property) && $property->direction == 'north' ? 'selected' : '') }}">
                                            @lang('dashboard.north')
                                        </li>
                                        <li data-value="south" class="option {{ old('direction', isset($property) && $property->direction == 'south' ? 'selected' : '') }}">
                                            @lang('dashboard.south')
                                        </li>
                                        <li data-value="east" class="option {{ old('direction', isset($property) && $property->direction == 'east' ? 'selected' : '') }}">
                                            @lang('dashboard.east')
                                        </li>
                                        <li data-value="west" class="option {{ old('direction', isset($property) && $property->direction == 'west' ? 'selected' : '') }}">
                                            @lang('dashboard.west')
                                        </li>
                                    </ul>
                                </div>
                                <input type="hidden" name="direction" id="direction-id" value="{{ old('direction', isset($property) ? $property->direction : '') }}">
                                <div id="directionError" style="color: red; display: none;">
                                    @lang('dashboard.Please select at least one') @lang('dashboard.direction').
                                </div>
                                @error('direction')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    </div> 

                    {{--  --}}
                    <div class="two-in-one wrap-style bg-white"> 
                        <div class="tf-property-details">
                            <h3 class="titles">@lang('dashboard.Property details')</h3>
                            <div class="wrap-info">
                                <div class="info pt-sm-4">
                                    <h4 class="mb-sm-3">@lang('dashboard.primary-amenities')</h4>
                                    <h5 class="mb-sm-3">@lang('dashboard.Choose all the facilities in the property')</h5>
                                </div>
                                <div class="select-img flex">
                                    @foreach($primaryAmenities as $index => $primaryAmenity)
                                        <div style="margin-left:30px" class="box-icon primaryAmenitiesBox" data-id="{{ $primaryAmenity->id }}" data-sub-amenities="{{ $primaryAmenity->subAmenities->toJson() }}">
                                            <div class="inner flex option primaryAmenities align-center {{ isset($property) && $property->primaryAmenities->contains($primaryAmenity->id) ? 'selected' : '' }}"
                                                 data-primaryAmenity-id="{{ $primaryAmenity->id }}"
                                                 onclick="toggleprimaryAmenity({{ $primaryAmenity->id }}, this)">
                                                <div class="icon">
                                                    <img src="{{ $primaryAmenity->icon }}" alt="">
                                                    <span class="symbol-label" style="background-image:url({{ $primaryAmenity->icon }});"></span>
                                                </div>
                                                <div class="content">
                                                    <div class="font-2">{{ $primaryAmenity->name }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <input type="hidden" name="primary_amenities" id="primaryAmenitiesInput" 
                                data-selected-primaryAmenities="{{ json_encode(old('primary_amenities', isset($property) ? $property->primaryAmenities->pluck('id')->toArray() : [])) }}"
                                value="{{ old('primary_amenities', isset($property) ? $property->primaryAmenities->pluck('id')->implode(',') : '') }}">
                                {{--  --}}
                                @error('primary_amenities')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>  
                      
                    </div>
                    {{--  --}}
                    <div class="two-in-one wrap-style bg-white"> 
                        <div class="tf-bedrooms">
                            <h3 class="titles">@lang('dashboard.Sub-property facilities')</h3>
                            <div class="quantity-choise row" id="subAmenitiesContainer">
                                @foreach($subAmenities as $subAmenitie)
                                @php
                                // Find the matching sub-amenity
                                $Property_Sub_Amenity = $property->Property_Sub_Amenity->where('sub_amenity_id', $subAmenitie->id)->first();
                                // Get the quantity, or default to 1 if not found
                                $quantity = $Property_Sub_Amenity ? $Property_Sub_Amenity->number : 1;
                               @endphp
                                @if($property->subAmenities->contains($subAmenitie->id) )
                                
                                <div class="box col-md-6 subAmenitie" style="margin-bottom: 10px" data-id="{{ $subAmenitie->primary_amenity_id }}">

                                    
                                @else
                                <div class="box col-md-6 subAmenitie" style="display:none;margin-bottom: 10px" data-id="{{ $subAmenitie->primary_amenity_id }}">

                                @endif
                                        <div class="wg-box">
                                            <label class="title-user fw-6">{{ $subAmenitie->name }}</label>
                                            <div class="box-quantity flex align-center">
                                                <div class="quantity flex align-center">
                                                    <a class="btn-quantity plus-btn"><i class="far fa-plus"></i></a>
                                                    <div class="input-text">
                                                        <input type="text" name="quantity[{{ $subAmenitie->id }}]" value="{{$quantity}}" class="quantity-number">
                                                    </div>
                                                    <a class="btn-quantity minus-btn"><i class="far fa-minus"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            
                                <input type="hidden" id="sub_amenities" name="sub_amenities">
                            </div>
                            
                            @error('sub_amenities')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>



                    {{--  --}}
                    {{-- start Handle  Selection Property Feature  --}}

                    <div class="two-in-one wrap-style bg-white">
                        <div class="kitchen-details">
                            <h3 class="titles">@lang('dashboard.property-features')</h3>
                            <div class="info pt-sm-5">
                                <h5 class="mb-sm-3">@lang('dashboard.property-features')</h5>
                            </div>
                            <div class="select-img select-text flex">
                                @foreach($propertyFeatures as $propertyFeature)
                                <div style="margin-left:30px" class="box-icon">
                                    <div class="inner flex option propertyFeature  align-center {{ isset($property) && $property->propertyFeatures->contains($propertyFeature->id) ? 'selected' : '' }}" 
                                         data-feature-id="{{ $propertyFeature->id }}"
                                         onclick="togglePropertyFeature({{ $propertyFeature->id }}, this)">
                                        <div class="icon">
                                            <img src="{{ $propertyFeature->icon }}" alt="">
                                            <span class="symbol-label" style="background-image:url({{ $propertyFeature->icon }});"></span>
                                        </div>
                                        <div class="content">
                                            <div class="font-2">{{ $propertyFeature->name }}</div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <input type="hidden" name="property_features" id="propertyFeaturesInput" 
                                   data-selected-features="{{ json_encode(old('property_features', isset($property) ? $property->propertyFeatures->pluck('id')->toArray() : [])) }}"
                                   value="{{ old('property_features', isset($property) ? $property->propertyFeatures->pluck('id')->implode(',') : '') }}">
                            <div id="propertyFeaturesError" style="color: red; display: none;">
                                @lang('dashboard.Please select at least one') @lang('dashboard.property-features').
                            </div>
                            @error('property_features')
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    {{-- end Handle  Selection Property Feature  --}}
                    {{-- booking condition --}}
                    <div class="two-in-one wrap-style bg-white"> 
                        <div class="kitchen-details">
                            <h3 class="titles pb-sm-5">@lang('dashboard.booking-conditions')   <span>@lang('dashboard.optional')</span></h3>
                            <div class="select-img select-text flex">
                                @foreach($bookingConditions as $index => $bookingCondition)
                                <div style="margin-left:30px" class="box-icon">
                                    <div class="inner flex option bookingCondition align-center {{ isset($property) && $property->propertyBookingConditions->contains($bookingCondition->id) ? 'selected' : '' }}" 
                                        data-condition-id="{{ $bookingCondition->id }}"
                                        onclick="toggleBookingCondition({{ $bookingCondition->id }}, this)">
                                        <div class="icon">
                                            <img src="{{$bookingCondition->icon}}" alt="">
                                            <span class="symbol-label" style="background-image:url({{$bookingCondition->icon}});"></span>
                                        </div>
                                        <div class="content">
                                            <div class="font-2">{{$bookingCondition->name}}</div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <input type="hidden" name="bookingConditions" id="bookingConditionsInput" 
                            data-selected-booking="{{ json_encode(old('bookingConditions', isset($property) ? $property->propertyBookingConditions->pluck('id')->toArray() : [])) }}"
                            value="{{ old('bookingConditions', isset($property) ? $property->propertyBookingConditions->pluck('id')->implode(',') : '') }}">
                            @error('bookingConditions')
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                    </div>
                    {{--  --}}
                    {{-- Information --}}
                    <div class="tf-infomation bg-white">
                        <h3 class="titles">@lang('dashboard.Information about the property')</h3>
                        <div class="info-box info-wg">
                            <div class="inner-2 form-wg flex ">
                                <div class="wg-box2 select-group">
                                    <label class="title-user fw-5">@lang('dashboard.enter')  @lang('dashboard.check_in_time')</label>
                                    <input type="time" required name="check_in_time" value="{{old('check_in_time', isset($property) ? $property->check_in_time : '') }}" class="form-control mb-2">
                                    @error('check_in_time')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div> 
                                <div class="wg-box2 select-group">
                                    <label class="title-user fw-5">@lang('dashboard.enter')  @lang('dashboard.check_out_time')</label>
                                    <input type="time" required value="{{ old('check_out_time', isset($property) ? $property->check_out_time : '') }}" name="check_out_time" class="form-control mb-2">
                                    @error('check_out_time')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div> 
                                <div class="wg-box2 select-group">
                                    <label class="title-user fw-5">@lang('dashboard.enter')  @lang('dashboard.rate_per_day')</label>
                                    <input type="number" required step="1" value="{{ old('rate_per_day', isset($property) ? $property->rate_per_day : '') }}" name="rate_per_day" class="form-control mb-2">
                                    @error('rate_per_day')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div> 
                              
                            </div> 
                        </div>
                    </div>


                    {{--  --}}
                    <div class="tf-description wrap-style bg-white">
                        <div class="info-box info-wg">
                            <div class="inner-2 form-wg flex ">
                                <div class="wg-box2 select-group">
                                    <label class="title-user fw-5">@lang('dashboard.title')</label>
                                    <input type="text" name="title" value="{{ old('title', isset($property) ? $property->getTranslation('title',App::getLocale()) : '') }}" class="form-control mb-2" />
                                    @error('title')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div> 
    
                               
                              
                            </div> 
                        </div>
                        {{--  --}}
                       
<br>

                        {{--  --}}
                        <h3 class="titles">@lang('dashboard.enter')  @lang('dashboard.property description')
                            <span>@lang('dashboard.optional')</span></h3>
                        <div class="info-box info-wg">
                            
                            <div class="wg-box2 form-wg flex">
                                <fieldset class="message-wrap">
                                    <label class="fw-6">@lang('dashboard.Write a unique description of your property') </label>
                                    <textarea name="description" id="comment-message" name="message" rows="4" tabindex="4" placeholder="مثـال : دخول ذاتى" aria-required="true">
                                        {{ old('description', isset($property) ? $property->getTranslation('description',App::getLocale()) : '') }}
                                    </textarea>
                                </fieldset>
                                @error('description')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                                </div>
                            </div> 
                            <br>
                         
                                </div>
                            </div> 
                        </div>
                        <div class="tf-upload">
                            <h3 class="titles">@lang('dashboard.Images Property')</h3>
                            <h4 class="titles numberofImage">@lang('dashboard.A minimum of images is required')*</h4>
                            <div class="wrap-upload center">
                                <div class="box-upload">
                                    <!-- Existing Images Display -->
                                    <div class="existing-images">
                                        @if(isset($property) && $property->images)
                                        <div class="row">
                                            @foreach($property->images as $image)
                                                <div  class="image-item col-md-3"  data-id="{{ $image->id }}">
                                                    <img width="100" hight="100" src="{{ asset($image->image) }}" alt="Property Image" class="uploaded-img">
                                                    <br>
                                                    <a type="button" class="remove-file btn-delete-image  fw-6" data-id="{{ $image->id }}"><i class="fal fa-trash-alt"></i></a>
                                                </div>
                                            @endforeach
                                        </div>
                                        @endif
                                    </div>
                        
                                    <!-- Upload New Images -->
                                    <div class="img-up relative">
                                        <img width="100" hight="100" class="avatar" id="profileimg" src="assets/images/icon/icon-upload.png" alt="">
                                    </div>                      
                                    <div class="button-box relative" id="upload-profile">
                                        <a href="#" class="btn-upload sc-button">
                                            <span>@lang('dashboard.Choose Images')</span>
                                        </a>
                                        <input id="tf-upload-img" type="file" accept="image/*" name="images[]" multiple>
                                    </div> 
                                    @error('images')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <div class="text-up-box">
                                       
                                    </div>  
                                </div>
                            </div> 
                        </div> 
                        
                        <!-- Hidden input to track deleted images -->
                        <input type="hidden" name="deleted_images" id="deleted_images">
                    <div class="tf-save">
                        <div class="wrap-button flex justify-center">
                            <button class="sc-button" name="submit" type="submit" >
                                <span>@lang('dashboard.Insert now')</span>
                            </button>
                            <button class="sc-button btn-1" name="submit" type="submit">
                                <span> @lang('dashboard.Save & preview') </span>
                            </button>
                        </div>
                    </form>
                    </div>
                   
                    
                </div> 
            </div>
        </div>
    </section>
  </div>

   
  
@endsection
@section('scripts')
<script src="{{asset('client/app/js/propertiesEdit.js')}}"></script>

@endsection
