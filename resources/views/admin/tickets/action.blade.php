<div class="d-flex">
        <a class="has_action badge rounded-pill text-bg-primary" style="--bs-bg-opacity: .2;" href="{{ route("$route_name.show",$model->id) }}" data-type="show"
           data-action="
           {{ route("$route_name.show",$model->id) }}
           " data-method="get">
            <i class="fa-regular fa-eye  text-primary fa-xl"></i>
        </a>
{{--    <a class="has_action badge rounded-pill text-bg-warning" style="--bs-bg-opacity: .2;" href="#" data-type="edit"--}}
{{--       data-action="--}}
{{--       {{ route("$route_name.edit",$model->id) }}--}}
{{--       ">--}}
{{--        <i class="fa-solid fa-pen-to-square text-warning fa-xl"></i>--}}
{{--    </a>--}}
{{--    <a class="has_action badge rounded-pill text-bg-danger" style="--bs-bg-opacity: .2;" href="#" data-type="edit"--}}
{{--       data-action="--}}
{{--       {{ route("$route_name.destroy",$model->id) }}--}}
{{--       ">--}}
{{--        <i class="fa-solid fa-trash text-danger fa-xl"></i>--}}
{{--    </a>--}}
</div>

