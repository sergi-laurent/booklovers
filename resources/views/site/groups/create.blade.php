<x-site-layout>

    <x-form 
        :action="route('groups.store')" 
        method="post" 
        title='Create Group' 
        :cancelurl="route('groups.index')"
        submittext="Create Group">

        <x-form-input name='name' label='Group name' placeholder='Write the name of the group here'/>

    </x-form>

</x-site-layout>