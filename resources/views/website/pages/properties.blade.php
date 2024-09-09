@extends('website.layouts.app')
@section('pageTitle',__('website.properties'))


@section('content')



       <!-- title page -->
       <section class="tf-map">
        <div class="container-fuild">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <iframe class="map-content"
                    src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d7302.453092836291!2d90.47477022812872!3d23.77494577893369!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1627293157601!5m2!1svi!2s" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
    </section>

    <div class="top-filters style style2">
        <div class="container6">
            <div class="row">                      
                <div class="col-lg-12">
                    <div class="flat-tabs style2 flex">
                        <div class="content-tab">
                            <div class="content-inner tab-content">
                                <div class="form-sl">
                                    <form method="post">
                                        <div class="wd-find-select flex">
                                            <div class="form-group-1 search-form form-style relative">
                                                <i class="far fa-search"></i>
                                                <input type="search" class="search-field" placeholder="اكتب الكلمة الرئيسية..." value="" name="s" title="Search for" required="">
                                            </div>                                            
                                            <div class="form-group-2 form-style">
                                                <div class="group-select">
                                                    <div class="nice-select" tabindex="0"><span class="current">نوع العقار</span>
                                                        <ul class="list">    
                                                            <li data-value class="option selected">نوع العقار</li>
                                                            <li data-value="bungalow" class="option">بنغل</li>
                                                            <li data-value="apartment" class="option">شقة</li>
                                                            <li data-value="house" class="option">منزل</li>
                                                            <li data-value="smart-home" class="option">منزل ذكي</li>                                                      
                                                            <li data-value="Single family home" class="option">مكتب</li>
                                                            <li data-value="Multi family home" class="option">فيلا</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-3 form-style">
                                                <div class="group-select">
                                                    <div class="nice-select" tabindex="0"><span class="current">الموقع</span>
                                                        <ul class="list">  
                                                            <li data-value class="option selected">الموقع</li>                                                        
                                                            <li data-value="Japan" class="option">اليابان</li>
                                                            <li data-value="America" class="option d">امريكا</li>
                                                            <li data-value="England" class="option ">انجلترا</li>   
                                                            <li data-value="Japan" class="option">بلجيكا</li>  
                                                            <li data-value="England" class="option ">فرنسا</li>                                                             
                                                            <li data-value="VietNam" class="option">فيتنام</li>
                                                        </ul>
                                                    </div>
                                                </div>                                                    
                                            </div>
                                            <div class="form-group-2 form-style">
                                                <div class="group-select">
                                                    <div class="nice-select" tabindex="0"><span class="current">الحمامات</span>
                                                        <ul class="list">    
                                                            <li data-value class="option selected">الحمامات</li>                                                       
                                                            <li data-value="floating" class="option">حمامات عائمة</li>
                                                            <li data-value="massage" class="option">حمامات مساج</li>
                                                            <li data-value="floor-standing" class="option">حمام قائم على الأرض</li>
                                                            <li data-value="built-in" class="option">حمامات مدمجة</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-3 form-style">
                                                <div class="group-select">
                                                    <div class="nice-select" tabindex="0"><span class="current">الأسِرة</span>
                                                        <ul class="list">   
                                                            <li data-value class="option selected">الأسِرة</li>                                                       
                                                            <li data-value="twin" class="option">سريرين توأم</li>
                                                            <li data-value="bunk" class="option">Bunk beds</li>
                                                            <li data-value="kids" class="option">أسرة بطابقين</li>                                                                  
                                                            <li data-value="single" class="option">سرير واحد</li>
                                                        </ul>
                                                    </div>
                                                </div>                                                    
                                            </div>
                                            <div class="form-group-4 form-style">
                                                <a class="icon-filter button-top pull-right" href="#">
                                                    <span>الخيارات</span>
                                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M3 10.5V0.75M3 10.5C3.39782 10.5 3.77936 10.658 4.06066 10.9393C4.34196 11.2206 4.5 11.6022 4.5 12C4.5 12.3978 4.34196 12.7794 4.06066 13.0607C3.77936 13.342 3.39782 13.5 3 13.5M3 10.5C2.60218 10.5 2.22064 10.658 1.93934 10.9393C1.65804 11.2206 1.5 11.6022 1.5 12C1.5 12.3978 1.65804 12.7794 1.93934 13.0607C2.22064 13.342 2.60218 13.5 3 13.5M3 17.25V13.5M15 10.5V0.75M15 10.5C15.3978 10.5 15.7794 10.658 16.0607 10.9393C16.342 11.2206 16.5 11.6022 16.5 12C16.5 12.3978 16.342 12.7794 16.0607 13.0607C15.7794 13.342 15.3978 13.5 15 13.5M15 10.5C14.6022 10.5 14.2206 10.658 13.9393 10.9393C13.658 11.2206 13.5 11.6022 13.5 12C13.5 12.3978 13.658 12.7794 13.9393 13.0607C14.2206 13.342 14.6022 13.5 15 13.5M15 17.25V13.5M9 4.5V0.75M9 4.5C9.39782 4.5 9.77936 4.65804 10.0607 4.93934C10.342 5.22064 10.5 5.60218 10.5 6C10.5 6.39782 10.342 6.77936 10.0607 7.06066C9.77936 7.34196 9.39782 7.5 9 7.5M9 4.5C8.60218 4.5 8.22064 4.65804 7.93934 4.93934C7.65804 5.22064 7.5 5.60218 7.5 6C7.5 6.39782 7.65804 6.77936 7.93934 7.06066C8.22064 7.34196 8.60218 7.5 9 7.5M9 17.25V7.5" stroke="#000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                    </svg>                                                                           
                                                </a>
                                            </div>
                                            <div class="button-search sc-btn-top">
                                                <a class="sc-button button-top" href="#">
                                                    <span>ابـحـث الان</span>
                                                    <i class="far fa-search"></i>
                                                </a>
                                            </div> 
                                        </div>
                                        <div class="wd-find-select wd-search-form ">
                                            <div class="box1 flex flex-wrap form-wg">
                                                <div class="form-group wg-box3">
                                                    <div class="group-select">
                                                        <div class="nice-select" tabindex="0"><span class="current">الحمامات: اى عدد</span>
                                                            <ul class="list"> 
                                                                <li data-value class="option selected">الحمامات: اى عدد</li>                                                         
                                                                <li data-value="1" class="option">1</li>
                                                                <li data-value="2" class="option">2</li>
                                                                <li data-value="3" class="option">3</li>
                                                                <li data-value="4" class="option">4</li>
                                                                <li data-value="5" class="option">5</li>
                                                                <li data-value="6" class="option">6</li>
                                                                <li data-value="7" class="option">7</li>
                                                                <li data-value="8" class="option">8</li>
                                                                <li data-value="9" class="option">9</li>
                                                                <li data-value="9" class="option">10</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group wg-box3">
                                                    <div class="group-select">
                                                        <div class="nice-select" tabindex="0"><span class="current">الأسِرة: اى عدد</span>
                                                            <ul class="list">   
                                                                <li data-value class="option selected">الأسِرة: اى عدد</li>                                                       
                                                                <li data-value="1" class="option">1</li>
                                                                <li data-value="2" class="option">2</li>
                                                                <li data-value="3" class="option">3</li>
                                                                <li data-value="4" class="option">4</li>
                                                                <li data-value="5" class="option">5</li>
                                                                <li data-value="6" class="option">6</li>
                                                                <li data-value="7" class="option">7</li>
                                                                <li data-value="8" class="option">8</li>
                                                                <li data-value="9" class="option">9</li>
                                                                <li data-value="9" class="option">10</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group wg-box3">
                                                    <div class="widget widget-price ">
                                                        <div class="caption flex-two">
                                                            <div>
                                                                <span class="fw-6">من</span>
                                                                <span id="slider-range-value1"></span>
                                                                <span id="slider-range-value2"></span>
                                                            </div>
                                                        </div>
                                                        <div id="slider-range"></div>
                                                        <div class=" slider-labels">
                                                            <div>
                                                                <input type="hidden" name="min-value" value="">
                                                                <input type="hidden" name="max-value" value="">
                                                            </div>
                                                        </div>
                                                    </div><!-- /.widget_price -->
                                                </div>
                                                <div class="form-group wg-box3">
                                                    <div class="widget widget-price ">
                                                        <div class="caption flex-two">
                                                            <div>
                                                                <span class="fw-6">الحجم</span>
                                                                <span id="slider-range-value01"></span>
                                                                <span id="slider-range-value02"></span>
                                                            </div>
                                                        </div>
                                                        <div id="slider-range2"></div>
                                                        <div class="slider-labels">
                                                        <div>
                                                            <input type="hidden" name="min-value2" value="">
                                                            <input type="hidden" name="max-value2" value="">
                                                        </div>
                                                        </div>
                                                    </div><!-- /.widget_price -->
                                                </div>
                                            </div>
                                            <div class="boder-wg"></div>
                                            <div class="box2 flex flex-wrap form-wg">
                                                <div class="form-group wg-box3">
                                                    <div class="tf-amenities bg-white">
                                                        <label class="flex"><input name="newsletter" type="checkbox"  /> 
                                                            <span class="btn-checkbox"></span><span class="fs-13">مسبح</span> 
                                                        </label>
                                                        <label class="flex"><input name="newsletter" type="checkbox" /> 
                                                            <span class="btn-checkbox"></span><span class="fs-13">ساحة انتظار</span> 
                                                        </label>
                                                        <label class="flex"><input name="newsletter" type="checkbox"  /> 
                                                            <span class="btn-checkbox"></span><span class="fs-13">نظام إنذار</span> 
                                                        </label> 
                                                    </div>                                                  
                                                </div> 
                                                <div class="form-group wg-box3">
                                                    <div class="tf-amenities bg-white">
                                                        <label class="flex"><input name="newsletter" type="checkbox"  /> 
                                                            <span class="btn-checkbox"></span><span class="fs-13">شرفة</span> 
                                                        </label>
                                                        <label class="flex"><input name="newsletter" type="checkbox"  /> 
                                                            <span class="btn-checkbox"></span><span class="fs-13">منطقة خارجية</span> 
                                                        </label>
                                                        <label class="flex"><input name="newsletter" type="checkbox" /> 
                                                            <span class="btn-checkbox"></span><span class="fs-13">النطاق العريض</span> 
                                                        </label>                                   
                                                    </div>                                                  
                                                </div> 
                                                <div class="form-group wg-box3">
                                                    <div class="tf-amenities bg-white">
                                                        <label class="flex"><input name="newsletter" type="checkbox"  /> 
                                                            <span class="btn-checkbox"></span><span class="fs-13">حمام داخلي</span> 
                                                        </label>
                                                        <label class="flex"><input name="newsletter" type="checkbox" /> 
                                                            <span class="btn-checkbox"></span><span class="fs-13">المدمج في الجلباب</span> 
                                                        </label>
                                                        <label class="flex"><input name="newsletter" type="checkbox"  /> 
                                                            <span class="btn-checkbox"></span><span class="fs-13 ">جيم</span> 
                                                        </label> 
                                                    </div>                                                  
                                                </div>  
                                                <div class="form-group wg-box3">
                                                    <div class="tf-amenities bg-white">
                                                        <label class="flex"><input name="newsletter" type="checkbox"  /> 
                                                            <span class="btn-checkbox"></span><span class="fs-13">ملعب تنس</span> 
                                                        </label>
                                                        <label class="flex"><input name="newsletter" type="checkbox"  /> 
                                                            <span class="btn-checkbox"></span><span class="fs-13">دراسة</span> 
                                                        </label>
                                                        <label class="flex"><input name="newsletter" type="checkbox"  /> 
                                                            <span class="btn-checkbox"></span><span class="fs-13">منتجع صحي خارجي</span> 
                                                        </label> 
                                                    </div>                                                  
                                                </div> 
                                            </div>
                                        </div>
                                    </form>
                                    <!-- End Job  Search Form-->
                                </div> 
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="flat-title" > 
        <div class="container6">
            <div class="row">                      
                <div class="col-lg-12">
                    <div class="title-inner style">
                        <div class="title-group fs-12"><a class="home fw-6 text-color-3" href="index.html">الرئيسية</a><span >قائمة العقارات</span></div>
                    </div>
                </div> 
            </div>
        </div>
    </section>
   

    <section class="tf-section2 flat-property flat-property-list flat-property-list1 flat-properties-rent wg-dream style5" >
        <div class="container6">
            <div class="row flex">   
                <div class="post">
                    <div class="category-filter flex align-center justify-space">
                        <div class="box-1 flex align-center">
                            <div class="heading-listing fs-30 lh-45 fw-7">قائمة العقارات</div><div class="heading-text">هناك حاليا {{$propertiesAll}} عقار.</div> 
                        </div>
                        <div class="box-2 flex">
                            <a href="#" class="btn-view grid active">
                                <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5.04883 6.40508C5.04883 5.6222 5.67272 5 6.41981 5C7.16686 5 7.7908 5.62221 7.7908 6.40508C7.7908 7.18801 7.16722 7.8101 6.41981 7.8101C5.67241 7.8101 5.04883 7.18801 5.04883 6.40508Z" stroke="#8E8E93"/>
                                    <path d="M11.1045 6.40508C11.1045 5.62221 11.7284 5 12.4755 5C13.2229 5 13.8466 5.6222 13.8466 6.40508C13.8466 7.18789 13.2227 7.8101 12.4755 7.8101C11.7284 7.8101 11.1045 7.18794 11.1045 6.40508Z" stroke="#8E8E93"/>
                                    <path d="M19.9998 6.40514C19.9998 7.18797 19.3757 7.81016 18.6288 7.81016C17.8818 7.81016 17.2578 7.18794 17.2578 6.40508C17.2578 5.62211 17.8813 5 18.6288 5C19.3763 5 19.9998 5.62215 19.9998 6.40514Z" stroke="#8E8E93"/>
                                    <path d="M7.74249 12.5097C7.74249 13.2926 7.11849 13.9147 6.37133 13.9147C5.62411 13.9147 5 13.2926 5 12.5097C5 11.7267 5.62419 11.1044 6.37133 11.1044C7.11842 11.1044 7.74249 11.7266 7.74249 12.5097Z" stroke="#8E8E93"/>
                                    <path d="M13.7976 12.5097C13.7976 13.2927 13.1736 13.9147 12.4266 13.9147C11.6795 13.9147 11.0557 13.2927 11.0557 12.5097C11.0557 11.7265 11.6793 11.1044 12.4266 11.1044C13.1741 11.1044 13.7976 11.7265 13.7976 12.5097Z" stroke="#8E8E93"/>
                                    <path d="M19.9516 12.5097C19.9516 13.2927 19.328 13.9147 18.5807 13.9147C17.8329 13.9147 17.209 13.2925 17.209 12.5097C17.209 11.7268 17.8332 11.1044 18.5807 11.1044C19.3279 11.1044 19.9516 11.7265 19.9516 12.5097Z" stroke="#8E8E93"/>
                                    <path d="M5.04297 18.5947C5.04297 17.8118 5.66709 17.1896 6.4143 17.1896C7.16137 17.1896 7.78523 17.8116 7.78523 18.5947C7.78523 19.3778 7.16139 19.9997 6.4143 19.9997C5.66714 19.9997 5.04297 19.3773 5.04297 18.5947Z" stroke="#8E8E93"/>
                                    <path d="M11.0986 18.5947C11.0986 17.8118 11.7227 17.1896 12.47 17.1896C13.2169 17.1896 13.8409 17.8117 13.8409 18.5947C13.8409 19.3778 13.2169 19.9997 12.47 19.9997C11.7225 19.9997 11.0986 19.3774 11.0986 18.5947Z" stroke="#8E8E93"/>
                                    <path d="M17.252 18.5947C17.252 17.8117 17.876 17.1896 18.6229 17.1896C19.3699 17.1896 19.9939 17.8117 19.9939 18.5947C19.9939 19.3778 19.3702 19.9997 18.6229 19.9997C17.876 19.9997 17.252 19.3774 17.252 18.5947Z" stroke="#8E8E93"/>
                                </svg>
                            </a>
                            <a href="#" class="btn-view list">
                                <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M19.7016 18.3317H9.00246C8.5615 18.3317 8.2041 17.9743 8.2041 17.5333C8.2041 17.0923 8.5615 16.7349 9.00246 16.7349H19.7013C20.1423 16.7349 20.4997 17.0923 20.4997 17.5333C20.4997 17.9743 20.1426 18.3317 19.7016 18.3317Z" fill="#8E8E93"/>
                                    <path d="M19.7016 13.3203H9.00246C8.5615 13.3203 8.2041 12.9629 8.2041 12.5219C8.2041 12.081 8.5615 11.7236 9.00246 11.7236H19.7013C20.1423 11.7236 20.4997 12.081 20.4997 12.5219C20.5 12.9629 20.1426 13.3203 19.7016 13.3203Z" fill="#8E8E93"/>
                                    <path d="M19.7016 8.30919H9.00246C8.5615 8.30919 8.2041 7.95179 8.2041 7.51083C8.2041 7.06986 8.5615 6.71246 9.00246 6.71246H19.7013C20.1423 6.71246 20.4997 7.06986 20.4997 7.51083C20.4997 7.95179 20.1426 8.30919 19.7016 8.30919Z" fill="#8E8E93"/>
                                    <path d="M5.5722 8.64465C6.16436 8.64465 6.6444 8.16461 6.6444 7.57245C6.6444 6.98029 6.16436 6.50024 5.5722 6.50024C4.98004 6.50024 4.5 6.98029 4.5 7.57245C4.5 8.16461 4.98004 8.64465 5.5722 8.64465Z" fill="#8E8E93"/>
                                    <path d="M5.5722 13.5942C6.16436 13.5942 6.6444 13.1141 6.6444 12.522C6.6444 11.9298 6.16436 11.4498 5.5722 11.4498C4.98004 11.4498 4.5 11.9298 4.5 12.522C4.5 13.1141 4.98004 13.5942 5.5722 13.5942Z" fill="#8E8E93"/>
                                    <path d="M5.5722 18.5438C6.16436 18.5438 6.6444 18.0637 6.6444 17.4716C6.6444 16.8794 6.16436 16.3994 5.5722 16.3994C4.98004 16.3994 4.5 16.8794 4.5 17.4716C4.5 18.0637 4.98004 18.5438 5.5722 18.5438Z" fill="#8E8E93"/>
                                </svg>
                            </a>
                            <div class="wd-find-select flex">
                                <div class="group-select">
                                    <div class="nice-select" tabindex="0"><span class="current">عرض: 50</span>
                                        <ul class="list style">                                                          
                                          <li data-value="10" class="option">عرض: 10</li>
                                          <li data-value="30" class="option">عرض: 30</li>
                                          <li data-value="50" class="option selected">عرض: 50</li>
                                          <li data-value="100" class="option">عرض: 100</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="group-select">
                                    <div class="nice-select" tabindex="0"><span class="current">الترتيب الافتراضي</span>
                                        <ul class="list style">                                                          
                                          <li data-value class="option selected">الترتيب الافتراضي</li>
                                          <li data-value="by-latest" class="option">الكل </li>
                                          <li data-value="low-to-high" class="option">من الأقل للأعلى</li>
                                          <li data-value="high-to-low" class="option">من الأعلى للأقل/li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="wrap-item form-wg flex flex-wrap">
                        @forEach($properties as $property)
                        <!-- col 1 -->
                        <div class="box box-dream flex hv-one wg-box">
                            <div class="image-group relative ">
                                <span class="featured fs-12 fw-6">مميز</span>    
                                <span class="featured style fs-12 fw-6">للإيجار</span>
                                <span class="icon-bookmark"><i class="far fa-bookmark"></i></span> 
                                <div class="swiper-container noo carousel-2 img-style" >    
                                    <a href="{{route('all-properties.show',$property->id)}}" class="icon-plus"><img src="{{asset('assets/images/icon/plus.svg')}}" alt="images"></a>
                                    <div class="swiper-wrapper ">
                                        @forEach($property->images as $image)
                                        <div class="swiper-slide"><img src="{{asset($image->image )}}" alt="images"></div>
                                       
                                        @endforeach
                                    </div>
                                    <div class="pagi2"><div class="swiper-pagination2" >  </div> </div>
                                    <div class="swiper-button-next2 "><i class="fal fa-arrow-right"></i></div>
                                    <div class="swiper-button-prev2 "><i class="fal fa-arrow-left"></i> </div>                                        
                                </div>
                            </div>
                            <div class="content">
                                <h3 class="link-style-1"><a href="{{route('all-properties.show',$property->id)}}">{{$property->title}}</a> </h3>
                                <div class="text-address"><p class="p-12">{{$property->address}}</p></div>
                                <div class="money fs-20 fw-8 font-2 text-color-3"><a href="{{route('all-properties.show',$property->id)}}">{{$property->rate_per_day}} @lang('website.SAR')</a></div>  
                                <div class="icon-box">
                                    @foreach($property->Property_Sub_Amenity as $property_Sub_Amenity)
                                    <div class="icons  flex">
                                        <img width="20px" height="20px" src="{{ $property_Sub_Amenity->subAmenities->amenity->icon }}" alt="">

                                        <span>{{$property_Sub_Amenity->subAmenities->name}}: </span><span class="fw-6">{{$property_Sub_Amenity->number}}</span></div>
                                    @endforeach
                                </div>   
                                <div class="img-box flex justify-space align-center">
                                    
                                    <div class="img-author flex align-center"><img src="{{asset($property->user->image)}}" alt="images"><div class="fs-13 fw-6 link-style-1"><a href="#">{{$property->user->name}}</a></div> </div>
                                    <a class="icon-repeat">
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M5 14L2 11M2 11L5 8M2 11H11M11 2L14 5M14 5L11 8M14 5H5" stroke="#1C1C1E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </a>
                                </div>                                           
                            </div>
                        </div>
                        @endforeach
                       
                      
                    </div>
                    {{ $properties->links('vendor.pagination.default') }}

                    {{-- <div class="themesflat-pagination clearfix style center">
                        <ul>
                            <li><a href="#" class="page-numbers style"><i class="far fa-angle-left"></i></a></li>
                            <li><a href="#" class="page-numbers">1</a></li>
                            <li><a href="#" class="page-numbers">2</a></li>
                            <li><a href="#" class="page-numbers current">3</a></li>
                            <li><a href="#" class="page-numbers">4</a></li>
                            <li><a href="#" class="page-numbers">...</a></li>
                            <li><a href="#" class="page-numbers style"><i class="far fa-angle-right"></i></a></li>
                        </ul>
                    </div> --}}
                </div>  
            </div>
        </div>
    </section>


    <section class="flat-contact2 relative" >
        <div class="container">
            <div class="row">                      
                <div class="col-lg-12">
                    <div class="heading-section">
                        <h2>ابحث عن منزل أحلامك وزد من فرص الاستثمار الخاصة بك</h2>
                        <p class="text-color-2 font-2">اكتشف منزلك المثالي واستثمر في مستقبلك بأمان، نحن هنا لمساعدتك في تحقيق أحلامك</p>
                        <div class="button-footer">
                            <a class="sc-button center btn-icon" href="contact.html">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M2.25 6.75C2.25 15.034 8.966 21.75 17.25 21.75H19.5C20.0967 21.75 20.669 21.5129 21.091 21.091C21.5129 20.669 21.75 20.0967 21.75 19.5V18.128C21.75 17.612 21.399 17.162 20.898 17.037L16.475 15.931C16.035 15.821 15.573 15.986 15.302 16.348L14.332 17.641C14.05 18.017 13.563 18.183 13.122 18.021C11.4849 17.4191 9.99815 16.4686 8.76478 15.2352C7.53141 14.0018 6.58087 12.5151 5.979 10.878C5.817 10.437 5.983 9.95 6.359 9.668L7.652 8.698C8.015 8.427 8.179 7.964 8.069 7.525L6.963 3.102C6.90214 2.85869 6.76172 2.6427 6.56405 2.48834C6.36638 2.33397 6.1228 2.25008 5.872 2.25H4.5C3.90326 2.25 3.33097 2.48705 2.90901 2.90901C2.48705 3.33097 2.25 3.90326 2.25 4.5V6.75Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>                               
                                <span>اتصل بالبائع</span>
                            </a>
                        </div>
                    </div>
                    <div class="mark-img">
                        <img src="{{asset('website/assets/images/mark/mark-contact2.png')}}" alt="images">
                    </div>
                </div>
            </div>
        </div>
    </section>
















@endsection