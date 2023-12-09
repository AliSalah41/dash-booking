@extends('admin.layouts.app')
@section('home', '/User')
@section('title')
    {{__('words.users')}}
@stop
@section('subtitle')
    {{__('words.add_client')}}
@stop

@section('content')
    <div class="row">
        <div class="col-xl-9 mx-auto mt-5">
            <div class="card border-top border-0 border-4 border-primary">
                <div class="card-body p-5">
                    <div class="card-title d-flex align-items-center">
                        <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
                        </div>
                        <h5 class="mb-0 text-primary">{{ __('words.client_info') }}</h5>
                    </div>
                    <hr>
                    <form class="row g-3" action='{{route('users.store')}}' method="POST">
                        @csrf
                        <div class="col-md-12">
                            <label for="inputLastName1" class="form-label">{{ __('words.name') }}</label>
                            <div class="input-group"> <span class="input-group-text bg-transparent">
                                    <i class='bx bxs-user'></i></span>
                                <input type="text" name="name" class="form-control border-start-0" id="inputLastName1"
                                       placeholder="{{ __('words.name') }}"/>
                            </div>
                            @error('name')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label for="birthdate">Birth Date</label>
                            <input type="date" class="form-control border-start-0" id="birthdate" name="birth"/>
                        </div>
                        @error('birth')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror

                        <div class="col-12">
                            <label for="inputPhone" class="form-label">{{ __('words.phone') }}</label>
                            <div class="input-group"><span class="input-group-text bg-transparent"><i
                                        class="bx bxs-phone"></i></span>
                                <input type="number" maxlength="11" class="form-control border-start-0" id="inputPhone"
                                       placeholder="{{ __('words.phone') }}" name="phone"/>
                            </div>
                            @error('phone')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <label for="inputLastName1" class="form-label">{{ __('words.nickname') }}</label>
                            <div class="input-group"> <span class="input-group-text bg-transparent">
                                    <i class='bx bxs-user'></i></span>
                                <input type="text" name="nickName" class="form-control border-start-0"
                                       id="inputLastName1"
                                       placeholder="{{ __('words.nickname') }}"/>
                            </div>
                        </div>
                        @error('nickName')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror


                        <div class="col-12">
                            <label for="inputEmailAddress" class="form-label">{{ __('words.email') }}</label>
                            <div class="input-group"> <span class="input-group-text bg-transparent"><i
                                        class='bx bxs-message'></i></span>
                                <input type="text" class="form-control border-start-0" id="inputEmailAddress"
                                       placeholder="{{ __('words.email') }}" name="email"/>
                            </div>
                        </div>
                        @error('email')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                        <div class="col-12">
                            <label for="inputEmailAddress" class="form-label">{{ __('words.password') }}</label>
                            <div class="input-group"> <span class="input-group-text bg-transparent"><i
                                        class='bx bxs-message'></i></span>
                                <input type="password" class="form-control border-start-0" id="inputEmailAddress"
                                       placeholder="{{ __('words.password') }}" name="password"/>
                            </div>
                        </div>
                        @error('password')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror


                        {{-- <div class="col-6">
                            <label for="inputImage1" class="form-label">{{ __('words.profile') }}</label>
                            <input type="file" class="form-control border-start-0" id="inputImage1" id="profile"
                                accept="image/jpeg, image/png, image/jpg" name="profile">
                            <img id="previewImage1">
                        </div> --}}


                        <div class="col-12 d-flex">
                            <button type="submit"
                                    class="btn btn-primary px-5 ms-auto">{{ __('words.add_client') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- @yield('imagePreview') --}}
@endsection
