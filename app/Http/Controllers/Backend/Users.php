<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\CreateUserRequest;
use App\Http\Requests\Backend\EditUserRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class Users extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('backend.users.list_manager_users', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.users.create_user');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $req)
    {
        $user = new User();
        $data = $this->prepare($req, $user->getFillable());
        $user->fill($data);
        $user->save();

        return Redirect::to('/dashboard/users');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('backend.users.edit_user', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditUserRequest $req, User $user)
    {
        $data = $this->prepare($req, $user->getFillable());
        $user->fill($data);
        $user->save();

        return Redirect::to('/dashboard/users')->with('alert', 'The user has successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
    }

    public function changePasswordForm(User $user)
    {
        return view('backend.users.change_password', ['user'=>$user]);
    }

    public function changePassword(User $user, EditUserRequest $req)
    {
        $data = $this->prepare($req, $user->getFillable());
        $user->fill($data);
        $user->save();

        return Redirect::to('/dashboard/users');
    }
}
