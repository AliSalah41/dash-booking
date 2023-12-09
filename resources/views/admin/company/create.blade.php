@extends('admin.layouts.app')
@section('home', '/companies')
@section('title')
    {{ __('words.companies') }}
@stop
@section('subtitle')
    {{ __('words.create_company') }}
@stop

@section('content')
    <div class="row">
        <div class="col-xl-9 mx-auto mt-5">
            <div class="card border-top border-0 border-4 border-primary">
                <div class="card-body p-5">
                    <div class="card-title d-flex align-items-center">
                        <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
                        </div>
                        <h5 class="mb-0 text-primary">{{ __('words.create_company') }}</h5>
                    </div>
                    <hr>
                    <form class="row g-3" action='{{ route('companies.store') }}' method="POST">
                        @csrf
                        <div class="col-md-6">
                            <label for="inputLastName1" class="form-label">{{ __('words.type') }}</label>
                            <div class="input-group"> <span class="input-group-text bg-transparent">
                                    <i class='bx bxs-user'></i></span>

                                    <select placeholder="{{ __('words.type') }}"  name="type" class="form-control border-start-0" id="inputLastName1">
                                        <option value="1">Flight</option>
                                        <option value="2">Hotel</option>
                                        <option value="3">Car</option>
                                    </select>
                            </div>
                            @error('type')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>


                        <div class="col-6">
                            <label for="price" class="form-label">{{ __('words.price') }}</label>
                            <div class="input-group"><span class="input-group-text bg-transparent"><i
                                        class="bx bxs-phone"></i></span>
                                <input type="number" class="form-control border-start-0" id="price"
                                    placeholder="{{ __('words.price') }}" name="price" />
                            </div>
                            @error('price')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>


                        <div class="col-6">
                            <label for="inputPhone" class="form-label">{{ __('words.total_available') }}</label>
                            <div class="input-group"><span class="input-group-text bg-transparent"><i
                                        class="bx bxs-phone"></i></span>
                                <input type="number" class="form-control border-start-0" id="inputPhone"
                                    placeholder="{{ __('words.total_available') }}" name="total_available" />
                            </div>
                            @error('total_available')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="inputLastName1" class="form-label">{{ __('words.available') }}</label>
                            <div class="input-group"> <span class="input-group-text bg-transparent">
                                    <i class='bx bxs-user'></i></span>
                                <input type="text" name="available" class="form-control border-start-0"
                                    id="inputLastName1" placeholder="{{ __('words.available') }}" />
                            </div>
                            @error('available')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>


                        <input type="text" name="image" value="image/path" hidden>
                        <input type="number" name="appKey" value="1" hidden>


                        {{-- <div class="col-6">
                            <label for="inputImage1" class="form-label">{{ __('words.profile') }}</label>
                            <input type="file" class="form-control border-start-0" id="inputImage1" id="profile"
                                accept="image/jpeg, image/png, image/jpg" name="profile">
                            <img id="previewImage1">
                        </div> --}}


                        <div class="container-fluid">
                            <ul class="nav nav-tabs">
                                @foreach (config('app.languages') as $key => $value)
                                    <li class="nav-item">
                                        <a class="nav-link @if($loop->index == 0)  active @endif" data-bs-toggle="tab" href="#{{ $key }}">{{ $value }}</a>
                                    </li>
                                @endforeach
                            </ul>

                            <div class="tab-content mt-3">
                                @foreach (config('app.languages') as $key => $value)
                                    <div id="{{ $key }}" class="tab-pane fade @if($loop->index == 0) show active in @endif">
                                            <div class="form-group">
                                                <label for="name">{{ __('words.name') }}:</label>
                                                <input type="text" class="form-control" id="name" name="{{ $key }}[name]">
                                            </div>

                                            <div class="form-group">
                                                    <label for="details">{{ __('words.details') }}:</label>
                                                <input class="form-control" id="details" name="{{ $key }}[details]">
                                            </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>


                        <div class="col-12 d-flex">
                            <button type="submit"
                                class="btn btn-primary px-5 ms-auto">{{ __('words.create_company') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- @yield('imagePreview') --}}
@endsection
