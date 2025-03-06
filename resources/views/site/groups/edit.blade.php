<x-site-layout>

    <x-form 
        :action="route('groups.update', $group)" 
        method="put" 
        title='Update Group' 
        :cancelurl="route('groups.show', $group)" 
        submittext="Update Group">

        <x-form-input name='name' label='Group title' placeholder='Write the name here' :value='$group->name'/>

        <x-form-text-area name='description' label='Group description' rows='3' placeholder='Write the description of this group here' :value='$group->description'/>

        

    </x-form>
    
</x-site-layout>