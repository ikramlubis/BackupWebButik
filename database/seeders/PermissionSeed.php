<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            ['title' => 'user_management_access',],
            ['title' => 'permission_access',],
            ['title' => 'permission_create',],
            ['title' => 'permission_edit',],
            ['title' => 'permission_view',],
            [ 'title' => 'permission_delete',],
            [ 'title' => 'category_access',],
            [ 'title' => 'category_create',],
            [ 'title' => 'category_edit',],
            [ 'title' => 'category_view',],
            [ 'title' => 'category_delete',],
            [ 'title' => 'tag_access',],
            [ 'title' => 'tag_create',],
            [ 'title' => 'tag_edit',],
            [ 'title' => 'tag_view',],
            [ 'title' => 'tag_delete',],
            [ 'title' => 'product_access',],
            [ 'title' => 'product_create',],
            [ 'title' => 'product_edit',],
            [ 'title' => 'product_view',],
            [ 'title' => 'product_delete',],
            [ 'title' => 'slide_create',],
        ];

            Permission::insert($permissions);

    }
}
