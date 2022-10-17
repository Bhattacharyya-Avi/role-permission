<?php

namespace App\Console\Commands;

use App\Models\Permission;
use Illuminate\Support\Str;
use Illuminate\Console\Command;

class PermissionInit extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'permission:init';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Take route name from web.php and insert in permission table for permissions.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $routeArray = getAllRoutesInArray();
        
        foreach ($routeArray as $key => $item) {
            // $moduleId=$this->createModule($key); // not needed because don't have module table
            // $this->createPermissions($moduleId,$item); // if have module table then pass the module id.
            $this->createPermissions($item);
        }
        $this->info(sprintf('All permission has been created.'));
        return 0;
    }

    // not needed because don't have module table.
    // public function createModule($moduleName)
    // {
    //     $moduleId = Module::updateOrCreate([
    //         'name'=>str_replace('/','',$moduleName),
    //         'slug'=>Str::slug($moduleName)
    //     ]);
    //     return $moduleId->id;
    // }

    public function createPermissions($permissions)
    {
        foreach ($permissions as $key=>$permission)
        {
            Permission::updateOrCreate([
                //'module_id' =>$module_id, // not needed because don't have module table.
                'name' => $permission['name'],
                'slug' => $permission['name'],
            ]);
        }
    }
}
