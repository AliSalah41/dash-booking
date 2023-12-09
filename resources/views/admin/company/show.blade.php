<base href="/public">
@extends('admin.layouts.app')
@section('home', '/User')
@section('title')
    {{ __('words.client_order') }}
@stop
@section('subtitle')
    {{ __('words.show_client') }}
@stop

@section('content')

<div class="row container my-5">
    <div class="card">
        <div class="card-body">
            <table id="example2" class="table table-striped table-bordered">
                    <tr>
                        <td>{{ __('words.company_name') }}</td>
                        <td>{{ $company->name??'-' }}</td>
                    </tr>
                    <tr>
                        <td>{{ __('words.details') }}</td>
                        <td>{{ $company->details??'-' }}</td>
                    </tr>
                    <tr>
                        <td>{{ __('words.type') }}</td>
                        <td>{{ $company->type }}</td>
                    </tr>
                    <tr>
                        <td>{{ __('words.available') }}</td>
                        <td>{{ $company->available }}</td>
                    </tr>
                    <tr>
                        <td>{{ __('words.total_available') }}</td>
                        <td>{{ $company->total_available }}</td>
                    </tr>
                    <tr>
                        <td>{{ __('words.price') }}</td>
                        <td>{{ $company->price }}</td>
                    </tr>
                {{-- @endforeach --}}
            </table>
        </div>
    </div>
</div>
@endsection
