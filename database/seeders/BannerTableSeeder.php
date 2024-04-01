<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BannerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $banners = [
            [
                'image' => 'imagesfp/banner/banner1.jpg',
                'arrange' => 1,
                'name' => 'Banner 1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'image' => 'imagesfp/banner/banner2.jpg',
                'arrange' => 2,
                'name' => 'Banner 2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'image' => 'imagesfp/banner/banner3.jpg',
                'arrange' => 3,
                'name' => 'Banner 3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        $colleges = [
            [

                'name' => 'كلية صيدله',

            ],
            [

                'name' => 'كلية حاسبات',

            ],
            [


                'name' => 'كلية علوم',

            ],
            [


                'name' => 'كلية تجاره',

            ],
        ];


        $college_years = [
            [
                'college_id' => 1,
                'year_number' => 1,

            ],
            [
                'college_id' => 1,
                'year_number' => 2,

            ],
            [

                'college_id' => 1,
                'year_number' => 3,

            ],
            [

                'college_id' => 1,
                'year_number' => 4,

            ],

            [

                'college_id' => 2,
                'year_number' => 1,

            ],
            [

                'college_id' => 2,
                'year_number' => 2,

            ],
            [

                'college_id' => 3,
                'year_number' => 1,

            ],
            [

                'college_id' => 3,
                'year_number' => 2,

            ],
            [

                'college_id' => 4,
                'year_number' => 1,

            ],

        ];

        $semesters = [
            [
                'college_year_id' => 1,
                'semester_name' => 'الترم الاول',

            ],
            [
                'college_year_id' => 1,
                'semester_name' => 'الترم الثاني',

            ],
            [
                'college_year_id' => 2,
                'semester_name' => 'الترم الاول',

            ],
            [
                'college_year_id' => 2,
                'semester_name' => 'الترم الثاني',

            ],            [
                'college_year_id' => 3,
                'semester_name' => 'الترم الاول',

            ],
            [
                'college_year_id' => 3,
                'semester_name' => 'الترم الثاني',

            ],            [
                'college_year_id' => 4,
                'semester_name' => 'الترم الاول',

            ],
            [
                'college_year_id' => 4,
                'semester_name' => 'الترم الثاني',

            ],            [
                'college_year_id' => 5,
                'semester_name' => 'الترم الاول',

            ],
            [
                'college_year_id' => 5,
                'semester_name' => 'الترم الثاني',

            ],            [
                'college_year_id' => 6,
                'semester_name' => 'الترم الاول',

            ],
            [
                'college_year_id' => 6,
                'semester_name' => 'الترم الثاني',

            ],            [
                'college_year_id' => 7,
                'semester_name' => 'الترم الاول',

            ],
            [
                'college_year_id' => 7,
                'semester_name' => 'الترم الثاني',

            ],
            [
                'college_year_id' => 8,
                'semester_name' => 'الترم الاول',

            ],
            [
                'college_year_id' => 8,
                'semester_name' => 'الترم الثاني',

            ],            [
                'college_year_id' => 9,
                'semester_name' => 'الترم الاول',

            ],
            [
                'college_year_id' => 9,
                'semester_name' => 'الترم الثاني',

            ],
        ];

        $subjects = [
            [
                'semester_id' => 1,
                'name' => 'بايثون',

            ],
            [
                'semester_id' => 1,
                'name' => 'فاثولجي',

            ],
            [
                'semester_id' => 2,
                'name' => 'سي بلص بلص',

            ],
            [
                'semester_id' => 2,
                'name' => 'بايولجي',

            ],


            [
                'semester_id' => 5,
                'name' => 'روبي',

            ],
            [
                'semester_id' => 5,
                'name' => 'احياء',

            ],
            [
                'semester_id' => 6,
                'name' => 'سي بلص بلص',

            ],
            [
                'semester_id' => 6,
                'name' => 'علوم',

            ],



        ];


        // Insert the data into the table
        // DB::table('banners')->insert($banners);
        // DB::table('colleges')->insert($colleges);
        // DB::table('college_years')->insert($college_years);
        // DB::table('semesters')->insert($semesters);
        // DB::table('subjects')->insert($subjects);
    }
}
