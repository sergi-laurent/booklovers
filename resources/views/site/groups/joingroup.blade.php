<x-site-layout>

    <x-form
        :action="route('groups.joinGroup')" 
        method="post" 
        title='Join Your Friends' 
        :cancelurl="route('groups.index')"
        submittext="Join Group">

        <x-form-input name='code' label='Group Code:' placeholder="Write the unique code of the group you want to join here"/>

    </x-form>

    <!--Message for Feedback to user after adding a New User--> 
    @if (session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">
            {{ session('error') }}
        </div>
    @endif
</x-site-layout>
