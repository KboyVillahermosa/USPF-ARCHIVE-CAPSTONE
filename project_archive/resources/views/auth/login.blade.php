<x-guest-layout class="!p-0 !m-0">
    <div class="min-h-screen flex overflow-hidden">
        <!-- Login Form Section -->
        <div class="flex-1 flex flex-col justify-center px-4 sm:px-6 lg:px-20 xl:px-24 bg-gradient-to-b from-white to-gray-50">
            <div class="mx-auto w-full max-w-sm lg:w-96">
                <div class="mb-10 text-center">
                    <img src="{{ asset('images/logo-uspf.png') }}" alt="Logo" class="h-20 mx-auto mb-6">
                    <h2 class="text-2xl font-bold text-gray-900">Welcome to USPF Research Archive</h2>
                    <p class="mt-2 text-sm text-gray-600">
                        Access the university's academic repository
                    </p>
                </div>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf

                    <!-- Email Address -->
                    <div>
                        <x-input-label for="email" :value="__('Email Address')" class="text-sm font-medium text-gray-700" />
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                </svg>
                            </div>
                            <x-text-input id="email" 
                                class="block w-full pl-10 px-3 py-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 text-gray-900" 
                                type="email" 
                                name="email" 
                                :value="old('email')" 
                                required 
                                autofocus 
                                autocomplete="username" 
                                placeholder="university@email.com" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                    </div>

                    <!-- Password -->
                    <div>
                        <x-input-label for="password" :value="__('Password')" class="text-sm font-medium text-gray-700" />
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <x-text-input id="password" 
                                class="block w-full pl-10 px-3 py-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 text-gray-900"
                                type="password"
                                name="password"
                                required 
                                autocomplete="current-password" 
                                placeholder="••••••••" />
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                <button type="button" id="togglePassword" class="text-gray-400 hover:text-gray-500 focus:outline-none">
                                    <!-- Eye icon (show password) -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 eye-open" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                        <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7zM10 15a5 5 0 100-10 5 5 0 000 10z" clip-rule="evenodd" />
                                    </svg>
                                    <!-- Eye slash icon (hide password) -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 eye-closed hidden" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M3.707 2.293a1 1 0 00-1.414 1.414l14 14a1 1 0 001.414-1.414l-1.473-1.473A10.014 10.014 0 0019.542 10C18.268 5.943 14.478 3 10 3a9.958 9.958 0 00-4.512 1.074l-1.78-1.781zm4.261 4.26l1.514 1.515a2.003 2.003 0 012.45 2.45l1.514 1.514a4 4 0 00-5.478-5.478z" clip-rule="evenodd" />
                                        <path d="M12.454 16.697L9.75 13.992a4 4 0 01-3.742-3.741L2.335 6.578A9.98 9.98 0 00.458 10c1.274 4.057 5.065 7 9.542 7 .847 0 1.669-.105 2.454-.303z" />
                                    </svg>
                                </button>
                            </div>
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input id="remember_me" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500" name="remember">
                            <label for="remember_me" class="ml-2 block text-sm text-gray-700">
                                {{ __('Remember me') }}
                            </label>
                        </div>

                        @if (Route::has('password.request'))
                            <a class="text-sm font-medium text-blue-600 hover:text-blue-700 transition duration-150" href="{{ route('password.request') }}">
                                {{ __('Forgot password?') }}
                            </a>
                        @endif
                    </div>

                    <div>
                        <x-primary-button class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-md text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150">
                            {{ __('Sign in') }}
                        </x-primary-button>
                    </div>
                    
                    <div class="text-center text-sm text-gray-600 mt-6">
                        <p>Need access to the archive? <a href="#" class="font-medium text-blue-600 hover:text-blue-700">Contact the research department</a></p>
                    </div>
                </form>
                
                <div class="mt-8 pt-6 border-t border-gray-200">
                    <div class="flex items-center justify-center">
                        <div class="text-xs text-gray-500">
                            © {{ date('Y') }} University of Southern Philippines Foundation. All rights reserved.
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Image Section -->
        <div class="hidden lg:block relative w-0 flex-1">
            <img class="absolute inset-0 h-full w-full object-cover" 
                 src="{{ asset('images/image.jpg') }}" 
                 alt="Library Background">
            <div class="absolute inset-0 bg-gradient-to-br from-blue-900/70 to-indigo-900/80"></div>
            <div class="absolute inset-0 flex items-center justify-center p-8">
                <div class="max-w-md text-center">
                    <h1 class="text-4xl font-bold text-white mb-6">
                        USPF Research Archive
                    </h1>
                    <p class="text-lg text-white/90 mb-8">
                        Discover and access academic research papers from the University of Southern Philippines Foundation
                    </p>
                    <div class="flex justify-center space-x-6">
                        <div class="bg-white/10 backdrop-blur-sm rounded-lg p-5 text-white text-center shadow-lg">
                            <div class="text-4xl font-bold">500+</div>
                            <div class="text-sm mt-1">Research Papers</div>
                        </div>
                        <div class="bg-white/10 backdrop-blur-sm rounded-lg p-5 text-white text-center shadow-lg">
                            <div class="text-4xl font-bold">50+</div>
                            <div class="text-sm mt-1">Departments</div>
                        </div>
                        <div class="bg-white/10 backdrop-blur-sm rounded-lg p-5 text-white text-center shadow-lg">
                            <div class="text-4xl font-bold">10+</div>
                            <div class="text-sm mt-1">Years of Research</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="absolute bottom-6 left-6 text-white/70 text-sm">
                Photo: USPF Main Library
            </div>
        </div>
    </div>

    <style>
        /* Remove any top spacing */
        body, html {
            margin: 0 !important;
            padding: 0 !important;
            overflow-x: hidden;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const togglePassword = document.getElementById('togglePassword');
            const passwordInput = document.getElementById('password');
            const eyeOpen = document.querySelector('.eye-open');
            const eyeClosed = document.querySelector('.eye-closed');

            togglePassword.addEventListener('click', function() {
                // Toggle password visibility
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);
                
                // Toggle icons
                eyeOpen.classList.toggle('hidden');
                eyeClosed.classList.toggle('hidden');
                
                // Set focus back to password field
                passwordInput.focus();
            });
        });
    </script>
</x-guest-layout>
