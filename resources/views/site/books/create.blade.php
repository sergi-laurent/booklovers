<x-site-layout>

    <x-form 
        :action="route('books.store')" 
        method="post" 
        title='Create Book' 
        :cancelurl="route('books.index')"
        submittext="Create Book">

        <x-form-input name='title' label='Book title' placeholder='Write the title here'/>

        <x-form-input name='author' label='Author name' placeholder='Write the author of this book here'/>

        <x-form-text-area name='summary' label='Book summary' rows='7' placeholder='Write the summary here' rte/>

        

    </x-form>

</x-site-layout>