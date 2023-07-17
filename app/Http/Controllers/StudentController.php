<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class StudentController extends Controller
{
    public function index()
    {

        $exists = DB::table('students')->where('id',2)->exists();
        if($exists) {
            $data = DB::table('students')->where('id',2)->first();
            dd($data);
        } else {
            echo 'The data you are searching does not exist';
        }

        // $all_data = DB::table('students')->get();
        // foreach($all_data as $item) {
        //     echo $item->name.'<br>';
        //     echo $item->email.'<br>';
        //     echo $item->age.'<br><br><br>';
        // }

        // $all_data = DB::table('students')->where('age',25)->orWhere('age',35)->get();
        // foreach($all_data as $item) {
        //     echo $item->name.'<br>';
        //     echo $item->email.'<br>';
        //     echo $item->age.'<br><br><br>';
        // }

        // $single_data = DB::table('students')->where('name','Arefin')->first();
        // echo $single_data->name.'<br>';
        // echo $single_data->email.'<br>';
        // echo $single_data->age;


        // $single_data = DB::table('students')->find(4);
        // echo $single_data->name.'<br>';
        // echo $single_data->email.'<br>';
        // echo $single_data->age;
    }

    public function create()
    {
        DB::table('students')->insert([
            [
                'name' => 'Smith',
                'email' => 'smith@gmail.com',
                'age' => 28
            ],
            [
                'name' => 'David',
                'email' => 'david@gmail.com',
                'age' => 35
            ]
        ]);
    }

    public function update()
    {
        $data = [
            'name' => 'Morshedul Arefin',
            'age' => 32
        ];
        DB::table('students')->where('id',1)->update($data);
    }

    public function delete()
    {
        DB::table('students')->where('id',1)->delete();
    }

    public function join()
    {
        $result = DB::table('students')
        ->join('fees','students.id','=','fees.student_id')
        ->select('fees.*','students.name','students.age')
        ->get();
        //dd($result);
        foreach($result as $item) {
            echo $item->name.'<br>';
            echo $item->age.'<br>';
            echo $item->fee_amount.'<br><br>';
        }
    }
}
