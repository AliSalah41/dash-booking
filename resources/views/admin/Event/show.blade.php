<base href="/public">
@extends('admin.layouts.app')
@section('home', '/users')
@section('title')
   Events
@stop
@section('subtitle')
   event details
@stop

@section('content')

    @section('content')
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
{{--  <div class="row container my-5">
    <div class="card">
        <div class="card-body">
            <ul class="nav nav-tabs nav-primary" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" data-bs-toggle="tab" href="#primaryhome" role="tab"
                        aria-selected="true">
                        <div class="d-flex align-items-center">
                            <div class="tab-icon"><i class='bx bx-home font-18 me-1'></i>
                            </div>
                            <div class="tab-title">Event details</div>

                        </div>
                    </a>
                </li>


                <li class="nav-item" role="presentation">
                    <a class="nav-link" data-bs-toggle="tab" href="#hotelTab" role="tab" aria-selected="false">
                        <div class="d-flex align-items-center">
                            <div class="tab-icon"><i class='bx bx-new-tab font-18 me-1'></i></div>
                            <div class="tab-title">Hotel details</div>
                        </div>
                    </a>
                </li>





                <li class="nav-item" role="presentation">
                    <a class="nav-link" data-bs-toggle="tab" href="#transportTab" role="tab" aria-selected="false">
                        <div class="d-flex align-items-center">
                            <div class="tab-icon"><i class='bx bx-new-tab font-18 me-1'></i></div>
                            <div class="tab-title">Transportation details</div>
                        </div>
                    </a>
                </li>


                <li class="nav-item" role="presentation">
                    <a class="nav-link" data-bs-toggle="tab" href="#entertainTab" role="tab" aria-selected="false">
                        <div class="d-flex align-items-center">
                            <div class="tab-icon"><i class='bx bx-new-tab font-18 me-1'></i></div>
                            <div class="tab-title">Entertainment details</div>
                        </div>
                    </a>
                </li>
                <!-- <li class="nav-item" role="presentation">
                    <a class="nav-link" data-bs-toggle="tab" href="#primaryprofile" role="tab"
                        aria-selected="false">
                        <div class="d-flex align-items-center">
                            <div class="tab-icon"><i class='bx bx-user-pin font-18 me-1'></i>
                            </div>
                            <div class="tab-title">{{ __('words.show_points') }}</div>
                        </div>
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" data-bs-toggle="tab" href="#primarycontact" role="tab"
                        aria-selected="false">
                        <div class="d-flex align-items-center">
                            <div class="tab-icon"><i class='bx bx-microphone font-18 me-1'></i>
                            </div>
                            <div class="tab-title">{{ __('words.show_wallet') }}</div>
                        </div>
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" data-bs-toggle="tab" href="#order" role="tab" aria-selected="false">
                        <div class="d-flex align-items-center">
                            <div class="tab-icon"><i class='bx bx-microphone font-18 me-1'></i>


                            </div>
                            <div class="tab-title">show event</div>


                        </div>
                    </a>
                </li> -->
            </ul>
            <div id="event-details">
            <div class="tab-content py-3" >
                <div class="tab-pane fade show active" id="primaryhome" role="tabpanel">
                    <div class="table-responsive">
                        <table id="example2" class="table table-striped table-bordered">

                                <tr>
                                    <td>Event name</td>
                                    <td>{{ $event->name ?? '-'}}</td>
                                </tr>
                                <tr>

                                    <tr>
                                        <td>Address</td>
                                        <td>{{ $event->address ?? '-'}}</td>
                                    </tr>
                                    <tr>
                                    <td>description</td>
                                    <td>{{ $event->description ?? '-'}}</td>
                                </tr>
                                @php
                                $r = 1;
                            @endphp
                                <tr>
                                    <td  rowspan="{{ $r }}" >ticket details</td>

                                        <td>
                                            @foreach ( $ticket_types as $ticket_type)
                                            @php
                                            $r++;
                                        @endphp

                                            <span style="color: #0082a2" >Ticket Type:</span>   {{$ticket_type->ticket_type ?? '-'}}
                                            <br>
                                            <span style="color: #0082a2" >Ticket Limit:</span>   {{$ticket_type->ticket_limit ?? '-'}}
                                            <br>
                                            <span style="color: #0082a2" >Ticket Price:</span>   {{$ticket_type->price?? '-'}}
                                            <br><br>

                                    @endforeach
                                        </td>


                                </tr>

                                <tr>
                                    <td rowspan="1">category</td>
                                    <td> {{$event->category->title ?? '-'}}</td>
                                </tr>
                                <tr>
                                    <td>country</td>
                                    <td>  {{$event->country->country ?? '-'}}</td>
                                </tr>
                                <tr>
                                    <td>city</td>
                                    <td>  {{$event->city->city ?? '-'}}</td>
                                </tr>

                                @php
                                    $c = 1;
                                @endphp

                                <tr>
                                    <td>Event image</td>

                                    <td>  <img src="{{ asset($event->images[0]->filename) }}" width="100" height="100"> </td>
                                </tr>
                            </tr>




                               </tr>

                                <tr>
                                    <td  rowspan="1000" >Event duration</td>

                                    @foreach ($event_times as $event_time)
                                    <tr>
                                        <td>#{{ $c++ }}</td>

                                    </tr>

                                    <tr>
                                        <td>
                                            @if ($event_time->start)
                                               <span style="color: #0082a2"> Start Date: </span>{{ date('Y-m-d', strtotime($event_time->start)) }}
                                                <br>
                                             <span style="color: #0082a2"> Start Time:</span>  {{ date('H:i', strtotime($event_time->start)) }}
                                               <br>
                                            @else
                                              <span style="color: #0082a2"> Start Date: -</span>

                                            @endif
                                                 <br>
                                            @if ($event_time->end)
                                              <span style="color: #0082a2">End Date:</span>   {{ date('Y-m-d', strtotime($event_time->end)) }}
                                                <br>
                                              <span style="color: #0082a2">End Time:</span>  {{ date('H:i', strtotime($event_time->end)) }}
                                                <br>
                                            @else
                                               <span style="color: #0082a2"> End: -</span>
                                            @endif
                                        </td>
                                    </tr>

                                        <td><span style="color: #0082a2" >Title:</span>   {{$event_time->title ?? '-'}}</td>

                                    </tr>

                                     <tr>

                                    <td><span  style="color: #0082a2">Description:</span>  {{$event_time->desc_time ?? '-'}}</td>

                                    </tr>

                                    @foreach ($event_time->images as $image)
                                     <tr>
                                        <td>
                                      <img src="{{ asset($image->filename) }}" width="100" height="100">
                                        </td>

                                        </tr>
                                     @endforeach
                                    </tr>

                                 </tr>
                                    @endforeach

                        </table>
                    </div>





                </div>



<div class="tab-pane fade" id="hotelTab" role="tabpanel">
    <table class="table table-striped table-bordered">
        @php
        $h = 4;
    @endphp
        <tr>
                      <td  rowspan="{{ $h }}"  >hotel details



                    </td>
                    @foreach (  $event_hotels as   $event_hotel )
                    @php
                    $h++;
                @endphp
               <tr>

                   <td>

                    <span style="color: #0082a2">  Room type :</span>    {{$event_hotel->room_type ?? '-'}}
                     <br>
                     <span style="color: #0082a2">   price :</span>    {{$event_hotel->price ?? '-' }}
                     <br>

                </td>
               </tr>
               @endforeach

           </tr>
    </table>
    <div style="display: flex; justify-content: flex-end; margin-top: 10px;">
    <a type="submit" style="margin-left: 20px" class="btn btn-primary " href="{{ route('hotels.create', ['event' => $event->id ]) }}?ho">Edit hotel</a>
   </div>
</div>


<div class="tab-pane fade" id="transportTab" role="tabpanel">
    <table class="table table-striped table-bordered">
        @php
        $t = 2;
       @endphp
        <tr>
         <td  rowspan="{{ $t }}"  >Transportation details

         </td>
         @foreach (  $transportations as   $transportation )
         @php
         $t++;
     @endphp
  <tr>

      <td>

       <span style="color: #0082a2">  price :</span>
        {{ $transportation->price ??'-' }}

   </td>
  </tr>
  @endforeach

</tr>

    </table>
    <div style="display: flex; justify-content: flex-end; margin-top: 10px;">
    <a type="submit" class="btn btn-primary" style="margin-left: 20px" href="{{ route('transportations.create', ['event' => $event->id]) }}?tr">Edit transportation</a>
   </div>
</div>


<div class="tab-pane fade" id="entertainTab" role="tabpanel">
<table class="table table-striped table-bordered">


    @php
    $e = 2;
@endphp

    <tr>
     <td  rowspan="{{ $e }}"  >Entertainment details


     </td>
     @foreach (  $entertainments as   $entertainment )
     @php
     $e++;
 @endphp
<tr>

  <td>

   <span style="color: #0082a2"> title :</span>
    {{   $entertainment->title ??'-' }}
   <br>
    <span style="color: #0082a2">  description :</span>
      {{   $entertainment->description??'-' }}

      <br>

      <span style="color: #0082a2">  address :</span>
        {{   $entertainment->address??'-' }}

        <br>

        <span style="color: #0082a2">  price :</span>
          {{   $entertainment->price??'-' }}

          <br><br>
      @if ( $entertainment->start_dateTime)
      <span style="color: #0082a2"> Start Date: </span>{{ date('Y-m-d', strtotime($entertainment->start_dateTime)) }}
       <br>
    <span style="color: #0082a2"> Start Time:</span>  {{ date('H:i', strtotime($entertainment->start_dateTime)) }}
      <br>
   @else
     <span style="color: #0082a2"> Start Date: -</span>

   @endif
        <br>
   @if ($entertainment->end_dateTime)
     <span style="color: #0082a2">End Date:</span>   {{ date('Y-m-d', strtotime($entertainment->end_dateTime)) }}
       <br>
     <span style="color: #0082a2">End Time:</span>  {{ date('H:i', strtotime($entertainment->end_dateTime)) }}
       <br>
   @else
      <span style="color: #0082a2"> End: -</span>
   @endif

 </td>



</tr>
@endforeach
</tr>

    </tr>

</table>
<div style="display: flex; justify-content: flex-end; margin-top: 10px;">
<a type="submit" class="btn btn-primary" style="margin-end: 100px" href="{{ route('entertainments.create', ['event' => $event->id]) }}?en">Edit entertainment</a>
</div>
</div>
                </div>

                </div>

            </div>
        </div>
    </div>
</div>  --}}




