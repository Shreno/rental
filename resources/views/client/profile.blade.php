@extends('client.layouts.app')

@section('content')

  <div class="dashboard__content">
    <section class="flat-title2 " >
        <div class="container7">
            <div class="row">                      
                <div class="col-lg-12">
                        <div class="title-group fs-30 lh-45 fw-7"></div>
                </div> 
            </div>
        </div>
    </section>
    <section class="flat-profile flat-upload-photo" >
        <div class="container7">
            <form method="POST"  action="{{ route('client.profile_update' , auth()->user()->id)}}" class="form fv-plugins-bootstrap5 fv-plugins-framework store" 
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
            <div class="row">                      
                <div class="col-lg-12">
                    <div class="tf-uploads bg-white">
                        <h3 class="titles">@lang('dashboard.avatar')</h3>

                        <div class="wrap-upload ">
                            <div class="box-upload flex">
                                <div class="img-up relative">                                
                                    <img class="avatar" id="profileimg" src="{{ auth()->user()->image }}" alt="">                                    
                                </div>  
                                <div class="content">
                                    <div class="subtitle">@lang('dashboard.Upload a new avatar')</div>
                                    <div class="button-box relative flex align-center" id="upload-profile">
                                        <a href="#" class="btn-upload sc-button">
                                            <span class="fw-14 fw-6"> @lang('dashboard.image_requirments')</span> </a>
                                            <input id="tf-upload-img" type="file" name="image" >
                                            <div class="">@lang('dashboard.No files were selected')</div> 
                                    </div>
                                    {{-- <p class="fs-12 lh-18">JPEG 100x100</p>  --}}
                                    
                                </div>                     
                            </div>              
                        </div> 
                        
                    </div>
                    <div class="tf-infomation bg-white">
                        <h3 class="titles">@lang('dashboard.Information')</h3>
                        <div class="info-box info-wg">
                            <div class="inner-1">
                                <fieldset>
                                    <label class="title-user fw-6">@lang('dashboard.full_name')</label>
                                    <input type="text" name="name" value="{{ auth()->user()->name }}" placeholder="Esther Howard" class="input-form" required>
                                </fieldset>
                            </div>
                            <div class="inner-1">
                                <fieldset>
                                    <label class="title-user fw-6">@lang('dashboard.email')</label>
                                    <input type="text" name="email" value="  {{ auth()->user()->email }}" placeholder="Esther Howard" class="input-form" required>
                                </fieldset>
                            </div>
                            <div class="inner-1">
                                <fieldset>
                                    <label class="title-user fw-6">@lang('dashboard.phone')</label>
                                    <input type="text" name="phone" value="  {{ auth()->user()->phone }}" placeholder="Esther Howard" class="input-form" required>
                                </fieldset>
                            </div>
                            <div class="inner-1">
                                <fieldset>
                                    <label class="title-user fw-6">@lang('dashboard.password')</label>
                                    <input type="password" name="password" value="" placeholder="" class="input-form" >
                                </fieldset>
                            </div>
                          
                          
                           
                          
                          
                           
                            <div class="wrap-button tf-save">
                                <button class="sc-button" name="submit" type="submit">
                                    <span>@lang('dashboard.Save & preview')</span>
                                </button>
                            </div>
                        </div>
                    </div>  

                    <div class="tf-bottom">
                        <div class="title-bottom center text-color-4"> جميع الحقوق محفوظة © 2023 <a href="https://themeforest.net/user/themesflat/portfolio" class="text-color-4 fw-6">Sy.</a> </div>
                    </div>
                </div> 
            </div>
            </form>
        </div>
    </section>
  </div>
           
@endsection