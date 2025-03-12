<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\User;
use \App\Models\Group;
use Illuminate\Support\Facades\Auth;

/* Chat-GPT prompt SummaryPrompt Summary:
"I'm building a Laravel web app where users can create and manage Secret Santa book exchange groups. Each group allows users to add members by searching for them via email. I need a solution that:

    1. Uses Laravel controllers and Blade views (no JavaScript).
    2. Implements a form where users can enter an email to add a member to a group.
    3. Validates that the email exists in the database.
    4. Prevents duplicate members in a group and provides error messages if the user is already a member.
    5. Displays feedback messages (success or error) using Laravel session flash messages.

    I'm using Tailwind CSS for styling, not Bootsrap."

    This was NOT the first prompt I used, I had to try, test and refine all the responses I got to finally meet my needs.

    One of the decisions I had to take was if I was going to deal with this features inside the GroupController or I created a new 
    controller to handle this functionality. I decided to create this new controller to keep the GroupController clean.
*/

class GroupMemberController extends Controller
{
    public function addMemberForm(Group $group)
    {
        return view('site.groups.addmember', ['group' => $group]);
    }


    public function addMember(Request $request, Group $group)
    {

        $request->validate([
            'email'=>['required', 'email', 'exists:users,email'],
        ]);


        $user = User::where('email', $request->email)->first();

        // Prevent duplicate members
        if ($group->users()->where('user_id', $user->id)->exists()) {
            return redirect()->route('groups.show', $group)->with('error', $user->name . ' is already a member of this group.');
        }

        // Add user to the group
        $group->users()->attach($user);

        return redirect()->route('groups.show', $group)->with('success', $user->name . ' added successfully!');
    }

    public function joinGroupForm()
    {
        return view('site.groups.joingroup');
    }

    public function joinGroup(Request $request, Group $group)
    {
 
        $request->validate([
            'code'=>['required', 'string', 'exists:groups,code'],
        ]);

        $user = Auth::user();
        $group = Group::where('code', $request->code)->first();

        // Prevent duplicate members
        if ($group->users()->where('user_id', $user->id)->exists()) {
            return redirect()->route('groups.show', $group)->with('error', 'You are already a member of this group.');
        }

        // Add user to the group
        $group->users()->attach($user);

        return redirect()->route('groups.show', $group)->with('success', 'You joined the group successfully!');
    }
}
