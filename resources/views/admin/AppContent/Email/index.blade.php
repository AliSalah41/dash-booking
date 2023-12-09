@extends('admin.layouts.app')
@section('home', '/')
@section('title')
    {{ __('words.app_content') }}
@stop
@section('subtitle')
    {{ __('words.company_emails') }}
@stop
@can('companyEmail-create'.session('appKey'))
    @section('button_create')
        <div class="ms-auto">
            <div class="btn-group">
                <a href="{{ route('emails.create') }}" type="button" class="btn btn-primary">+</a>
            </div>
        </div>
    @stop
@endcan
@section('content')
    <h6 class="mb-0 text-uppercase">{{ __('words.company_emails') }}</h6>
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
                            <th>{{ __('words.email') }}</th>
                            <th>{{ __('words.type') }}</th>
                            {{-- <th>{{ __('words.country') }}</th> --}}
                            <th>{{ __('words.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($n = 1)
                        @foreach ($emails as $email)
                            <tr>
                                <td>{{ $n++ }}</td>
                                <td>{{ $email->content }}</td>
                                <td>{{ $email->type }}</td>
                                {{-- <td>{{ $email->Country->country }}</td> --}}
                                <td>
                                    @can('companyEmail-edit'.session('appKey'))
                                        <a href="{{ route('emails.edit', $email->id ) }}" class="btn btn-warning">{{ __('words.update') }}</a>
                                    @endcan

                                    @can('companyEmail-delete'.session('appKey'))
                                        <form action='{{ route('emails.destroy', $email->id ) }}' class='d-inline' method="post">
                                            @csrf
                                            @method('delete')
                                            <button onclick="confirmDelete(event)" class="btn btn-danger">{{ __('words.delete') }}</button>
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
