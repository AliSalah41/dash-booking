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
        <div class="row row-cols-1 row-cols-md-1 row-cols-lg-2 row-cols-xl-2">
            <div class="col">
                <x-ticket-info-card title="new ticket" :ticket="$editTicket" :isNew="true"></x-ticket-info-card>
            </div>
            <div class="col">
                <x-ticket-info-card title="old ticket" :ticket="$originalTicket" :isNew="false"></x-ticket-info-card>
            </div>

        </div>

{{--        <div class="card">--}}
{{--            <div class="card-body">--}}


{{--            </div>--}}
{{--            <div class="row text-center mb-3">--}}
{{--                <div class="col">--}}
{{--                    <strong style="font-size: 20px; color: #008cff;">User name:</strong>--}}
{{--                    <span class="card-title" style="font-size: 20px; ">{{ $originalTicket->user->name??'' }}</span>--}}

{{--                </div>--}}
{{--                <div>--}}
{{--                    <strong style="font-size: 20px; color: #008cff;">Event name:</strong>--}}
{{--                    <span class="card-title" style="font-size: 20px;"> {{ $originalTicket->event->name??'' }}</span>--}}

{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="row">--}}

{{--                <div class="col-md-6">--}}
{{--                    <div class="card">--}}

{{--                        <div class="card-body">--}}
{{--                            --}}{{--                                    @if ( $originalTicket->airlinecountry)--}}
{{--                            <strong style="font-size: 20px; color: #008cff;">Airline Country :</strong>--}}
{{--                            {{$originalTicket->airlinecountry}}--}}
{{--                            <span class="card-title"--}}
{{--                                  style="font-size: 20px ;">{{ $originalTicket->airlinecountry->country_airport??'' }}</span>--}}
{{--                            <br>--}}
{{--                            --}}{{--                                    @endif--}}

{{--                            --}}{{--                                    @if ($originalTicket->entertainment)--}}
{{--                            <strong style="font-size: 20px; color: #008cff;">Entertainment :</strong>--}}
{{--                            <span class="card-title"--}}
{{--                                  style="font-size: 20px;">{{ $originalTicket->entertainment->title??'' }}</span>--}}
{{--                            <br>--}}
{{--                            --}}{{--                                    @endif--}}

{{--                            --}}{{--                                    @if ($originalHotelTicket)--}}
{{--                            <strong style="font-size: 20px; color: #008cff;">Hotel Room :</strong>--}}

{{--                            <span class="card-title"--}}
{{--                                  style="font-size: 20px;"> {{ str_replace('_', ' ',$originalHotelTicket->hotels->room_type??'') }}</span>--}}
{{--                            --}}{{--                                    @endif--}}


{{--                            <br>--}}
{{--                            --}}{{--                                    @if($originalHotelTicket)--}}


{{--                            <strong style="font-size: 20px; color: #008cff;">Reservation Start :</strong>--}}
{{--                            <span class="card-title"--}}
{{--                                  style="font-size: 20px;"> {{ $originalHotelTicket&&$originalHotelTicket->reservation_start?\Carbon\Carbon::parse($originalHotelTicket->reservation_start)->format(' j M, D , Y'):'' }}</span>--}}
{{--                            <br>--}}
{{--                            <strong style="font-size: 20px; color: #008cff;">Reservation End :</strong>--}}
{{--                            <span class="card-title"--}}
{{--                                  style="font-size: 20px;"> {{ $originalHotelTicket&&$originalHotelTicket->reservation_end?\Carbon\Carbon::parse($originalHotelTicket->reservation_end)->format(' j M, D , Y'):'' }}</span>--}}
{{--                            --}}{{--                                    @endif--}}


{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="col-md-6">--}}
{{--                    <div class="card">--}}
{{--                        <div class="card-body">--}}
{{--                            @if($editTicket->airlinecountry)--}}
{{--                                <strong style="font-size: 20px; color: #008cff;">Airline Country :</strong>--}}
{{--                                <span class="card-title"--}}
{{--                                      style="font-size: 20px;">{{ $editTicket->airlinecountry->country_airport??'' }}</span>--}}
{{--                                <br>--}}
{{--                            @endif--}}

{{--                            @if ($editTicket->entertainment)--}}
{{--                                <strong style="font-size: 20px; color: #008cff;">Entertainment :</strong>--}}
{{--                                <span class="card-title"--}}
{{--                                      style="font-size: 20px;">{{ $editTicket->entertainment->title??'' }}</span>--}}
{{--                                <br>--}}
{{--                            @endif--}}

{{--                            @if($editHotelTicket)--}}
{{--                                <strong style="font-size: 20px; color: #008cff;">Hotel Room :</strong>--}}
{{--                                <span class="card-title"--}}
{{--                                      style="font-size: 20px;"> {{ str_replace('_', ' ', $editHotelTicket->hotels->room_type) }}</span>--}}

{{--                                <br>--}}
{{--                            @endif--}}

{{--                            @if($editHotelTicket)--}}
{{--                                <strong style="font-size: 20px; color: #008cff;">Reservation Start :</strong>--}}
{{--                                <span class="card-title"--}}
{{--                                      style="font-size: 20px;"> {{ \Carbon\Carbon::parse($editHotelTicket->reservation_start??'')->format(' j M, D , Y') }}</span>--}}
{{--                                <br>--}}
{{--                                <strong style="font-size: 20px; color: #008cff;">Reservation End :</strong>--}}
{{--                                <span class="card-title"--}}
{{--                                      style="font-size: 20px;"> {{ \Carbon\Carbon::parse($editHotelTicket->reservation_end??'')->format(' j M, D , Y') }}</span>--}}
{{--                            @endif--}}

{{--                        </div>--}}

{{--                    </div>--}}


{{--                </div>--}}
{{--                <div class="text-center mb-3">--}}
{{--                    <div class="col">--}}
{{--                        <a href="{{ route('accept',$originalTicket->id )}}" class="btn btn-success mr-3">Accept</a>--}}
{{--                        <a href="{{ route('ignore',$editTicket->id )}}" class="btn btn-danger">Ignore</a>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--            </div>--}}

{{--        </div>--}}

    </div>
    </div>
    </div>
    </div>
@endsection
