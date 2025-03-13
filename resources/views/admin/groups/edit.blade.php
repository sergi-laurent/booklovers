<x-site-layout>

    <x-form 
        :action="route('groups.update', $group)" 
        method="put" 
        title='Update Group' 
        :cancelurl="route('groups.show', $group)" 
        submittext="Update Group">

        <x-form-input name='name' label='Group title' placeholder='Write the name here' :value='$group->name'/>        

    </x-form>
    
</x-site-layout>