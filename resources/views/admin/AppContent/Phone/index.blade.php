@extends('admin.layouts.app')
@section('home', '/')
@section('title')
    {{ __('words.app_content')}}
@stop
@section('subtitle')
    {{ __('words.company_phones') }}
@stop
@can('companyPhone-create'.session('appKey'))
    @section('button_create')
        <div class="ms-auto">
            <div class="btn-group">
                <a href="{{ route('phones.create') }}" type="button" class="btn btn-primary">+</a>
            </div>
        </div>
    @stop
@endcan
@section('content')
    <h6 class="mb-0 text-uppercase">{{ __('words.company_phones') }}</h6>
    <hr />
    <div class="card">
        <div class="card-body">
            <div class="mt-2">
                @include('admin.layouts.messages')
            </div>
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ __('words.phone') }}</th>
                            <th>{{ __('words.type') }}</th>
                            {{-- <th>{{ __('words.country') }}</th> --}}
                            <th>{{ __('words.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($n = 1)
                        @foreach ($phones as $phone)
                            <tr>
                                <td>{{ $n++ }}</td>
                                <td>{{ $phone->content }}</td>
                                <td>{{ $phone->type }}</td>
                                {{-- <td>{{ $phone->Country->country }}</td> --}}
                                <td>
                                    @can('companyPhone-edit'.session('appKey'))
                                        <a href="{{ route('phones.edit', $phone->id ) }}" class="btn btn-warning">{{ __('words.update') }}</a>
                                    @endcan

                                    @can('companyPhone-delete'.session('appKey'))
                                        <form action='{{ route('phones.destroy', $phone->id ) }}' class='d-inline' method="post">
                                            @csrf
                                            @method('delete')
                                            <button onclick="confirmDelete(event)"  class="btn btn-danger">{{ __('words.delete') }}</button>
                                        </form>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
