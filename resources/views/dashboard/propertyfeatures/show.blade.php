@extends('dashboard.layouts.app')
@section('pageTitle', $primaryAmenity->name)

@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="toolbar" id="kt_toolbar"></div>
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <div id="kt_content_container" class="container-xxl">
                <div class="card card-flush">
                    <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                        <div class="card-title">
                            <h2>{{ $primaryAmenity->name }}</h2>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="mb-10">
                            <h3>المرافق الفرعية</h3>
                        </div>
                        <form action="#" method="POST">
                            @csrf
                            @foreach($primaryAmenity->subAmenities as $index =>  $subAmenity)
                                <div class="mb-5 fv-row">
                                    <label class="form-label {{ $subAmenity->is_required ? 'required' : '' }}">{{ $subAmenity->getTranslation('name', 'ar') }}</label>
                                    @if($subAmenity->type == 'select' || $subAmenity->type == 'multiselect')
                                        <select name="sub_amenities[{{ $subAmenity->id }}]" class="form-select mb-2" id="select{{$index}}" {{ $subAmenity->type == 'multiselect' ? 'multiple' : '' }}>
                                            @foreach($subAmenity->options as $option)
                                                <option value="{{ $option->id }}">{{ $option->name }}</option>
                                            @endforeach
                                        </select>
                                    @elseif($subAmenity->type == 'boolean')
                                        <input type="checkbox" name="sub_amenities[{{ $subAmenity->id }}]" value="1" class="form-check-input" />
                                    @else
                                        <input type="{{ $subAmenity->type }}" name="sub_amenities[{{ $subAmenity->id }}]" class="form-control mb-2" />
                                    @endif
                                </div>
                            @endforeach
                            <button type="submit" class="btn btn-primary">إرسال</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        for(let i =1;i < 20;i++)
        {
            $("#select" + i).select2();
        }
    </script>
@endpush 