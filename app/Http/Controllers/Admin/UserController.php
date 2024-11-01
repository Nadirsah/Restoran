<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::all();

        return view('admin.users.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $data = new User;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = Hash::make($request->password);
        $data->save();

        return redirect()->route('admin.user.index')->with('type', 'success')->with('message', 'Məlumat əlavə olundu!');
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
        $data = User::findOrFail($id);

        return view('admin.users.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, string $id)
    {
        $data = User::findOrFail($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = Hash::make($request->password);
        $data->save();

        return redirect()->route('admin.user.index')->with('type', 'success')->with('message', 'Məlumat uğurla yeniləndi!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function updateStatus(Request $request)
    {
        $id = $request->id;
        $isActive = $request->is_active == 'true' ? 1 : 0;
        User::where('id', $id)->update(['is_active' => $isActive]);

        return response()->json(['message' => 'Status updated successfully']);
    }

    //--------------------------------------
    //show role
    public function showRole(User $user)
    {
        $roles = Role::all();

        return view('admin.users.role', compact('user', 'roles'));
    }

    public function giveUserRole(Request $request, User $user)
    {
        if ($user->hasRole($request->role)) {
            return back()->with('Ugursuz');
        }
        $user->assignRole($request->role);

        return back()->with('Ugurlu');
    }

    public function revokeUserRole(User $user, Role $role)
    {
        if ($user->hasRole($role)) {
            $user->removeRole($role);

            return back()->with('Icaze silindi');
        }

        return back()->with('Ugursuz');
    }
}
