<base href="/public">
@extends('admin.layouts.app')
@section('home', '/users')
@section('title')
Tickets
@stop
@section('subtitle')
Ticket
@stop

@section('content')


    <div class="container-fluid">
        <h1 class="fw-bold p-5 " style="margin-bottom: 50px;">CIT24</h1>
    <hr class="w-100 m-3">
    <header class="p-2 m-2">
        <div class="row d-flex align-items-center">
          <div class="qr-code col-lg-2 ">
     <img src="{{ asset('assets/images/Example-QR-code.webp') }}" alt="" class="img-fluid " style="width: 100px; height: 100px;">
     </div>

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
     <div class=" col-lg-4 col-sm-12 ">
        <div class="d-flex align-items-center gap-5 ">
            <div class="d-flex align-items-center flex-column ">
                <h3 class="fw-light"> {{ $firstDate ? $firstDate->format('l j M Y') : ' ' }}</h3>

            </div>

        <div class="icon fw-light">
            <i class="fa-solid fa-chevron-right" style="font-size: 100px;" aria-hidden="true"></i>
        </div>
        <div class="d-flex align-items-center gap-5 ">
            <div class="d-flex align-items-center justify-content-center flex-column ">

        <h3 class="fw-light">{{ $lastDate ? $lastDate->format('l j M Y') : ' '  }}</h3>
            </div>

        <div class="icon fw-light mb-4 " style="font-size: 100px;">
          <span>|</span>
        </div>

        </div>

        </div>

        </div>

        <div class="col-lg-3 ">
            <div class="d-flex align-items-center flex-column">
                <h3 class="fw-light"> {{ $ticket->event->name ?? ' ' }}</h3>

            </div>
        </div>
        </div>

    </header>
    <hr class="w-100 m-3">
    </div>

    <div class="content mt-5 ">
        <div class="row">
           <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="p-5 d-flex  flex-column">
                 <h3 class="fw-bold">{{ $ticket->user->name ?? ' ' }}</h3>

                 {{--  <p class="fs-4 w-100">AIRLINE COUNTERY : {{ $ticket->airlinecountry->country_airport ?? '-' }} </p>  --}}

            {{--  @if($hotel_ticket->hotels && $hotel_ticket->hotels->room_type != null)  --}}
            @if($hotel_ticket)
            <p class="fs-4 w-100"> HOTEL PRICE: € {{ $hotel_ticket->hotel_price  }}  </p>
            <span class="fs-4 w-100">{{ str_replace('_', ' ', $hotel_ticket->hotels->room_type) }}</span>
            {{--  <span class="fs-4 w-100"> TRANSPORTATION PRICE : {{ $ticket->transportation->price ?? '-' }}</span>
            <span class="fs-4 w-100"> {{   $ticket->entertainment->title ?? '-' }}</span>  --}}

        @endif
        @if($ticket->transportation)

        <p class="mt-3 fs-4 w-100"> TRANSPORTATION PRICE: € {{ $ticket->transportation->price ?? '-' }}  </p>
        @endif
        @if($ticket->entertainment)

                <label for="" class="mt-2 fs-4 w-100">{{   $ticket->entertainment->title ?? '-' }} (€ {{  $ticket->entertainment->price ?? '-' }})</label>
                {{--  <label for="" class="mt-3 fs-6">- € {{  $ticket->entertainment->price ?? '-' }}  --}}
                </label>
        @endif
        @if($hotel_ticket)
        <label for="" class="mt-3 fs-4 w-100"> {{ $hotel_ticket->reservation_start ? (\Carbon\Carbon::parse($hotel_ticket->reservation_start)->diffInDays(\Carbon\Carbon::parse($hotel_ticket->reservation_end)) - 1) : '-' }}  NIGHTS/{{ $hotel_ticket->reservation_start ? \Carbon\Carbon::parse($hotel_ticket->reservation_start)->diffInDays(\Carbon\Carbon::parse($hotel_ticket->reservation_end)) : '-' }} DAYS STAY</label>
        @endif
                {{--  <label for="" class="mt-3 fs-6">- MEAL PLAN IS BASED ON ALL INCLUSIVE BASIS (BREAKFAST-LUNCH-DINNER-SNACKS-DRINKS WITHIN
                    THE APPLICABLE FORMULA TILL 23H00)
                    </label>
                    <label for="" class="mt-3 fs-6">-BOAT TRIP INCLUDING (EXCLUDING TRANSFER BOTH WAYS)</label>
                    <label for="" class="mt-3 fs-6">CONDITIONS OF THE FLASH SALES :
                    </label>  --}}
                    <label for="" class="mt-3 fs-4 w-100"> NON-REFUNDABLE </label>
                    <label for="" class="mt-3 fs-4 w-100"> NAME CHANGE ONCE AGAINST 50 EURO FEES
                    </label>
                    {{--  <label for="" class="mt-3 fs-6">-PAYMENT PLAN :
                    </label>
                    <label for="" class="mt-3 fs-6">FIRST 100 EURO UPON BOOKING</label>
                    <label for="" class="mt-3 fs-6">SECOND 100 EURO BEFORE THE END OF JANUARY 24 BY BANK TRANSFER
                    </label>
                    <label for="" class="mt-3 fs-6">THIRD 100 EURO BEFORE THE END OF FEBRUARY 24 BY BANK TRANSFER
                    </label>
                    <label for="" class="mt-3 fs-6">THE OUTSTANDING TO BE SETTLED BY THE END OF MARS 24
                    </label>  --}}
            </div>

           </div>
           <div class="col-lg-6 col-md-6 col-sm-12">
            <div class=" p-5 d-flex align-items-center flex-column">
                {{--  <div class="p-4 d-flex gap-4 " style="border: 1px solid #000; border-radius: 3px;">
                  <p class="w-50">Don't print the same ticket twice! </p>
                    <h4 class="fw-light mt-3 fs-2">N° 000306</h4>
                </div>  --}}
                {{--  <div class=" mt-5 mb-5">
                    <img src="/images/code-EAN.png" alt="" class="img-fluid" style="width: 700px;">
                </div>  --}}
                <div class="p-4 d-flex w-100  flex-column " style="background: 	#E8E8E8; border-radius: 3px;">
                    <label class="fw-medium">FOR QUESTIONS, CONTACT:</label>
                    <span class="fw-medium">CIT EVENTS LTD</span>
                    <span class="fw-medium mt-5">07917580092</span>
                    <a class="text-decoration-none text-dark fw-medium" href="mailto:info@cit-festival.com">info@cit-festival.com</a>
                  </div>
                  <div class="p-4 d-flex w-100 mt-5 flex-column ">
                    <div>
                        <label class="fw-bold" for="">AIRLINE COUNTERY:</label>
                        <span class="fw-bold"> {{ $ticket->airlinecountry->country_airport ?? '-' }}</span>
                    </div>
                    <div>
                        <label class="fw-bold" for="">DATE:</label>
                        <span class="fw-bold">{{ $firstDate ? $firstDate->toDateString() : '-' }}</span>
                    </div>
                    <div>
                        <label class="fw-bold" for="">NAME:</label>
                        <span class="fw-bold">{{ $ticket->user->name ?? '-' }}</span>
                    </div>
                    <div>
                        <label class="fw-bold" for="">TICKET:</label>
                        <span class="fw-bold">CIT24</span>
                    </div>
                    <div>
                        <label class="fw-bold" for="">TOTAL PRICE:</label>
                        <span class="fw-bold"> € {{ $ticket->total_price ?? '-' }} </span>
                    </div>
                    <span style="font-size: 10px;">INCLUDING VAT 0% : €0.00</span>
                  </div>
                  <div class="p-4 d-flex w-100 mt-4 flex-column ">
                   <p style="font-size: 12px;">GENERAL TERMS OF SALE</p>
                   <p style="font-size: 12px;">To be valid, the e-ticket (electronic ticket) is subject to the terms of sale of Weezevent, and
                    possibly those of the organizer that you agreed to when ordering. REMINDER: This e-ticket
                    is not refundable. Unless otherwise agreed by the organizer, e-ticket is personal, not
                    transferable or exchangeable. CONTROL: Access to the event is under the control of validity
                    of your e-ticket. This e-ticket is only valid for the location, session, date and hour written on
                    the e-ticket. Past the start time, access to the event is not guaranteed and does not entitle
                    to any refund. We therefore advise you to arrive before the start of the event. To be valid,
                    this e-ticket must be printed on white A4 blank paper, without changing the print size and
                    with a good quality. E-tickets partially printed, dirty, damaged or illegible will be invalid and
                    may be denied by the organizer. The organizer also reserves the right to accept or refuse
                    other media, including electronic (mobile phone, tablet, etc ...). Each e-ticket has a barcode
                    allowing access to the event to one person. To be valid the payment of this e-ticket must
                    not have been rejected by the credit card owner used for ordering. In this case the barcode
                    is deactivated. At the door, you must be in possession of a valid official ID with photo.
                    Following the inspection, the e-ticket must be retained until the end of the event. In some
                    cases the organizer will issue you a ticket to two strains (whether or not reveal the rental
                    fee). FRAUD: It is prohibited to reproduce, use, copy, duplicate, counterfeit this e-ticket in
                    any manner whatsoever, under pain of criminal prosecution. Similarly, any order placed with
                    a way to bribe to get an e-ticket will result in criminal prosecution and the invalidity of such
                    e-ticket. LIABILITY: The purchaser remains responsible for the use made of e-tickets, and if
                    lost, stolen or duplicate a valid e-ticket, only the first person who holds the e-ticket can
                    access the event. Weezevent is not responsible for abnormalities that may occur during the
                    ordering, processing or printing the e-ticket to the extent that it has not caused intentionally
                    or by negligence in case of loss, theft or unauthorized use of e-ticket. EVENT: The events
                    are and remain the sole responsibility of the organizer. The acquisition of this e-ticket wins
                    if adherence to rules of the place of the event and / or organizer. In case of cancellation or
                    postponement of the event, a refund of the ticket without costs (transport, hotels, etc ...)
                    will be subject to the conditions of the organizer (you can find his email address above in
                    Additional information) who receives the income from the sale of e-tickets.
                    </p>
                  </div>
                  <div class=" mt-3 ">
                    {{--  <img src="/images/code-EAN.png" alt="" class="img-fluid" style="width: 700px;">  --}}
                </div>
                <div class="p-4 d-flex align-items-center flex-column " style="border: 1px solid #000; border-radius: 3px;">
                    <p class="fs-3" style="color: #494949;">You organize events? </p>
                      <span style="color: #494949;" class="fw-light  fs-6">Create your online ticketing widget and sell in one click with
                    </span>
                    <a class="text-decoration-none text-dark fw-medium" href="https://tazkarti.magdsofteg.xyz/">tazkarti.magdsofteg.xyz</a>

                  </div>
            </div>
           </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

@endsection
