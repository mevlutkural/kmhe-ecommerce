<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\UserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Response;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('backend.users.list_manage_users', ['users' => $users]);
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
    public function store(UserRequest $req)
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
    public function update(UserRequest $req, User $user)
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
        $this->checkRequest($user);
    }

    public function changePasswordForm(User $user)
    {
        return view('backend.users.change_password', ['user' => $user]);
    }

    public function changePassword(User $user, UserRequest $req)
    {
        $data = $this->prepare($req, $user->getFillable());
        $user->fill($data);
        $user->save();

        return Redirect::to('/dashboard/users');
    }

    public function checkRequest($user)
    {
        if ($user->user_id == '1') {
            return Response::json(['error' => 'You can\'t delete the default user.'], 423);
        } else {
            $user->delete();
        }
    }
}
