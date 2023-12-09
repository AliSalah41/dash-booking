@extends('admin.layouts.app')
@section('home', '/')
@section('title')
    {{ __('words.admins') }}
@stop
@section('subtitle')
    {{ __('words.admins') }}
@stop

@can('admin-create'.session('appKey'))
    @section('button_create')
        <div class="ms-auto">
            <div class="btn-group">
                <a href="{{ route('admin.create') }}" type="button" class="btn btn-primary">+</a>
            </div>
        </div>
    @stop
@endcan

@section('content')
    <h6 class="mb-0 text-uppercase">{{ __('words.admins') }}</h6>
    <hr />
    <div class="card">
        <div class="card-body row">
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
                            <th>{{ __('words.email') }}</th>
                            <th>{{ __('words.phone') }}</th>
                            <th>{{ __('words.active') }}</th>
                            <th>{{ __('words.action') }}</th>
                        </tr>
                    </thead>
                    <tbody class="all_data">
                        @php($n = 1)
                        @foreach ($admins as $admin)
                            @if($admin->name != 'superAdmin')
                            <tr>
                                <td>{{ $n++ }}</td>
                                <td class="name">{{ $admin->name }}</td>
                                <td class="email">{{ $admin->email }}</td>
                                <td class="phone">{{ $admin->phone }}</td>

                                <td>
                                    @if ($admin->is_active)
                                        <div class="form-check form-switch">
                                            <input class="form-check-input active" onchange="changeStatus(this)"
                                                data-url="{{ route('admin.activate', $admin->id) }}" class="toggle-class"
                                                type="checkbox" {{ $admin->is_active ? 'checked' : '' }}>
                                        </div>
                                    @else
                                        <div class="form-check form-switch">
                                            <input class="form-check-input not_active" onchange="changeStatus(this)"
                                                data-url="{{ route('admin.activate', $admin->id) }}" class="toggle-class"
                                                type="checkbox" {{ $admin->is_active ? 'checked' : '' }}>
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    @can('admin-edit'.session('appKey'))
                                        <a href="{{ route('admin.edit', $admin->id) }}"
                                            class="btn btn-warning">{{ __('words.update') }}</a>
                                    @endcan
                                    @can('admin-delete'.session('appKey'))
                                        <form action='{{ route('admin.destroy', $admin->id) }}' class='d-inline'
                                            method="post">
                                            @csrf
                                            @method('delete')
                                            <button onclick="confirmDelete(event)"
                                                class="btn btn-danger">{{ __('words.delete') }}</button>
                                        </form>
                                    @endcan
                                </td>
                            </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {{ $admins->links() }}
                </div>
            </div>
        </div>
    </div>



@endsection
@section('scripts')
    <script type="text/javascript">
        function changeStatus(x) {
            console.log(x);
            url = $(x).attr("data-url");
            if($(x).hasClass('active')){
                x.classList.remove("active");
                x.classList.add("not_active");
            }
            else{
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
