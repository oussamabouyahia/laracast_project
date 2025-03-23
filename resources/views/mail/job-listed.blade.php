{{-- <x-mail::message>
# Introduction

The body of your message.

<x-mail::button :url="''">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message> --}}
<h1>{{ $job->title }}</h1>
<p>
    Congrats, you job now is live on our website. <br>
</p>
{{-- url work for both local and production environment --}}
<a href="{{ url('/jobs/' .$job->id) }}"> view Job Listing</a>
<p>
    Thanks, <br>
    {{ config('app.name') }}
</p>
