@extends('admin.layouts.app')
@section('home', '/package')
@section('title')

    {{ __('words.packages') }}
@stop
@section('subtitle')
    {{ __('words.add_package') }}

@stop
@section('subtitle')
    {{ __('words.add_package') }}

@stop

@section('content')
    <div class="row">
        <div class="col-xl-9 mx-auto mt-5">
            <div class="card border-top border-0 border-4 border-primary">
                <div class="card-body p-5">
                    <div class="card-title d-flex align-items-center">
                        <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
                        </div>
                        <h5 class="mb-0 text-primary">{{ __('words.packages') }}</h5>
                    </div>
                    <hr>
                    <form class="row g-3" action='{{ route('package.store') }}' method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="companies">{{ __('words.categories') }}:</label>
                            <select class="form-control" name="category_id">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->getAttribute('name') }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="duration">{{ __('words.duration') }}:</label>
                            <input type="number" class="form-control" id="duration" name="duration">
                            @error('duration')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="form-group col-6">
                            <label for="companies">{{ __('words.companies') }}:</label>
                            <select class="form-control" name="company_id">
                                @foreach ($companies as $company)
                                    <option value="{{ $company->id }}">{{ $company->getAttribute('name') }}</option>
                                @endforeach
                            </select>
                            @error('company_id')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-6">
                            <label for="price">{{ __('words.price') }}:</label>
                            <input type="number" class="form-control" id="price" name="price">
                            @error('price')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>



                        <div class="container-fluid mt-3" id="item">
                            <ul class="nav nav-tabs">
                                @foreach (config('app.languages') as $key => $value)
                                    <li class="nav-item">
                                        <a class="nav-link @if ($loop->index == 0) active @endif"
                                            data-bs-toggle="tab" href="#{{ $key }}">{{ $value }}</a>
                                    </li>
                                @endforeach
                            </ul>

                            <div class="tab-content mt-3">
                                @foreach (config('app.languages') as $key => $value)
                                    <div id="{{ $key }}"
                                        class="tab-pane fade @if ($loop->index == 0) show active in @endif">
                                        <div class="form-group">
                                            <label for="name">{{ __('words.details') }}:</label>
                                            <textarea class="form-control" id="details" name="{{ $key }}[details]"></textarea>
                                            @error($key . '.details')
                                                <span style="color: red">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="col-12 d-flex">
                            <button type="submit"
                                class="btn btn-primary px-5 ms-auto">{{ __('words.add_package') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
