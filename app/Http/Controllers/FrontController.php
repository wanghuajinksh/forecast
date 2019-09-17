<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Measure;
use App\Cardinality;
use App\Endpoint;
use App\Location;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Carbon\CarbonInterval;

class FrontController extends Controller
{
    public function index()
    {
        return view('vue');
    }
    
    public function date_location()
    {
        $location = Location::get()->toArray();
        $real_date = $this->get_date();
        // $date_last = Location::first()->measures()->where('forecastDate', $date_data)->orderBy('localDate','desc')->first()->localDate;
        // $period = CarbonInterval::hours(33)->toPeriod(new Carbon($date_first), new Carbon($date_last));
        // $date  = Measure::latest('forecastDate')->orderBy('locationId')->get()->toArray();
        // foreach ($period as $key => $date) {            
        //     dump($date->format('y-m-d h:m:s'));
        // }
        // $date_start = new Carbon($date_first);
        // $date_end = $date_start->copy()->addHours
        // $chart_start = $chart_end->copy()->subDays(6);
    
        // for($date = $chart_start; $date->lte($chart_end); $date->addHours(33)) {
        //     dump($date->format('Y-m-d H:i:s'));
        // }
        return [
            'location' => $location,
            'dates' => $real_date,
        ];

    }

    public function init_wave()
    {
        $real_date = $this->get_date();
        $date_data = Location::first()->measures()->latest('forecastDate')->first()->forecastDate;
        $data = Location::first()->measures()->where('forecastDate', $date_data)->orderBy('localDate')->whereBetween('localDate', [$real_date[0], $real_date[1]])->get()->toArray();
        return [
            'data' => $data,
        ];
    }

    public function get_date()
    {
        $date_data = Location::first()->measures()->latest('forecastDate')->first()->forecastDate;
        $date_first = Location::first()->measures()->where('forecastDate', $date_data)->orderBy('localDate')->first()->localDate;
        $dates = Location::first()->measures()->select('localDate')->where('forecastDate', $date_data)->orderBy('localDate')->get()->unique('localDate')->toArray();
        $date = array(array('localDate' => $date_first));
        $j = 0;
        foreach ($dates as $key => $value) {
            if($j == 10){
                $j=0;
                array_push($date, $value);
            }
            $j++;
        }
        $real_date = array();
        foreach ($date as $key => $value) {
            array_push($real_date, $value['localDate']);
        }
        return $real_date;
    }

    
}
