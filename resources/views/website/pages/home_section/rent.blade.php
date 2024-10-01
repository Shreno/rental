<section class="flat-rent tf-section wg-dream dots-style">
    <div class="container3">
        <div class="row">
            <div class="col-lg-12">
                <div class="heading-section center">
                    <h2>@lang('website.rental_properties')</h2>
                    <p class="text-color-8">@lang('website.discover_rental')</p>
                </div>
                <div class="swiper-container2">
                    <div class="two-carousel owl-carousel owl-theme">
                        @foreach($properties as $property)
                        <div class="slide-item">
                            <div class="box box-dream hv-one">
                                <div class="image-group relative ">
                                    <span class="featured fs-12 fw-6">@lang('website.featured')</span>
                                    <span class="featured style fs-12 fw-6">@lang('website.for_rent')</span>
                                    <span class="icon-bookmark"><i class="far fa-bookmark"></i></span>
                                    <div class="swiper-container carousel-2 img-style">
                                        <a href="property-detail.html" class="icon-plus"><img
                                                src="{{ asset('website/assets/images/icon/plus.svg') }}"
                                                alt="images"></a>
                                        <div class="swiper-wrapper ">
                                            @foreach ($property->images as $image)
                                                <div class="swiper-slide"><img src="{{ asset($image->image) }}" alt="images"></div>
                                            @endforeach
                                        </div>
                                        <div class="pagi2">
                                            <div class="swiper-pagination2"> </div>
                                        </div>
                                        <div class="swiper-button-next2 "><i class="fal fa-arrow-right"></i></div>
                                        <div class="swiper-button-prev2 "><i class="fal fa-arrow-left"></i> </div>
                                    </div>
                                </div>
                                <div class="content">
                                    <h3 class="link-style-1"><a href="{{ route('all-properties.show', $property->id) }}">
                                        {{ $property->title }} </a>
                                    </h3>
                                    <div class="text-address">
                                        <p class="p-12">{{ $property->address }}</p>
                                    </div>
                                    <div class="money fs-18 fw-6 text-color-3">
                                        <a href="{{ route('all-properties.show', $property->id) }}">
                                            @lang('website.SAR'){{ $property->rate_per_day }}
                                        </a>
                                    </div>
                                    <div class="icon-box flex">
                                        @foreach($property->Property_Sub_Amenity as $property_Sub_Amenity)
                                            <div class="icons flex">
                                                <img width="30px" height="20px" style="margin: 10px" 
                                                     src="{{ $property_Sub_Amenity->subAmenities->amenity->icon }}" alt="">
                                                <span>{{$property_Sub_Amenity->subAmenities->name}}: </span>
                                                <span class="fw-6">{{$property_Sub_Amenity->number}}</span>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="days-box flex justify-space align-center">
                                        <a class="compare flex align-center fw-6" href="#">@lang('website.compare')</a>
                                        <div class="img-author hv-tool" data-tooltip="{{ asset($property->user->name) }}">
                                            <img width="41px" height="40px" src="{{ asset($property->user->image) }}" alt="images">
                                        </div>
                                        <div class="days">
                                            @if (session()->get('lang') == 'en')
                                                {{ \Carbon\Carbon::parse($property->created_at)->translatedFormat('d F Y') }}
                                            @else
                                                {{ \Carbon\Carbon::parse($property->created_at)->locale('ar')->translatedFormat('d F Y') }}
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>