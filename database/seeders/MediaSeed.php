<?php

namespace Database\Seeders;

use App\Models\Media;
use Illuminate\Database\Seeder;

class MediaSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $medias = [
            [
                'id' => '1',
                'file_name' => 'kaos-merah1669876627-1.jpg',
                'file_type' => 'image/jpeg',
                'file_size' => '5343',
                'file_status' => '1',
                'file_sort' => '1',
                'mediable_id' => '1',
                'mediable_type' => 'App\\Models\\Product',
                'created_at' => '2022-12-01 06:37:07',
                'updated_at' => '2022-12-01 06:37:07'
            ],

            [
                'id' => '2',
                'file_name' => 'kaos-putih1669876761-1.jpg',
                'file_type' => 'image/jpeg',
                'file_size' => '3082',
                'file_status' => '1',
                'file_sort' => '1',
                'mediable_id' => '2',
                'mediable_type' => 'App\\Models\\Product',
                'created_at' => '2022-12-01 06:39:21',
                'updated_at' => '2022-12-01 06:39:21'

            ]

            ];
            Media::insert($medias);
        //
    }
}
