@extends('admin.layouts.app')
@section('home', '/emails')
@section('title')
    {{ __('words.app_content') }}
@stop
@section('subtitle')
    {{ __('words.company_emails') }}
@stop

@section('content')
    <div class="row">
        <div class="col-xl-9 mx-auto mt-5">
            <div class="card border-top border-0 border-4 border-primary">
                <div class="card-body p-5">
                    <div class="card-title d-flex align-items-center">
                        <div><i class="bx bxs-message me-1 font-22 text-primary"></i>
                        </div>
                        <h5 class="mb-0 text-primary">{{ __('words.update_company_email') }}</h5>
                    </div>
                    <hr>
                    <form class="row g-3" action='{{ route('emails.update', $email->id) }}' method="POST">
                        @csrf
                        @method('PUT')
                        <div class="col-md-12">
                            <label for="inputLastName1" class="form-label">{{ __('words.email') }}</label>
                            <div class="input-group"> <span class="input-group-text bg-transparent">
                                    <i class='bx bxs-company'></i></span>
                                <input type="text" value="{{ $email->content }}" name="content"
                                    class="form-control border-start-0" id="inputLastName1" placeholder="{{ __('words.email') }}" />
                            </div>
                            @error('content')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <label for="inputLastName2" class="form-label">{{ __('words.language') }}</label>
                            <div class="input-group"> <span class="input-group-text bg-transparent">
                                    <i class='bx bxs-company'></i></span>
                                    <select class="form-control" name="local" class="mb-3">
                                            <option {{  ($email->local == 'ar')? 'selected':'' }} value="ar">Arabic</option>
                                            <option {{  ($email->local == 'en')? 'selected':'' }} value="en">English</option>
                                    </select>
                            </div>
                            @error('local')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- <div class="col-md-12">
                            <label for="inputLastName3" class="form-label">{{ __('words.country') }}</label>
                            <div class="input-group"> <span class="input-group-text bg-transparent">
                                <i class='bx bxs-company'></i></span>

                                <select class="form-control single-select" name="countries_id" class="mb-3">
                                        @foreach ($countries as $country)
                                            <option {{ ($email->countries_id == $country->id)?'selected': '' }} value="{{ $country->id }}">{{ $country->country }}</option>
                                        @endforeach
                                    </select>
                            </div>
                            @error('countries_id')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div> --}}

                        <div class="col-md-12">
                            <label for="inputLastName11" class="form-label">{{ __('words.type') }}</label>
                            <div class="input-group"> <span class="input-group-text bg-transparent">
                                    <i class='bx bxs-company'></i></span>
                                    <input type="text" value="{{ $email->type }}" name="type"
                                    class="form-control border-start-0" id="inputLastName11" placeholder="{{ __('words.type') }}" />
                            </div>
                            @error('type')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>


                        <div class="col-12 d-flex">
                            <button type="submit" class="btn btn-primary px-5 ms-auto">{{ __('words.update_company_email') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- @yield('imagePreview') --}}
@endsection
@section('scripts')
<script>
    $('.single-select').select2({
        theme: 'bootstrap4',
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass(
            'w-100') ? '100%' : 'style',
        placeholder: $(this).data('placeholder'),
        allowClear: Boolean($(this).data('allow-clear')),
    });
</script>
@endsection