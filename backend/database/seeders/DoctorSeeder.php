<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Doctor;
use App\Models\User;
use Faker\Generator as Faker;

//faker localizzato Italia per indirizzi
use Faker\Provider\it_IT\Address as FakerIt;
use Illuminate\Database\Seeder;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker, FakerIt $fakerit)
    {
        // $users = User::all()->pluck("id")->toArray();

      for ($i=1; $i <= 11 ; $i++)
      {
        $profile = new Doctor();
        $profile->user_id = $i;
        $profile->name = $faker->firstName($gender=null);
        $profile->surname = $faker->lastName();
        $profile->description = $faker->text();
        $profile->curriculum_vitae = $faker->text();
        $profile->photo = $faker->imageUrl(480, 480, 'person', true);
        $profile->address = $fakerit->address();
        $profile->visible = $faker->boolean();
        $profile->save();
      
    }
}
}