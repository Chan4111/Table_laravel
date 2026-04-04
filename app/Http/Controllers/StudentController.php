<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\select;

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

    public function uniondata(){
        $lecturers =DB::table('lecturers')
                   ->select('name','email','city_name')
                   ->join('cities','lecturers.city','=','cities.id')
                   ->where('city_name','=','kolkata');
        
                   $student=DB::table('students')
                     ->union($lecturers)
                     ->select('name','email','city_name')
                      ->join('cities','students.city','=','cities.id')
                       ->where('city_name','=','patna')
                      ->get();
                    //  ->toSql();
             return $student;
    }

    public function whendata(){
        $student =DB::table('students')
                    ->when(true,function($query){     //when like if-else chalta hai
                        $query->where('age','>',20);
                    },function($query){
                        $query->where('age','<',20);
                    })
                ->get();
        return $student;
    }

    public function chunkdata(){
        $student =DB::table('students')
        ->orderBy('id')
        ->chunk(3, function($student){
            echo "<div style='border:1px solid red; margin-bottom:15px;'>";
            foreach($student as $stu){
                echo $stu ->name . "<br>";
            }
            echo "</div>";
        });
    }
}
