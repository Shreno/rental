@extends('dashboard.layouts.app')
@section('pageTitle', isset($booking) ? __('dashboard.edit_booking') : __('dashboard.create_booking'))

@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="toolbar" id="kt_toolbar"></div>
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <div id="kt_content_container" class="container-xxl">
                <div class="card card-flush">
                    <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                        <div class="card-title">
                            <h2>{{ isset($booking) ? __('dashboard.edit_booking') : __('dashboard.create_booking') }}</h2>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <form action="{{ isset($booking) ? route('bookings.update', $booking->id) : route('bookings.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @if(isset($booking))
                                @method('PUT')
                            @endif
                           
                            <div class="mb-10 fv-row">
                                <label class="form-label">العقارات</label>
                                <select name="property_id" id="property_id" class="form-select mb-2">
                                    @foreach($propertys as $property)
                                        <option value="{{ $property->id }}" {{ isset($booking) && $booking->property_id == $property->id ? 'selected' : '' }}>
                                            {{ $property->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="mb-10 fv-row">
                                <label class="form-label">العملاء</label>
                                <select name="client_id" id="client_id" class="form-select mb-2">
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}" {{ isset($booking) && $booking->client_id == $user->id ? 'selected' : '' }}>
                                            {{ $user->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                          
                          
                          

                          
                          
                            <div class="mb-5 fv-row">
                                <label class="form-label">@lang('dashboard.start_date')</label>
                                <input type="date" name="start_date" value="{{old('start_date', isset($booking) ? $booking->start_date : '') }}" class="form-control mb-2">
                                
                            </div>
                            <div class="mb-5 fv-row">
                                <label class="form-label">@lang('dashboard.end_date')</label>
                                <input type="date" value="{{ old('end_date', isset($booking) ? $booking->end_date : '') }}" name="end_date" class="form-control mb-2">
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
    $("#client_id").select2();
    $("#property_id").select2();
  


</script>
@endpush