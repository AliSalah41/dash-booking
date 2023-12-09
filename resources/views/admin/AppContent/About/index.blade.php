@extends('admin.layouts.app')
@section('home', '/')
@section('title')
    {{ __('words.app_content') }}
@stop
@section('subtitle')
    {{ __('words.about_site') }}
@stop
@can('about-create'.session('appKey'))
    @section('button_create')
        <div class="ms-auto">
            <div class="btn-group">
                <a href="{{ route('about.create') }}" type="button" class="btn btn-primary">+</a>
            </div>
        </div>
    @stop
@endcan
@section('content')
    <h6 class="mb-0 text-uppercase">{{ __('words.about_site') }}</h6>
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
                            <th>{{ __('words.about_site') }}</th>
                            {{-- <th>{{ __('words.type') }}</th> --}}
                            {{-- <th>{{ __('words.country') }}</th> --}}
                            <th>{{ __('words.language') }}</th>
                            <th>{{ __('words.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($n = 1)
                        @foreach ($about as $about)
                            <tr>
                                <td>{{ $n++ }}</td>
                                <td><abbr title="{{ $about->content }}" class="initialism">{{ __('words.about_site_content') }}</abbr></td>
                                {{-- <td>{{ $about->type }}</td> --}}
                                {{-- <td>{{ $about->Country->country }}</td> --}}
                                <td>{{ $about->local }}</td>
                                @can('about-edit'.session('appKey'))
                                    <td>
                                        <a href="{{ route('about.edit', $about->id ) }}" class="btn btn-warning">{{ __('words.update') }}</a>
                                        {{-- <form action='{{ route('policy.destroy', $policy->id ) }}' class='d-inline' method="post">
                                            @csrf
                                            @method('delete')
                                            <button onclick ="return confirm('Are you delete?')" class="btn btn-danger">{{ __('words.delete') }}</button>
                                        </form> --}}
                                    </td>
                                @endcan
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection