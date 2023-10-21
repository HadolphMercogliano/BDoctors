<?php

namespace Database\Seeders;

use App\Models\Doctor;
use App\Models\Sponsorship;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DoctorSponsorshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $doctors = Doctor::all();
      $sponsorships = Sponsorship::all()->pluck("id")->toArray();

      foreach($doctors as $doctor) {
        $isSponsorized = rand(0, 1);
        for ($i=0; $i < $isSponsorized ; $i++) {
          $randomSponsorship = rand(1, count($sponsorships));
          $sponsorship = Sponsorship::find($randomSponsorship);
          $doctor->sponsorships()->attach($sponsorship->id);
        }
      }
    }
}