<?php

namespace App\Http\Controllers;

use App\Charts\UserChart;
use App\Models\Ticket;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class StatisticsController extends Controller
{
    /**
     * Handle the incoming request.
     * @throws \Exception
     */
    public function __invoke(Request $request)
    {
        // return 'aa';


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
        $data = ['users'=>$users,'userChart'=>$chart,'chart1'=>$chart1];
        $tenWeeksAgo = Carbon::now()->subWeeks(30);

//        return view('home', compact('chart1'));
        $models = ['userCard'=>User::class,'ticketCard'=>Ticket::class];
        foreach ($models as $index=>$model){
            $userStatistics = $model::where('created_at', '>=', $tenWeeksAgo)
                ->selectRaw('DATE(created_at) as date, COUNT(*) as total')
                ->groupBy('date')
                ->orderBy('date')
                ->get();
            $totalCount = $model::count();
            $labels = $userStatistics->pluck('date');
            $values = $userStatistics->pluck('total');
            $card = ['labels'=>$labels,'values'=>$values,'total'=>$totalCount,'title'=>'new users','color'=>'#17a00e','type'=>'line'];
            $data[$index] = $card;
        }

        $tenWeeksAgo = Carbon::now()->subWeeks(30);
        $ticketStatistics = Ticket::where('created_at', '>=', $tenWeeksAgo)
            ->selectRaw('DATE(created_at) as date, SUM(total_price) as total')
            ->groupBy('date')
            ->orderBy('date')
            ->get();
        $totalCount = Ticket::sum('total_price');
//        return $statistics;
        $labels = $ticketStatistics->pluck('date');
        $values = $ticketStatistics->pluck('total');
        $incomeCard = ['labels'=>$labels,'values'=>$values,'total'=>$totalCount,'title'=>'new users','color'=>'#17a00e','type'=>'line'];
        $data['incomeCard'] = $incomeCard;


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
        $data['averageAge'] = $averageAge ;





        $countriesWithMostTickets = Ticket::join('users', 'tickets.user_id', '=', 'users.id')
            ->whereNotNull('country_id')
            ->select('country_id', \DB::raw('count(*) as total'))
//            ->selectRaw('country_id as country, COUNT(*) as total')
//            ->select('country_id', \DB::raw('COUNT(tickets.id) as total_tickets'))
            ->groupBy('country_id')
            ->orderByDesc('total')
            ->get();


        return view('admin.statistics',$data);



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
