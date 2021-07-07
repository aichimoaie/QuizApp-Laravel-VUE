<?php

use App\Quiz;
use Illuminate\Database\Seeder;

class QuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fakerQuestion= factory(App\Question::class)->make([
            'description' => 'How do you find our service ?'
        ]);
        $fakerQuestion->save();

      //  $rates=[Quiz::STATUS_GOOD, Quiz::STATUS_FAIR, Quiz::STATUS_NEUTRAL, Quiz::STATUS_BAD];

        factory(App\Quiz::class, 4)->make(['question_id' => $fakerQuestion->first()->id])->each(
            function ($quiz ,$index) {
                    $quiz->rate = ++$index;
                    $quiz->save();
        });
    }
}
