<base href="/public">
@extends('admin.layouts.app')
@section('home', '/airports')
@section('title')
    {{ __('words.show_airline') }}
@stop
@section('subtitle')
    {{ __('words.show_airline') }}
@stop

@section('content')

<div class="row container my-5">
    <div class="card">
        <div class="card-body">
                <div class="table-responsive">
                    <table id="example2" class="table table-striped table-bordered">
                        {{-- <thead>
                        <th scope="col" width="20%">Name</th>
                        <th scope="col" width="1%">Guard</th>
                        </thead> --}}
                        <tr>
                            <td>Title</td>
                            <td>{{ $check->title }}</td>
                        </tr>

                        <tr>
                                <td>key</td>
                                <td>{{ $check->key }}</td>
                            </tr>
                            <tr>
                                <td>About site</td>
                                <td>{{ strip_tags($check->content)  }}</td>
                            </tr>
                            <tr>
                                <td>Language</td>
                                <td>{{$check->local }}</td>
                            </tr>

                    </table>
                </div>
            </div>
            </div>



@endsection
