<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Models\Permission;
use App\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoleController extends Controller
{

    public function index()
    {
        $roles = Role::paginate(10);

        return view('dashboard.roles.index', compact('roles'));
    }


    public function create()
    {
        //
    }


    public function store(StoreRoleRequest $request)
    {
        Role::create($request->validated());

        return back()->with('success', trans('dashboard.role.created successfully'));
    }

    public function show(Role $role)
    {
        $role->load('permissions');
        $permissions = Permission::all();
        $rolePermissions = json_decode(json_encode($role->permissions), true);
        $permissionsId = [];
        foreach ($rolePermissions as $permission) {
            array_push($permissionsId, $permission['id']);
        }
        return view('dashboard.roles.show', compact('role', 'permissionsId', 'permissions'));
    }


    public function edit(Role $role)
    {
        //
    }


    public function update(UpdateRoleRequest $request, Role $role)
    {

        $role->update($request->validated());

        return back()->with('success', trans('dashboard.role.updated successfully'));
    }


    public function destroy(Role $role)
    {
        $role->delete();

        return  back()->with('success', trans('dashboard.role.deleted successfully'));
    }

    public function editPermission(Request $request, $id)
    {
        $role = Role::find($id);
        $role->load('permissions');
        $permissions = Permission::all();

        $permissionsIds = Permission::permissionIdsToArray($role);

        return view('dashboard.roles.edit_permission', compact('role', 'permissions', 'permissionsIds'));
    }

    public function savePermission(Request $request, $id)
    {
        $role = Role::find($id);

        $rolePermissionsNames = Permission::permissionNamesToArray($role);

        if ($request->has('permissions')) {
            // Attach permissions
            $role::attachPermissions($role, $request->permissions, $rolePermissionsNames);
            // Detach permissions
            $role::detachPermissions($role, $request->permissions, $rolePermissionsNames);

        } else {
            $role->permissions()->detach();
        }

        return back()->with('success', trans('dashboard.role.updated successfully'));
    }
}
