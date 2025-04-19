<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('My Profile') }}
            </h2>
            <span class="px-3 py-1 text-xs font-medium rounded-full {{ $user->role === 'admin' ? 'bg-red-100 text-red-800' : ($user->role === 'faculty' ? 'bg-purple-100 text-purple-800' : 'bg-blue-100 text-blue-800') }}">
                {{ ucfirst($user->role) }}
            </span>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Profile Overview Card -->
                <div class="md:col-span-1">
                    <div class="bg-white shadow rounded-lg overflow-hidden">
                        <div class="bg-gradient-to-r from-blue-600 to-blue-700 p-4">
                            <div class="flex justify-center">
                                <div class="relative inline-block">
                                    <div class="w-24 h-24 rounded-full bg-white flex items-center justify-center border-4 border-white shadow-md">
                                        <span class="text-3xl font-bold text-blue-600">{{ substr($user->name, 0, 1) }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-3 text-center">
                                <h2 class="text-xl font-bold text-white">{{ $user->name }}</h2>
                                <p class="text-blue-100">{{ $user->email }}</p>
                            </div>
                        </div>
                        
                        <div class="p-5">
                            <div class="border-b border-gray-100 pb-2 mb-3">
                                <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wider mb-3">Academic Information</h3>
                                
                                <div class="space-y-3">
                                    <div class="flex justify-between items-center">
                                        <span class="text-sm font-medium text-gray-500">Department</span>
                                        <span class="text-sm font-semibold text-gray-900">{{ $user->department ?? 'Not specified' }}</span>
                                    </div>
                                    
                                    <div class="flex justify-between items-center">
                                        <span class="text-sm font-medium text-gray-500">Course</span>
                                        <span class="text-sm font-semibold text-gray-900">{{ $user->course ?? 'Not specified' }}</span>
                                    </div>
                                    
                                    <div class="flex justify-between items-center">
                                        <span class="text-sm font-medium text-gray-500">Year Level</span>
                                        <span class="text-sm font-semibold text-gray-900">{{ $user->year_level ?? 'Not specified' }}</span>
                                    </div>
                                </div>
                            </div>
                            
                            <div>
                                <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wider mb-3">ID & Position</h3>
                                
                                <div class="space-y-3">
                                    <div class="flex justify-between items-center">
                                        <span class="text-sm font-medium text-gray-500">{{ $user->role === 'faculty' ? 'Faculty ID' : 'Student ID' }}</span>
                                        <span class="text-sm font-semibold text-gray-900">{{ $user->student_id ?? 'Not specified' }}</span>
                                    </div>
                                    
                                    @if($user->role === 'faculty')
                                    <div class="flex justify-between items-center">
                                        <span class="text-sm font-medium text-gray-500">Position</span>
                                        <span class="text-sm font-semibold text-gray-900">{{ $user->position ?? 'Not specified' }}</span>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="mt-5 pt-3 border-t border-gray-100">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        @if($user->email_verified_at)
                                            <div class="w-3 h-3 rounded-full bg-green-500"></div>
                                            <span class="ml-2 text-xs text-green-600">
                                                Verified email address
                                            </span>
                                        @else
                                            <div class="w-3 h-3 rounded-full bg-yellow-500"></div>
                                            <span class="ml-2 text-xs text-yellow-600">
                                                Email verification pending
                                            </span>
                                        @endif
                                    </div>
                                    <span class="text-xs text-gray-500">
                                        Member since {{ $user->created_at->format('M Y') }}
                                    </span>
                                </div>
                                
                                @if(!$user->email_verified_at)
                                    <div class="mt-3 text-xs text-gray-600 bg-yellow-50 p-2 rounded border border-yellow-100">
                                        <p>Please verify your email address to access all features. 
                                           <a href="{{ route('verification.notice') }}" class="text-blue-600 hover:underline">Resend verification email</a>
                                        </p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Profile Forms Section -->
                <div class="md:col-span-2">
                    <!-- Update Profile Information Form -->
                    <div class="bg-white shadow rounded-lg overflow-hidden mb-6">
                        <div class="px-6 py-4 border-b border-gray-200">
                            <h3 class="text-lg font-semibold text-gray-900">Update Profile Information</h3>
                            <p class="text-sm text-gray-500">Update your account's profile information and email address.</p>
                        </div>
                        <div class="p-6">
                            @include('profile.partials.update-profile-information-form')
                        </div>
                    </div>
                    
                    <!-- Update Password Form -->
                    <div class="bg-white shadow rounded-lg overflow-hidden">
                        <div class="px-6 py-4 border-b border-gray-200">
                            <h3 class="text-lg font-semibold text-gray-900">Update Password</h3>
                            <p class="text-sm text-gray-500">Ensure your account is using a secure, strong password.</p>
                        </div>
                        <div class="p-6">
                            @include('profile.partials.update-password-form')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>