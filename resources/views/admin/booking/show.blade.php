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
                            <div class="tab-title">Booking</div>
                        </div>
                    </a>
                </li>
                <!-- <li class="nav-item" role="presentation">
                    <a class="nav-link" data-bs-toggle="tab" href="#primaryprofile" role="tab"
                        aria-selected="false">
                        <div class="d-flex align-items-center">
                            <div class="tab-icon"><i class='bx bx-user-pin font-18 me-1'></i>
                            </div>
                            <div class="tab-title">{{ __('words.show_points') }}</div>
                        </div>
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" data-bs-toggle="tab" href="#primarycontact" role="tab"
                        aria-selected="false">
                        <div class="d-flex align-items-center">
                            <div class="tab-icon"><i class='bx bx-microphone font-18 me-1'></i>
                            </div>
                            <div class="tab-title">{{ __('words.show_wallet') }}</div>
                        </div>
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" data-bs-toggle="tab" href="#order" role="tab" aria-selected="false">
                        <div class="d-flex align-items-center">
                            <div class="tab-icon"><i class='bx bx-microphone font-18 me-1'></i>
                            </div>
                            <div class="tab-title">{{ __('words.show_order') }}</div>
                        </div>
                    </a>
                </li> -->
            </ul>
            <div class="tab-content py-3">
                <div class="tab-pane fade show active" id="primaryhome" role="tabpanel">
                    <div class="table-responsive">
                        <table id="example2" class="table table-striped table-bordered">
                            {{-- <thead>
                            <th scope="col" width="20%">Name</th>
                            <th scope="col" width="1%">Guard</th>
                            </thead> --}}
                            <tr>
                                <td>Ticket details</td>
                                <td>
                                <span style="color: #0082a2">    Totalprice : </span>  {{ $ticket->total_price ?? '-' }}
                                  <br>
                                  <span style="color: #0082a2">    Currency : </span>  {{ $ticket->currency ?? '-' }}
                                  <br>
                                  <span style="color: #0082a2">    Shirt size : </span>  {{ $ticket->shirt_size ?? '-' }}
                                  <br>
                                </td>
                            </tr>


                                <tr>



                                    <td>User details</td>

                              <td>
                                 <span style="color: #0082a2">    name : </span>  {{ $ticket->user->name ?? '-' }}
                                        <br>
                                <span style="color: #0082a2">     birthdate : </span>   {{ $ticket->user->birth ?? '-' }}
                                <br>
                                <span style="color: #0082a2">     email : </span>   {{$ticket->user->email ?? '-'  }}
                                <br>
                                <span style="color: #0082a2">     phone : </span>   {{ $ticket->user->phone ?? '-'  }}
                                <br>
                                <span style="color: #0082a2">    type : </span>   {{ $ticket->user->type ?? '-'  }}
                              </td>

                                    {{--  <td>{{ $category->description }}</td>  --}}
                                </tr>
                                <tr>
                                    <td>Event details</td>
                                    <td>
                                    <span style="color: #0082a2">    name : </span>  {{ $ticket->event->name ?? '-' }}
                                        <br>
                                        <span style="color: #0082a2">    description: </span>  {{ $ticket->event->description ?? '-' }}
                                        <br>
                                        <span style="color: #0082a2">   address: </span>  {{ $ticket->event->address ?? '-' }}
                                        <br>
                                        <span style="color: #0082a2">   country: </span>  {{ $ticket->event->country->country ?? '-' }}
                                        <br>
                                        <span style="color: #0082a2">   city: </span>  {{ $ticket->event->city->city ?? '-' }}
                                        <br>
                                        <span style="color: #0082a2">   category: </span>  {{ $ticket->event->category->title ?? '-' }}
                                        <br>
                                    </td>
                                </tr>



                                <tr>
                                    <td>Airline country</td>
                                    <td>
                                    <span style="color: #0082a2">    Country airport : </span>  {{ $ticket->airlinecountry->country_airport ?? '-' }}

                                    </td>
                                </tr>


                                <tr>
                                    <td>Hotel details</td>
                                    <td>
                                    <span style="color: #0082a2">    Room type : </span>  {{ $ticket->hotel->room_type ?? '-' }}
                                     <br>

                                     <span style="color: #0082a2">    price : </span>  {{ $ticket->hotel->price ?? '-' }}
                                     <br>
                                    </td>
                                </tr>


                                <tr>
                                    <td>Transport details</td>
                                    <td>
                                    <span style="color: #0082a2">    price : </span>  {{ $ticket->transportation->price ?? '-' }}
                                     <br>

                                    </td>
                                </tr>

                                <tr>
                                    <td>Entertainment details</td>
                                    <td>
                                    <span style="color: #0082a2">    Title : </span>  {{ $ticket->entertainment->title ?? '-' }}
                                     <br>
                                     <span style="color: #0082a2">    Description : </span>  {{ $ticket->entertainment->description ?? '-' }}
                                     <br>
                                     <span style="color: #0082a2">    address : </span>  {{ $ticket->entertainment->address ?? '-' }}
                                     <br>
                                     <span style="color: #0082a2">    price : </span>  {{ $ticket->entertainment->price ?? '-' }}
                                     <br>
                                     @if ($ticket->entertainment->start_dateTime)
                                     <span style="color: #0082a2"> Start Date: </span>{{ date('Y-m-d', strtotime($ticket->entertainment->start_dateTime)) }}
                                      <br>
                                   <span style="color: #0082a2"> Start Time:</span>  {{ date('H:i', strtotime($ticket->entertainment->start_dateTime)) }}
                                     <br>
                                  @else
                                    <span style="color: #0082a2"> Start Date: -</span>

                                  @endif
                                       <br>
                                  @if ($ticket->entertainment->end_dateTime)
                                    <span style="color: #0082a2">End Date:</span>   {{ date('Y-m-d', strtotime($ticket->entertainment->end_dateTime)) }}
                                      <br>
                                    <span style="color: #0082a2">End Time:</span>  {{ date('H:i', strtotime($ticket->entertainment->end_dateTime)) }}
                                      <br>
                                  @else
                                     <span style="color: #0082a2"> End: -</span>
                                  @endif



                                    </td>
                                </tr>

                        </table>
                    </div>
                </div>
                {{-- <div class="tab-pane fade" id="primaryprofile" role="tabpanel">
                    <div>
                        <div class="mt-2">
                            @include('admin.layouts.messages')
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <h4>
                                        @if (isset($points[0]->points))
                                            {{ $points[0]->points ?? '0' }}
                                        @else
                                            {{ '0' }}
                                        @endif {{ __('words.point') }}
                                    </h4>
                                    <table id="example2" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>{{ __('words.amount') }}</td>
                                                <th>{{ __('words.transaction_type') }}</td>
                                                <th>{{ __('words.transaction_time') }}</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @php($count = 1)
                                            @if (isset($points[0]->points))
                                                @foreach ($points[0]->transaction as $wallet_transaction)
                                                    <tr>
                                                        <td>{{ $count++ }}</td>
                                                        <td>{{ $wallet_transaction->amount }}</td>
                                                        <td>{{ $wallet_transaction->type }}</td>
                                                        <td>{{ $wallet_transaction->created_at }}</td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="primarycontact" role="tabpanel">
                    <div class="wrapper">
                        <div class="mt-2">
                            @include('admin.layouts.messages')
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <h4>{{ __('words.wallet_balance') }}: @if (isset($wallets[0]->balance))
                                        {{ $wallets[0]->balance ?? '0' }}
                                    @else
                                        {{ '0' }}
                                    @endif
                                </h4>
                                <div class="table-responsive">
                                    <table id="example2" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>{{ __('words.amount') }}</td>
                                                <th>{{ __('words.transaction_type') }}</td>
                                                <th>{{ __('words.transaction_time') }}</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @php($count = 1)
                                            @if (isset($wallets[0]->balance))
                                                @foreach ($wallets[0]->transaction as $wallet_transaction)
                                                    <tr>
                                                        <td>{{ $count++ }}</td>
                                                        <td>{{ $wallet_transaction->amount }}</td>
                                                        <td>{{ $wallet_transaction->type }}</td>
                                                        <td>{{ $wallet_transaction->created_at }}</td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="order" role="tabpanel">
                    <div class="wrapper">
                        <h6 class="mb-0 text-uppercase">{{ __('words.client_order') }}</h6>
                        <hr />
                        <div class="mt-2">
                            @include('admin.layouts.messages')
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example2" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>{{ __('words.from') }}</td>
                                                <th>{{ __('words.to') }}</td>
                                                <th>{{ __('words.price') }}</th>
                                                <th>{{ __('words.distance') }}</th>
                                                <th>{{ __('words.driver_name') }}</th>
                                                <th>{{ __('words.email') }}</th>
                                                <th>{{ __('words.show') }}</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @php($count = 1)
                                            @foreach ($orders as $order)
                                                <tr>
                                                    <td>{{ $count++ }}</td>
                                                    @foreach ($order->locations as $order_location)
                                                        @if ($order_location->type == 'from')
                                                            <td>{{ $order_location->address }}</td>
                                                        @endif

                                                        @if ($order_location->type == 'to')
                                                            <td>{{ $order_location->address }}</td>
                                                        @endif
                                                    @endforeach
                                                    <td>{{ $order->OrderDetails->price ?? '0' }}</td>
                                                    <td>{{ $order->OrderDetails->distance ?? '0' }}</td>

                                                    <td>{{ $order->DriverInfo->user->name ?? '0' }}</td>
                                                    <td>{{ $order->DriverInfo->user->email ?? '0' }}</td>
                                                    <td><a class="btn btn-success"
                                                            href="{{ route('orders.show', $order->id) }}">{{ __('words.show') }}</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="d-flex justify-content-center">
                                        {{ $orders->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
</div>
@endsection
