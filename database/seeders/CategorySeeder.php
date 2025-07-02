<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category = [
            [ 'cat_name' => 'Electric', ],
            [ 'cat_name' => 'Foods', ],
        ];

        DB::table('categories')->insert($category);
    }
}
