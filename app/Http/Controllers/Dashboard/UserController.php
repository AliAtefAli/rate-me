<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\Traits\Uploadable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    use Uploadable;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('dashboard.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {

        User::create([
            "name" => $request->name,
            "email" => $request->email,
            "phone" => $request->phone,
            "commercial_register" => $request->commercial_register,
            "password" => Hash::make($request->password),
            "role" => $request->role
        ]);

        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('dashboard.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('dashboard.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        if ($request->has('image')) {
            $path = $this->uploadOne($request['image'], 'users', null, null);
            $user->image = $path;
            $user->save();
        }
        $updated = $user->update($request->all());

        if ($updated) {
            session()->flash('success', 'تم تعديل بيانات المستخدم بنجاح');
        } else {
            session()->flash('error', 'لم يتم تعديل هذا المستخدم من فضلك اعد مرة اخري');
        }

        return redirect()->route('user.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user, Request $request)
    {
        // dd($user, $request->all());

        $deleted = $user->forceDelete();

        if ($deleted) {
            session()->flash('success', 'تم حذف هذا المستخدم بنجاح');
        } else {
            session()->flash('error', 'لم يتم خذف هذا المستخدم من فضلك اعد مرة اخري');
        }

        return redirect()->route('user.index');
    }

    public function delete(Request $request)
    {
        // dd($request->all());
        return \request();
    }
}
