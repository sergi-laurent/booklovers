<x-site-layout>

    <x-form
        :action="route('groups.addMember', $group)" 
        method="post" 
        title='Add Member to "{{ $group->name }}"' 
        :cancelurl="route('groups.show', $group)"
        submittext="Add Member">

        <x-form-input name='email' label='User Email:' placeholder="Write your friend's email here"/>

    </x-form>

    <!--Message for Feedback to user after adding a New User--> 
    @if (session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">
            {{ session('error') }}
        </div>
    @endif
</x-site-layout>