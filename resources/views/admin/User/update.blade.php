<base href="/public">
@extends('admin.layouts.app')
@section('home', '/User')
@section('title')
    {{ __('words.users') }}
@stop
@section('subtitle')
    {{ __('words.update_client') }}
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
                    <form class="row g-3" action='{{ route('users.update', $user->id) }}' method="POST">
                        @method('put')
                        @csrf
                        <div class="col-md-12">
                            <label for="inputName" class="form-label">{{ __('words.name') }}</label>
                            <input type="text" name="name" class="form-control"
                                value="{{ $user->name }}" id="inputName">
                            @error('name')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="birth" class="form-label">{{ __('words.birth') }}</label>
                            <input type="date" name="birth" class="form-control"
                                value="{{ $user->birth }}" id="birth">
                            @error('birth')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        @error('birth')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                        <div class="col-md-12">
                            <label for="email" class="form-label">{{ __('words.email') }}</label>
                            <input type="email" name="email" class="form-control"
                                value="{{ $user->email }}" id="email">
                        </div>
                        @error('email')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                        <div class="col-md-12">
                            <label for="nickName" class="form-label">{{ __('words.nickname') }}</label>
                            <input type="text" name="nickName" class="form-control"
                                value="{{ $user->nickName }}" id="nickName">
                        </div>
                        @error('nickName')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                        <div class="col-md-12">
                            <label for="phone" class="form-label">{{ __('words.phone') }}</label>
                            <input type="text" maxlength="11" name="phone" class="form-control"
                                value="{{ $user->phone }}" id="phone">
                        </div>
                        @error('phone')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                        <div class="col-12">
                            <label for="inputEmailAddress" class="form-label">{{ __('words.password') }}</label>
                            <div class="input-group"> <span class="input-group-text bg-transparent"><i
                                        class='bx bxs-message'></i></span>
                                <input value="{{$user->password}}" type="password" class="form-control border-start-0" id="inputEmailAddress"
                                       placeholder="{{ __('words.password') }}" name="password"/>
                            </div>
                        </div>
                        @error('password')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                        <div class="col-12 d-flex">
                            <button type="submit"
                                class="btn btn-primary px-5 ms-auto">{{ __('words.update_client') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
