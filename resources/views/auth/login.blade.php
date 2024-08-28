<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <img src="{{ asset('images/logo-dark.png') }}" alt="Logo" class="w-45 h-10 mx-auto"/>
        </x-slot>

        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label for="email" value="{{ __('E-Posta') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="relative mt-4">
                <x-label for="password" value="{{ __('Şifre') }}" />
                <input id="password" class="block mt-1 w-full pr-10 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="password" name="password" required autocomplete="current-password" />
                <button type="button" id="togglePassword" class="absolute inset-y-0 right-0 flex items-center px-3 text-gray-500">
                    <span id="toggleText" class="cursor-pointer text-sm text-gray-500">Göster</span>
                </button>
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Beni hatırla') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-4">
                    {{ __('Giriş yap') }}
                </x-button>
            </div>
        </form>

        <script>
            document.getElementById('togglePassword').addEventListener('click', function () {
                const passwordField = document.getElementById('password');
                const toggleText = document.getElementById('toggleText');

                if (passwordField.type === 'password') {
                    passwordField.type = 'text';
                    toggleText.textContent = 'Gizle';
                } else {
                    passwordField.type = 'password';
                    toggleText.textContent = 'Göster';
                }
            });
        </script>
    </x-authentication-card>
</x-guest-layout>
