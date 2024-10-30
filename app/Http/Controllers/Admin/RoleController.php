<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Requests\RoleRequest;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Role::all();
        return view('admin.role.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.role.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleRequest $request)
    {
        $data = new Role;
        $data->name = $request->name;
        $data->save();
        return redirect()->route('admin.role.index')
            ->with('type', 'success')->with('message', 'Məlumat əlavə olundu!');
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
    public function edit(Role $role)

    {
        $rolePermissions = $role->permissions->pluck('name')->toArray();
        $permissions = Permission::all();
        return view('admin.role.edit', compact('role', 'permissions', 'rolePermissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoleRequest $request, Role $role)
    {
        $role->name = $request->name;
        $role->save();
        return redirect()->route('admin.role.index')
            ->with('type', 'success')->with('message', 'Məlumat yeniləndi!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function delete(Role $id)
    {
        $id->delete();
        return response()->json([
            'type' => 'Record deleted successfully!',
        ]);
    }

    public function givePermission(Request $request, Role $role)
    {
        $permissions = $request->input('permission', []);
        foreach ($permissions as $permission) {
            if ($role->hasPermissionTo($permission)) {
                continue;
            }
            $role->givePermissionTo($permission);
        }

        return back()->with("Ugurlu");
    }
    public function revokePermission(Role $role, Permission $permission)
    {
        if ($role->hasPermissionTo($permission)) {
            $role->revokePermissionTo($permission);
            return back()->with("");
        }
        return back()->with("Ugursuz");
    }
}
