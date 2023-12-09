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
                                <td>{{ __('words.event_name') }}</td>
                                <td>{{ $airline->Event->name }}</td>
                            </tr>
                            <tr>
                                <td>{{ __('words.from') }}</td>
                                <td>{{ $airline->airport_from }}</td>
                            </tr>
                            <tr>
                                <td>{{ __('words.to') }}</td>
                                <td>{{ $airline->airport_to }}</td>
                            </tr>
                            <tr>
                                <td>{{ __('words.country') }}</td>
                                <td>{{ $airline->country }}</td>
                            </tr>
                    </table>
                </div>
            </div>
            </div>


    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example2" class="table table-striped table-bordered">
                     <thead>
                        <th>{{ __('words.depart') }}</th>
                        <th>{{ __('words.returnn') }}</th>
                        <th>{{ __('words.action') }}</th>
                     </thead>
                  <tbody>
                    @foreach($airline->Times as $time)
                      <tr>
                          <td>{{ $time->depart }}</td>
                          <td>{{ $time->returnn }}</td>
                          <td>
                              <form id="myform" method="post" class='d-inline' action="{{ route('deleteTime', ['id' => $time->id]) }}">
                                  @csrf
                                  @method('delete')
                                  <button class="btn btn-danger" onclick="confirmDelete(event)">{{__('words.delete')}}</button>
                              </form>
                          </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection
