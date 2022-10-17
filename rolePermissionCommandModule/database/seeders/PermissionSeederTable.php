<?php

namespace Database\Seeders;

use App\Models\Module;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dashboardModule = Module::updateOrCreate([
            'name' => 'Dashboard',
            'description' => 'Dashboard'
        ]);
        Permission::updateOrCreate([
            'module_id' => $dashboardModule->id,
            'name' => 'Access Dashboard',
            'slug' => 'admin.dashboard',
        ]);

        $productModule = Module::updateOrCreate([
            'name' => 'Product',
            'description' => 'Product'
        ]);

        Permission::updateOrCreate([
            'module_id' => $productModule->id,
            'name' => 'Product List',
            'slug' => 'product.list',
        ]);


        Permission::updateOrCreate([
            'module_id' => $productModule->id,
            'name' => 'Product Create',
            'slug' => 'product.create',
        ]);

        Permission::updateOrCreate([
            'module_id' => $productModule->id,
            'name' => 'Product Store',
            'slug' => 'product.store',
        ]);

        Permission::updateOrCreate([
            'module_id' => $productModule->id,
            'name' => 'Product Edit',
            'slug' => 'product.edit',
        ]);

        Permission::updateOrCreate([
            'module_id' => $productModule->id,
            'name' => 'Product Update',
            'slug' => 'product.update',
        ]);

        Permission::updateOrCreate([
            'module_id' => $productModule->id,
            'name' => 'Product Delete',
            'slug' => 'product.delete',
        ]);

        Permission::updateOrCreate([
            'module_id' => $productModule->id,
            'name' => 'Product View',
            'slug' => 'product.view',
        ]);

        $categoryModule = Module::updateOrCreate([
            'name' => 'Category',
            'description' => 'Category'
        ]);

        Permission::updateOrCreate([
            'module_id' => $categoryModule->id,
            'name' => 'Category List',
            'slug' => 'category.list',
        ]);

        Permission::updateOrCreate([
            'module_id' => $categoryModule->id,
            'name' => 'Category Create',
            'slug' => 'category.create',
        ]);

        Permission::updateOrCreate([
            'module_id' => $categoryModule->id,
            'name' => 'Category Store',
            'slug' => 'category.store',
        ]);

        Permission::updateOrCreate([
            'module_id' => $categoryModule->id,
            'name' => 'Category Edit',
            'slug' => 'category.edit',
        ]);

        Permission::updateOrCreate([
            'module_id' => $categoryModule->id,
            'name' => 'Category Update',
            'slug' => 'category.update',
        ]);

        Permission::updateOrCreate([
            'module_id' => $categoryModule->id,
            'name' => 'Category Delete',
            'slug' => 'category.delete',
        ]);

        $userModule = Module::updateOrCreate([
            'name' => 'User',
            'description' => 'User'
        ]);
        Permission::updateOrCreate([
            'module_id' => $userModule->id,
            'name' => 'User List',
            'slug' => 'user.list',
        ]);

        Permission::updateOrCreate([
            'module_id' => $userModule->id,
            'name' => 'User Create',
            'slug' => 'user.create',
        ]);

        Permission::updateOrCreate([
            'module_id' => $userModule->id,
            'name' => 'User Store',
            'slug' => 'user.store',
        ]);

        Permission::updateOrCreate([
            'module_id' => $userModule->id,
            'name' => 'User Edit',
            'slug' => 'user.edit',
        ]);

        Permission::updateOrCreate([
            'module_id' => $userModule->id,
            'name' => 'User Update',
            'slug' => 'user.update',
        ]);

        Permission::updateOrCreate([
            'module_id' => $userModule->id,
            'name' => 'User Delete',
            'slug' => 'user.delete',
        ]);

        $orderModule = Module::updateOrCreate([
            'name' => 'Order',
            'description' => 'Order'
        ]);

        Permission::updateOrCreate([
            'module_id' => $orderModule->id,
            'name' => 'Order List',
            'slug' => 'order.list',
        ]);


        $roleModule = Module::updateOrCreate([
            'name' => 'Role',
            'description' => 'Role'
        ]);

        Permission::updateOrCreate([
            'module_id' => $roleModule->id,
            'name' => 'Role List',
            'slug' => 'role.list',
        ]);

        Permission::updateOrCreate([
            'module_id' => $roleModule->id,
            'name' => 'Role Create',
            'slug' => 'role.create',
        ]);

        Permission::updateOrCreate([
            'module_id' => $roleModule->id,
            'name' => 'Role Store',
            'slug' => 'role.store',
        ]);

        Permission::updateOrCreate([
            'module_id' => $roleModule->id,
            'name' => 'Role Edit',
            'slug' => 'role.edit',
        ]);

        Permission::updateOrCreate([
            'module_id' => $roleModule->id,
            'name' => 'Role Update',
            'slug' => 'role.update',
        ]);

        Permission::updateOrCreate([
            'module_id' => $roleModule->id,
            'name' => 'Role Delete',
            'slug' => 'role.delete',
        ]);
    }
}
