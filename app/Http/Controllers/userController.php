<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        abort_if(!Auth::user()->can('user.index'),403,'you can not aceess this page');
        $users = User::all();
        $roles = Role::all();
        // $users->notify(new Notification());
        return view('user.index',compact('users','roles'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        return view('user.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        
        $role = Role::findById($request->role);
        $user->assignRole($role);
        $user->save();
        return redirect()->route('user.index');
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
        abort_if(!Auth::user()->can('user.edit'),403,'you can not aceess this page');
        $user = User::find($id);
        $roles = Role::all();
        
        return view('user.edit',compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $role = Role::findById($request->role);
        
        $user->save();
        $user->syncRoles($role);
        return redirect()->route('user.index');
    
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        abort_if(!Auth::user()->can('user.delete'),403,'you can not aceess this page');
        $user = User::find($id);
        $user->delete();
        return redirect()->route('user.index');
    }
}
