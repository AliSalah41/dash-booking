<base href="/public">
@extends('admin.layouts.app')
@section('home', '/users')
@section('title')
    {{ __('words.client_order') }}
@stop
@section('subtitle')
    {{ __('words.show_client') }}
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
                            <div class="tab-title">{{ __('words.show_client') }}</div>
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
                                    <td>{{ __('words.name') }}</td>
                                    <td>{{ $user->name }}</td>
                                </tr>
                                <tr>
                                    <td>{{ __('words.nickname') }}</td>
                                    <td>{{ $user->nickName }}</td>
                                </tr>
                                <tr>
                                    <td>{{ __('words.email') }}</td>
                                    <td>{{ $user->email }}</td>
                                </tr>
                                <tr>
                                    <td>{{ __('words.birth') }}</td>
                                    <td>{{ $user->birth }}</td>
                                </tr>
                                <tr>
                                    <td>{{ __('words.phone') }}</td>
                                    <td>{{ $user->phone }}</td>
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
