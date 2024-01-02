<?php

namespace App\Http\Controllers;

use App\Charts\UserChart;
use App\Models\Event;
use App\Models\Ticket;
use App\Models\User;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class StatisticsController extends Controller
{
    private $data =[];
    private $startDate ;
    private $endDate;
    private $event_id;
    private Request $request;
    /**
     * Handle the incoming request.
     * @throws \Exception
     */
    public function __invoke(Request $request)
    {
        $this->request = $request;
        if (!empty($request->start)){
            $startDate = Carbon::parse($request->start);
            if ($startDate instanceof Carbon && $startDate->format('Y') > 2022) {
                $this->startDate = $startDate;
            }
        }
        if(!$this->startDate){
            $this->startDate = Carbon::now()->subYears(1);
        }
        if (!empty($request->end)){
            $endDate = Carbon::parse($request->end);
            if ($endDate instanceof Carbon && !$endDate->isFuture()) {
                $this->endDate = $endDate;
            }
        }
        if(!$this->endDate){
            $this->endDate = Carbon::now()->toDateString();
        }
        if ($request->event_id && Event::find($request->event_id)){
            $this->event_id = $request->event_id;
        }

        $users= User::count();
        $tickets = Ticket::count();




        $today_users = 25;
        $yesterday_users = 20;
        $users_2_days_ago = 30;
        $users_3_days_ago = 10;

        $chart = new UserChart();
//        $chart->type('area');
//        $chart->type('line');
        $chart->labels(['3 days ago','2 days ago', 'Yesterday', 'Today']);
//        $chart->dataset('users', 'area', [$users_3_days_ago,$users_2_days_ago, $yesterday_users, $today_users])->color('#15ca20');
        $chart->dataset('users', 'area',[240, 160, 671, 414, 555, 257, 901, 613, 727, 414, 555])->color('#15ca20');
//        $chart->dataset('users', 'line', [$users_2_days_ago, $yesterday_users, $today_users])->backgroundColor('#fd3550!important');
        $chart->reset();
//        $chart->height(500);
//        $chart->barWidth(10000);
//        $chart->color('text-success');
//        $chart->backgroundColor();
//        $chart->displayAxes(false);
//        $chart->displayLegend(true);
//        $chart->minimalist(true);


// ...
//        return $chart->datasets;
//        return dd($chart->labels);
        $chart_options = [
            'chart_title' => 'Users by months',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\User',
            'group_by_field' => 'created_at',
            'group_by_period' => 'month',
            'chart_type' => 'line',
            'chart_color' => '#15ca20',
//            'continuous_time' => 'true',
//            'hidden'=>true,
        ];

        $chart1 = new LaravelChart($chart_options);
        //        return view('home', compact('chart1'));

        $this->data = ['users'=>$users,'userChart'=>$chart,'chart1'=>$chart1];
        $this->fromDate = Carbon::now()->subWeeks(30);

        $models = ['userCard'=>User::class,'ticketCard'=>Ticket::class];
        $this->getBasicCharts($models);

        $this->income();

        $this->averageAge();

        $this->mostTypesOfTickets();

        $this->mostAgeGroupsBookTicktes();

        $this->countriesWithMostTickets();


        return view('admin.statistics', $this->data);


    }

    private function getBasicCharts($models){
        $startDate = $this->startDate;
        $endDate = $this->endDate;
        $event_id = $this->event_id;
        foreach ($models as $index=>$model){
            $collection = $model::
                when(!empty($startDate), function ($query) use ($startDate) {
                    $query->where('created_at','>=', $startDate);
                })
                ->when(!empty($endDate), function ($query) use ($endDate) {
                    $query->where('created_at','<', $endDate);
                })
                ->when($event_id && $model == Ticket::class, function ($query, $event_id) {
                    $query->where('event_id', $event_id);
                })
                ->selectRaw('DATE(created_at) as date, COUNT(*) as total')
                ->groupBy('date')
                ->orderBy('date')
                ->pluck('total','date')
                ->toArray();

//            $endDate = $endDate??Carbon::today();
//            $startDate = $startDate??Carbon::now()->sub;
            $period = CarbonPeriod::create($startDate, '1 day', $endDate);
            $new_array = [];
            $totalCount = 0;
            foreach ($period as $date) {
                $formattedDate = $date->format('Y-m-d');
                $count = $collection[$formattedDate] ?? 0;
//                $new_array[$formattedDate] = $count;
                $labels[] = $formattedDate;
                $values[] = $count;
                $totalCount += $count;
            }
//            $totalCount = $model::count();
//            $labels = $userStatistics->pluck('date');
//            $values = $userStatistics->pluck('total');
            $card = ['labels'=>$labels,'values'=>$values,'total'=>$totalCount,'title'=>'new users','color'=>'#17a00e','type'=>'line'];
            $this->data[$index] = $card;
        }

    }

    private function income(){
        $startDate = $this->startDate;
        $endDate = $this->endDate;
        $event_id = $this->event_id;

        $ticketStatistics = Ticket::
            when(!empty($startDate), function ($query) use ($startDate) {
                $query->where('created_at','>=', $startDate);
            })
            ->when(!empty($endDate), function ($query) use ($endDate) {
                $query->where('created_at','<', $endDate);
            })
            ->when($event_id , function ($query) use ($event_id) {
                $query->where('event_id', $event_id);
            })
            ->selectRaw('DATE(created_at) as date, SUM(total_price) as total')
            ->groupBy('date')
            ->orderBy('date')
            ->pluck('total','date')
            ->toArray();

//        $totalCount = $ticketStatistics->sum('total');
//        return $statistics;
//        $labels = $ticketStatistics->pluck('date');
//        $values = $ticketStatistics->pluck('total');

// use CarbonPeriod here
        $period = CarbonPeriod::create($startDate, '1 day', $endDate);
        $new_array = [];
        $totalCount = 0;
        foreach ($period as $date) {
            $formattedDate = $date->format('Y-m-d');
            $count = $ticketStatistics[$formattedDate] ?? 0;
//                $new_array[$formattedDate] = $count;
            $labels[] = $formattedDate;
            $values[] = $count;
            $totalCount += $count;
        }

        $incomeCard = ['labels'=>$labels,'values'=>$values,'total'=>$totalCount,'title'=>'new users','color'=>'#17a00e','type'=>'line'];
//        dd($incomeCard);
        $this->data['incomeCard'] = $incomeCard;
    }

    private function averageAge(){
        $averageAge = User::whereNotNull('birth') // Assuming 'birth' is a column in the users table
//            ->whereIn('id',['3'])
//            ->selectRaw('TIMESTAMPDIFF(YEAR, birth, CURDATE()) as age')
        ->selectRaw('AVG(TIMESTAMPDIFF(YEAR, birth, CURDATE())) as average_age')
            ->get();

        $averageAge = Ticket::join('users', 'tickets.user_id', '=', 'users.id')
            ->whereNotNull('birth') // Assuming 'birth' is a column in the users table
            ->selectRaw('AVG(TIMESTAMPDIFF(YEAR, birth, CURDATE())) as average_age')
            ->first();

        $averageAge = round($averageAge->average_age,1);
        $this->data['averageAge'] = $averageAge ;
    }

    private function mostTypesOfTickets(){
        $event_id = $this->event_id;
        $startDate = $this->startDate;
        $endDate = $this->endDate;

        $mostTypesOfTickets = Ticket::join('ticket_types', 'tickets.ticket_type_id', '=', 'ticket_types.id')
            ->when(!empty($startDate), function ($query) use ($startDate) {
                $query->where('tickets.created_at','>=', $startDate);
            })
            ->when(!empty($endDate), function ($query) use ($endDate) {
                $query->where('tickets.created_at','<', $endDate);
            })
            ->when($event_id , function ($query) use ($event_id) {
                $query->where('tickets.event_id', $event_id);
            })
            ->when($event_id, function ($query, $event_id) {
                $query->where('tickets.event_id', $event_id);
            })->whereNotNull('ticket_type_id')
            ->select('ticket_types.ticket_type', \DB::raw('count(*) as total'))
            ->groupBy('ticket_types.ticket_type')
            ->orderByDesc('total')
            ->get();

        $labels = [];
        $values = [];
        $colors = [];
        $colorsList = ['#17AB6F','#F5BD02','#0ff'];
        foreach ($mostTypesOfTickets as $index=>$type){
            $labels[] = $type->ticket_type;
            $values[] = $type->total;
            $colors[] = $colorsList[$index];
        }
        $mostTypesOfTickets = ['labels'=>$labels,'values'=>$values,'colors'=>$colors,'title'=>'types with most tickets','type'=>'pie'];
        $this->data['mostTypesOfTickets'] = $mostTypesOfTickets ;
    }

    private function mostAgeGroupsBookTicktes(){
        $event_id = $this->event_id;


        // most age groups book ticktes
        $counts = Ticket::join('users', 'tickets.user_id', '=', 'users.id')
            ->when($event_id, function ($query, $event_id) {
                $query->where('tickets.event_id', $event_id);
            })
            ->select(
                DB::raw('COUNT(CASE WHEN birth > DATE_SUB(CURDATE(), INTERVAL 20 YEAR) THEN 1 END) AS count_under_20'),
                DB::raw('COUNT(CASE WHEN birth BETWEEN DATE_SUB(CURDATE(), INTERVAL 30 YEAR) AND DATE_SUB(CURDATE(), INTERVAL 20 YEAR) THEN 1 END) AS count_between_20_and_30'),
                DB::raw('COUNT(CASE WHEN birth < DATE_SUB(CURDATE(), INTERVAL 30 YEAR) THEN 1 END) AS count_above_30')
            )
            ->first();
        $countUnder20 = $counts->count_under_20;
        $countBetween20And30 = $counts->count_between_20_and_30;
        $countAbove30 = $counts->count_above_30;

        $colors = ['#00FFFF','#00539C','#EEA47F'];
        $labels = ['under 20','between 20 and 30','above 30'];
        $values = [$countUnder20,$countBetween20And30,$countAbove30];

        $mostAgeGroupsBookTicktes = ['labels'=>$labels,'values'=>$values,'colors'=>$colors,'title'=>' most age groups book ticktes','type'=>'pie'];

        $this->data['mostAgeGroupsBookTicktes'] = $mostAgeGroupsBookTicktes ;
    }

    private function countriesWithMostTickets(){
        $event_id = $this->event_id;

        $countriesWithMostTickets = Ticket::join('users', 'tickets.user_id', '=', 'users.id')
            ->when($event_id, function ($query, $event_id) {
                $query->where('tickets.event_id', $event_id);
            })
            ->whereNotNull('country_id')
            ->select('country_id', \DB::raw('count(*) as total'))
//            ->selectRaw('country_id as country, COUNT(*) as total')
//            ->select('country_id', \DB::raw('COUNT(tickets.id) as total_tickets'))
            ->groupBy('country_id')
            ->orderByDesc('total')
            ->get();
        $labels = [];
        $values = [];
        $colors = [];
        $countryInfo = ['1'=>['name'=>'tunisia','color'=>'#C8102E'],'2'=>['name'=>'Germany','color'=>'#000000'],'3'=>['name'=>'egypt','color'=>'#c09300'],'4'=>['name'=>'other','color'=>'#001489']];
        foreach ($countriesWithMostTickets as $country){
            $info = $countryInfo[$country->country_id];
            $labels[] = $info['name'];
            $values[] = $country->total;
            $colors[] = $info['color'];
        }
        $countriesWithMostTicketsCard = ['labels'=>$labels,'values'=>$values,'colors'=>$colors,'title'=>'countries with most tickets','type'=>'pie'];
        $this->data['countriesWithMostTicketsCard'] = $countriesWithMostTicketsCard ;
    }

    private function fixModels(){
        $users =User::all();
        $ticketsToUpadte = Ticket::all();
        foreach ($ticketsToUpadte as $ticket){
            $ticket->user_id = $users->random(1)->first()->id;
            $ticket->save();
        }
        return Ticket::all();

// fix birth in users
        $usersToUpdate = User::get();
        foreach ($usersToUpdate as $user) {
            // Generate a random birthdate within a reasonable range (e.g., 18-60 years old)
            $randomBirthdate = Carbon::now()->subYears(rand(15, 50))->subDays(rand(15, 60))->subMonths(rand(15, 60));

            // Update the user's birthdate
            $user->birth = $randomBirthdate;
            $user->save();
        }
        return User::all();

        $usersToUpdate = User::get();
        foreach ($usersToUpdate as $user) {
            $user->country_id = rand(1, 4);
            $user->save();
        }
        return User::all();
    }
}
