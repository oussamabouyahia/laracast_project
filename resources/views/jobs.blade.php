<x-layout>
<x-slot:heading>Job Listing </x-slot:heading>
 <ul class="space-y-3">

     @foreach ($jobs as $job)
          <li class="border-gray-600 bg-gray-200">
            <div class="text-font-blue text-bold">{{ $job->employer->name }}</div>
            <a href="/jobs/{{ $job['id'] }}" class="hover:underline hover:text-blue-400 border-gray-200">
                {{ $job["title"] }}
            </a>
        </li>
      @endforeach
      {{ $jobs->links() }}
</ul>
</x-layout>
