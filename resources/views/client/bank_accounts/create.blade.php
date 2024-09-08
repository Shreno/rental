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
          
                {{--  --}}
                <form action="{{ isset($bank_account) ? route('client-bank-accounts.update', $bank_account->id) : route('client-bank-accounts.store') }}" method="POST" class="form fv-plugins-bootstrap5 fv-plugins-framework store" enctype="multipart/form-data">
                    @csrf
                    @if(isset($bank_account))
                        @method('PUT')
                    @endif

                    <input type="hidden" name="user_id" value="{{auth()->user()->id}}">

                {{--  --}}
            <div class="row">                      
                <div class="col-lg-12">
                   

                    <div class="tf-infomation bg-white">
                        <h3 class="titles">@lang('dashboard.Information')</h3>
                        {{-- bank --}}
                        <div class="info-box info-wg">

                                <div class="inner-1">
                                    <fieldset>
                                        <label class="title-user fw-6"> @lang('dashboard.bank') </label>
                                        <div class="nice-select" tabindex="0">
                                            <span class="current">
                                                {{ isset($bank_account) ? $bank_account->bank->name : __('dashboard.select_bank') }}
                                            </span>
                                            <ul class="list style">
                                                <li data-value="" class="option {{ !isset($bank_account) ? 'selected' : '' }}">
                                                    @lang('dashboard.select_bank')
                                                </li>
                                                @foreach($banks as $bank)
                                                <li data-value="{{$bank->id}}"
                                                    class="option {{ isset($bank_account) && $bank->id == $bank_account->bank_id ? 'selected' : '' }}">
                                                    {{$bank->name}}
                                                </li>
                                                @endforeach
                                            </ul>
                                            <input type="hidden" name="bank_id" id="bank_id"
                                                value="{{ isset($bank_account) ? $bank_account->bank_id : '' }}">
                                        </div>
                                    </fieldset>
                                </div>
                            



                        {{--  --}}
                            <div class="inner-1">
                                <fieldset>
                                    <label class="title-user fw-6">@lang('dashboard.account number')</label>
                                    <input type="text" name="account_number" value="{{old('account_number', isset($bank_account) ? $bank_account->account_number : '') }}" placeholder="" class="input-form" required>
                                </fieldset>
                            </div>
                            <div class="inner-1">
                                <fieldset>
                                    <label class="title-user fw-6">@lang('dashboard.Iban')</label>
                                    <input type="text" name="iban" value=" {{ old('iban', isset($bank_account) ? $bank_account->iban : '') }}" placeholder="" class="input-form" required>
                                </fieldset>
                            </div>
                           
                            <div class="wrap-button tf-save">
                                <button class="sc-button" name="submit" type="submit">
                                    <span>@lang('dashboard.Save & preview')</span>
                                </button>
                            </div>
                        </div>
                    </div>  

                   
                </div> 
            </div>
            </form>
        </div>
    </section>
  </div>
           
@endsection

@section('scripts')
<script>
    document.querySelectorAll('.nice-select .option').forEach(option => {
        option.addEventListener('click', function() {
            let selectedValue = this.getAttribute('data-value');
            document.getElementById('bank_id').value = selectedValue;
            
            // Update the current display text
            document.querySelector('.nice-select .current').textContent = this.textContent;
            
            // Remove the selected class from all options
            document.querySelectorAll('.nice-select .option').forEach(opt => opt.classList.remove('selected'));
            
            // Add the selected class to the clicked option
            this.classList.add('selected');
        });
    });
    
    // Set the selected bank on page load
    window.addEventListener('DOMContentLoaded', (event) => {
        let selectedBankName = document.querySelector('.nice-select .option.selected').textContent;
        document.querySelector('.nice-select .current').textContent = selectedBankName;
    });
</script>

@endsection