<?php

namespace Database\Seeders;

use App\Models\Sponsorship;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SponsorshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
      $sponsorships = [
        [
            'name' => 'Gold',
            'price' => 2.99,
            'duration' => 24,
        ],
        [
            'name' => 'Platinum',
            'price' => 5.99,
            'duration' => 72,
        ],
        [
            'name' => 'Diamond',
            'price' => 9.99,
            'duration' => 144,
        ],
      ];

      foreach($sponsorships as $sponsorship){
        $newSponsorship = new Sponsorship();
        $newSponsorship->name = $sponsorship['name'];
        $newSponsorship->price = $sponsorship['price'];
        $newSponsorship->duration = $sponsorship['duration'];
        $newSponsorship->save();
      }
    }
}