<!-- Chat-GPT prompt:
    How can I turn this Messages into a reusable component? 

Message for Feedback to user after adding a New User

<div class="my-4">
    if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
            { session('success') }
        </div>
    endif

    if (session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">
            { session('error') }
        </div>
    endif
</div> -->

@if (session($type))
    @if ($type === 'success')
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
            {{ session($type) }}
        </div>
    @elseif ($type === 'error')
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
            {{ session($type) }}
        </div>
    @endif
@endif