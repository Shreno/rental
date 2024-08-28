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
                            <form onsubmit="return validateForm()" action="{{ isset($property) ? route('client-properties.update', $property->id) : route('client-properties.store') }}" method="POST" enctype="multipart/form-data">
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
                            <div class="inner-2 form-wg flex ">
                                <div class="wg-box2 select-group">
                                    <label class="title-user fw-6">@lang('dashboard.city')</label>
                                    <div class="nice-select city" tabindex="0"><span class="current">@lang('dashboard.city')</span>
                                        <ul class="list"> 
                                            <li data-value class="option selected">@lang('dashboard.select') @lang('dashboard.city')</li>
                                            @foreach ($cities as $city)
                                            <li data-value="{{$city->id}}" class=" option {{ old('city_id', isset($property) && $property->city_id == $city->id ? 'selected' : '') }}">{{$city->name}}</li>                                                           
                                            @endforeach
                                           
                                        </ul>
                                    </div>
                                    <input type="hidden" id="city-id" required name="city_id">
                                    <div id="cityError" style="color: red; display: none;">@lang('dashboard.Please select') @lang('dashboard.city') .</div>
                                    @error('city_id')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                </div> 
                                <div class="wg-box2 select-group">
                                    <label class="title-user fw-6">@lang('dashboard.neighborhood')</label>
                                    <div class="nice-select neighborhood" tabindex="0"><span class="current">@lang('dashboard.select') @lang('dashboard.neighborhood')</span>
                                        <ul class="list"> 
                                            <li data-value class="option selected">@lang('dashboard.select') @lang('dashboard.neighborhood')</li>
                                            @foreach($neighborhoods as $neighborhood)

                                            <li data-value="{{$neighborhood->id}}" class="option {{ old('neighborhood_id',  isset($property) && $property->neighborhood == $neighborhood->id ? 'selected' : '') }}">{{$neighborhood->name}}</li>      
                                            @endforeach                                                     
                                          
                                        </ul>
                                    </div>
                                    <input type="hidden" id="neighborhood-id" name="neighborhood_id">
                                    <div id="neighborhoodError" style="color: red; display: none;">@lang('dashboard.Please select') @lang('dashboard.neighborhood') .</div>
                                    @error('neighborhood_id')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div> 
                                <div class="wg-box2 select-group">
                                    <label class="title-user fw-6">@lang('dashboard.direction')</label>

                                    <div class="nice-select direction" tabindex="0"><span class="current">@lang('dashboard.select') @lang('dashboard.direction') </span>
                                        <ul class="list"> 
                                            <li data-value class="option selected">@lang('dashboard.select') @lang('dashboard.direction')</li>
                                            <li data-value="north"  class="option {{ old('direction', isset($property) && $property->direction == 'north' ? 'selected' : '') }}">@lang('dashboard.north')</li>
                                            <li data-value="south" class="option {{ old('direction', isset($property) && $property->direction == 'south' ? 'selected' : '') }}">@lang('dashboard.south')</li>
                                            <li data-value="east" class="option {{ old('direction', isset($property) && $property->direction == 'east' ? 'selected' : '') }}">@lang('dashboard.east')</li>
                                            <li data-value="west" class="option {{ old('direction', isset($property) && $property->direction == 'west' ? 'selected' : '') }}">@lang('dashboard.west')</li>

                                         
                                        </ul>
                                    </div>
                                    <input type="hidden" name="direction" id="direction-id">
                                    <div id="directionError" style="color: red; display: none;">@lang('dashboard.Please select at least one') @lang('dashboard.direction') .</div>
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
                            <h3 class="titles">تفاصيل العقار</h3>
                            <div class="wrap-info">
                                <div class="info pt-sm-4">
                                    <h4 class="mb-sm-3">@lang('dashboard.primary-amenities')</h4>
                                    <h5 class="mb-sm-3">اختر كل المرافق الموجودة فى العقار</h5>
                                </div>
                                <div class="select-img flex">
                                    @foreach($primaryAmenities as $index => $primaryAmenity)
                                        <div style="margin-left:30px" class="box-icon" data-id="{{ $primaryAmenity->id }}" data-sub-amenities="{{ $primaryAmenity->subAmenities->toJson() }}">
                                            <div class="inner flex option align-center">
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
                                <input type="hidden" name="primary_amenities" id="primaryAmenitiesInput">
                                @error('primary_amenities')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>  
                        <div class="tf-bedrooms">
                            <h3 class="titles"> مرافق العقار الفرعية</h3>
                            <div class="quantity-choise">
                                <div id="subAmenitiesContainer"></div>
                                <input type="hidden" id="sub_amenities" name="sub_amenities">

                            </div>
                            @error('sub_amenities')
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                    </div>
                    <div class="two-in-one wrap-style bg-white"> 
                        <div class="kitchen-details">
                            <h3 class="titles">@lang('dashboard.property-features')</h3>
                            <div class="info pt-sm-5">
                                <h5 class="mb-sm-3">@lang('dashboard.property-features')</h5>
                            </div>
                            <div class="select-img select-text flex">
                                @foreach($propertyFeatures as $index => $propertyFeature)
                                <div style="margin-left:30px" class="box-icon">
                                    <div class="inner flex option align-center" onclick="togglePropertyFeature({{$propertyFeature->id}})">
                                        <div class="icon">
                                            <img src="{{$propertyFeature->icon}}" alt="">
                                            <span class="symbol-label" style="background-image:url({{$propertyFeature->icon}});"></span>
                                        </div>
                                        <div class="content">
                                            <div class="font-2">{{$propertyFeature->name}}</div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <input type="hidden" name="property_features" id="propertyFeaturesInput">
                            <div id="propertyFeaturesError" style="color: red; display: none;">@lang('dashboard.Please select at least one') @lang('dashboard.property-features') .</div>
                            @error('property_features')
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>

                    </div>
                    <div class="two-in-one wrap-style bg-white"> 
                        <div class="kitchen-details">
                            <h3 class="titles pb-sm-5">@lang('dashboard.booking-conditions')   <span>@lang('dashboard.optional')</span></h3>
                            <div class="select-img select-text flex">
                                @foreach($bookingConditions as $index => $bookingCondition)
                                <div style="margin-left:30px" class="box-icon">
                                    <div class="inner flex option align-center" onclick="toggleBookingCondition({{$bookingCondition->id}})">
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
                            <input type="hidden" id="bookingConditionsInput" name="bookingConditions">
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
                                    <label class="title-user fw-5">@lang('dashboard.title') (@lang('dashboard.ar'))</label>
                                    <input type="text" name="title[ar]" value="{{ old('title.ar', isset($property) ? $property->getTranslation('title', 'ar') : '') }}" class="form-control mb-2" />
                                    @error('title[ar]')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div> 
                                <div class="wg-box2 select-group">
                                    <label class="title-user fw-5">@lang('dashboard.title') (@lang('dashboard.en')) </label>
                                    <input type="text" name="title[en]" value="{{ old('title.en', isset($property) ? $property->getTranslation('title', 'en') : '') }}" class="form-control mb-2" />
                                    @error('title[en]')
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
                                    <label class="fw-6">اكتب وصف مميز لعقارك (@lang('dashboard.ar'))</label>
                                    <textarea name="description[ar]" id="comment-message" name="message" rows="4" tabindex="4" placeholder="مثـال : دخول ذاتى" aria-required="true">
                                        {{ old('description.ar', isset($property) ? $property->getTranslation('description', 'ar') : '') }}
                                    </textarea>
                                </fieldset>
                                @error('description.ar')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                                </div>
                            </div> 
                            <br>
                            <div class="wg-box2 form-wg flex">
                                <fieldset class="message-wrap">
                                    <label class="fw-6">اكتب وصف مميز لعقارك (@lang('dashboard.en'))</label>
                                    <textarea name="description[en]" id="comment-message" name="message" rows="4" tabindex="4" placeholder="مثـال : دخول ذاتى" aria-required="true">
                                        {{ old('description.en', isset($property) ? $property->getTranslation('description', 'en') :'') }}
                                    </textarea>
                                </fieldset>
                                @error('description.en')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                                </div>
                            </div> 
                        </div>
                    <div class="tf-upload">
                        <h3 class="titles">صور العقار</h3>
                        <h4 class="titles">مطلوب رفع صورة واحدة كحد أدنى *</h4>
                        <div class="wrap-upload center">
                            <div class="box-upload">
                                <div class="img-up relative">                                
                                    <img class="avatar" id="profileimg" src="assets/images/icon/icon-upload.png" alt="">                                    
                                </div>                      
                                <div class="button-box relative" id="upload-profile">
                                    <a href="#" class="btn-upload sc-button">
                                        <span>اختار الصور</span> </a>
                                        <input id="tf-upload-img" type="file" accept="image/*" name="images[]" multiple required>
                                    </div> 
                                    @error('images')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div class="text-up-box">
                                    <p class="text-color-2">أو اسحب الصور هنا</p>
                                    <p> (ما يصل إلى  صور)</p>
                                </div>  
                            </div>
                          
                        </div> 
                        
                    </div> 
                    <div class="tf-save">
                        <div class="wrap-button flex justify-center">
                            <button class="sc-button" name="submit" type="submit" >
                                <span>إدراج الان</span>
                            </button>
                            <button class="sc-button btn-1" name="submit" type="submit">
                                <span>حفظ & معاينة </span>
                            </button>
                        </div>
                    </form>
                    </div>
                   
                    
                </div> 
            </div>
        </div>
    </section>
  </div>
  <script src="{{asset('client/app/js/properties.js')}}"></script>
   
  
@endsection
