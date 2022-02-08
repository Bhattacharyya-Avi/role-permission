<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'name' => 'user',
                'slug' => 'user'
            ],
            [
                'name' => 'manager',
                'slug' => 'manager'
            ],
            [
                'name' => 'shop_keeper',
                'slug' => 'shopkeeper'
            ],
            [
                'name' => 'admin',
                'slug' => 'admin'
            ],
            [
                'name' => 'super_admin',
                'slug' => 'superadmin'
            ]

        ];

        foreach ($roles as $key => $role) {
            Role::create($role);
        }
    }
}
