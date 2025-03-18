<x-layout>
    <form action="/login" method="POST">
        @csrf
        <div class="mb-4">
            <x-form-label for="email">Email: </x-form-label>
            <x-form-input id="email" name="email" type="email" required/>
        </div>
        <x-form-error name="email" />

        <div class="mb-4">
            <x-form-label for="password">Password: </x-form-label>
            <x-form-input id="password" name="password" type="password" required />
        </div>
        <x-form-error name="password" />
        <button type="submit" class="bg-indigo-500 text-white font-bold py-2 px-4 rounded hover:bg-indigo-700">Log In</button>
    </form>
</x-layout>
