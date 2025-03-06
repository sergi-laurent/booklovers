<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Group;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $groups = Group::all();
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
                'description'=>['string', 'max:300'],
            ]);
        
        Group::create([
            'name'=>$request->name,
            'description'=>$request->description
        ]);
        
        return redirect()->route('groups.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Group $group)
    {
        return view('site.groups.show', ['group'=>$group]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Group $group)
    {
        return view('site.groups.edit', ['group'=>$group]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Group $group)
    {
        $request->validate([
            'name'=>['required', 'string', 'max:100'],
            'description'=>['string', 'max:300'],
        ]);

        $group->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('groups.show', ['group'=>$group]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Group $group)
    {
        $group->delete();

        return redirect()->route('groups.index');
    }
}
