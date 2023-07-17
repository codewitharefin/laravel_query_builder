<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PersonController extends Controller
{
    public function index()
    {
        //echo DB::table('persons')->count();
        //echo DB::table('persons')->sum('salary');
        //echo DB::table('persons')->avg('salary');
        //echo DB::table('persons')->max('age');
        //echo DB::table('persons')->min('age');

        // $result = DB::table('persons')
        // ->select('country', DB::raw('COUNT(*) as total_count'))
        // ->groupBy('country')
        // ->get();

        // foreach($result as $item) {
        //     $country = $item->country;
        //     $count = $item->total_count;
        //     echo 'Country: '.$country.'<br>';
        //     echo 'Total Persons: '.$count.'<br><br><br>';
        // }

        // $result = DB::table('persons')
        // ->select('country', 
        //         DB::raw('COUNT(*) as total_count'),
        //         DB::raw('AVG(age) as avg_age'),
        //         DB::raw('MAX(salary) as max_salary')
        //         )
        // ->groupBy('country')
        // ->get();

        // foreach($result as $item) {
        //     $country = $item->country;
        //     $count = $item->total_count;
        //     $avg_age = $item->avg_age;
        //     $max_salary = $item->max_salary;

        //     echo 'Country: '.$country.'<br>';
        //     echo 'Total Persons: '.$count.'<br>';
        //     echo 'Average Age: '.$avg_age.'<br>';
        //     echo 'Maximum Salary: '.$max_salary.'<br><br><br>';
        // }


        // $result = DB::table('persons')
        // ->select('country', DB::raw('COUNT(*) as total_count'))
        // ->groupBy('country')
        // ->havingRaw('COUNT(*) > 1')
        // ->get();

        // foreach($result as $item) {
        //     $country = $item->country;
        //     $count = $item->total_count;
        //     echo 'Country: '.$country.'<br>';
        //     echo 'Total Persons: '.$count.'<br><br><br>';
        // }

        // $all_data = DB::table('persons')->orderBy('salary','asc')->get();
        // foreach($all_data as $item) {
        //     echo $item->name.' - ';
        //     echo $item->age.' - ';
        //     echo $item->salary.' - ';
        //     echo $item->country.'<br>';
        // }

        // $result = DB::table('persons')
        //         ->whereIn('id', [3,5,8])
        //         ->get();
        // foreach($result as $item) {
        //     echo $item->id.'<br>';
        // }

        // $result = DB::table('persons')->pluck('name');
        // echo '<pre>';
        // print_r($result);

        // $result = DB::table('persons')->whereNot('country','USA')->get();
        // echo '<pre>';
        // print_r($result);

        // $result = DB::table('persons')->whereNotIn('country',['Australia','Ireland'])->get();
        // echo '<pre>';
        // print_r($result);

        //$result = DB::table('persons')->whereBetween('age',[30,35])->get();
        //$result = DB::table('persons')->whereNotBetween('age',[30,35])->get();

        $result = DB::table('persons')
                ->whereIn('id', function($query){
                    $query->select('person_id')
                            ->from('orders')
                            ->groupBy('person_id');
                })
                ->get();

        echo '<pre>';
        print_r($result);
        


    }
}
