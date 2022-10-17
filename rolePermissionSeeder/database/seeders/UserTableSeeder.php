<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Role;
use App\Models\User;
use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::where('id', 1)->first();
        $role->permissions()->sync(Permission::get()->pluck('id'));

        User::create([
            'name'=>'admin',
            'email'=>'admin@gmail.com',
            'email_verified_at'=>Carbon::now(),
            'password'=>bcrypt(12345),
            'role_id'=>Role::where('id',1)->first()->id,
        ]);

        User::create([
            'name'=>'manager',
            'email'=>'manager@gmail.com',
            'email_verified_at'=>Carbon::now(),
            'password'=>bcrypt(12345),
            'role_id'=>Role::where('id',3)->first()->id,
        ]);
    }
}
