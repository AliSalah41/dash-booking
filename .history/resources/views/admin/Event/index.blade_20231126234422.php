@extends('admin.layouts.app')
@section('home', '/')
@section('title')
    Events
@stop
@section('subtitle')
    events
@stop
@can('event-create' . session('appKey'))
    @section('button_create')
        <div class="ms-auto">
            <div class="btn-group">
                <a href="{{ route('create') }}" type="button" class="btn btn-primary">Create event</a>
            </div>
        </div>
    @stop
@endcan
@section('content')
    <h6 class="mb-0 text-uppercase">events</h6>
    <hr />
    <div class="card">
        <div class="card-body">
            <div class="mt-2">
                @include('admin.layouts.messages')
            </div>
            <div class="me-auto col-2">
                <label class="form-label d-inline">{{ __('words.filter') }}:</label>
                <select class="form-control d-inline-block" id="is_active" class="mb-3">
                    <option value="-1">{{ __('words.select_all') }}</option>
                    <option value="1" id='active'>{{ __('words.activation') }}</option>
                    <option value="0" id='not_active'>{{ __('words.not_activation') }}</option>
                </select>
            </div>
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>name</th>

                            <th>description</th>
                            <th>Address</th>


                            <th>category</th>
                            <th>country</th>
                            <th>city</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($n = 1)
                        @foreach ($events as $event)
                            <tr>
                                <td>{{ $n++ }}</td>
                                <td>{{ $event->name ?? '-' }}</td>

                                <td>{{ $event->description ?? '-' }}</td>
                                <td>{{ $event->address ?? '-' }}</td>
                            

                                <td>
                                    {{ $event->category->title ?? '-' }}
                                </td>
                                <td>
                                    {{ $event->country->country ?? '-' }}
                                </td>
                                <td>
                                    {{ $event->city->city ?? '-' }}
                                </td>


                                {{--  <td>
                                @if ($event->is_active)
                                    <div class="form-check form-switch">
                                        <input class="form-check-input active" onchange="changeStatus(this)"
                                               data-url="{{ route('users.activate', $event->id) }}"
                                               class="toggle-class" type="checkbox"
                                            {{ $event->is_active ? 'checked' : '' }}>
                                    </div>
                                @else
                                    {{--  <div class="form-check form-switch">
                                        <input class="form-check-input not_active" onchange="changeStatus(this)"
                                               data-url="{{ route('event.activate', $event->id) }}"
                                               class="toggle-class" type="checkbox"
                                            {{ $user->is_active ? 'checked' : '' }}>
                                    </div>  --}}
                                {{--  @endif  </td>  --}}
                                <td>
                                    <button type="submit" class="btn btn-sm {{ //$item->status ? 'btn-success' : 'btn-danger' }}">
                                        {{ $item->status ? 'Active' : 'Inactive' }}
                                    </button>


                                    <a class="btn btn-success"
                                        href="{{ route('btn.show', $event->id) }}">{{ __('words.show') }}</a>
                                    <a class="btn btn-warning"
                                        href="{{ route('btn.edit', $event->id) }}">{{ __('words.update') }}</a>
                                    <form id="myform" method="post" class='d-inline'
                                        action="{{ route('delete', ['id' => $event->id]) }}">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger"
                                            onclick="confirmDelete(event)">{{ __('words.delete') }}</button>
                                    </form>

                                    {{--  <a name="hotel"
                                        href="{{ route('hotels.create', ['event' => $event->id]) }}"
                                        class="btn btn-primary "> Hotel </a>

                                        <a name="transportation"
                                        href="{{ route('transportations.create', ['event' => $event->id]) }}"
                                        class="btn btn-primary "> Transportation</a>  --}}

                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        function changeStatus(x) {
            console.log(x);
            url = $(x).attr("data-url");
            if ($(x).hasClass('active')) {
                x.classList.remove("active");
                x.classList.add("not_active");
            } else {
                x.classList.remove("not_active");
                x.classList.add("active");
            }

            $.ajax({
                method: "get",
                url: url,
                success: function(success) {
                    console.log(success);
                }
            })
        }
    </script>
    <script type="text/javascript">
        $('#is_active').on('change', function(e) {
            var is_active = $('#is_active').val();
            var table = $('#example');
            console.log(is_active);
            if (is_active == 1) {
                table.find('.not_active').parents('tr').hide();
                table.find('.active').parents('tr').show();
            } else if (is_active == 0) {
                table.find('.not_active').parents('tr').show();
                table.find('.active').parents('tr').hide();
            } else {
                table.find('td').parent().show();
            }
        });
    </script>

@stop
