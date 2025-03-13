<!-- Chat-GPT prompt to improve the reusability of my component -->
<!-- I want to make the buttons Delete and Edit dependent on the route not on if the user is an admin or not:

- Route for admin = admin.groups.index
- Route for regular usage = groups.index

How do I do it? 

Answwer -> With request()->routeIs() and dynamic routes
-->

<li class="bg-gray-100 p-6 rounded-2xl hover:bg-blue-50">
    @php
        $isAdminRoute = request()->routeIs('admin.groups.*');
    @endphp

    <a href="{{ route($isAdminRoute ? 'admin.groups.show' : 'groups.show', $group) }}">
        <h3 class="font-bold text-2xl">{{ $group->name }}</h3>
        <div class="flex justify-between items-center">
            <p class="text-gray-500 font-semibold line-clamp-2">Members ({{ $group->users->count() }})</p>

            @if($isAdminRoute)
                <div class="text-right flex justify-end gap-2">
                    <a href="{{ route('admin.groups.edit', $group) }}" 
                        class="bg-blue-100 text-blue-500 uppercase p-2 hover:font-semibold rounded-sm">
                        Edit Group
                    </a>
                    <form action="{{ route('admin.groups.destroy', $group) }}" method="post">
                        @method('DELETE')
                        @csrf
                        <button type="submit" 
                            class="bg-red-100 text-red-500 uppercase p-2 hover:font-semibold rounded-sm">
                            Delete Group
                        </button>
                    </form>
                </div>
            @endif
        </div>    
    </a>
</li>