<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Group;
use Illuminate\Support\Facades\Auth;


class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Chat-gpt prompt after havng errors: I want to allow users to see the groups index as an empty page if they haven't logged in. But show them the groups they are part of if they are logged in
        $user = Auth::user(); // Get the authenticated user, or null if not logged in
        $groups = $user ? $user->groups()->with('users')->get() : collect(); // Get user groups or an empty collection
        //$groups = Group::all();
        return view('site.groups.index', ['groups'=> $groups]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('site.groups.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name'=>['required', 'string', 'max:100'],
            ]);
        
        $group = Group::create([
            'name'=>$request->name,
        ]);

        Auth::user()->groups()->attach($group);
        
        return redirect()->route('groups.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Group $group)
    {
        if (
            !Auth::user()->is_admin && // Not an admin
            !Auth::user()->groups->pluck('id')->contains($group->id) // User is not in the group
            ) {
            abort(401); // Unauthorized
        }

        return view('site.groups.show', ['group'=>$group ]);
    }

    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Group $group)
    {
        if (!Auth::user()->is_admin) // Not an admin
             {
            abort(401); // Unauthorized
        }

        $group->delete();

        return redirect()->route('groups.index');
    }
}
