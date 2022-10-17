<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            Role::create([
                'id' => 1,
                'name' => 'Super Admin',
                'slug' => 'super-admin'
            ]);
    }
}