<div class="page-content">

    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">


        <div class="ms-auto">
            <div class="btn-group">

                <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">	<a class="dropdown-item" href="javascript:;">Action</a>
                    <a class="dropdown-item" href="javascript:;">Another action</a>
                    <a class="dropdown-item" href="javascript:;">Something else here</a>
                    <div class="dropdown-divider"></div>	<a class="dropdown-item" href="javascript:;">Separated link</a>
                </div>
            </div>
        </div>
    </div>
    <!--end breadcrumb-->

     <div class="card ">
        <div class="row g-1" >
          <div class="col-md-3 border-end" style="margin-left: 15px; margin-right: 15px;  ">
            <img src="{{ asset($event->images[0]->filename) }}" class="img-fluid" alt="...">

          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h4 class="card-title">{{ $event->name }}

              <div class="mb-3">
                <span class="price h4">{{ $event->address ?? '-'}}</span>

            </div>
              <p class="card-text fs-6">{{ $event->description ?? '-'}}</p>
              <dl class="row">
                <dt class="col-sm-3 mt-3" style="color: #0082a2">Category</dt>
                <dd class="col-sm-9   mt-3" > {{$event->category->title ?? '-'}}</dd>

                <dt class="col-sm-3" style="color: #0082a2">Country</dt>
                <dd class="col-sm-9"> {{$event->country->country ?? '-'}}</dd>

                <dt class="col-sm-3" style="color: #0082a2">city</dt>
                <dd class="col-sm-9"> {{$event->city->city ?? '-'}}</dd>
              </dl>



            </div>


          </div>

          {{--  //////  --}}


          <div class="row row-cols-auto row-cols-1 row-cols-md-3 align-items-center">

            {{--  <table class="table table-striped table-bordered "style="margin-left: 15px  " >



                 <tr>
                    <td style="color: #0082a2">Ticket Type:</td>
                    <td > {{$ticket_type->ticket_type ?? '-'}}</td>
                 </tr>
                 <tr>
                    <td style="color: #0082a2">Ticket Limit:</td>
                    <td>  {{$ticket_type->ticket_limit ?? '-'}}</td>
                 </tr>
                 <tr>
                    <td style="color: #0082a2">Ticket Price:</td>
                    <td >  {{$ticket_type->price?? '-'}}</td>
                 </tr>



            </table>  --}}

            <div class="card-body">

                <table class="table table-striped table-bordered "style="margin-left: 15px  ;margin-top: 15px ;">
                    <thead>
                        <tr>

                            <th scope="col">Ticket Type:</th>
                            <th scope="col">Ticket Limit:</th>
                            <th scope="col">selling Price:</th>
                            <th scope="col">purchasing Price:</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $ticket_types as $ticket_type)
                        <tr>

                            <td>{{$ticket_type->ticket_type ?? '-'}}</td>
                            <td> {{$ticket_type->ticket_limit ?? '-'}}</td>
                            <td>{{$ticket_type->selling_price?? '-'}}</td>
                            <td>{{$ticket_type->purchasing_price?? '-'}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>

        </div>
          {{--  ///////  --}}
        </div>



        <hr>
        <div class="card-body">
            <ul class="nav nav-tabs nav-primary mb-0" role="tablist">
                {{--  <li class="nav-item" role="presentation">
                    <a class="nav-link active" data-bs-toggle="tab" href="#primaryhome" role="tab" aria-selected="false">
                        <div class="d-flex align-items-center">

                            <div class="tab-title">Hotel details </div>
                        </div>
                    </a>
                </li>  --}}
                <li class="nav-item  active" role="presentation">
                    <a class="nav-link" data-bs-toggle="tab" href="#primary" role="tab" aria-selected="true">
                        <div class="d-flex align-items-center">

                            <div class="tab-title">Hotel details</div>
                        </div>
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" data-bs-toggle="tab" href="#profile" role="tab" aria-selected="false">
                        <div class="d-flex align-items-center">

                            <div class="tab-title">Transportation details</div>
                        </div>
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" data-bs-toggle="tab" href="#contact" role="tab" aria-selected="false">
                        <div class="d-flex align-items-center">

                            <div class="tab-title">Entertainment details</div>
                        </div>
                    </a>
                </li>
            </ul>


            <div class="tab-content pt-3">
                <div class="tab-pane fade show active" id="primary" role="tabpanel">
                    <div class="card-body">

                        <table class="table table-striped table-bordered "style="margin-left: 15px  ;margin-top: 15px ;">
                            <thead>
                                <tr>

                                    <th scope="col">Room type :</th>
                                    <th scope="col"> price :</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach (  $event_hotels as   $event_hotel)
                                <tr>

                                    <td> {{$event_hotel->room_type ?? '-'}}</td>
                                    <td>  {{$event_hotel->price ?? '-' }}</td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                    <div style="display: flex; justify-content: flex-end; margin-top: 10px;">
                        <a type="submit" style="margin-left: 20px" class="btn btn-primary " href="{{ route('hotels.create', ['event' => $event->id ]) }}?ho">Edit hotel</a>
                       </div>
                </div>
                <div class="tab-pane fade " id="profile" role="tabpanel">
                    {{--  @foreach (  $transportations as   $transportation )
                    <p>  <span style="color: #0082a2">  price :</span>
                        {{ $transportation->price ??'-' }}
                </p>


                   @endforeach  --}}

                   <div class="card-body">

                    <table class="table table-striped table-bordered "style="margin-left: 15px  ;margin-top: 15px ;">
                        <thead>
                            <tr>


                                <th scope="col"> price :</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach (  $transportations as   $transportation )
                            <tr>


                                <td>  {{ $transportation->price ??'-' }}</td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
                   <div style="display: flex; justify-content: flex-end; margin-top: 10px;">
                    <a type="submit" class="btn btn-primary" style="margin-left: 20px" href="{{ route('transportations.create', ['event' => $event->id]) }}?tr">Edit transportation</a>
                   </div>
                </div>


                <div class="tab-pane fade" id="contact" role="tabpanel">
                    {{--  @foreach (  $entertainments as   $entertainment )

                    <span style="color: #0082a2"> title :</span>
                     {{   $entertainment->title ??'-' }}
                          <br>
               <span style="color: #0082a2">  description :</span>
              {{   $entertainment->description??'-' }}

                <br>

             <span style="color: #0082a2">  address :</span>
              {{   $entertainment->address??'-' }}

             <br>

           <span style="color: #0082a2">  price :</span>
          {{   $entertainment->price??'-' }}

           <br><br>
       @if ( $entertainment->start_dateTime)
       <span style="color: #0082a2"> Start Date: </span>{{ date('Y-m-d', strtotime($entertainment->start_dateTime)) }}
       <br>
      <span style="color: #0082a2"> Start Time:</span>  {{ date('H:i', strtotime($entertainment->start_dateTime)) }}
      <br>
      @else
     <span style="color: #0082a2"> Start Date: -</span>

     @endif
        <br>
      @if ($entertainment->end_dateTime)
     <span style="color: #0082a2">End Date:</span>   {{ date('Y-m-d', strtotime($entertainment->end_dateTime)) }}
       <br>
     <span style="color: #0082a2">End Time:</span>  {{ date('H:i', strtotime($entertainment->end_dateTime)) }}
       <br>
   @else
      <span style="color: #0082a2"> End: -</span>
   @endif
                    @endforeach  --}}


                    <div class="card-body">

                        <table class="table table-striped table-bordered "style="margin-left: 15px  ;margin-top: 15px ;">
                            <thead>
                                <tr>

                                    <th scope="col">title :</th>
                                    <th scope="col">description :</th>
                                    <th scope="col">address :</th>
                                    <th scope="col">price :</th>
                                    <th scope="col">Start Date:</th>
                                    <th scope="col">Start Time:</th>
                                    <th scope="col">End Date:</th>
                                    <th scope="col">End Time:</th>


                                </tr>
                            </thead>
                            <tbody>
                                @foreach ( $entertainments as   $entertainment)
                                <tr>

                                    <td> {{   $entertainment->title ??'-' }}</td>
                                    <td> {{   $entertainment->description??'-' }}</td>
                                    <td> {{   $entertainment->address??'-' }}</td>
                                    <td> {{   $entertainment->price??'-' }}</td>
                                    <td> {{ date('Y-m-d', strtotime($entertainment->start_dateTime)) }}</td>
                                    <td> {{ date('H:i', strtotime($entertainment->start_dateTime)) }}</td>
                                    <td> {{ date('Y-m-d', strtotime($entertainment->end_dateTime)) }}</td>
                                    <td> {{ date('H:i', strtotime($entertainment->end_dateTime)) }}</td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                    <div style="display: flex; justify-content: flex-end; margin-top: 10px;">
                        <a type="submit" class="btn btn-primary" style="margin-end: 100px" href="{{ route('entertainments.create', ['event' => $event->id]) }}?en">Edit entertainment</a>
                        </div>
                </div>
            </div>

        </div>

      </div>


        <h6 class="text-uppercase mb-0">Event durations</h6>
        <hr>
         <div class="row row-cols-1 row-cols-lg-3 mb-4">
            @foreach ($event_times as $event_time)
               <div class="col">
                <div class="card">
                    @foreach ($event_time->images as $image)
                    <div class="row g-0">
                      <div class="col-md-4">
                        <img src="{{ asset($image->filename) }}" class="img-fluid" alt="...">
                      </div>
                      @endforeach
                      <div class="col-md-8 ">
                        <div class="card-body">
                          <h5 class="card-title">   {{$event_time->title ?? '-'}}</h6>
                          <h6 >  {{$event_time->desc_time ?? '-'}}</h6>
                          <div class="clearfix ">
                            {{--  <p class="mb-0 float-start fw-bold"><span class="me-2 text-decoration-line-through text-secondary">$240</span><span>$199</span></p>  --}}
                            <p class="mb-0 float-start fw-bold" >  <span style="color: #0082a2"> Start Date: </span> {{ date('Y-m-d', strtotime($event_time->start)) }}</p>
                            <p class="mb-0 float-start fw-bold" >  <span style="color: #0082a2"> Start Time: </span>{{ date('H:i', strtotime($event_time->start)) }}</p>
                            <p class="mb-0 float-start fw-bold" >  <span style="color: #0082a2"> End Date: </span> {{ date('Y-m-d', strtotime($event_time->end)) }}</p>
                            <p class="mb-0 float-start fw-bold" >  <span style="color: #0082a2"> End Time: </span>  {{ date('H:i', strtotime($event_time->end)) }}</p>
                         </div>
                        </div>
                      </div>
                    </div>
                  </div>
               </div>
               @endforeach


           </div>


</div>

@endsection

@section('scripts')
<script>
    $(document).ready(function () {

        // افتراضيًا، اعرض محتوى أول تاب
        showTabContent("#hotelTab");

        // عند النقر على أحد التابات
        $(".nav-link").on("click", function () {
            // قم بإخفاء جميع محتويات التابات
            $(".tab-content .tab-pane").hide();

            // استخراج معرف التاب المرتبط بهذا الرابط
            var targetTab = $(this).attr("href");

            // قم بعرض محتوى التاب المستهدف
            showTabContent(targetTab);
        });

        // عرض محتوى التاب المستهدف
        function showTabContent(tabId) {
            $(tabId).show();
        }
    });
</script>

<script>
    $(document).ready(function () {

        // افتراضيًا، اعرض محتوى أول تاب
        showTabContent("#transportTab");

        // عند النقر على أحد التابات
        $(".nav-link").on("click", function () {
            // قم بإخفاء جميع محتويات التابات
            $(".tab-content .tab-pane").hide();

            // استخراج معرف التاب المرتبط بهذا الرابط
            var targetTab = $(this).attr("href");

            // قم بعرض محتوى التاب المستهدف
            showTabContent(targetTab);
        });

        // عرض محتوى التاب المستهدف
        function showTabContent(tabId) {
            $(tabId).show();
        }
    });
</script>
<script>
    $(document).ready(function () {

        // افتراضيًا، اعرض محتوى أول تاب
        showTabContent("#entertainTab");

        // عند النقر على أحد التابات
        $(".nav-link").on("click", function () {
            // قم بإخفاء جميع محتويات التابات
            $(".tab-content .tab-pane").hide();

            // استخراج معرف التاب المرتبط بهذا الرابط
            var targetTab = $(this).attr("href");

            // قم بعرض محتوى التاب المستهدف
            showTabContent(targetTab);
        });

        // عرض محتوى التاب المستهدف
        function showTabContent(tabId) {
            $(tabId).show();
        }
    });
</script>


@endsection
