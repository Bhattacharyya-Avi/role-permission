<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PermissionSeederTable::class);
        $this->call(RoleSeederTable::class);

        $role = Role::where('name', '=', 'Super Admin')->first();
        $role->permissions()->sync(Permission::get()->pluck('id'));

        User::create([
            'name' => 'Halima Tus Sadia',
            'email' => 'admin@gmail.com',
            'address' => 'Uttara dhaka 2330',
            'email_verified_at' => now(),
            'password' => Hash::make('12345'),
            'phone' => '01628644184',
            'remember_token' => Str::random(10),
            'role_id' => Role::where('name', '=', 'Super Admin')->first()->id,
        ]);
    }
}
