<x-layout>
    <x-slot:heading>{{ $job['title'] }}</x-slot:heading>
this job pays a  {{$job['salary']  }} per year

<br>
<a href="/jobs/{{ $job['id'] }}/edit" class=" mt-3 text-blue-500 hover:text-blue-700 inline-block bg-blue-500 text-white py-2 px-4 rounded">Edit this job</a>
</x-layout>
