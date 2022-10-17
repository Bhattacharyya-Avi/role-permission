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
                'name' => 'super_admin',
                'slug' => 'superadmin'
            ],
            [
                'name' => 'admin',
                'slug' => 'admin'
            ],
            [
                'name' => 'manager',
                'slug' => 'manager'
            ],
            [
                'name' => 'employee',
                'slug' => 'employee'
            ],
        ];

        foreach ($roles as $key => $role) {
            Role::create($role);
        }
    }
}
