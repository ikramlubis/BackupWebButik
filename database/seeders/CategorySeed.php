<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'id' => '1',
            'name' => 'Baju',
            'slug' => 'baju',
            'cover' => 'baju.jpg',
            'category_id' => NULL,
            'created_at' => '2022-12-01 06:35:33',
            'updated_at' => '2022-12-01 06:35:33'
        ];

        Category::insert($categories);
    }
}
