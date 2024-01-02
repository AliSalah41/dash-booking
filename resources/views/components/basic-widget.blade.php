<div class="card radius-10 {{$bgColor}}">
    <div class="card-body">
        <div class="d-flex align-items-center">
            <div class="me-auto">
                <p class="mb-0 text-white text-capitalize">{{$title}}</p>
                <h4 class="my-1 text-white">{{$number}}</h4>
                <p class="mb-0 font-13 text-white">.</p>
            </div>
{{--            <div id="chart1"></div>--}}
            <div class="">
{{--                <i class="fa-solid fa-hotel"></i>--}}
                <i class="fa-solid {{$icon??''}}"></i>
            </div>
        </div>
    </div>
</div>
