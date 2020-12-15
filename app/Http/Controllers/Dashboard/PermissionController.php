<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePermissionRequest;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdatePermissionRequest;
use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{

    public function index()
    {
//        $permissions = Permission::paginate(10);
//
//        return view('dashboard.permissions.index', compact('permissions'));
    }


    public function create()
    {
        //
    }


    public function store(StorePermissionRequest $request)
    {
//        Permission::create($request->validated());
//
//        return back()->with('success', trans('dashboard.role.created successfully'));
    }


    public function show(Permission $permission)
    {
        //
    }


    public function edit(Permission $permission)
    {
        //
    }


    public function update(UpdatePermissionRequest $request, Permission $permission)
    {
//        $permission->update($request->validated());
//
//        return back()->with('success', trans('dashboard.role.updated successfully'));
    }


    public function destroy(Permission $permission)
    {
        //
    }
}
