<section class="flat-search-area wg-search-area">
    <div class="container-full">
        <div class="row">
            <div class="col-lg-12">
                <div class="heading-section center">
                    <h2>@lang('website.search_properties_by_area')</h2>
                    <p class="text-color-4">@lang('website.find_dream_apartment')</p>
                </div>
                <div class="wrap-search-area flex">
                    @foreach($cities as $city)
                    <div class="box">
                        <div class="images">
                            <img class="imgs" style="height: 200px!important;" src="{{ asset($city->image ) }}" alt="images">
                            <a href="{{route('all-properties.index',['city'=>$city->name])}}" class="icon-plus">
                                <img src="{{ asset('website/assets/images/icon/plus.svg') }}" alt="images">
                            </a>
                        </div>
                        <div class="content">
                            <h3 class="link-style-3">
                                <a href="{{route('all-properties.index',['city'=>$city->name])}}">{{$city->name}}</a>
                            </h3>
                            <p class="text-color-1">
                                @lang('website.listing_count') {{ $city->properties()->where('publish', 1)->where('is_active', 1)->distinct()->count() }}
                            </p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>