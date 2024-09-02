@extends('client.layouts.app')

@section('content')


<div class="dashboard__content">
    <section class="flat-title2 " >
        <div class="container7">
            <div class="row">                      
                <div class="col-lg-12">
                        <div class="title-group fs-30 lh-45 fw-7">@lang('dashboard.All notifications')</div>
                </div> 
            </div>
        </div>
    </section>

    <section class="flat-dashboard flat-all-review" >
        <div class="container7">
            <div class="row">                      
                <div class="col-lg-12">
                    
                    <div class="tf-reviews">
                        <div class="reviews-sidebar messages-sidebar bg-white">
                            @if(count($notifications)==0)  @lang('dashboard.No notifications')
                            @endif
                            <ul>
                                @foreach ($notifications as $notification)

                                <li>
                                    <div class="image-box flex align-center">
                                        <div class="images">
                                            <img src="{{asset('images/notifications.png')}}" alt="" width="197" height="48" class="img-logo">
                                        </div>
                                        {{$notification->sender['name']}}
                                        <p class="fs-12 lh-18">{{ $notification->created_at->diffForHumans() }}</p>
                                    </div>
                                    <div class="content">
                                        <p class="text-color-2">{{$notification->data['title_'.lang()]}}
                                        </p>
                                        {{$notification->data['body_'.lang()]}}
                                       
                                    </div>
                                </li>
                                @endforeach

                              
                            </ul>
                        </div>
                        {{ $notifications->links('vendor.pagination.default') }}

                       
                    </div>
                </div>
            </div>
        </div>
    </section>

  </div>
@endsection
