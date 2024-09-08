@extends('client.layouts.app')

@section('content')



    <div class="dashboard__content">
        <section class="flat-title2 ">
            <div class="container7">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="title-group fs-30 lh-45 fw-7">@lang('dashboard.bookings')</div>

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

                        <div style="width:100% !important" class="tf-new-listing ">
                            <div class="new-listing bg-white">
                                <div class="form-group-4 ">
                                    <div class="button-search sc-btn-top">
                                        {{-- <a href="{{route('client-bank-accounts.create')}}" class="sc-button">
                                            <span>@lang('dashboard.create_title', ['page_title' => __('dashboard.booking')])</span>
                                            <i class="far fa-plus text-color-1"></i>
                                        </a> --}}
                                    </div>
                                </div>

                                <div class="table-content">
                                    <div class="wrap-listing table-responsive">
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th class="fw-6">@lang('dashboard.property')</th>
                                                    <th class="fw-6">@lang('dashboard.client')</th>
                                                    <th class="fw-6">@lang('dashboard.Total amount')</th>
                                                    <th class="fw-6">@lang('dashboard.Net account')</th>


                                                    <th class="fw-6">@lang('dashboard.Payment status')</th>

                                                    {{-- <th class="fw-6">@lang('dashboard.actions')</th> --}}
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($bookings as $booking)
                                                    <tr>
                                                        <td>{{ $booking->property->title }}</td>
                                                        <td> {{ $booking->client->name }}
                                                        </td>
                                                        <td>{{ $booking->total_price }}</td>
                                                        <td>{{$booking->payment->owner_amount}}</td>
                                                        <td>{{ $booking->payment->status }}</td>
                                                       

                                                    </tr>
                                                @endforeach



                                            </tbody>

                                        </table>
                                        {{--  --}}
                                        {{ $bookings->links('vendor.pagination.default') }}


                                    </div>

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
                document.querySelectorAll('.nice-select .option').forEach(opt => opt.classList.remove(
                    'selected'));

                // Add the selected class to the clicked option
                this.classList.add('selected');
            });
        });
    </script>
@endsection
