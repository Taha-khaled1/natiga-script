<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionsTableSeeder extends Seeder
{
    public function run()
    {
        $subjectsCount = DB::table('subjects')->count();

        // Adjust the number of questions you want to generate
        $numberOfQuestions = 100;

        for ($i = 0; $i < $numberOfQuestions; $i++) {
            DB::table('questions')->insert([
                'subject_id' => rand(1, $subjectsCount),
                'question_text' => 'Sample question text ' . $i,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
