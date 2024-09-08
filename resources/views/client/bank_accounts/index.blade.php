@extends('client.layouts.app')

@section('content')



    <div class="dashboard__content">
        <section class="flat-title2 ">
            <div class="container7">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="title-group fs-30 lh-45 fw-7">@lang('dashboard.bank_accounts')</div>

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
                                        <a href="{{route('client-bank-accounts.create')}}" class="sc-button">
                                            <span>@lang('dashboard.create_title', ['page_title' => __('dashboard.bank_account')])</span>
                                            <i class="far fa-plus text-color-1"></i>
                                        </a>
                                    </div>
                                </div>
                           
                                <div class="table-content">
                                    <div class="wrap-listing table-responsive">
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th class="fw-6">@lang('dashboard.bank')</th>
                                                    <th class="fw-6">@lang('dashboard.account number')</th>
                                                    <th class="fw-6">@lang('dashboard.Iban')</th>

                                                    <th class="fw-6">@lang('dashboard.actions')</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($bank_accounts as $bank_account)
                                                <tr>
                                                    <td>{{$bank_account->bank->name}}</td>
                                                    <td>{{$bank_account->account_number}}</td>
                                                    <td>{{$bank_account->iban}}</td>
                                                    <td>
                                                        <div class="icon-wrap">
                                                            <ul class="">
                                                                <li class="">
                                                                    <a class="fw-6"
                                                                        href="{{ route('client-bank-accounts.edit', $bank_account->id) }}"><i
                                                                            class="far fa-pen"></i>@lang('dashboard.edit')</a>
                                                                </li>
                                                                <li class="">

                                                        
                                                                <li class="">
                                                                    <a href="#" class="fw-6"
                                                                        onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this bank account?')) { document.getElementById('delete-form-{{ $bank_account->id }}').submit(); }">
                                                                        <i class="fal fa-trash-alt"></i>
                                                                        @lang('dashboard.delete')
                                                                    </a>


                                                                </li>
                                            <form id="delete-form-{{ $bank_account->id }}"
                                                action="{{ route('client-bank-accounts.destroy', $bank_account->id) }}"
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
