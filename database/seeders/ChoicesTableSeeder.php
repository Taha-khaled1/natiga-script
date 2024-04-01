<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChoicesTableSeeder extends Seeder
{
    public function run()
    {
        $questionsCount = DB::table('questions')->count();

        // Adjust the number of choices you want to generate
        $numberOfChoices = 200;

        for ($i = 0; $i < $numberOfChoices; $i++) {
            DB::table('choices')->insert([
                'question_id' => rand(1, $questionsCount),
                'choice_text' => 'Sample choice text ' . $i,
                'is_correct' => (bool)rand(0, 1),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
