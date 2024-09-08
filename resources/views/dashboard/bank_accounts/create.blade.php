@extends('dashboard.layouts.app')
@section('pageTitle', isset($bank_account) ? __('dashboard.edit_bank_account') : __('dashboard.create_bank_account'))

@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="toolbar" id="kt_toolbar"></div>
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <div id="kt_content_container" class="container-xxl">
                <div class="card card-flush">
                    <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                        <div class="card-title">
                            <h2>{{ isset($bank_account) ? __('dashboard.edit_bank_account') : __('dashboard.create_bank_account') }}</h2>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <form action="{{ isset($bank_account) ? route('bank-accounts.update', $bank_account->id) : route('bank-accounts.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @if(isset($bank_account))
                                @method('PUT')
                            @endif
                            <div class="mb-10 fv-row">
                                <label class="form-label">العملاء</label>
                                <select name="user_id" id="client_id" class="form-select mb-2">
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}" {{ isset($bank_account) && $bank_account->client_id == $user->id ? 'selected' : '' }}>
                                            {{ $user->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                           
                            <div class="mb-10 fv-row">
                                <label class="form-label">البنوك</label>
                                <select name="bank_id" id="property_id" class="form-select mb-2">
                                    @foreach($banks as $bank)
                                        <option value="{{ $bank->id }}" {{ isset($bank_account) && $bank_account->bank_id == $bank->id ? 'selected' : '' }}>
                                            {{ $bank->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            
                           
                          
                          
                          

                          
                          
                            <div class="mb-5 fv-row">
                                <label class="form-label"> @lang('dashboard.account number')</label>
                                <input type="text" name="account_number" value="{{old('account_number', isset($bank_account) ? $bank_account->account_number : '') }}" class="form-control mb-2">
                                
                            </div>
                            <div class="mb-5 fv-row">
                                <label class="form-label">@lang('dashboard.Iban')</label>
                                <input type="text" value="{{ old('iban', isset($bank_account) ? $bank_account->iban : '') }}" name="iban" class="form-control mb-2">
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