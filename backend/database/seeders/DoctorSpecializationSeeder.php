<?php

namespace Database\Seeders;

use App\Models\Doctor;
use App\Models\Specialization;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DoctorSpecializationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $doctors = Doctor::all();
      $specializations = Specialization::all()->pluck("id")->toArray();

      foreach($doctors as $doctor) {
        $numberOfSpecialization = rand(2, 8);
        for ($i=0; $i < $numberOfSpecialization ; $i++) {
          $randomSpecializations = rand(1, count($specializations));
          $specialization = Specialization::find($randomSpecializations);
          $doctor->specializations()->attach($specialization->id);
        }
      }
    }
}