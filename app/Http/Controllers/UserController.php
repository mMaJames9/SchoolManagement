<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\Personnel;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all()->except(auth()->id())->sortByDesc("created_at");

        $roles = Role::all()->pluck('name', 'id');

        $personnels = Personnel::all();

        return view('admin.users.index', compact('users', 'roles', 'personnels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {
        $user = User::create([
            'personnel_id' => $request['personnel_id'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        $user->roles()->sync($request->input('roles', []));

        $status = 'Création de l\'utilisateur réusssie';

        return redirect()->route('users.index')->with([
            'status' => $status,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        abort_if(Gate::denies('user_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::all()->pluck('name', 'id');

        $personnels = Personnel::all();

        $user->load('roles');

        return view('admin.users.edit', compact( 'roles', 'personnels', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, User $user)
    {
        $user->roles()->sync($request->input('roles', []));

        $status = 'Mise à jour du rôle de l\'utilisateur réussie.';

        return redirect()->route('users.index')->with([
            'status' => $status,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        abort_if(Gate::denies('user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user = User::FindOrFail($id);
        $user->delete();

        $status = 'Suppression de l\'utilisateur réussie.';

        return redirect()->route('users.index')->with([
            'status' => $status,
        ]);
    }
}
