<x-layout>


    <div class="container mx-auto p-4">
       <x-slot:heading>

          Register
    </x-slot:heading>
        <form action="/register" method="POST">
            @csrf
            <div class="mb-4">
                <x-form-label for="first_name">First name: </x-form-label>
                <x-form-input id="first_name" name="first_name" type="text" required />
            </div>
            <x-form-error name="first_name" />

            <div class="mb-4">
                <x-form-label for="last_name">Last name: </x-form-label>
                <x-form-input id="last_name" name="last_name" type="text" required/>
            </div>
            <x-form-error name="last_name" />

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

            <div class="mb-4">
                <x-form-label for="password_confirmation">Confirm Password: </x-form-label>
                <x-form-input id="password_confirmation" name="password_confirmation" type="password" required/>
            </div>
            <x-form-error name="password_confirmation" />
            <button type="submit" class="bg-indigo-500 text-white font-bold py-2 px-4 rounded hover:bg-indigo-700">register</button>
        </form>

    </div>
</x-layout>



