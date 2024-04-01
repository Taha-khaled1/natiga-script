<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            PermissionTableSeeder::class,
            UserTableSeeder::class,
            // BannerTableSeeder::class,
            // QuestionsTableSeeder::class,
            // ChoicesTableSeeder::class,
            // BookSeeder::class,
        ]);
    }
}
