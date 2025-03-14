<x-layout>
<x-slot:heading>Job Listing </x-slot:heading>
 <ul>

     @foreach ($jobs as $job)
          <li>
            <a href="/jobs/{{ $job['id'] }}" class="hover:text-underline text-blue-400">
                {{ $job["title"] }}
            </a>
        </li>
      @endforeach
</ul>
</x-layout>
