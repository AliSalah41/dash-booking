@extends('admin.layouts.app')
@section('home', '/category')
@section('title')
    {{ __('words.categories') }}
@stop
@section('subtitle')
    {{ __('words.categories') }}
@stop
@can('category-create'.session('appKey'))
    @section('button_create')
        <div class="ms-auto">
            <div class="btn-group">
                <a href="{{ route('category.create') }}" type="button" class="btn btn-primary">Create category</a>
            </div>
        </div>
    @stop
@endcan
@section('content')
    <h6 class="mb-0 text-uppercase">{{ __('words.categories') }}</h6>
    <hr />
    <div class="card">
        <div class="card-body">
            <div class="mt-2">
                @include('admin.layouts.messages')
            </div>

            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                    <tr>
                        <th>#</th>

                        <th>Title </th>
                        <th>Description</th>
                        <th>{{__('words.action')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php($n=1)
                    @foreach($categories as $category)
                        <tr>
                            <td>{{$n++}}</td>

                            <td>{{Str::limit( $category->title ,30 ,'...') }}</td>
                            <td>{{Str::limit($category->description,30,'...') }}</td>
                            <td>
                                <a class="btn btn-success" href="{{route('category.show', $category->id)}}">{{__('words.show')}}</a>
                                <a class="btn btn-warning" href="{{route('category.edit', $category->id)}}">{{__('words.update')}}</a>
                                <form id="myform" method="post" class='d-inline' action="{{route('category.destroy', $category->id)}}">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger"     onclick="confirmDelete(event)">{{__('words.delete')}}</button>
                                </form>
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
