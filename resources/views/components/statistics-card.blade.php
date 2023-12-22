<div>
    <div class="card radius-10 ">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <div>
                    <p class="mb-0 text-capitalize" style="font-size: 18px">{{$title}}</p>
                    <h4 class="mb-0 formatted-number">{{$data['total']}}</h4>
                </div>
                <div class="dropdown ms-auto">
                    <div class="dropdown-toggle dropdown-toggle-nocaret cursor-pointer"
                         data-bs-toggle="dropdown"> <i class='bx bx-dots-horizontal-rounded font-22'></i>
                    </div>
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
            <div class="" id="{{$id}}"></div>
            {{--                                {!! $userChart->container() !!}--}}
            {{--                                <h1>{{ $chart1->options['chart_title'] }}</h1>--}}
            {{--                                {!! $chart1->renderHtml() !!}--}}

        </div>
    </div>
</div>


@push('scripts')
    {{--    <script src="assets/plugins/apexcharts-bundle/js/apexcharts.min.js"></script>--}}
    {{--    <script src="assets/js/widgets.js"></script>--}}
{{--    {!! $chart1->renderChartJsLibrary() !!}--}}
{{--    {!! $chart1->renderJs() !!}--}}

    <script>

        var e = {
            series: [{name: "{{$titleValue}}", data: @json($data['values'])}],
            chart: {
                type: "{{$type}}",
                height: 100,
                toolbar: {show: !1},
                zoom: {enabled: !1},
                dropShadow: {enabled: !0, top: 3, left: 14, blur: 4, opacity: .12, color: "{{$color}}"},
                sparkline: {enabled: !0}
            },
            markers: {size: 0, colors: ["{{$color}}"], strokeColors: "#fff", strokeWidth: 2, hover: {size: 7}},
            plotOptions: {bar: {horizontal: !1, columnWidth: "45%", endingShape: "rounded"}},
            dataLabels: {enabled: !1},
            stroke: {show: !0, width: 2.4, curve: "smooth"},
            colors: ["{{$color}}"],
            xaxis: {categories: @json($data['labels']) },
            fill: {opacity: 1},
            tooltip: {
                theme: "dark", fixed: {enabled: !1}, x: {show: !1}, y: {
                    title: {
                        formatter: function (e) {
                            return e
                        }
                    },
                    formatter: function(val, opts) {
                        // console.log(val)
                        // console.log(opts)
                        // console.log(opts.w.globals.categoryLabels[opts.dataPointIndex])
                        var category = opts.w.globals.categoryLabels[opts.dataPointIndex];
                        return val + " at " + category;
                    }

                }, marker: {show: !1}
            }
        };
        new ApexCharts(document.querySelector("#{{$id}}"), e).render();
    </script>
    <script>
        const elementsWithClass = document.querySelectorAll('.formatted-number');

        // Loop through each element and format its content
        elementsWithClass.forEach(element => {
            const numberToFormat = parseFloat(element.textContent); // Get the number value
            element.textContent = numberToFormat.toLocaleString(); // Format based on user's locale
        });
    </script>
@endpush
