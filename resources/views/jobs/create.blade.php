<x-layout>


    <div class="container mx-auto p-4">
       <x-slot:heading>

           Create a New Job
    </x-slot:heading>
        <form action="/jobs" method="POST">
            @csrf
            <div class="mb-4">
                <x-form-label for="title">Title: </x-form-label>
                <x-form-input id="title" name="title" type="text"/>
            </div>
            <x-form-error name="title" />

            <div class="mb-4">
                <x-form-label for="salary">Salary: </x-form-label>
                <x-form-input id="salary" name="salary" type="text" />
            </div>

            <x-form-error name="salary" />


            <button type="submit" class="bg-indigo-500 text-white font-bold py-2 px-4 rounded hover:bg-indigo-700">Create Job</button>
        </form>

    </div>
</x-layout>



