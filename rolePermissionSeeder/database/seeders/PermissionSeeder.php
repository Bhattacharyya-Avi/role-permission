<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'admin.role.list',
                'slug' => 'admin.role.list'
            ],
            [
                'name' => 'permission.list',
                'slug' => 'permission.list'
            ],
            [
                'name' => 'assign.permission.form',
                'slug' => 'assign.permission.form'
            ],
            [
                'name' => 'assign.permission.post',
                'slug' => 'assign.permission.post'
            ],
            [
                'name' => 'assign.permission.list',
                'slug' => 'assign.permission.list'
            ],
            [
                'name' => 'edit.assigned.permission',
                'slug' => 'edit.assigned.permission'
            ],
            [
                'name' => 'update.assigned.permission',
                'slug' => 'update.assigned.permission'
            ],
            [
                'name' => 'user.list',
                'slug' => 'user.list'
            ],
            [
                'name' => 'user.add',
                'slug' => 'user.add'
            ],
            [
                'name' => 'user.post',
                'slug' => 'user.post'
            ],
            [
                'name' => 'view.product',
                'slug' => 'view.product'
            ],
            [
                'name' => 'create.product',
                'slug' => 'create.product'
            ],
        ];

        foreach ($data as $key => $value) {
            Permission::create($value);
        }
    }
}
