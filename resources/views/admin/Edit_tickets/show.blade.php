<base href="/public">
@extends('admin.layouts.app')
@section('home', '/users')
@section('title')
   show tickets
@stop
@section('subtitle')
   show tickets
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
                            <div class="tab-title">show Tickets</div>
                        </div>
                    </a>
                </li>

            </ul>

                    </div>
                    <div class="row text-center mb-3">
                        <div class="col">
                            <strong style="font-size: 20px; color: #008cff;">User name:</strong>
                            <span class="card-title" style="font-size: 20px; ">{{ $originalTicket->user->name }}</span>

                        </div>
                        <div >
                            <strong style="font-size: 20px; color: #008cff;">Event name:</strong>
                            <span class="card-title" style="font-size: 20px;"> {{ $originalTicket->event->name }}</span>

                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-6">
                            <div class="card">

                                <div class="card-body">
                                    <strong style="font-size: 20px; color: #008cff;">Airline Country :</strong>
                                    <span class="card-title" style="font-size: 20px ;" >{{ $originalTicket->airlinecountry->country_airport }}</span>
                                     <br>
                                    <strong style="font-size: 20px; color: #008cff;">Entertainment :</strong>
                                    <span class="card-title" style="font-size: 20px;">{{ $originalTicket->entertainment->title }}</span>
                                     <br>
                                    <strong style="font-size: 20px; color: #008cff;">Hotel Room :</strong>
                                    <span class="card-title" style="font-size: 20px;"> {{ str_replace('_', ' ', $originalTicket->hotel->room_type) }}</span>


                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">

                                    <strong style="font-size: 20px; color: #008cff;">Airline Country :</strong>
                                    <span class="card-title" style="font-size: 20px;">{{ $editTicket->airlinecountry->country_airport }}</span>
                                     <br>
                                    <strong style="font-size: 20px; color: #008cff;">Entertainment :</strong>
                                    <span class="card-title" style="font-size: 20px;">{{ $editTicket->entertainment->title }}</span>
                                     <br>
                                    <strong style="font-size: 20px; color: #008cff;">Hotel Room :</strong>
                                    <span class="card-title" style="font-size: 20px;"> {{ str_replace('_', ' ', $editTicket->hotel->room_type) }}</span>



                                </div>

                            </div>




                            </div>
                            <div class="text-center mb-3"  >
                                <div class="col">
                                    <a href="javascript:;" class="btn btn-success mr-3">Accept</a>
                                    <a href="javascript:;" class="btn btn-danger">Ignore</a>
                                </div>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
@endsection
