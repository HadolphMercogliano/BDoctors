<?php

namespace Database\Seeders;

use App\Models\Review;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $reviews = [
            [
                'name' => 'Mario',
                'surname' => 'Bianchi',
                'email' => 'mario.bianchi@example.com',
                'text' => 'Il Dott. Rossi è stato eccezionale! Molto professionale e gentile.',
            ],
            [
                'name' => 'Laura',
                'surname' => 'Verdi',
                'email' => 'laura.verdi@example.com',
                'text' => 'La Dott.ssa Bianchi è una professionista straordinaria. Consigliatissima.',
            ],
            [
                'name' => 'Giuseppe',
                'surname' => 'Rossi',
                'email' => 'giuseppe.rossi@example.com',
                'text' => 'Il Dott. Verdi è sempre stato disponibile e competente. Ottimo medico.',
            ],
            [
                'name' => 'Roberta',
                'surname' => 'Moro',
                'email' => 'roberta.moro@example.com',
                'text' => 'La Dott.ssa Moro è una delle migliori del settore. Grande professionalità.',
            ],
            [
                'name' => 'Carlo',
                'surname' => 'Gallo',
                'email' => 'carlo.gallo@example.com',
                'text' => 'Il Dott. Gallo è molto preparato e attento alle esigenze dei pazienti.',
            ],
            [
                'name' => 'Elena',
                'surname' => 'Russo',
                'email' => 'elena.russo@example.com',
                'text' => 'La Dott.ssa Russo è una neurologa eccezionale. Ha risolto i miei problemi.',
            ],
            [
                'name' => 'Paolo',
                'surname' => 'Ferraro',
                'email' => 'paolo.ferraro@example.com',
                'text' => 'Il Dott. Ferraro è un chirurgo di grande talento. Sono molto grato per l\'intervento.',
            ],
            [
                'name' => 'Sara',
                'surname' => 'Mancini',
                'email' => 'sara.mancini@example.com',
                'text' => 'La Dott.ssa Mancini è una specialista in oncologia straordinaria. Ha curato mia madre con dedizione.',
            ],
            [
                'name' => 'Luca',
                'surname' => 'Ferrari',
                'email' => 'luca.ferrari@example.com',
                'text' => 'Il Dott. Ferrari è un oculista di grande esperienza. Ho fiducia completa nel suo lavoro.',
            ],
            [
                'name' => 'Anna',
                'surname' => 'Gallo',
                'email' => 'anna.gallo@example.com',
                'text' => 'La Dott.ssa Gallo è una psichiatra premurosa e professionale. Ha aiutato la mia famiglia in momenti difficili.',
            ],
        ];


        foreach ($reviews as $review) {
            Review::create([
                'doctor_id' => rand(1,10),
                'name' => $review['name'],
                'surname' => $review['surname'],
                'email' => $review['email'],
                'text' => $review['text'],
            ]);
        }


    }
}
