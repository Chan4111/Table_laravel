<?php

namespace Database\Seeders;

use App\Models\lecturer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class lecturerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json =File::get(path:'database/json/lecturers.json');
        $lecturers =collect(json_decode($json));

        $lecturers->each(function($students){
            lecturer::create([
                'name' => $students->name,
                'email' => $students->email,
                'age' => $students->age,
                'city' => $students->city,

            ]);
        });
    }
}
