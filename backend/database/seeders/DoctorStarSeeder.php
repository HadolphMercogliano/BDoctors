<?php

namespace Database\Seeders;

use App\Models\Doctor;
use App\Models\Star;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DoctorStarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $doctors = Doctor::all();
      $stars = Star::all()->pluck("id")->toArray();

      foreach($doctors as $doctor) {
        $numberOfVotes = rand(5, 20);
        for ($i=0; $i < $numberOfVotes ; $i++) {
          $randomStar = rand(1, count($stars));
          $star = Star::find($randomStar);
          $doctor->stars()->attach($star->id);
        }
      }

      
    }
}