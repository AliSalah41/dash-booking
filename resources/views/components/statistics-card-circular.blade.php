<div class="card radius-10 w-100">
    <div class="card-header bg-transparent">
        <div class="d-flex align-items-center">
            <div>
                <h6 class="mb-0 text-capitalize">{{$data['title']}}</h6>
            </div>
            <div class="dropdown ms-auto">
                <a class="dropdown-toggle dropdown-toggle-nocaret" href="#"
                   data-bs-toggle="dropdown"><i
                        class='bx bx-dots-horizontal-rounded font-22 text-option'></i>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="javascript:;">Action</a>
                    </li>
                    <li><a class="dropdown-item" href="javascript:;">Another action</a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="javascript:;">Something else here</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="chart-container-1">
            <canvas id="{{$id}}"></canvas>
        </div>
    </div>
    <ul class="list-group list-group-flush">
        @foreach($data['labels'] as $index=>$label)
            <li
                class="list-group-item d-flex bg-transparent justify-content-between align-items-center">
                {{$label}}
                <span class="badge rounded-pill" style="background-color: {{$data['colors'][$index]}} ;" >{{$data['values'][$index]}}</span>
            </li>
        @endforeach
    </ul>
</div>
@push('scripts')
    <script>
        labels = @json($data['labels']);
        console.log(labels)
        if(labels.length == 0){
            console.log('len')
            labels = ['not found'];
            values = [0.1];
            colors = ['#bcbcbc'];

        }else{
            colors = @json($data['colors']);
            values = @json($data['values']);
        }
        console.log(labels)
        console.log(values)
        console.log(colors)


        // chart 16
        var ctx = document.getElementById("{{$id}}").getContext('2d');

        var gradientStroke5 = ctx.createLinearGradient(0, 0, 0, 300);
        // gradientStroke5.addColorStop(0, colors['0']);
        // gradientStroke5.addColorStop(1, '#fff');
        // gradientStroke5.addColorStop(1, '#e100ff');

        var gradientStroke6 = ctx.createLinearGradient(0, 0, 0, 300);
        // gradientStroke6.addColorStop(0, colors['1']);
        // gradientStroke6.addColorStop(1, '#0000');
        // gradientStroke6.addColorStop(1, '#f7b733');

        var gradientStroke7 = ctx.createLinearGradient(0, 0, 0, 300);
        // gradientStroke7.addColorStop(0,  colors['2']);
        // gradientStroke7.addColorStop(1, '#fff');
        // gradientStroke7.addColorStop(1, '#45a247');

        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels:  labels,
                datasets: [{
                    backgroundColor: colors,

                    data:  values
                }]
            },
            options: {
                maintainAspectRatio: true,
                legend: {
                    display: true
                },
                tooltips: {
                    displayColors:true
                }
            }
        });


    </script>
@endpush
