<x-guest-layout>
    <div class="flex items-center justify-center min-h-screen px-4 py-12 sm:px-6 lg:px-8 bg-gray-50">
        <div class="bg-white p-8 rounded-lg shadow-lg max-w-md w-full mx-auto border border-gray-200">
            <div class="text-center mb-8">
                <h2 class="text-2xl font-bold text-gray-800">{{ __('Password Recovery') }}</h2>
                <p class="mt-3 text-sm text-gray-600 leading-relaxed">
                    {{ __('Enter your registered email address below and we will send you instructions to reset your password.') }}
                </p>
            </div>

            <!-- Session Status -->
            @if (session('status'))
                <div class="bg-blue-50 border border-blue-200 text-blue-700 px-4 py-3 rounded mb-6 flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                    </svg>
                    <span>{{ session('status') }}</span>
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <!-- Email Address -->
                <div class="mb-6">
                    <x-input-label for="email" :value="__('Email Address')" class="block text-gray-700 font-medium mb-2" />
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                            </svg>
                        </div>
                        <x-text-input 
                            id="email" 
                            class="pl-10 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 transition duration-150" 
                            type="email" 
                            name="email" 
                            :value="old('email')" 
                            required 
                            autofocus 
                            placeholder="example@uspf.edu.ph"
                        />
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-600" />
                </div>

                <div class="flex items-center justify-between mt-8">
                    <a href="{{ route('login') }}" class="inline-flex items-center text-sm text-gray-600 hover:text-blue-700 font-medium transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        {{ __('Return to Login') }}
                    </a>
                    <x-primary-button class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2.5 px-6 rounded-md shadow-sm transition duration-150 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                        {{ __('Send Recovery Link') }}
                    </x-primary-button>
                </div>
            </form>

            <div class="mt-10 pt-6 border-t border-gray-200 text-center">
                <p class="text-xs text-gray-500">
                    {{ __('If you continue to experience issues recovering your password, please contact the system administrator.') }}
                </p>
            </div>
        </div>
    </div>
</x-guest-layout>