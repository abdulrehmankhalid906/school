<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();
        return view('roles.roles', [
            'roles' => $roles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('roles.add_new');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        Role::create([
            'name' => $request->name
        ]);

        return redirect('/roles')->with('success', 'Role Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $roles = Role::findorFail($id);
        return view('roles.edit_role',[
            'roles' => $roles
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $role = Role::findorFail($id);

        $role->update([
            'name' => $request->input('name'),
        ]);

        return redirect('/roles')->with('success','Role Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $role = Role::findorFail($id);

        $role->delete();

        return redirect('/roles')->with('success','Role Deleted Successfully!');
    }


    public function AssignPermissionsToRole(Request $request, $id)
    {
        $roles = Role::find($id);
        $permissions = Permission::all();

        return view('roles.assign_permissions', [
            'roles' => $roles,
            'permissions' => $permissions
        ]);
    }

    public function StoreAssignPermissions(Request $request, $id)
    {
        $request->validate([
            'permission' => 'required'
        ]);

        $roles = Role::find($id);


        //There is no permission named `1` for guard `web`.

        //when this is the error go to the balde field and assign the value $permission->id to  $permission->name
        $roles->syncPermissions($request->permission);

        return redirect()->back()->with('success','Permission Assigned Successfully!');


    }


}
