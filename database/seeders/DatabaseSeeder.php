<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([RoleTableSeeder::class]);

        $role = Role::where('id', 1)->first();
        $role->permissions()->sync(Permission::get()->pluck('id'));

        User::create([
            'name'=>'admin',
            'email'=>'admin@gmail.com',
            'email_verified_at'=>Carbon::now(),
            'password'=>bcrypt(12345),
            'role_id'=>Role::where('id',1)->first()->id,
        ]);
    }
}
