@extends('admin.layouts.app')
@section('home', '/')
@section('title')
    {{ __('words.users') }}
@stop
@section('subtitle')
    {{ __('words.clients') }}
@stop
@can('user-create'.session('appKey'))
    @section('button_create')
        <div class="ms-auto">
            <div class="btn-group">
                <a href="{{ route('users.create') }}" type="button" class="btn btn-primary">+</a>
            </div>
        </div>
    @stop
@endcan
@section('content')
    <h6 class="mb-0 text-uppercase">{{ __('words.clients') }}</h6>
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
                            <th>{{ __('words.name') }}</th>
                            <th>{{ __('words.birth') }}</th>
                            <th>{{ __('words.nickname') }}</th>
                            <th>{{ __('words.email') }}</th>
                            <th>{{ __('words.phone') }}</th>
                            <th>{{ __('words.is_active') }}</th>
                            <th>{{ __('words.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php($n=1)
                    @foreach($users as $user)
                        <tr>
                            <td>{{$n++}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->birth}}</td>
                            <td>{{$user->nickName}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->phone}}</td>
                            <td>
                                @if ($user->is_active)
                                    <div class="form-check form-switch">
                                        <input class="form-check-input active" onchange="changeStatus(this)"
                                        data-url="{{ route('users.activate', $user->id) }}"
                                               class="toggle-class" type="checkbox"
                                            {{ $user->is_active ? 'checked' : '' }}>
                                    </div>
                                @else
                                    <div class="form-check form-switch">
                                        <input class="form-check-input not_active" onchange="changeStatus(this)"
                                               data-url="{{ route('users.activate', $user->id) }}"
                                               class="toggle-class" type="checkbox"
                                            {{ $user->is_active ? 'checked' : '' }}>
                                    </div>
                                @endif
                            </td>
                            <td>
                                <a class="btn btn-success" href="{{route('users.show', $user->id)}}">{{__('words.show')}}</a>
                                <a class="btn btn-warning" href="{{route('users.edit', $user->id)}}">{{__('words.update')}}</a>
                                {{--  <a class="btn btn-danger" onclick="confirmDelete($user->id)">delete</a>  --}}
                                <a class="btn btn-danger" href="{{ route('delete', ['id' => $user->id]) }}" onclick="confirmDelete(event)">{{__('words.delete')}}</a>
                                {{--  <button onclick="confirmDelete($user->id)">Delete</button>  --}}
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
