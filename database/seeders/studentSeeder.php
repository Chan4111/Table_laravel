<?php

namespace Database\Seeders;

use App\Models\student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class studentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json =File::get(path:'database/json/students.json');
        $students =collect(json_decode($json));

        $students->each(function($students){
            student::create([
                'name' => $students->name,
                'email' => $students->email,
                'age' => $students->age,
                'city' => $students->city,

            ]);
        });
    }
}
