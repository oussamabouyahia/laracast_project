<x-layout>


    <div class="container mx-auto p-4">
       <x-slot:heading>

           <h1 class="text-2xl font-bold mb-4">Create a New Job</h1>
    </x-slot:heading>
        <form action="/jobs" method="POST">
            @csrf
            <div class="mb-4">
                <label for="title" class="block text-gray-700 font-bold">Job Title</label>
                <input type="text" class="mt-1 block w-full border-gray-900 bg-white rounded-md shadow-sm focus:border-indigo-600 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" id="title" name="title" required>
            </div>


            <div class="mb-4">
                <label for="salary" class="block text-gray-700 font-bold">Salary</label>
                <input type="string" class="mt-1 block w-full bg-white border-gray-900 rounded-md shadow-sm focus:border-indigo-600 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" id="salary" name="salary" required>
            </div>
            <button type="submit" class="bg-indigo-500 text-white font-bold py-2 px-4 rounded hover:bg-indigo-700">Create Job</button>
        </form>
    </div>
</x-layout>



