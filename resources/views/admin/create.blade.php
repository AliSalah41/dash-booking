@extends('admin.layouts.app')
@section('home', '/admin')
@section('title')
    {{ __('words.admins') }}
@stop
@section('subtitle')
    {{ __('words.create_account_admin') }}
@stop

@section('content')
    <div class="row">
        <div class="col-xl-9 mx-auto mt-5">
            <div class="card border-top border-0 border-4 border-primary">
                <div class="card-body p-5">
                    <div class="card-title d-flex align-items-center">
                        <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
                        </div>
                        <h5 class="mb-0 text-primary">{{ __('words.create_account_admin') }}</h5>
                    </div>
                    <hr>
                    <form class="row g-3" action='{{ route('admin.store') }}' method="POST">
                        @csrf
                        <div class="col-md-12">
                            <label for="inputLastName1" class="form-label">{{ __('words.name') }}</label>
                            <div class="input-group"> <span class="input-group-text bg-transparent">
                                    <i class='bx bxs-user'></i></span>
                                <input type="text" name="name" class="form-control border-start-0" id="inputLastName1"
                                    placeholder="{{ __('words.name') }}" />
                            </div>
                            @error('name')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label for="inputPhone" class="form-label">{{ __('words.phone') }}</label>
                            <div class="input-group"> <span class="input-group-text bg-transparent"><i class="bx bxs-phone"></i></span>
                                <input type="number" class="form-control border-start-0" id="inputPhone"
                                    placeholder="{{ __('words.phone') }}" name="phone"/>
                            </div>
                            @error('phone')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>


                        <div class="col-12">
                            <label for="inputEmailAddress" class="form-label">{{ __('words.email') }}</label>
                            <div class="input-group"> <span class="input-group-text bg-transparent"><i
                                        class='bx bxs-message'></i></span>
                                <input type="text" class="form-control border-start-0" id="inputEmailAddress"
                                    placeholder="{{ __('words.email') }}" name="email"/>
                            </div>
                            @error('email')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label for="password" class="form-label">{{ __('words.password') }}</label>
                            <div class="input-group"> <span class="input-group-text bg-transparent"><i
                                        class='bx bxs-key'></i></span>
                                <input type="password" class="form-control border-start-0" id="password"
                                    placeholder="{{ __('words.password') }}" name="password"/>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>{{ __('words.roles') }}</strong>
                                {!! Form::select('roles[]', $roles,[], array('class' => 'form-control')) !!}
                            </div>
                        </div>


                        <div class="col-12 d-flex">
                            <button type="submit" class="btn btn-primary px-5 ms-auto">{{ __('words.create_account_admin') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- @yield('imagePreview') --}}
@endsection
