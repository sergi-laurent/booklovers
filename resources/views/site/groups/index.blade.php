<x-site-layout>

    <p class='text-center mb-6 text-red-500'>Here goes an illustration or something</p>

    <div class="flex justify-end">
		<a href="{{route('wishlist.show')}}" class="text-center bg-purple-500 text-purple-50 uppercase p-2 mb-4 hover:font-semibold rounded-xl">Your Wishlist</a> 
	</div>

    <div class="bg-gray-300 px-8 py-4 rounded-4xl">
        <div class="flex">
            <a href="{{route('groups.create')}}" class="w-full text-center bg-purple-600 text-purple-50 uppercase p-2 hover:font-semibold rounded-2xl">+ Create New Group</a> 
        </div>
    </div>

    

    @if(auth()->user())
        @if($groups->isEmpty())
            <div class="text-gray-500 font-bold text-2xl text-center">
            You don't have any groups yet
            </div>
        @else
            <ul class="grid grid-cols-1 gap-4 mt-6">
                @if($groups->isEmpty())
                You don't have any groups yet
                @else
                    @foreach($groups as $group)
                        <li class="bg-gray-100 p-6 rounded-2xl hover:bg-blue-50">
                            <a href="{{route('groups.show', $group)}}">
                                <h3 class="font-bold text-2xl">{{$group->name}}</h3>
                                <div class="flex justify-between items-center">
                                    <p class="text-gray-500 font-semibold line-clamp-2">Members ({{$group->users->count()}})</p>
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
                @endif
            </ul>
        @endif
    @endif
    
</x-site-layout>