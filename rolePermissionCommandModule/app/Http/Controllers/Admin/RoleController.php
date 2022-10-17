<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Module;
use App\Models\Permission;
use App\Models\Product;
use App\Models\Role;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RoleController extends Controller
{
    public function index(Request $request)
{
    $search = $request->query('search');
    if($search){
        $roles = Role::where('name','Like', '%'.$search.'%')
            ->orWhere('slug','like','%'.$search.'%')->get();
        return view('admin.pages.role.index',compact('roles'));
    }
    $roles = Role::orderBy('id','desc')->get();

    return view('admin.pages.role.index',compact('roles'));
}


    public function create()
    {
        $modules = Module::with('permissions')->get();
        return view('admin.pages.role.create',compact('modules'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|unique:roles,name'
        ]);
       $role =  Role::create([
            'name'=>$request->name,
            'slug'=> Str::slug($request->name),
        ]);

       $role->permissions()->sync($request->permission_ids);

        return redirect()->back()->with('success','Role created successfully.');

    }


    public function delete($id): RedirectResponse
    {
        Role::find($id)->delete();
        return redirect()->back()->with('success','Role Deleted.');
    }

    public function edit($id)
    {
        $role=Role::find($id);
        $modules = Module::with('permissions')->get();
        return view('admin.pages.role.edit',compact('role','modules'));
    }

    public function update(Request $request,$id): RedirectResponse
    {
        $role=Role::where('id',$id)->first();

        $role->update([
            'name'=>$request->name,
            'slug'=> Str::slug($request->name),
        ]);
        $role->permissions()->sync($request->permission_ids);
        return redirect()->route('role.list')->with('success','Role Updated Successfully.');
    }
}
