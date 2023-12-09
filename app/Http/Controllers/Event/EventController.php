<?php

namespace App\Http\Controllers\Event;

use App\Models\City;
use App\Models\User;
use App\Models\Event;
use App\Models\Hotel;
use App\Models\Media;
use App\Models\Price;
use App\Models\Country;
use App\Models\Category;
use App\Models\EventTime;
use Illuminate\Http\Request;
use App\Models\Entertainment;
use App\Models\Transportation;
use App\Services\MediaService;
use App\Models\TicketType;
use Illuminate\Validation\Rule;
use App\Models\EventTranslation;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class EventController extends Controller
{
    protected $mediaService;
    public function __construct(MediaService $mediaService)
    {

        $this->mediaService = $mediaService;

        $this->middleware('permission:event-list' . session('appKey'), ['only' => ['index']]);
        $this->middleware('permission:event-create' . session('appKey'), ['only' => ['create', 'store']]);
        $this->middleware('permission:event-edit' . session('appKey'), ['only' => ['edit', 'update']]);
        $this->middleware('permission:event-delete' . session('appKey'), ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $events = Event::all();
        $events = Event::with(['Category', 'Country', 'City'])->get();

        // $users = Event::where('appKey', session('appKey'))->get();
        return view(session('dashboard') . '.admin.Event.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $events = Event::where('appKey', session('appKey'))->get();
        // $categories = Category::with('Event')->get();

        $categories = Category::all();
        $countries = Country::all();

        $cities = City::with('country')->get();
        return view('admin.Event.create', compact('events', 'categories', 'countries', 'cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([

            'name' => 'required|string',
            'description' => 'required|string',
            'address' => 'required|string',


            'start.*' => 'required|string',
            'end.*' => 'required|string',
            'title.*' => 'required|string',
            'desc_time.*' => 'required|string',
            'img.*' => 'required',
            'image' => 'required',
            'ticket_type.*' => 'required|string',
            'selling_price.*' => 'required|numeric|min:1',
            'purchasing_price.*' => 'required|numeric|min:1',
            'ticket_limit.*' => 'required|numeric|min:1',
        ]);


        $event = new Event();
        // $event->translatedAttributes = [];
        // $enTranslation = $request->en;
        // $event->name =  $enTranslation['name'];
        // $event->description =  $enTranslation['description'];
        $event->name = $request->name;
        $event->description = $request->description;
        $event->address = $request->address;


        $event->appKey = session('appKey');
        $event->category_id = $request->category;
        $event->country_id = $request->country;
        $event->city_id = $request->city;
        $event->save();
        // remove translatedAttributes from model to store in main table

        // Set the translated attributes for english


        // $event->translateOrNew('en')->name = $request->en['name'];
        // $event->translateOrNew('en')->description =  $request->en['description'];
        // // Now, set and save translated attributes for each language
        // $event->translateOrNew('ar')->name = $request->ar['name'];
        // $event->translateOrNew('ar')->description = $request->ar['description'];

        // $event->translateOrNew('fr')->name = $request->fr['name'];
        // $event->translateOrNew('fr')->description = $request->fr['description'];

        // $event->translateOrNew('de')->name = $request->de['name'];
        // $event->translateOrNew('de')->description = $request->de['description'];

        // $event->translateOrNew('es')->name = $request->es['name'];
        // $event->translateOrNew('es')->description = $request->es['description'];

        // $event->save(); // This saves the translated attributes




        // save image in media model from event model
        $this->mediaService->createMedia($request, $event, 'image', null, 'Event');
        // return $request->price;
        // foreach ($request->price as $currency => $value) {
        //     $event->prices()->create([
        //         'currency' => $currency,
        //         'price' => $value,
        //     ]);
        // }

        //////////////////////////////////////////////////////////////
        // Loop through 'from' and 'to' arrays
        $fromValues = $request->input('start');
        $toValues = $request->input('end');
        $titleValues = $request->input('title');
        $descValues = $request->input('desc_time');

        //////////////////////////////////////////////////////////////
        $imgValues = $request->file('img');
        // $imgValues = $request->input('image');
        // $languages = ['en', 'ar', 'fr', 'de', 'es'];
        foreach ($fromValues as $index => $start) {
            $end = $toValues[$index];

            // Create and save an EventTime record for each pair of 'from' and 'to'
            $eventTime = new EventTime;


            // $eventTime->translatedAttributes = [];
            // $enTranslation = $request->en;
            // $eventTime->title =  $enTranslation[$index]['title'];
            // $eventTime->desc_time = $enTranslation[$index]['desc_time'];


            $eventTime->title = $titleValues[$index];
            $eventTime->desc_time = $descValues[$index];
            $eventTime->start = $start;
            $eventTime->end = $end;
            $eventTime->event_id = $event->id;
            $eventTime->save();
        }
        $this->mediaService->createMedia($request, $eventTime, null, $imgValues[$index], 'EventTime');
            // Loop through languages dynamically
            // dd($languages);
            // foreach ($languages as $lang) {
            //     $eventTime->title = $request->{$lang}[$index]['title'];
            //     $eventTime->desc_time = $request->{$lang}[$index]['desc_time'];

                // Set and save translated attributes for each language
                // foreach ($languages as $otherLang) {
                //     if ($otherLang !== $lang) {
                //         $eventTime->translateOrNew($otherLang)->title = $request->{$otherLang}[$index]['title'];
                //         $eventTime->translateOrNew($otherLang)->desc_time = $request->{$otherLang}[$index]['desc_time'];
                //     }
                // }

//////////////////////////////////////////////////////
       //////////////////////////////////////////////////////////////
        // Loop through 'from' and 'to' arrays
        $typeValues = $request->input('ticket_type');
        $limitValues = $request->input('ticket_limit');
        $selling_priceValues = $request->input('selling_price');
        $purchasing_priceValues = $request->input('purchasing_price');

        //////////////////////////////////////////////////////////////

        // $imgValues = $request->input('image');
        // $languages = ['en', 'ar', 'fr', 'de', 'es'];
        foreach ($typeValues as $index => $type) {
            $limit = $limitValues[$index];

            // Create and save an EventTime record for each pair of 'from' and 'to'
            $typeTicket = new TicketType;


            // $eventTime->translatedAttributes = [];
            // $enTranslation = $request->en;
            // $eventTime->title =  $enTranslation[$index]['title'];
            // $eventTime->desc_time = $enTranslation[$index]['desc_time'];


            $typeTicket->selling_price = $selling_priceValues[$index];
            $typeTicket->purchasing_price = $purchasing_priceValues[$index];
            $typeTicket->ticket_type= $type;
            $typeTicket->ticket_limit =  $limit;
            $typeTicket->event_id = $event->id;
            $typeTicket->save();

            }
            //               // Set the translated attributes for english



            // $eventTime->save(); // This saves the translated attributes

            // $eventTime->save();

            // save image in media model from eventtime model
            //   $this->mediaService->createMedia($request, $eventTime);
        // }
        $event_id = $event->id;
        // Create and save multiple EventTime records
       // return redirect()->route('hotels.create')->with('success', __('words.created'));
        return redirect()->route('hotels.create', ['event' => $event_id])->with('success', 'Event created successfully');


    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::where('id', $id)->where('appKey', session('appKey'))->first();
        $event_times = EventTime::where('event_id', $id)->get();
        $ticket_types = TicketType::where('event_id', $id)->get();
        $event_hotels = Hotel::where('event_id', $id)->get();
        $transportations = Transportation::where('event_id', $id)->get();
        $entertainments =Entertainment::where('event_id', $id)->get();

        return view('admin.Event.show', compact('event', 'event_times','event_hotels','transportations','entertainments','ticket_types'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


        $event = Event::find($id);
        $event_trans = EventTranslation::where('event_id', $id)->get();
        $categories = Category::all();
        $countries = Country::all();
        $cities = City::all();
        $event_times = EventTime::where('event_id', $id)->get();
        $ticket_types = TicketType::where('event_id', $id)->get();
        // return $event_trans;
        // return $event_times->first()->translations;
        return view('admin.Event.update', compact('event', 'event_trans', 'categories', 'countries', 'cities', 'event_times','ticket_types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // return $request->all();
        $event = Event::find($id);

        $request->validate([

            'name' => 'required|string',
            'description' => 'required|string',
            'address' => 'required|string',
            'start.*' => 'required|string',
            'end.*' => 'required|string',
            'title.*' => 'required|string',
            'desc_time.*' => 'required|string',
            'img.*' => 'required',
            'image' => 'required',
            'ticket_type.*' => 'required|string',
            'selling_price.*' => 'required|numeric|min:1',
            'purchasing_price.*' => 'required|numeric|min:1',
            'ticket_limit.*' => 'required|numeric|min:1',
        ]);
        // $request->validate([
        //     'en.name' => 'required|string',
        //     'en.description' => 'required|string',

        //     'address' => 'required',
        //     'tickets_limit' => 'required|numeric|min:1',
        //     'price.*' => 'required',
        //     'image' => 'required',
        //     // 'desc_time' =>'required',
        //     'category' => 'required',
        //     'start.*' => 'required',
        //     'end.*' => 'required',
        //     'img' => 'required',

        // ]);



        // // Update the English ('en') translation
        // $event->translateOrNew('en')->name = $request->input('en.name');
        // $event->translateOrNew('en')->description = $request->input('en.description');

        // // Update the Arabic ('ar') translation
        // $event->translateOrNew('ar')->name = $request->input('ar.name');
        // $event->translateOrNew('ar')->description = $request->input('ar.description');

        // // Update the Arabic ('fr') translation
        // $event->translateOrNew('fr')->name = $request->input('fr.name');
        // $event->translateOrNew('fr')->description = $request->input('fr.description');

        // // Update the Arabic ('de') translation
        // $event->translateOrNew('de')->name = $request->input('de.name');
        // $event->translateOrNew('de')->description = $request->input('de.description');

        // // Update the Arabic ('es') translation
        // $event->translateOrNew('es')->name = $request->input('es.name');
        // $event->translateOrNew('es')->description = $request->input('es.description');

        // // Save the changes to the database
        // $event->save();
        // // remove translatedAttributes from model to store in main table

        // $event->translatedAttributes = [];

        $event->update([
            // 'name' => $request->en['name'],
            // 'description' => $request->en['description'],

            'address' => $request->address,
            'title' => $request->title,

            'desc_time' => $request->desc_time,
            'category_id' => $request->category,
            'country_id' => $request->country,
            'city_id' => $request->city,
        ]);

        // $this->mediaService->createMedia($request, $event, 'image');
        // Create or update media for the Event model
        $this->mediaService->createMedia($request, $event, 'image', null, 'Event');
        // $this->mediaService->updateMedia($event, $request->file('image'));
        // update in table price
        // foreach ($request->price as $currency => $value) {
        //     $event->prices()->where('currency', $currency)->update(['price' => $value]);
        // }

        // update in event time table
        $fromValues = $request->input('start');
        $toValues = $request->input('end');
        $titleValues = $request->input('title');
        $descValues = $request->input('desc_time');
        $imgValues = $request->file('img');
        EventTime::where('event_id', $event->id)->delete();
        foreach ($fromValues as $index => $from) {
            $to = $toValues[$index];

            $n_eventTime = new EventTime;
            $n_eventTime->start = $from;
            $n_eventTime->end = $to;
            $n_eventTime->title = $titleValues[$index];
            $n_eventTime->desc_time = $descValues[$index];
            $n_eventTime->event_id = $event->id;
            $n_eventTime->save();
            // $this->mediaService->createMedia($request, $n_eventTime, null, $imgValues[$index]);
            // Create or update media for the EventTime model
            $this->mediaService->createMedia($request,   $n_eventTime, null, $imgValues[$index], 'EventTime');
            // $this->mediaService->updateMedia( $n_eventTime, $request->file('image'), 'EventTime');
        }


        $typeValues = $request->input('ticket_type');
        $limitValues = $request->input('ticket_limit');
        $selling_priceValues = $request->input('selling_price');
        $purchasing_priceValues = $request->input('purchasing_price');

       TicketType::where('event_id', $event->id)->delete();
        //////////////////////////////////////////////////////////////


        foreach ($typeValues as $index => $type) {
            $limit = $limitValues[$index];

            $typeTicket = new TicketType;

            $typeTicket->selling_price =  $selling_priceValues[$index];
            $typeTicket->purchasing_price =  $purchasing_priceValues[$index];

            $typeTicket->ticket_type= $type;
            $typeTicket->ticket_limit =  $limit;
            $typeTicket->event_id = $event->id;
            $typeTicket->save();

            }

        return redirect()->route('show')->with('success', __('words.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $event = Event::find($id);
        // Delete the price records
        $event->prices()->delete();
        $event->hotels()->delete();
        $event->transportations()->delete();
        $event->entertainments()->delete();
        // 1. Delete the media records associated with the Event model
        $this->mediaService->deleteMedia($event);

        // 2. Delete the media records associated with the EventTime records
        $event->eventTimes->each(function ($eventTime) {
            $this->mediaService->deleteMedia($eventTime);
        });

        // 3. Delete the EventTime records
        $event->eventTimes()->delete();
        $event->ticketTypes()->delete();
        // 5. Delete the Event record
        $event->delete();

        return redirect()->back()
            ->with('success', 'event deleted sucessfully');
    }

    public function country_city($country_id)
    {
        $cities = City::where('country_id', $country_id)->get();

        return response()->json($cities);
    }

    public function activation($id)
    {
        $user = User::where('id', $id)->where('appKey', session('appKey'))->first();
        $message = __('words.client_active');

        if ($user->is_active) {
            $user->update(['is_active' => 0]);
            $message = __('words.client_not_active');
        } else
            $user->update(['is_active' => 1]);

        return redirect()->route('User.index')
            ->with('success', $message);
    }
}
