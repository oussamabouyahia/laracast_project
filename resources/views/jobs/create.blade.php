<x-layout>


    <div class="container mx-auto p-4">
       <x-slot:heading>

           Create a New Job
    </x-slot:heading>
        <form action="/jobs" method="POST">
            @csrf
            <div class="mb-4">
                <label for="title" class="block text-gray-700 font-bold">Job Title</label>
                <input type="text" class="mt-1 block w-full border-gray-900 bg-white rounded-md shadow-sm focus:border-indigo-600 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 h-12" id="title" name="title" >
            </div>
            @error('title')
                <p class="text-red-500">{{ $message }}</p>

            @enderror

            <div class="mb-4">
                <label for="salary" class="block text-gray-700 font-bold">Salary</label>
                <input type="string" class="mt-1 block w-full border-gray-900 bg-white rounded-md shadow-sm focus:border-indigo-600 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 h-12" id="salary" name="salary" >
            </div>
            @error('salary')
                <p class="text-red-500">{{ $message }}</p>
            <p class="text-red-500">{{ $message }}</p>

        @enderror

            <button type="submit" class="bg-indigo-500 text-white font-bold py-2 px-4 rounded hover:bg-indigo-700">Create Job</button>
        </form>
        {{-- @if ($errors->any())
            <div class="mt-10">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="text-red-500">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>

        @endif --}}
    </div>
</x-layout>



