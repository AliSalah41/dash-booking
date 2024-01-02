<div class="col">
    <div class="card">
{{--        <img src="assets/images/gallery/05.png" class="card-img-top" alt="...">--}}
        <div class="{{$isNew?'bg-gradient-lush':'bg-gradient-burning'}} text-center">
            <i  class="fa-solid fa-ticket fa-10x text-white text-center fa-rotate-90 my-5"></i>
        </div>
        <div class="card-body">
            <h5 class="card-title text-capitalize">{{$title}}</h5>
{{--            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>--}}
{{--            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>--}}
        </div>
        <ul class="list-group list-group-flush  text-capitalize">
            <li class="list-group-item"><span class="text-primary fw-bolder">#</span> : {{$ticket->id}} </li>

            <li class="list-group-item"><span class="text-primary fw-bolder">total price</span> : {{$ticket->total_price}} </li>
            <li class="list-group-item"><span class="text-primary fw-bolder">hotel price</span> : {{$ticket->hotelTicket->hotel_price??''}} </li>
            <li class="list-group-item"><span class="text-primary fw-bolder">hotel start</span> : {{$ticket->hotelTicket->reservation_start??''}} </li>
            <li class="list-group-item"><span class="text-primary fw-bolder">hotel end</span> : {{$ticket->hotelTicket->reservation_end??''}} </li>
            <li class="list-group-item"><span class="text-primary fw-bolder">hotel room type</span> : {{str_replace('_', ' ',$ticket->hotelTicket->hotels->room_type??'')}} </li>
{{--            <li class="list-group-item"><span class="text-primary fw-bolder">hotel end</span> : {{$ticket->hotelTicket->reservation_end??''}} </li>--}}

            <li class="list-group-item"><span class="text-primary fw-bolder">transportation price</span> : {{$ticket->transportation->price??''}} </li>

            <li class="list-group-item"><span class="text-primary fw-bolder">entertainment</span> : {{$ticket->entertainment->title??''}} </li>
            <li class="list-group-item"><span class="text-primary fw-bolder">entertainment price</span> : {{$ticket->entertainment->price??''}} </li>
            <li class="list-group-item"><span class="text-primary fw-bolder">entertainment start</span> : {{$ticket->entertainment->start_dateTime??''}} </li>
            <li class="list-group-item"><span class="text-primary fw-bolder">entertainment end</span> : {{$ticket->entertainment->end_dateTime??''}} </li>


            <li class="list-group-item"><span class="text-primary fw-bolder">airline country</span> : {{$ticket->airlinecountry->country_airport??''}} </li>

            @if($isNew)
                <a href="{{ route('accept',$ticket->originalTicket->id )}}" class="btn btn-success ">Accept</a>
            @else
                <a href="{{ route('ignore',$ticket->editTicket->id )}}" class="btn btn-danger">Ignore (keep old)</a>
            @endif
{{--            <div class="text-center mb-3"  >--}}
{{--                <div class="col">--}}
{{--                    <a href="{{ route('accept',$originalTicket->id )}}" class="btn btn-success mr-3">Accept</a>--}}
{{--                    <a href="{{ route('ignore',$editTicket->id )}}" class="btn btn-danger">Ignore</a>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <li class="list-group-item">Dapibus ac facilisis in</li>--}}
{{--            <li class="list-group-item">Vestibulum at eros</li>--}}
        </ul>
{{--        <div class="card-body">	<a href="#" class="card-link">Card link</a>--}}
{{--            <a href="#" class="card-link">Another link</a>--}}
{{--        </div>--}}
    </div>
</div>
