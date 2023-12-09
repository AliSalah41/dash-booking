<base href="/public">
@extends('admin.layouts.app')
@section('home', '/users')
@section('title')
Booking
@stop
@section('subtitle')
Booking
@stop

@section('content')

<div class="row container my-5">
    <div class="card">
        <div class="card-body">
            <ul class="nav nav-tabs nav-primary" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" data-bs-toggle="tab" href="#primaryhome" role="tab"
                        aria-selected="true">
                        <div class="d-flex align-items-center">
                            <div class="tab-icon"><i class='bx bx-home font-18 me-1'></i>
                            </div>
                            <div class="tab-title">show user details</div>
                        </div>
                    </a>
                </li>

            </ul>

                    </div>

                    <div class="table-responsive">
                        <table id="example2" class="table table-striped table-bordered" >

                            <tr>
                                <th>user name</th>
                                {{--  <td>{{ $check->user->name }}</td>  --}}

                                <td>{{ $check->ticket->user->name}}</td>
                            </tr>
                            <tr>
                                <th>nickName</th>
                                <td>{{ $check->ticket->user->nickName }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{ $check->ticket->user->email }}</td>
                            </tr>
                            <tr>
                                <th>phone</th>
                                <td>{{ $check->ticket->user->phone }}</td>
                            </tr>
                            <tr>
                                <th>Type</th>
                                <td>{{ $check->ticket->user->type}}</td>
                            </tr>

                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
