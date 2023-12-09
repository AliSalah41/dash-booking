@extends('admin.layouts.app')
@section('home', '/')
@section('subtitle', __('words.admin_dashboard'))
@section('content')
    <div class="mt-2">
        @include('admin.layouts.messages')
    </div>
{{--    <div class="row row-cols-1 row-cols-md-3 row-cols-xl-2 row-cols-xxl-4">--}}
{{--        <div class="col">--}}
{{--            <div class="card radius-10 bg-gradient-cosmic">--}}
{{--                <div class="card-body">--}}
{{--                    <div class="d-flex align-items-center">--}}
{{--                        <div class="me-auto">--}}
{{--                            <p class="mb-0 text-white">Total Orders</p>--}}
{{--                            <h4 class="my-1 text-white">{{ $orders }}</h4>--}}
{{--                            --}}{{-- <p class="mb-0 font-13 text-white">+{{$orders_last_week}} from last week</p> --}}
{{--                        </div>--}}
{{--                        --}}{{-- <div id="chart1"></div> --}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="col">--}}
{{--            <div class="card radius-10 bg-gradient-ibiza">--}}
{{--                <div class="card-body">--}}
{{--                    <div class="d-flex align-items-center">--}}
{{--                        <div class="me-auto">--}}
{{--                            <p class="mb-0 text-white">Total Clients</p>--}}
{{--                            <h4 class="my-1 text-white">{{ $users }}</h4>--}}
{{--                            --}}{{-- <p class="mb-0 font-13 text-white">+{{$users_last_week}} from last week</p> --}}
{{--                        </div>--}}
{{--                        --}}{{-- <div id="chart2"></div> --}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="col">--}}
{{--            <div class="card radius-10 bg-gradient-ohhappiness">--}}
{{--                <div class="card-body">--}}
{{--                    <div class="d-flex align-items-center">--}}
{{--                        <div class="me-auto">--}}
{{--                            @if(session('appKey') == '522')--}}
{{--                                <p class="mb-0 text-white">Total Directory</p>--}}
{{--                            @else--}}
{{--                                <p class="mb-0 text-white">Total Captain</p>--}}
{{--                            @endif--}}
{{--                                <h4 class="my-1 text-white">{{ $drivers }}</h4>--}}
{{--                            --}}{{-- <p class="mb-0 font-13 text-white">+{{$drivers_last_week}} from last week</p> --}}
{{--                        </div>--}}
{{--                        --}}{{-- <div id="chart3"></div> --}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <!--end row-->


{{--    <h6 class="mt-4">{{ __('words.this_month') }}</h6>--}}
{{--    <div class="row row-cols-1 row-cols-md-3 row-cols-xl-2 row-cols-xxl-4">--}}
{{--        <div class="col">--}}
{{--            <div class="card radius-10 bg-gradient-cosmic">--}}

{{--                <div class="card-body">--}}
{{--                    <div class="d-flex align-items-center">--}}
{{--                        <div class="me-auto">--}}
{{--                            <p class="mb-0 text-white">Total Orders</p>--}}
{{--                            <h4 class="my-1 text-white">{{ $total_orders }}</h4>--}}
{{--                            --}}{{-- <p class="mb-0 font-13 text-white">+{{$orders_last_week}} from last week</p> --}}
{{--                        </div>--}}
{{--                        --}}{{-- <div id="chart1"></div> --}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="col">--}}
{{--            <div class="card radius-10 bg-gradient-ohhappiness">--}}
{{--                <div class="card-body">--}}
{{--                    <div class="d-flex align-items-center">--}}
{{--                        <div class="me-auto">--}}
{{--                            <p class="mb-0 text-white">End Orders</p>--}}
{{--                            <h4 class="my-1 text-white">{{ $end_orders }}</h4>--}}
{{--                            --}}{{-- <p class="mb-0 font-13 text-white">+{{$drivers_last_week}} from last week</p> --}}
{{--                        </div>--}}
{{--                        --}}{{-- <div id="chart3"></div> --}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="col">--}}
{{--            <div class="card radius-10 bg-gradient-ibiza">--}}
{{--                <div class="card-body">--}}
{{--                    <div class="d-flex align-items-center">--}}
{{--                        <div class="me-auto">--}}
{{--                            <p class="mb-0 text-white">Accept Orders</p>--}}
{{--                            <h4 class="my-1 text-white">{{ $accept_orders }}</h4>--}}
{{--                            --}}{{-- <p class="mb-0 font-13 text-white">+{{$users_last_week}} from last week</p> --}}
{{--                        </div>--}}
{{--                        --}}{{-- <div id="chart2"></div> --}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="col">--}}
{{--            <div class="card radius-10 bg-gradient-ohhappiness">--}}
{{--                <div class="card-body">--}}
{{--                    <div class="d-flex align-items-center">--}}
{{--                        <div class="me-auto">--}}
{{--                            <p class="mb-0 text-white">Cancel Orders</p>--}}
{{--                            <h4 class="my-1 text-white">{{ $cancel_orders }}</h4>--}}
{{--                            --}}{{-- <p class="mb-0 font-13 text-white">+{{$drivers_last_week}} from last week</p> --}}
{{--                        </div>--}}
{{--                        --}}{{-- <div id="chart3"></div> --}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="col">--}}
{{--            <div class="card radius-10 bg-gradient-ohhappiness">--}}
{{--                <div class="card-body">--}}
{{--                    <div class="d-flex align-items-center">--}}
{{--                        <div class="me-auto">--}}
{{--                            <p class="mb-0 text-white">Start Orders</p>--}}
{{--                            <h4 class="my-1 text-white">{{ $start_orders }}</h4>--}}
{{--                            --}}{{-- <p class="mb-0 font-13 text-white">+{{$drivers_last_week}} from last week</p> --}}
{{--                        </div>--}}
{{--                        --}}{{-- <div id="chart3"></div> --}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="col">--}}
{{--            <div class="card radius-10 bg-gradient-ohhappiness">--}}
{{--                <div class="card-body">--}}
{{--                    <div class="d-flex align-items-center">--}}
{{--                        <div class="me-auto">--}}
{{--                            <p class="mb-0 text-white">Total Earnings</p>--}}
{{--                            <h4 class="my-1 text-white">{{ $total_earning }} $</h4>--}}
{{--                            --}}{{-- <p class="mb-0 font-13 text-white">+{{$drivers_last_week}} from last week</p> --}}
{{--                        </div>--}}
{{--                        --}}{{-- <div id="chart3"></div> --}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <!--end row-->


    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

@endsection
