@extends('admin.layouts.app')
@section('home', '/package')
@section('title')
    {{ __('words.packages') }}
@stop
@section('subtitle')
    {{ __('words.packages') }}
@stop
@can('user-create'.session('appKey'))
    @section('button_create')
        <div class="ms-auto">
            <div class="btn-group">
                <a href="{{ route('package.create') }}" type="button" class="btn btn-primary">+</a>
            </div>
        </div>
    @stop
@endcan
@section('content')
    <h6 class="mb-0 text-uppercase">{{ __('words.packages') }}</h6>
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
                        <th>{{__('words.company_name')}}</th>
                        <th>{{ __('words.price') }}</th>
                        <th>{{ __('words.details') }}</th>
                        <th>{{__('words.action')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php($n=1)
                    @foreach($packages as $package)
                        <tr>
                            <td>{{$n++}}</td>
                            <td>{{$package->companyable->name}}</td>
                            <td>{{$package->price}}</td>
                            <td>{{ $package->getAttribute('details') }}</td>
                            <td>
                                <a class="btn btn-warning" href="{{route('package.edit', $package->id)}}">{{__('words.update')}}</a>
                                <form method="post" class='d-inline' action="{{route('package.destroy', $package->id)}}">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger">{{__('words.delete')}}</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

