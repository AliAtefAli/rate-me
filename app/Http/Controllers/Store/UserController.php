<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Role;
use App\Models\User;
use App\Traits\Uploadable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    use Uploadable;

    public function index()
    {
        if (!hasPermission('create_user') ) {
            return redirect()->route('dashboard.home');
        }
        $users = User::all();
        return view('dashboard.users.index', compact('users'));
    }

    public function create()
    {
        return view('dashboard.users.create');
    }

    public function store(StoreUserRequest $request)
    {
        $data = $request->validated();

        if ($request->has('image')) {
            $path = $this->uploadOne($request['image'], 'users', null, null);
            $data['image'] = $path;
        }

        User::create($data);

        return redirect()->route('user.index');
    }

    public function show(User $user)
    {
        $roles = Role::all();
        // dd(auth()->user()->role->permissions);

        return view('dashboard.users.show', compact('user', 'roles'));
    }

    public function edit(User $user)
    {
        return view('dashboard.users.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $data = $request->validated();
        if ($request->has('image')) {
            $path = $this->uploadOne($request['image'], 'users', null, null);
            $data['image'] = $path;
        }
        $user->update($data);

        return redirect()->route('user.index')->with('success', trans('dashboard.user.updated successfully'));

    }


    public function destroy(User $user, Request $request)
    {
        if (count($user->store()) > 0) {
            return redirect()->route('user.index')->with('error', trans('dashboard.user.error deleted'));
        } else {
            $user->delete();
            return redirect()->route('user.index')->with('success', trans('dashboard.user.deleted successfully'));
        }
    }

    public function changePassword(ChangePasswordRequest $request, User $user)
    {
        if (Hash::check($request->old_password, $user->password)) {
            $user->password = Hash::make($request->password);
            $user->save();

            return back()->with('success', trans('dashboard.user.password changed'));
        } else {
            return back()->with('error', trans('dashboard.user.wrong password'));
        }
    }

    public function changeRole(Request $request, User $user)
    {
        $role = Role::where('name', $request->role)->get();

        $user->role_id = $role[0]->id;
        $user->save();

        return back()->with('success', trans('dashboard.user.updated successfully'));
    }

    public function delete(Request $request)
    {
        dd($request->all());
        return \request();
    }
}
