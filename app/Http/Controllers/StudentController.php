<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function ShowStudent(){
        $students =DB::table('students')
                 ->join('cities','students.city', '=','cities.id')
                 ->select(DB::raw('count(*) as Student_count') ,'cities.city_name')
                 ->groupBy('city_name')
                //  ->having('cities.city_name','=','patna')
                ->havingBetween('student_count',[1,3])
                ->orderBy('student_count','Desc')
                //  ->select('students.*','cities.city_name')
                //  ->where('students.email','=','chandan@gmail.com')
                // ->where('students.name','like','m%')
                  ->get();

                 return $students;
             //return view('welcome',compact('students'));

    }
}
