<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

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
        if (!Auth::user()->is_admin)  // Not an admin
        {
            abort(401); // Unauthorized
        }

        $groups = Group::with('users')->paginate(10);
        return view('admin.groups.index', ['groups'=> $groups]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Auth::user()->is_admin)  // Not an admin
        {
            abort(401); // Unauthorized
        }

        return view('admin.groups.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!Auth::user()->is_admin)  // Not an admin
        {
            abort(401); // Unauthorized
        }

        $request->validate(
            [
                'name'=>['required', 'string', 'max:100'],
            ]);
        
        $group = Group::create([
            'name'=>$request->name,
        ]);

        Auth::user()->groups()->attach($group);
        
        return redirect()->route('admin.groups.index');
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

        return view('admin.groups.show', ['group'=>$group ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Group $group)
    {
        if (!Auth::user()->is_admin)  // Not an admin
        {
            abort(401); // Unauthorized
        }

        return view('admin.groups.edit', ['group'=>$group]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Group $group)
    {
        if (!Auth::user()->is_admin)  // Not an admin
        {
            abort(401); // Unauthorized
        }

        $request->validate([
            'name'=>['required', 'string', 'max:100'],
        ]);

        $group->update([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.groups.show', ['group'=>$group]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Group $group)
    {
        if (!Auth::user()->is_admin)  // Not an admin
        {
            abort(401); // Unauthorized
        }
        
        $group->delete();

        return redirect()->route('admin.groups.index');
    }
}
