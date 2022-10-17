<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class permissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            [
                'name'=>'create_product',
                'slug'=>'create.product'
            ],
            [
                'name'=>'update_product',
                'slug'=>'update.product'
            ],
            [
                'name'=>'delete_product',
                'slug'=>'delete.product'
            ],
            [
                'name'=>'view_product',
                'slug'=>'view.product'
            ],
            [
                'name'=>'access_product',
                'slug'=>'access.product'
            ],
        ];


        foreach ($permissions as $key => $permission) {
            Permission::create($permission);
        }
    }
}
