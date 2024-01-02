@extends('admin.layouts.app')
@section('home', '/')
@section('title')
    {{ __('words.users') }}
@stop
@section('subtitle')
    {{ __('words.clients') }}
@stop
@can('user-create' . session('appKey'))
    @section('button_create')
        <div class="ms-auto">
            <div class="btn-group">
                <a href="{{ route('users.create') }}" type="button" class="btn btn-primary">+</a>
            </div>
        </div>
    @stop
@endcan
@section('content')
    @push('scripts')
        {!! $userChart->script() !!}
    @endpush
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <h6 class="mb-0 text-uppercase">{{ __('words.clients') }}</h6>
    <hr />
    <div class="card">
        <div class="card-body">
            <div class="mt-2">
                @include('admin.layouts.messages')
            </div>
            <div class="page-content">
                <h6 class="mb-0 text-uppercase">Basic Data</h6>
                <hr />
                <div class="row row-cols-1 row-cols-md-2 row-cols-xl-2 row-cols-xxl-4">
                    <div class="col">
                        <x-basic-widget  title="total booked tickets" number="{{\App\Models\Ticket::count()}}"  bgColor="bg-gradient-cosmic" icon="fa-ticket text-white fa-4x fa-rotate-90"></x-basic-widget>
                    </div>
                    <div class="col">
                        <x-basic-widget  title="total registered users" number="{{\App\Models\User::count()}}"  bgColor="bg-gradient-ibiza" icon="fa-users text-white fa-4x"></x-basic-widget>
                    </div>
                    <div class="col">
                        <x-basic-widget  title="total income" number="{{\App\Models\Ticket::sum('total_price')}}"  bgColor="bg-gradient-ohhappiness" icon="fa-money-bill text-white fa-4x"></x-basic-widget>
                    </div>
                    <div class="col">
                        <x-basic-widget  title="Ticket holders' average age" number="28.4"  bgColor="bg-gradient-kyoto" icon="fa-cake-candles text-white fa-4x" ></x-basic-widget>
                    </div>
                </div><!--end row-->
                <h6 class="mb-2 text-uppercase">Dynamic DATA</h6>
                <hr>
                <form id="form" class="row g-3" method="GET" action="{{request()->url()}}" >
                    <div class="mb-3 mt-4 " id="reportrange" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
                        <i class="fa fa-calendar"></i>&nbsp;
                        <span></span> <i class="fa fa-caret-down"></i>
                    </div>

                    <input type="hidden" id="startDateInput" name="start" value="{{request()->start}}">
                    <input type="hidden" id="endDateInput" name="end" value="{{request()->end}}">

                    <div class="mb-3">
{{--                        <label class="form-label">Select2 Text Control</label>--}}
                        <x-select
                            label="event" name="event_id"
                            :options="['0'=>'all']+\App\Models\Event::pluck('name','id')->toArray()"
                            old="{{request()->event_id??0}}" ></x-select>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary px-5 mb-5">search</button>
                    </div>
                </form>


                <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3">
                    <div class="col">
                        <x-statistics-card id="one"  title="new users" title-value="new users" :data="$userCard" color="#17a00e" type="line" color="#17a00e" ></x-statistics-card>
                    </div>
                    <div class="col">
                        <x-statistics-card id="two" title="new ticket" title-value="new ticket" :data="$ticketCard" color="#f41127" type="area" color="#f41127" ></x-statistics-card>
                    </div>
                    <div class="col">
                        <x-statistics-card id="three" :data="$incomeCard" title="ticket income" title-value="income"  color="#f41127" type="area" color="#17a00e" ></x-statistics-card>
                    </div>
                    <div class="col">
                        <x-statistics-card-circular id="four" :data="$countriesWithMostTicketsCard"></x-statistics-card-circular>
                    </div>
                    <div class="col">
                        <x-statistics-card-circular id="five" :data="$mostTypesOfTickets"></x-statistics-card-circular>
                    </div>
                    <div class="col">
                        <x-statistics-card-circular id="six" :data="$mostAgeGroupsBookTicktes"></x-statistics-card-circular>
                    </div>
                </div>
                <!--end row-->
            </div>

        </div>
    </div>

@endsection
@push('scripts')
    <!--app JS-->

    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

    <script type="text/javascript">
        $(function() {

            const startInput = $('input[name=start]').val();
            const endInput = $('input[name=end]').val();

            if (startInput){
                var start = moment(startInput);
                console.log(start)
            }else {
                var start = moment().subtract(29, 'days');
            }
            if (endInput){
                var end = moment(endInput);
                console.log(end)
            }else {
                var end = moment();
            }
            console.log('here')

{{--            @if(!empty(request()->end))--}}
{{--                var end = moment({{request()->end}});--}}
{{--            @else--}}
{{--                var end = moment();--}}
{{--            @endif--}}
            console.log('end')
            console.log('end')
            console.log(start.format('MMMM D, YYYY'))
            console.log(end.format('MMMM D, YYYY'))




            function cb(start, end) {
                if(start && start._isValid && end && end._isValid){
                    console.log(start)
                    console.log(end)
                    $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                    $('#startDateInput').val(start.format('YYYY-MM-DD'));
                    $('#endDateInput').val(end.format('YYYY-MM-DD'));
                } else {
                    $('#reportrange span').html('All Times');
                    $('#startDateInput').val('');
                    $('#endDateInput').val('');
                }
            }

            $('#reportrange').daterangepicker({
                startDate: start,
                endDate: end,
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                }
            }, cb);

            cb(start,end);

            // cb([null,null]);
            // cb(start,end);

            // Form submission handling
            $('#dateRangeForm').submit(function() {
                // Perform any additional actions before form submission if needed
                // e.g., validation checks

                // Allow the form to submit
                return true;
            });

        });
    </script>


@endpush
