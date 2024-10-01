<section class="flat-featured wg-dream home">
    <div class="container3">
        <div class="row">
            <div class="col-lg-12">
                <div class="heading-section center">
                    <h2>@lang('website.featured_properties')</h2>
                    <p class="text-color-4">@lang('website.discover_excellence')</p>
                </div>
                <div class="flat-tabs themesflat-tabs">
                    <div class="box-tab center">
                        <ul class="menu-tab tab-title flex justify-center">
                            @foreach ($propertyFeatures as $propertyFeature)
                                <li class="item-title active hv-tool"
                                    data-tooltip="{{ $propertyFeature->property()->where('publish', 1)->where('is_active', 1)->distinct()->count() }}
                                    {{ __('website.property') }}">
                                    <h5 class="inner">{{ $propertyFeature->name }}</h5>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="content-tab">
                        @foreach ($propertyFeatures as $propertyFeature)
                            <div class="content-inner tab-content">
                                <div class="wrap-item flex">
                                    @foreach ($propertyFeature->property()->where('publish', 1)->where('is_active', 1)->get() as $property)
                                        <div class="box box-dream hv-one">
                                            <div class="image-group relative ">
                                                <span class="featured fs-12 fw-6">@lang('website.featured')</span>
                                                <span class="icon-bookmark"><i class="far fa-bookmark"></i></span>
                                                <div class="swiper-container carousel-2 img-style">
                                                    <a href="{{ route('all-properties.show', $property->id) }}" class="icon-plus">
                                                        <img src="{{ asset('website/assets/images/icon/plus.svg') }}" alt="images"></a>
                                                    <div class="swiper-wrapper ">
                                                        @foreach ($property->images as $image)
                                                            <div class="swiper-slide"><img src="{{ asset($image->image) }}" alt="images"></div>
                                                        @endforeach
                                                    </div>
                                                    <div class="pagi2">
                                                        <div class="swiper-pagination2"> </div>
                                                    </div>
                                                    <div class="swiper-button-next2 "><i class="fal fa-arrow-right"></i></div>
                                                    <div class="swiper-button-prev2 "><i class="fal fa-arrow-left"></i></div>
                                                </div>
                                            </div>
                                            <div class="content">
                                                <h3 class="link-style-1"><a href="{{ route('all-properties.show', $property->id) }}">
                                                    {{ $property->title }} </a>
                                                </h3>
                                                <div class="text-address">
                                                    <p class="p-12">{{ $property->address }}</p>
                                                </div>
                                                <div class="money fs-18 fw-6 text-color-3"><a href="{{ route('all-properties.show', $property->id) }}">
                                                    @lang('website.SAR'){{ $property->rate_per_day }}</a>
                                                </div>
                                                <div class="icon-box flex">
                                                    @foreach ($property->propertyFeatures as $propertyFeature)
                                                        <div class="icons flex">
                                                            <img width="20px" height="20px" src="{{ $propertyFeature->icon }}" alt="">
                                                            <span>{{ $propertyFeature->name }}: </span><span class="fw-6"></span>
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
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>