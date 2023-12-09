@extends('admin.layouts.app')
@section('home', '/')
@section('title')
    {{ __('words.app_content') }}
@stop
@section('subtitle')
    {{ __('words.company_policy') }}
@stop
@can('policy-create'.session('appKey'))
    @section('button_create')
        <div class="ms-auto">
            <div class="btn-group">
                <a href="{{ route('policy.create') }}" type="button" class="btn btn-primary">+</a>
            </div>
        </div>
    @stop
@endcan
@section('content')
    <h6 class="mb-0 text-uppercase">{{ __('words.company_policy') }}</h6>
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
                            <th>{{ __('words.policy') }}</th>
                            <th>{{ __('words.type') }}</th>
                            {{-- <th>{{ __('words.country') }}</th> --}}
                            <th>{{ __('words.language') }}</th>
                            @can('policy-edit'.session('appKey'))
                                <th>{{ __('words.action') }}</th>
                            @endcan
                        </tr>
                    </thead>
                    <tbody>
                        @php($n = 1)
                        @foreach ($policies as $policy)
                            <tr>
                                <td>{{ $n++ }}</td>
                                <td><abbr title="{{ $policy->content }}" class="initialism">{{ __('words.company_policy') }}</abbr></td>
                                <td>{{ $policy->type }}</td>
                                {{-- <td>{{ $policy->Country->country }}</td> --}}
                                <td>{{ $policy->local }}</td>
                                @can('policy-edit'.session('appKey'))
                                    <td>
                                        <a href="{{ route('policy.edit', $policy->id ) }}" class="btn btn-warning">{{ __('words.update') }}</a>
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
