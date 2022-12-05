<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { $products =[
        [
            'id' => '1',
            'name' => 'Kaos Merah',
            'slug' => 'kaos-merah',
            'price' => '30000',
            'description' => '<p>Baju merah bahannya halus</p>',
            'details' => '<p>-</p>',
            'weight' => '20',
            'quantity' => '5',
            'status' => '1',
            'review_able' => '1',
            'category_id' => '1',
            'created_at' => '2022-12-01 06:37:07',
            'updated_at' => '2022-12-01 06:37:07',

        ],
        [
            'id' => '2',
            'name' => 'Kaos Putih',
            'slug' => 'kaos-putih',
            'price' => '30000',
            'description' => '<p>Baju Putih</p>',
            'details' => '<p>Baju putih, bahan mulus</p>',
            'weight' => '20',
            'quantity' => '1',
            'status' => '1',
            'review_able' => '1',
            'category_id' => '1',
            'created_at' => '2022-12-01 06:39:21',
            'updated_at' => '2022-12-01 07:02:56',
        ]
        ];

        Product::insert($products);

    }
}
