
<base href="/public">
@extends('admin.layouts.app')
@section('title')
      Guest card
@stop
@section('subtitle')
      Guest card
@stop

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paper Application Form</title>
    <!-- Bootstrap CSS link -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

@section('styles')
    <style>
        /* Add custom styles here */
        .form-container {
            border: 2px solid #ddd;
            padding: 20px;
            margin: 20px;
            direction: rtl;
        }

        .form-section {
            margin-bottom: 20px;
        }

        .form-section .card-header {
            font-weight: bold;
        }
    </style>
    @endsection
</head>
@php
// Assuming $ticket->event->eventTimes is a collection of Carbon dates
$firstDate = null;
$lastDate = null;

foreach ($ticket->event->eventTimes as $eventTime) {
    $startDate = \Carbon\Carbon::parse($eventTime->start);
    $endDate = \Carbon\Carbon::parse($eventTime->end);

    // Check and update the first and last dates
    if ($firstDate === null || $startDate->lt($firstDate)) {
        $firstDate = $startDate;
    }

    if ($lastDate === null || $endDate->gt($lastDate)) {
        $lastDate = $endDate;
    }
}
@endphp
<body>
    @section('content')
    <div class="container mt-5 form-container border border-dark p-4 rounded-3  " style="margin-bottom: 50px;background-color: #decfb0;" >

        <div class="container mb-4">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center">
                    <h1 class="mb-4">بطاقة النازل</h1>



                    <div class="d-flex justify-content-center align-items-center mt-3  fw-bold fs-5">
                        <span class="mr-2 " >رقم الغرفة</span>
                        <span class="mr-2 ml-2 " >Room No : </span> --------

                    </div>
                </div>
            </div>
        </div>


        <form >



                    <div class="card-header"></div>
                    <div class="card-body" >


                            <div class="row">
                                <div class="col-md-6 text-right">
                                    <label class="fs-5"><span class="fw-bold fs-5">  الاسم:</span></label>
                                </div>
                                <div class="col-md-6 text-left">
                                    <label class="fs-5"> <span class="fw-bold ">  First Name : </span> {{ $user_ticket->name }} </label>


                                </div>
                            </div>


                                <div class="row">
                                    <div class="col-md-6 text-right">
                                        <label class="fs-5"><span class="fw-bold">  الجنس : </span></label>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <label class="fs-5"> <span class="fw-bold">  Gender : </span> {{ $user_ticket->gender }}</label>
                                    </div>
                                </div>



                                <div class="row">
                                    <div class="col-md-6 text-right">
                                        <label class="fs-5"><span class="fw-bold">  تاريخ ومكان الولادة : </span> </label>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <label class="fs-5"> <span class="fw-bold">  Date and place of birth : </span> {{ $user_ticket->birth }}</label>
                                    </div>
                                </div>



                                <div class="row">
                                    <div class="col-md-6 text-right">
                                        <label class="fs-5"><span class="fw-bold">  الجنسية : </span></label>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <label class="fs-5"><span class="fw-bold">  : Nationality </span> </label>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-6 text-right">
                                        <label class="fs-5"> <span class="fw-bold">  السكنى الاعتيادية: </span></label>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <label class="fs-5"><span class="fw-bold">  : Country of usual residence </span> </label>
                                    </div>
                                </div>



                                <div class="row">
                                    <div class="col-md-6 text-right">
                                        <label class="fs-5"> <span class="fw-bold">  العنوان بتونس : </span> <label>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <label class="fs-5"> <span class="fw-bold"> :Address in Tunisia  </span></label>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-6 text-right">
                                        <label class="fs-5"><span class="fw-bold">   البريد الالكترونى: </span> <label>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <label class="fs-5"><span class="fw-bold">  E-mail : </span> {{ $user_ticket->email }}</label>
                                    </div>
                                </div>



                                <div class="row">
                                    <div class="col-md-6 text-right">
                                        <label class="fs-5"> <span class="fw-bold">  المهنة :  </span><label>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <label class="fs-5"><span class="fw-bold">  : Occupation </span> </label>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-6 text-right">
                                        <label class="fs-5"> <span class="fw-bold">  رقم الهوية وتاريخ الاصدار : </span> <label>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <label class="fs-5"><span class="fw-bold">  : N of Identity document and date off delivery </span></label>
                                    </div>
                                </div>







                                <div class="row">
                                    <div class="col-md-6 text-right">
                                        <label class="fs-5"> <span class="fw-bold">   بطاقة تعريف : </span> <label>
                                    </div>

                                    <div class="col-md-4 text-left">
                                         <label class="fs-5"> <span class="fw-bold">  : I.D.C / C.I.N  </span>  <i class="fa-regular fa-square    mr-3"></i> </label>
                                    </div>
                                </div>



                                <div class="row">
                                    <div class="col-md-6 text-right">
                                        <label class="fs-5"> <span class="fw-bold">  جواز سفر : </span>  <label>
                                    </div>
                                    <div class="col-md-4 text-left">
                                        <label class="fs-5"><span class="fw-bold">  : Passport  </span> <i class="fa-regular fa-square    mr-3"></i></label>
                                    </div>
                                </div>




                                <div class="row">
                                    <div class="col-md-6 text-right">
                                        <label class="fs-5"> <span class="fw-bold">   تاريخ وتوقيت الوصول : </span> <label>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <label class="fs-5"><span class="fw-bold">   Date and time of arrival : </span>{{ $lastDate ? $lastDate->format('D - j M - Y ') : ' ' }} <span class="fw-bold pl-3">   Time : </span> {{ $lastDate ? $lastDate->format(' H:i') : ' ' }} </label>
                                    </div>
                                </div>




                               <div class="row">
                                <div class="col-md-6 text-right">
                                    <label class="fs-5"> <span class="fw-bold">  قادم من  : </span> <label>
                                </div>
                                <div class="col-md-6 text-left">
                                    <label class="fs-5"><span class="fw-bold">  Coming From : </span> {{ $user_ticket->country->country }} </label>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-6 text-right">
                                    <label class="fs-5"> <span class="fw-bold">   الوجهة المقصودة : </span> <label>
                                </div>
                                <div class="col-md-6 text-left">
                                    <label class="fs-5"><span class="fw-bold">  Destination : </span> {{ $ticket->airlinecountry->country_airport }} </label>
                                </div>
                            </div>



                            <div class="row">
                                <div class="col-md-6 text-right">
                                    <label class="fs-5"><span class="fw-bold">   الوسيلة ورقمها المنجمى : </span> <label>
                                </div>
                                <div class="col-md-6 text-left">
                                    <label class="fs-5"> <span class="fw-bold"> : The means of transport and its number </span></label>
                                </div>
                            </div>



                            <div class="row">
                                <div class="col-md-6 text-right">
                                    <label class="fs-5"> <span class="fw-bold  ">  تاريخ المغادرة : </span> <label>
                                </div>
                                <div class="col-md-6 text-left">
                                    <label class="fs-5"> <span class="fw-bold  ">  Departure date : </span> {{ $firstDate ? $firstDate->format('D - j M - Y') : ' ' }}</label>
                                </div>
                            </div>


                            <div class="row">
                                <div class=" text-center pt-4 ">
                                    <label class="fs-5"> <span class="fw-bold fs-5  border border-dark p-2"> الامضاءات / Signature </span> <label>
                                </div>

                            </div>
                        </div>

                        <div class="row mb-5">
                            <div class="col-md-4 text-right" style="margin-right: 100px">
                                <label class="fs-5"> <span class="fw-bold  fs-5"> امضاء الحريف</span> <label>
                            </div>
                            <div class="col-md-5 text-left">
                                <label class="fs-5"> <span class="fw-bold  fs-5"> امضاء المؤسسة </span></label>
                            </div>
                        </div>

                    </div>


        </form>

    </div>

    @endsection
</body>

</html>
{{--
<!-- Bootstrap JS scripts (jQuery and Popper.js) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>  --}}
