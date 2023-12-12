@extends('admin.layouts.app')
@section('home', '/booking')
@section('title')
   
@stop
@section('subtitle')

@stop

@section('content')
{{--  <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">404 Not Found</div>

                <div class="card-body">
                    @if (!empty($error))
                        <p>{{ $error }}</p>

                    @endif
                </div>
            </div>
        </div>
    </div>
</div>  --}}

<div class="flex items-center justify-center   " style="margin-top: 100px">
    <div class="px-40 py-20 bg-white rounded-md shadow-xl">
        <div class="flex flex-col items-center">
            <h1 class="font-bold text-blue-600 text-9xl">Sorry</h1>

            <h6 class="mb-2 text-2xl font-bold text-center text-gray-800 md:text-3xl">
                <span class="text-red-500">Oops!</span>
                @if (!empty($error))
                {{ $error }}
                @endif
            </h6>

            {{--  <p class="mb-8 text-center text-gray-500 md:text-lg">
                The page you’re looking for doesn’t exist.
            </p>  --}}


        </div>
    </div>
</div>
@endsection


@section('scripts')

@stop
