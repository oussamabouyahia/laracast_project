
    <x-layout>


        <div class="container">
            <x-slot:heading>Edit Job</x-slot:heading>
            <form action="/jobs/{{ $job->id }} " method="POST">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="title">Job Title: </label>
                <input
                 class="mt-1 block w-full border-gray-900 bg-white rounded-md shadow-sm focus:border-indigo-600 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 h-12"
                 type="text"
                 name="title"
                 id="title"
                 value="{{ $job->title }}"
                 required>
            </div>
            <div class="form-group mt-2">
                <label for="salary">Salary: </label>
                <input
                 class="mt-1 block w-full border-gray-900 bg-white rounded-md shadow-sm focus:border-indigo-600 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 h-12"
                 type="string"
                 name="salary"
                 id="salary"
                 value="{{ $job->salary}}"
                 required>
            </div>
            <div class="flex item-center justify-between gab-x-6">
                <div class="flex item-center ">
                    <button form="delete-form" type="submit" class="m-3 text-blue-500 hover:text-blue-700 inline-block bg-red-500 text-white py-2 px-4 rounded">Delete Job</button>
                </div>
                <div class="flex item-center gab-x-6">
                   <button type="submit" class="m-3 text-blue-500 hover:text-blue-700 inline-block bg-blue-500 text-white py-2 px-4 rounded">Update Job</button>
                   <a href="/posts/{{ $job->id }}"   class=" m-3 text-blue-500 hover:text-blue-700 inline-block bg-orange-500 text-white py-2 px-4 rounded">Cancel</a>
                </div>
            </div>
        </form>
    </div>
    <form action="/jobs/{{ $job->id }}" method="POST" id="delete-form" class="hidden">
        @csrf
        @method('DELETE')
    </form>
</x-layout>

