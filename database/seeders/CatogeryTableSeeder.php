<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CatogeryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'كتب للمحترف طه',
            // 'name_en' => 'Accessories',
            'image' => 'imagesfp/category/e.jpg',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        Category::create([
            'name' => 'كتب حب',
            // 'name_en' => 'Clothing',
            'image' => 'imagesfp/category/q.jpg',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Category::create([
            'name' => 'كتب كريستيانو',
            // 'name_en' => 'Shoes',
            'image' => 'imagesfp/category/w.jpg',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
