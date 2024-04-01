<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Book::create([
            'name' => 'Sample Book 1',
            'file' => 'imagesfp/book/test.pdf', // Update with the actual file path
        ]);

        Book::create([
            'name' => 'Sample Book 2',
            'file' => 'imagesfp/book/test.pdf', // Update with the actual file path
        ]);
        Book::create([
            'name' => 'Sample Book 3',
            'file' => 'imagesfp/book/test.pdf', // Update with the actual file path
        ]);
    }
}
