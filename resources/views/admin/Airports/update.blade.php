@extends('admin.layouts.app')
@section('home', '/airports')
@section('title')
    {{__('words.airlines')}}
@stop
@section('subtitle')
    {{__('words.add_airline')}}
@stop

@section('content')
    <div class="row">
        <div class="col-xl-9 mx-auto mt-5">
            <div class="card border-top border-0 border-4 border-primary">
                <div class="card-body p-5">
                    <div class="card-title d-flex align-items-center">
                        <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
                        </div>
                        <h5 class="mb-0 text-primary">{{ __('words.airline') }}</h5>
                    </div>
                    <hr>
                    <form class="row g-3" action='{{route('airports.update', $airline->id)}}' method="POST">
                        @csrf
                        @method('put')
                        <div class="col-md-12">
                            <label for="inputLastName1" class="form-label">{{ __('words.events') }}</label>
                            <div class="input-group"> <span class="input-group-text bg-transparent">
                                    <i class='bx bxs-user'></i></span>
                                <select class="form-control multiple-select" name="event_id[]" multiple="multiple">
                                    @foreach($events as $event)
                                        <option value="{{$event->id}}"  @selected($airline->event_id == $event->id)>{{$event->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('event_id.*')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-6">
                            <label for="inputPhone" class="form-label">{{ __('words.from_airport') }}</label>
                            <div class="input-group"><span class="input-group-text bg-transparent"><i
                                        class="bx bxs-phone"></i></span>
                                <input type="text" value="{{$airline->airport_from}}" class="form-control border-start-0" id="airport_from" name="airport_from"/>

                            </div>
                            @error('airport_from')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>


                        <div class="col-6">
                            <label for="inputPhone" class="form-label">{{ __('words.to_airport') }}</label>
                            <div class="input-group"><span class="input-group-text bg-transparent"><i
                                        class="bx bxs-phone"></i></span>
                                <input type="text" value="{{$airline->airport_to}}" class="form-control border-start-0" id="airport_to" name="airport_to"/>

                            </div>
                            @error('airport_to')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>


                        <div class="col-md-12">
                            <label for="inputLastName1" class="form-label">{{ __('words.country') }}</label>
                            <div class="input-group"> <span class="input-group-text bg-transparent">
                                    <i class='bx bxs-user'></i></span>
                                <input type="text" value="{{$airline->country}}" name="country" class="form-control border-start-0"
                                       id="inputLastName1"
                                       placeholder="{{ __('words.country') }}"/>
                            </div>
                        </div>
                        @error('country')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror

                        <div class="col-12 d-flex">
                            <button type="submit"
                                    class="btn btn-primary px-5 ms-auto">{{ __('words.add_airline') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

    <script>
        $('.multiple-select').select2({
            theme: 'bootstrap4',
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass(
                'w-100') ? '100%' : 'style',
            placeholder: $(this).data('placeholder'),
            allowClear: Boolean($(this).data('allow-clear')),
        });
    </script>
@endsection
