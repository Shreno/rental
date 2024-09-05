@extends('client.layouts.app')

@section('content')



    <div class="dashboard__content">
        <section class="flat-title2 ">
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

        <section class="flat-dashboard">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 flex post-col">

                        <div style="width:auto !important" class="tf-new-listing ">
                            <div class="new-listing bg-white">
                                <h3 class="titles">@lang('dashboard.menu')</h3>
                                <form method="get" action="{{ route('client-properties.index') }}">
                                    <input type="hidden" name="search" value="search">
                                    <div class="wrap-form wd-find-select date-wgs flex">
                                        <div class="form-group-1 search-form form-style relative">
                                            <i class="far fa-search"></i>
                                            <input type="search" class="search-field" placeholder="@lang('dashboard.search_title', ['page_title' => __('dashboard.properties')])"
                                                value="{{ isset($search_input) ? $search_input : '' }}" name="search_input"
                                                title="Search for">
                                        </div>
                                        <div class="form-group-2 form-style relative">
                                            <input type="date" class="date-wg" name="from_date"
                                                value="{{ isset($from) ? $from : '' }}">
                                            <p class="p-date">@lang('dashboard.From Date')</p>
                                        </div>
                                        <div class="form-group-3 form-style relative">
                                            <input type="date" class="date-wg" name="to_date"
                                                value="{{ isset($to) ? $to : '' }}">
                                            <p class="p-date"> @lang('dashboard.To Date')</p>
                                        </div>
                                        <div class="form-group-4">
                                            <div class="group-select">
                                                @php
                                                    $selectedStatus = isset($status) && $status !== '' ? $status : -1;
                                                @endphp
                                                <div class="nice-select" tabindex="0"><span class="current">
                                                        @if ($selectedStatus == 1)
                                                            @lang('dashboard.Accepted')
                                                        @elseif($selectedStatus == 2)
                                                            @lang('dashboard.refused')
                                                        @elseif($selectedStatus == 0)
                                                            @lang('dashboard.On Waiting')
                                                        @else
                                                            @lang('dashboard.status')
                                                        @endif
                                                    </span>
                                                    <ul class="list style">
                                                        <li data-value=""
                                                            class="option {{ $selectedStatus == -1 ? 'selected' : '' }}">
                                                            @lang('dashboard.status')</li>
                                                        <li data-value="1"
                                                            class="option {{ $selectedStatus == 1 ? 'selected' : '' }}">
                                                            @lang('dashboard.Accepted')</li>
                                                        <li data-value="2"
                                                            class="option {{ $selectedStatus == 2 ? 'selected' : '' }}">
                                                            @lang('dashboard.refused')</li>
                                                        <li data-value="0"
                                                            class="option {{ $selectedStatus == 0 ? 'selected' : '' }}">
                                                            @lang('dashboard.On Waiting')</li>

                                                    </ul>
                                                    <input type="hidden" name="status" id="status-input"
                                                        value="{{ $selectedStatus }}">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-group-4 ">
                                        <div class="button-search sc-btn-top">
                                            <button type="submit" class="sc-button">
                                                <span>@lang('dashboard.Search Now')</span>
                                                <i class="far fa-search text-color-1"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                <div class="sub-text fs-12 lh-18 "><span
                                        class="one font-2 fw-7">{{ $totalPropertiesCount }}</span> <span>@lang('dashboard.Results found')
                                    </span> </div>
                                <div class="table-content">
                                    <div class="wrap-listing table-responsive">
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th class="fw-6">@lang('dashboard.menu')</th>
                                                    <th class="fw-6">@lang('dashboard.status')</th>
                                                    <th class="fw-6">@lang('dashboard.actions')</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- col 1 -->
                                                @foreach ($properties as $property)
                                                    <tr class="file-delete">
                                                        <td>
                                                            <div class="candidates-wrap flex">
                                                                <div class="images">
                                                                    <img src="{{ asset($property->images->first()->image) }}"
                                                                        alt="images">
                                                                </div>
                                                                <div class="content">
                                                                    {{-- <h4 class="link-style-1"><a href="property-detail-v1.html">{{}}</a> </h4> --}}
                                                                    <div class="text-date">
                                                                        <p class="p-12 text-color-2 lh-18">
                                                                            @lang('dashboard.Created Date'):
                                                                            @if (session()->get('lang') == 'en')
                                                                                {{ \Carbon\Carbon::parse($property->created_at)->translatedFormat('d F Y') }}
                                                                            @else
                                                                                {{ \Carbon\Carbon::parse($property->created_at)->locale('ar')->translatedFormat('d F Y') }}
                                                                            @endif
                                                                        </p>
                                                                    </div>
                                                                    <div class="money fs-16 fw-6 text-color-3">
                                                                        {{ $property->rate_per_day }}</div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            @if ($property->is_active == 1)
                                                                <div class="status-wrap">
                                                                    <div class="button-status fs-12 fw-6 lh-18">
                                                                        @lang('dashboard.Accepted')</div>
                                                                </div>
                                                            @elseif($property->is_active == 0)
                                                                <div class="status-wrap">
                                                                    <div class="button-status fs-12 fw-6 lh-18 style-1">
                                                                        @lang('dashboard.On Waiting')</div>
                                                                </div>
                                                            @elseif($property->is_active == 2)
                                                                <div class="status-wrap">

                                                                    <div class="button-status fs-12 fw-6 lh-18 style-2">
                                                                        @lang('dashboard.refused')</div>
                                                                </div>
                                                            @endif

                                                        </td>
                                                        <td>
                                                            <div class="icon-wrap">
                                                                <ul class="">
                                                                    <li class="">
                                                                        <a class="fw-6"
                                                                            href="{{ route('client-properties.edit', $property->id) }}"><i
                                                                                class="far fa-pen"></i>@lang('dashboard.edit')</a>
                                                                    </li>
                                                                    <li class="">

                                                                        @if ($property->is_active == 1)
                                                                            @if ($property->publish == 1)
                                                                                <a href="#" class="fw-6"
                                                                                    onclick="event.preventDefault(); if(confirm('Are you sure you want to unpublish this property?')) { document.getElementById('delete-form-{{ $property->id }}').submit(); }">
                                                                                    <i class="fal fa-trash-alt"></i>
                                                                                    @lang('dashboard.unpublish')
                                                                                </a>
                                                                            @else
                                                                                <a href="#" class="fw-6"
                                                                                    onclick="event.preventDefault(); if(confirm('Are you sure you want to publish this property?')) { document.getElementById('delete-form-{{ $property->id }}').submit(); }">
                                                                                    <i class="fal fa-trash-alt"></i>
                                                                                    @lang('dashboard.publish')
                                                                                </a>
                                                                            @endif
                                                                    </li>
                                                                @else
                                                                    <li class="">
                                                                        <a href="#" class="fw-6"
                                                                            onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this property?')) { document.getElementById('delete-form-{{ $property->id }}').submit(); }">
                                                                            <i class="fal fa-trash-alt"></i>
                                                                            @lang('dashboard.delete')
                                                                        </a>


                                                                    </li>
                                                @endif
                                                <form id="delete-form-{{ $property->id }}"
                                                    action="{{ route('client-properties.destroy', $property->id) }}"
                                                    method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                </ul>
                                    </div>
                                    </td>
                                    </tr>
                                    @endforeach


                                    </tbody>
                                    </table>

                                </div>
                                {{ $properties->links('vendor.pagination.default') }}

                            </div>
                        </div>
                       

                    </div>
                  
                </div>
            </div>
    </div>
    </section>


    </div>
















@endsection
@section('scripts')
<script>
    document.querySelectorAll('.nice-select .option').forEach(option => {
        option.addEventListener('click', function() {
            let selectedValue = this.getAttribute('data-value');
            document.getElementById('status-input').value = selectedValue;
            
            // Update the current display text
            document.querySelector('.nice-select .current').textContent = this.textContent;
            
            // Remove the selected class from all options
            document.querySelectorAll('.nice-select .option').forEach(opt => opt.classList.remove('selected'));
            
            // Add the selected class to the clicked option
            this.classList.add('selected');
        });
    });
</script>

@endsection
