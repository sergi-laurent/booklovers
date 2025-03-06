<x-site-layout>

    <p class='text-center mb-6 text-red-500'>Here goes an illustration or something</p>

    <div class="flex">
		<a href="{{route('groups.create')}}" class="w-full text-center bg-blue-700 text-purple-50 uppercase p-2 hover:font-semibold rounded-sm">Create New Group</a> 
	</div>

    <ul class="grid grid-cols-1 gap-12 mt-6">
        @foreach($groups as $group)
            <li class=" hover:bg-blue-50">
                <a href="{{route('groups.show', $group)}}">
                    <h3 class="font-bold text-2xl">{{$group->name}}</h3>
                    <div class="flex justify-between items-center">
                        <p class="line-clamp-2">{{$group->description}}</p>
                        <div class="text-right flex justify-end gap-2">
                            <a href="{{route('groups.edit', $group)}}" class="bg-blue-100 text-blue-500 uppercase p-2 hover:font-semibold rounded-sm">Edit Group</a>
                            <form action="{{route('groups.destroy', $group)}}" method="post">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="bg-red-100 text-red-500 uppercase p-2 hover:font-semibold rounded-sm">Delete Group</button>
                            </form>
                        </div>
                    </div>    
                </a>
            </li>
        @endforeach
    </ul>
</x-site-layout>