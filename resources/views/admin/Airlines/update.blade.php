@extends('admin.layouts.app')
@section('home', '/User')
@section('title')
{{ __('words.airlines_country') }}
@stop
@section('subtitle')
{{ __('words.airline_country') }}
@stop

@section('content')
    <div class="row">
        <div class="col-xl-9 mx-auto mt-5">
            <div class="card border-top border-0 border-4 border-primary">
                <div class="card-body p-5">
                    <div class="card-title d-flex align-items-center">
                        <div><i class="fa-solid fa-plane " style="color: #008cff;"></i>
                        </div>
                        <h5 class="mb-0 text-primary">{{ __('words.airline_country') }}</h5>
                    </div>
                    <hr>
{{--    --}}
<form class="row g-3" action='{{route('airlineCountry.update',$airline_country->id)}}' method="POST">
    @method('put')
    @csrf

            <div class="col-12">
                <label for="birthdate"  class="form-label mt-4">{{ __('words.airline_country') }}</label>
                <input type="text" class="form-control border-start-0" id="birthdate" name="country_airport"
                placeholder="{{ __('words.airline_country') }}"
                value="{{  $airline_country->country_airport }}"
                />
            </div>
            @error('country_airport')
            <small class="form-text text-danger">{{ $message }}</small>
            @enderror


            <div class="col-12 d-flex">
                <button type="submit"
                        class="btn btn-primary px-5 ms-auto">{{ __('words.update_airline_country') }}</button>
            </div>
        </div>


    </div>

</div>


</form>
{{--    --}}





                        </div>
                    </div>


    </div>
    {{-- @yield('imagePreview') --}}
@endsection
