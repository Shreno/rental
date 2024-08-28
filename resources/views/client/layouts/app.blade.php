<!DOCTYPE html>
<html  lang="{{ app()->getLocale() }}" direction="{{app()->getLocale() == "ar" ? "rtl" : "ltr" }}" dir="{{app()->getLocale() == "ar" ? "rtl" : "ltr" }}" style="direction: {{app()->getLocale() == "ar" ? "rtl" : "ltr" }}">
	<!--begin::Head-->
	<head>
		<title>@lang('dashboard.app_name') | @yield('pageTitle')</title>
		<meta charset="utf-8" />
		<meta name="description" content="@lang('dashboard.app_desc')" />
		<meta name="keywords" content="@lang('dashboard.app_key_words')" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta name="csrf-token" content="{{ csrf_token() }}" />
		<meta property="og:locale" content="{{ (App::isLocale('ar') ? 'ar_EG' : 'en_US') }}" />
		<meta property="og:type" content="website" />
		<meta property="og:title" content="@lang('dashboard.app_name')" />
		<meta property="og:url" content="{{ Request::fullUrl() }}" />
		<meta property="og:image:type" content="image/png" />
		<meta property="og:image:width" content="1200" />
		<meta property="og:image:height" content="600" />
		<meta property="og:site_name" content="@lang('dashboard.app_name')" />
		<link rel="canonical" href="{{ Request::fullUrl() }}" />
		<link rel="shortcut icon" href="{{asset('images/logo.webp')}}" />



		<link href="{{asset('css/jquery.toast.css')}}" rel="stylesheet" />
		
		<link href="https://fonts.googleapis.com/css2?family=Changa:wght@200;400&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />


	
	
		<!-- Favicon and Touch Icons  -->
		<link rel="shortcut icon" href="assets/images/logo/Favicon.png">
		<link rel="apple-touch-icon-precomposed" href="assets/images/logo/Favicon.png">

	    @if(app()->getLocale() == "en")
		<!--EN-->
		<!--begin::Page Vendor Stylesheets(used by this page)-->
		<link rel="stylesheet" href="{{asset('client/app/dist/font-awesome.css')}}">
    
		<link rel="stylesheet" href="{{asset('client/app/dist/app.css')}}">
		<link rel="stylesheet" href="{{asset('client/app/dist/responsive.css')}}">
		<link rel="stylesheet" href="{{asset('client/app/dist/owl.css')}}">
		<!--end::Global Stylesheets Bundle-->
        <!--EN-->
        @else
		<!--ar-->
		<link rel="stylesheet" href="{{asset('client/app/dist/font-awesome.css')}}">
    
		<link rel="stylesheet" href="{{asset('client/app/dist/app.css')}}">
		<link rel="stylesheet" href="{{asset('client/app/dist/responsive.css')}}">
		<link rel="stylesheet" href="{{asset('client/app/dist/owl.css')}}">
		<!--ar-->
		@endif

		@yield('style')
	</head>
	<body class="body counter-scroll dashboard show " >

		<div class="preload preload-container">
			<div class="boxes ">
				<div class="box">
					<div></div> <div></div> <div></div> <div></div>
				</div>
				<div class="box">
					<div></div> <div></div> <div></div> <div></div>
				</div>
				<div class="box">
					<div></div> <div></div> <div></div> <div></div>
				</div>
				<div class="box">
					<div></div> <div></div> <div></div> <div></div>
				</div>
			</div>
		</div>
		
		<!-- /preload -->
	
		<div id="wrapper">
			<div id="pagee" class="clearfix">

					  @include('client.layouts.menu')
					  @include('client.layouts.header')

					
				<!--end::Header-->
   
                @yield('content')

				
				@include('client.layouts.footer')
			</div>
			<!--end::Wrapper-->
		</div>
		<!--end::Page-->
       
       
   


<a id="scroll-top" class="button-go"></a>
	

<!-- Javascript -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.1/dist/chart.min.js"></script>
<script src="{{asset('client/app/js/apexcharts.js')}}"></script>
<script src="{{asset('client/app/js/jquery.min.js')}}"></script>
<script src="{{asset('client/app/js/jquery.easing.js')}}"></script>
<script src="{{asset('client/app/js/jquery.nice-select.min.js')}}"></script>
<script src="{{asset('client/app/js/jquery.cookie.js')}}"></script>
<script src="{{asset('client/app/js/bootstrap.min.js')}}"></script>
<script src="{{asset('client/app/js/swiper-bundle.min.js')}}"></script>
<script src="{{asset('client/app/js/countto.js')}}"></script>

<script src="{{asset('client/app/js/plugin.js')}}"></script>
<script src="{{asset('client/app/js/shortcodes.js')}}"></script>
<script src="{{asset('client/app/js/main.js')}}"></script>
<script src="{{asset('client/app/js/dashboard-menu.min.js')}}"></script>
<script src="{{asset('client/app/js/dashboard-menu.js')}}"></script>
</body>

</html>
