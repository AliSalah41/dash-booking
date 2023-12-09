@extends('admin.layouts.app')
@section('home', '/')
@section('title')
    {{ __('words.companies') }}
@stop
@section('subtitle')
    {{ __('words.companies') }}
@stop
{{-- @can('user-create'.session('appKey')) --}}
    @section('button_create')
        <div class="ms-auto">
            <div class="btn-group">
                <a href="{{ route('companies.create') }}" type="button" class="btn btn-primary">+</a>
            </div>
        </div>
    @stop
{{-- @endcan --}}
@section('content')
    <h6 class="mb-0 text-uppercase">{{ __('words.companies') }}</h6>
    <hr />
    <div class="card">
        <div class="card-body">
            <div class="mt-2">
                @include('admin.layouts.messages')
            </div>
            {{-- <div class="me-auto col-2">
                <label class="form-label d-inline">{{ __('words.filter') }}:</label>
                <select class="form-control d-inline-block" id="is_active" class="mb-3">
                    <option value="-1">{{ __('words.select_all') }}</option>
                    <option value="1" id='active'>{{ __('words.activation') }}</option>
                    <option value="0" id='not_active'>{{ __('words.not_activation') }}</option>
                </select>
            </div> --}}
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ __('words.company_name') }}</th>
                            <th>{{ __('words.details') }}</th>
                            <th>{{ __('words.type') }}</th>
                            <th>{{ __('words.price') }}</th>
                            <th>{{ __('words.total_available') }}</th>
                            <th>{{ __('words.available') }}</th>
                            <th>{{ __('words.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php($n=1)
                    @foreach($companies as $company)
                        <tr>
                            <td>{{$n++}}</td>
                            <td>{{ $company->translate(app()->getLocale())->name??'-' }}</td>
                            <td>{{ $company->translate(app()->getLocale())->details??'-' }}</td>
                            <td>{{$company->type}}</td>
                            <td>{{$company->price}}</td>
                            <td>{{$company->total_available}}</td>
                            <td>{{$company->available}}</td>

                            <td>
                                <a class="btn btn-success" href="{{route('companies.show', $company->id)}}">Show</a>
                                <a class="btn btn-warning" href="{{route('companies.edit', $company->id)}}">Update</a>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
{{-- @section('scripts')
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
@stop --}}
