<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'USPF Research Repository') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gray-50">
        <div class="min-h-screen">
            <!-- Navigation -->
            <nav x-data="{ open: false }" class="bg-white border-b border-gray-100 fixed w-full z-50 shadow-sm">
                <!-- Primary Navigation Menu -->
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16">
                        <div class="flex">
                            <!-- Logo -->
                            <div class="shrink-0 flex items-center">
                                <a href="/" class="flex items-center">
                                    <img src="{{ asset('images/logo-uspf.png') }}" alt="USPF Logo" class="h-10 mr-3">
                                    <span class="text-lg font-bold text-gray-900">Research Repository</span>
                                </a>
                            </div>
                        </div>

                        <div class="hidden sm:flex sm:items-center">
                            <!-- Main Navigation Links -->
                            <div class="flex space-x-6">
                                <a href="#about" class="text-sm font-medium text-gray-700 hover:text-blue-600 transition-colors duration-200 px-3 py-2 rounded-md hover:bg-gray-50">About</a>
                                <a href="#featured" class="text-sm font-medium text-gray-700 hover:text-blue-600 transition-colors duration-200 px-3 py-2 rounded-md hover:bg-gray-50">Featured Research</a>
                                <a href="#departments" class="text-sm font-medium text-gray-700 hover:text-blue-600 transition-colors duration-200 px-3 py-2 rounded-md hover:bg-gray-50">Departments</a>
                                <a href="#academic" class="text-sm font-medium text-gray-700 hover:text-blue-600 transition-colors duration-200 px-3 py-2 rounded-md hover:bg-gray-50">Academic Works</a>
                            </div>
                            
                            <!-- Login/Admin Button -->
                            <div class="ml-6 pl-6 border-l border-gray-200">
                                <a href="{{ route('login') }}" 
                                   class="inline-flex items-center justify-center px-4 py-2 border border-blue-600 text-sm font-medium rounded-md text-blue-600 bg-white hover:bg-blue-600 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                                    </svg>
                                    Login
                                </a>
                            </div>
                        </div>

                        <!-- Hamburger -->
                        <div class="-mr-2 flex items-center sm:hidden">
                            <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                    <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Responsive Navigation Menu -->
                <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
                    <div class="pt-2 pb-3 space-y-1">
                        <x-responsive-nav-link href="#about" class="block px-4 py-2 text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-gray-50">
                            {{ __('About') }}
                        </x-responsive-nav-link>
                        <x-responsive-nav-link href="#featured" class="block px-4 py-2 text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-gray-50">
                            {{ __('Featured Research') }}
                        </x-responsive-nav-link>
                        <x-responsive-nav-link href="#departments" class="block px-4 py-2 text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-gray-50">
                            {{ __('Departments') }}
                        </x-responsive-nav-link>
                        <x-responsive-nav-link href="#academic" class="block px-4 py-2 text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-gray-50">
                            {{ __('Academic Works') }}
                        </x-responsive-nav-link>
                    </div>
                    
                    <!-- Mobile Login Button -->
                    <div class="pt-2 pb-3 border-t border-gray-200">
                        <div class="mt-3 space-y-1 px-4">
                            <a href="{{ route('login') }}" class="block px-4 py-2 text-base font-medium text-blue-600 hover:text-blue-800 hover:bg-blue-50 rounded-md">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                                </svg>
                                Login
                            </a>
                        </div>
                    </div>
                </div>
            </nav>

            <main class="pt-16">
                <!-- Hero Section with Parallax Effect -->
                <div id="about" class="relative h-[100vh] bg-gradient-to-r from-blue-900/95 to-blue-800/90 pt-16 overflow-hidden">
                    <div class="absolute inset-0 z-0">
                        <div x-data="carousel" class="relative w-full h-full">
                            <!-- Carousel slides -->
                            <template x-for="(slide, index) in slides" :key="index">
                                <div x-show="currentSlide === index" 
                                     x-transition:enter="transition ease-out duration-1000"
                                     x-transition:enter-start="opacity-0 transform scale-95"
                                     x-transition:enter-end="opacity-100 transform scale-100"
                                     x-transition:leave="transition ease-in duration-300"
                                     x-transition:leave-start="opacity-100 transform scale-100"
                                     x-transition:leave-end="opacity-0 transform scale-95"
                                     class="absolute inset-0">
                                    <div class="absolute inset-0 bg-black/70"></div>
                                    <div class="absolute inset-0 bg-gradient-to-b from-black/60 via-blue-900/40 to-black/70"></div>
                                    <img :src="slide.image" :alt="slide.alt" 
                                         class="w-full h-full object-cover transform scale-105 opacity-80">
                                </div>
                            </template>

                            <!-- Dots navigation -->
                            <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex space-x-2 z-20">
                                <template x-for="(slide, index) in slides" :key="index">
                                    <button @click="currentSlide = index" 
                                            :class="{'bg-white': currentSlide === index, 'bg-white/50': currentSlide !== index}"
                                            class="w-2 h-2 rounded-full transition-all duration-300">
                                    </button>
                                </template>
                            </div>
                        </div>
                    </div>

                    <div class="relative z-10 h-full flex items-center">
                        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                            <img src="{{ asset('images/logo-uspf.png') }}" alt="USPF Logo" class="h-24 mx-auto mb-8 drop-shadow-md">
                            <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-bold mb-6 text-white leading-tight animate-fade-in drop-shadow-lg">
                                <span class="text-yellow-400">Preserving</span> Knowledge
                                <br>
                                Empowering
                                <br>
                                <span class="text-blue-400">Research</span>
                            </h1>
                            <p class="text-base sm:text-lg md:text-xl text-gray-100 mb-8 max-w-3xl mx-auto px-4 leading-relaxed animate-fade-in-delayed drop-shadow-lg">
                                The University of Southern Philippines Foundation's digital archive of academic research papers, theses, and dissertations.
                            </p>
                            <div class="flex flex-col sm:flex-row justify-center gap-4 mt-8">
                                <a href="#featured" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 transition-colors">
                                    Explore Collection
                                    <svg class="ml-2 -mr-1 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                    </svg>
                                </a>
                                <a href="#about-uspf" class="inline-flex items-center justify-center px-5 py-3 border border-white text-base font-medium rounded-md text-white hover:bg-white hover:text-blue-600 transition-colors">
                                    About USPF
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Featured Research Papers Section -->
                <div class="bg-white py-16 border-b border-gray-200">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <div class="text-center mb-12" data-aos="fade-up">
                            <h2 class="text-3xl font-bold text-gray-900">Featured Research</h2>
                            <p class="mt-4 text-lg text-gray-600">Explore the most impactful submissions in our archive</p>
                            @guest
                                <div class="mt-4 p-4 bg-yellow-50 border border-yellow-200 rounded-lg inline-block">
                                    <p class="text-yellow-700 flex items-center">
                                        <i class="fas fa-info-circle mr-2"></i>
                                        <span>You can browse research listings, but need to <a href="{{ route('login') }}" class="font-medium text-blue-600 hover:underline">login</a> to access full papers.</span>
                                    </p>
                                </div>
                            @endguest
                        </div>

                        <!-- Enhanced Feature Cards for Featured Research Section -->
                        <div class="mb-8 border-b border-gray-200" x-data="{ activeTab: 'recent' }">
                            <div class="flex flex-wrap -mb-px">
                                <button @click="activeTab = 'recent'" :class="{'border-blue-500 text-blue-600': activeTab === 'recent'}" 
                                        class="mr-8 py-4 px-1 border-b-2 font-medium text-sm sm:text-base transition-colors duration-200 whitespace-nowrap">
                                    <i class="fas fa-clock mr-2"></i> Most Recent
                                </button>
                                <button @click="activeTab = 'viewed'" :class="{'border-blue-500 text-blue-600': activeTab === 'viewed'}" 
                                        class="mr-8 py-4 px-1 border-b-2 font-medium text-sm sm:text-base transition-colors duration-200 whitespace-nowrap">
                                    <i class="fas fa-eye mr-2"></i> Most Viewed
                                </button>
                                <button @click="activeTab = 'popular'" :class="{'border-blue-500 text-blue-600': activeTab === 'popular'}" 
                                        class="py-4 px-1 border-b-2 font-medium text-sm sm:text-base transition-colors duration-200 whitespace-nowrap">
                                    <i class="fas fa-star mr-2"></i> Most Popular
                                </button>
                            </div>

                            <!-- Most Recent Tab -->
                            <div x-show="activeTab === 'recent'" class="mt-6">
                                <div class="mb-4 flex justify-between items-center">
                                    <h3 class="text-lg font-medium text-gray-700">Showing top 10 most recent research</h3>
                                    @auth
                                        <a href="{{ route('research.index', ['sort' => 'recent']) }}" class="text-blue-600 hover:text-blue-700 font-medium group flex items-center">
                                            View All <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform duration-300"></i>
                                        </a>
                                    @else
                                        <a href="{{ route('login') }}" class="text-blue-600 hover:text-blue-700 font-medium group flex items-center">
                                            Login for Full Access <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform duration-300"></i>
                                        </a>
                                    @endauth
                                </div>
                                
                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                                    @foreach($recentSubmissions->take(10) as $index => $project)
                                        <div class="bg-white rounded-xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden border border-gray-100 group"
                                             data-aos="fade-up" data-aos-delay="{{ $index * 50 }}">
                                            <div class="relative">
                                                <img src="{{ asset('storage/' . $project->banner_image) }}" 
                                                     alt="Research Project"
                                                     class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-500">
                                                <div class="absolute top-4 right-4 bg-blue-600 text-white px-3 py-1 rounded-full text-sm font-medium shadow-sm">
                                                    {{ $project->curriculum }}
                                                </div>
                                                @if($index < 3)
                                                    <div class="absolute top-4 left-4 bg-amber-500 text-white px-3 py-1 rounded-full text-xs font-bold shadow-sm flex items-center">
                                                        <i class="fas fa-award mr-1"></i> New
                                                    </div>
                                                @endif
                                            </div>

                                            <div class="p-6">
                                                <h4 class="font-bold text-xl mb-4 text-gray-900 line-clamp-2 group-hover:text-blue-600 transition-colors duration-300">
                                                    {{ Str::limit($project->project_name, 60, '...') }}
                                                </h4>

                                                <div class="space-y-3 mb-5 text-gray-600">
                                                    <p class="flex items-center">
                                                        <i class="fas fa-users w-5 text-blue-600"></i>
                                                        <span class="ml-2 font-medium">{{ Str::limit($project->members, 40, '...') }}</span>
                                                    </p>
                                                    
                                                    <p class="flex items-center">
                                                        <i class="fas fa-building w-5 text-blue-600"></i>
                                                        <span class="ml-2">{{ $project->department }}</span>
                                                    </p>
                                                    
                                                    <p class="flex items-center">
                                                        <i class="fas fa-calendar-alt w-5 text-blue-600"></i>
                                                        <span class="ml-2 text-sm">{{ $project->created_at->format('F d, Y') }}</span>
                                                    </p>
                                                    
                                                    <div class="flex items-center justify-between mt-3 pt-3 border-t border-gray-100">
                                                        <div class="flex items-center space-x-3">
                                                            <span class="flex items-center bg-blue-50 px-2 py-1 rounded text-xs text-blue-600">
                                                                <i class="fas fa-eye mr-1"></i> {{ number_format($project->view_count ?? 0) }}
                                                            </span>
                                                            <span class="flex items-center bg-blue-50 px-2 py-1 rounded text-xs text-blue-600">
                                                                <i class="fas fa-download mr-1"></i> {{ number_format($project->download_count ?? 0) }}
                                                            </span>
                                                        </div>
                                                        <span class="text-xs text-gray-500">{{ $project->created_at->diffForHumans() }}</span>
                                                    </div>
                                                </div>

                                                @auth
                                                    <a href="{{ route('research.show', $project->id) }}"
                                                       class="group inline-flex items-center justify-center w-full bg-white border border-blue-500 text-blue-600 px-4 py-2.5 rounded-lg hover:bg-blue-600 hover:text-white transition-all duration-300 font-medium shadow-sm">
                                                        <span>Access Research</span>
                                                        <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform duration-300"></i>
                                                    </a>
                                                @else
                                                    <a href="{{ route('login') }}"
                                                       class="group inline-flex items-center justify-center w-full bg-white border border-blue-500 text-blue-600 px-4 py-2.5 rounded-lg hover:bg-blue-600 hover:text-white transition-all duration-300 font-medium shadow-sm">
                                                        <span>Login to Access</span>
                                                        <i class="fas fa-lock ml-2"></i>
                                                    </a>
                                                @endauth
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <!-- Most Viewed Tab -->
                            <div x-show="activeTab === 'viewed'" class="mt-6">
                                <div class="mb-4 flex justify-between items-center">
                                    <h3 class="text-lg font-medium text-gray-700">Showing top 10 most viewed research</h3>
                                    @auth
                                        <a href="{{ route('research.index', ['sort' => 'views']) }}" class="text-blue-600 hover:text-blue-700 font-medium group flex items-center">
                                            View All <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform duration-300"></i>
                                        </a>
                                    @else
                                        <a href="{{ route('login') }}" class="text-blue-600 hover:text-blue-700 font-medium group flex items-center">
                                            Login for Full Access <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform duration-300"></i>
                                        </a>
                                    @endauth
                                </div>
                                
                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                                    @foreach($mostViewedSubmissions->take(10) as $index => $project)
                                        <div class="bg-white rounded-xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden border border-gray-100 group"
                                             data-aos="fade-up" data-aos-delay="{{ $index * 50 }}">
                                            <div class="relative">
                                                <img src="{{ asset('storage/' . $project->banner_image) }}" 
                                                     alt="Research Project"
                                                     class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-500">
                                                <div class="absolute top-4 right-4 bg-blue-600 text-white px-3 py-1 rounded-full text-sm font-medium shadow-sm">
                                                    {{ $project->curriculum }}
                                                </div>
                                                @if($index < 3)
                                                    <div class="absolute top-4 left-4 bg-indigo-500 text-white px-3 py-1 rounded-full text-xs font-bold shadow-sm flex items-center">
                                                        <i class="fas fa-chart-line mr-1"></i> Trending
                                                    </div>
                                                @endif
                                            </div>

                                            <div class="p-6">
                                                <h4 class="font-bold text-xl mb-4 text-gray-900 line-clamp-2 group-hover:text-blue-600 transition-colors duration-300">
                                                    {{ Str::limit($project->project_name, 60, '...') }}
                                                </h4>

                                                <div class="space-y-3 mb-5 text-gray-600">
                                                    <p class="flex items-center">
                                                        <i class="fas fa-users w-5 text-blue-600"></i>
                                                        <span class="ml-2 font-medium">{{ Str::limit($project->members, 40, '...') }}</span>
                                                    </p>
                                                    
                                                    <p class="flex items-center">
                                                        <i class="fas fa-building w-5 text-blue-600"></i>
                                                        <span class="ml-2">{{ $project->department }}</span>
                                                    </p>
                                                    
                                                    <p class="flex items-center">
                                                        <i class="fas fa-calendar-alt w-5 text-blue-600"></i>
                                                        <span class="ml-2 text-sm">{{ $project->created_at->format('F d, Y') }}</span>
                                                    </p>
                                                    
                                                    <div class="flex items-center justify-between mt-3 pt-3 border-t border-gray-100">
                                                        <div class="flex items-center space-x-3">
                                                            <span class="flex items-center bg-indigo-100 px-2 py-1 rounded text-xs text-indigo-700 font-medium">
                                                                <i class="fas fa-eye mr-1"></i> {{ number_format($project->view_count ?? 0) }}
                                                            </span>
                                                            <span class="flex items-center bg-blue-50 px-2 py-1 rounded text-xs text-blue-600">
                                                                <i class="fas fa-download mr-1"></i> {{ number_format($project->download_count ?? 0) }}
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>

                                                @auth
                                                    <a href="{{ route('research.show', $project->id) }}"
                                                       class="group inline-flex items-center justify-center w-full bg-white border border-blue-500 text-blue-600 px-4 py-2.5 rounded-lg hover:bg-blue-600 hover:text-white transition-all duration-300 font-medium shadow-sm">
                                                        <span>Access Research</span>
                                                        <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform duration-300"></i>
                                                    </a>
                                                @else
                                                    <a href="{{ route('login') }}"
                                                       class="group inline-flex items-center justify-center w-full bg-white border border-blue-500 text-blue-600 px-4 py-2.5 rounded-lg hover:bg-blue-600 hover:text-white transition-all duration-300 font-medium shadow-sm">
                                                        <span>Login to Access</span>
                                                        <i class="fas fa-lock ml-2"></i>
                                                    </a>
                                                @endauth
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <!-- Most Popular Tab -->
                            <div x-show="activeTab === 'popular'" class="mt-6">
                                <div class="mb-4 flex justify-between items-center">
                                    <h3 class="text-lg font-medium text-gray-700">Showing top 10 most popular research</h3>
                                    @auth
                                        <a href="{{ route('research.index', ['sort' => 'popular']) }}" class="text-blue-600 hover:text-blue-700 font-medium group flex items-center">
                                            View All <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform duration-300"></i>
                                        </a>
                                    @else
                                        <a href="{{ route('login') }}" class="text-blue-600 hover:text-blue-700 font-medium group flex items-center">
                                            Login for Full Access <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform duration-300"></i>
                                        </a>
                                    @endauth
                                </div>
                                
                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                                    @foreach($mostPopularSubmissions->take(10) as $index => $project)
                                        <div class="bg-white rounded-xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden border border-gray-100 group"
                                             data-aos="fade-up" data-aos-delay="{{ $index * 50 }}">
                                            <div class="relative">
                                                <img src="{{ asset('storage/' . $project->banner_image) }}" 
                                                     alt="Research Project"
                                                     class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-500">
                                                <div class="absolute top-4 right-4 bg-blue-600 text-white px-3 py-1 rounded-full text-sm font-medium shadow-sm">
                                                    {{ $project->curriculum }}
                                                </div>
                                                @if($index < 3)
                                                    <div class="absolute top-4 left-4 bg-rose-500 text-white px-3 py-1 rounded-full text-xs font-bold shadow-sm flex items-center">
                                                        <i class="fas fa-fire mr-1"></i> Popular
                                                    </div>
                                                @endif
                                            </div>

                                            <div class="p-6">
                                                <h4 class="font-bold text-xl mb-4 text-gray-900 line-clamp-2 group-hover:text-blue-600 transition-colors duration-300">
                                                    {{ Str::limit($project->project_name, 60, '...') }}
                                                </h4>

                                                <div class="space-y-3 mb-5 text-gray-600">
                                                    <p class="flex items-center">
                                                        <i class="fas fa-users w-5 text-blue-600"></i>
                                                        <span class="ml-2 font-medium">{{ Str::limit($project->members, 40, '...') }}</span>
                                                    </p>
                                                    
                                                    <p class="flex items-center">
                                                        <i class="fas fa-building w-5 text-blue-600"></i>
                                                        <span class="ml-2">{{ $project->department }}</span>
                                                    </p>
                                                    
                                                    <p class="flex items-center">
                                                        <i class="fas fa-calendar-alt w-5 text-blue-600"></i>
                                                        <span class="ml-2 text-sm">{{ $project->created_at->format('F d, Y') }}</span>
                                                    </p>
                                                    
                                                    <div class="flex items-center justify-between mt-3 pt-3 border-t border-gray-100">
                                                        <div class="flex items-center space-x-3">
                                                            <span class="flex items-center bg-blue-50 px-2 py-1 rounded text-xs text-blue-600">
                                                                <i class="fas fa-eye mr-1"></i> {{ number_format($project->view_count ?? 0) }}
                                                            </span>
                                                            <span class="flex items-center bg-rose-100 px-2 py-1 rounded text-xs text-rose-700 font-medium">
                                                                <i class="fas fa-download mr-1"></i> {{ number_format($project->download_count ?? 0) }}
                                                            </span>
                                                        </div>
                                                        <span class="bg-gradient-to-r from-amber-500 to-rose-500 text-white text-xs px-2 py-0.5 rounded-full shadow-sm">
                                                            #{{ $index + 1 }}
                                                        </span>
                                                    </div>
                                                </div>

                                                @auth
                                                    <a href="{{ route('research.show', $project->id) }}"
                                                       class="group inline-flex items-center justify-center w-full bg-white border border-blue-500 text-blue-600 px-4 py-2.5 rounded-lg hover:bg-blue-600 hover:text-white transition-all duration-300 font-medium shadow-sm">
                                                        <span>Access Research</span>
                                                        <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform duration-300"></i>
                                                    </a>
                                                @else
                                                    <a href="{{ route('login') }}"
                                                       class="group inline-flex items-center justify-center w-full bg-white border border-blue-500 text-blue-600 px-4 py-2.5 rounded-lg hover:bg-blue-600 hover:text-white transition-all duration-300 font-medium shadow-sm">
                                                        <span>Login to Access</span>
                                                        <i class="fas fa-lock ml-2"></i>
                                                    </a>
                                                @endauth
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Research Papers by Department Section -->
                <div id="departments" class="py-12 bg-gray-50">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <div class="text-center mb-12" data-aos="fade-up">
                            <h2 class="text-3xl font-bold text-gray-900">Research Papers by Department</h2>
                            <p class="mt-4 text-lg text-gray-600">Explore all research papers organized by academic departments</p>
                        </div>

                        @foreach($departments as $department => $projects)
                            @if(!empty($department) && count($projects) > 0)
                                <div class="mb-12" data-aos="fade-up">
                                    <div class="flex justify-between items-center mb-6">
                                        <h3 class="text-2xl font-bold text-gray-900">{{ $department }}</h3>
                                        <a href="{{ route('department.show', ['department' => $department]) }}" 
                                           class="text-blue-600 hover:text-blue-700 font-medium group flex items-center">
                                            View All <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform duration-300"></i>
                                        </a>
                                    </div>
                                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                                        @foreach($projects->take(3) as $project)
                                            <div class="bg-white rounded-xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden border border-gray-100 group">
                                                <div class="relative">
                                                    <img src="{{ asset('storage/' . $project->banner_image) }}" 
                                                         alt="Research Project"
                                                         class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-500">
                                                    <div class="absolute top-4 right-4 bg-blue-600 text-white px-3 py-1 rounded-full text-sm font-medium shadow-sm">
                                                        {{ $project->curriculum }}
                                                    </div>
                                                </div>

                                                <div class="p-6">
                                                    <h4 class="font-bold text-xl mb-4 text-gray-900 line-clamp-2 group-hover:text-blue-600 transition-colors duration-300">
                                                        {{ Str::limit($project->project_name, 60, '...') }}
                                                    </h4>

                                                    <div class="space-y-3 mb-5 text-gray-600">
                                                        <p class="flex items-center">
                                                            <i class="fas fa-users w-5 text-blue-600"></i>
                                                            <span class="ml-2 font-medium">{{ Str::limit($project->members, 40, '...') }}</span>
                                                        </p>
                                                        
                                                        <p class="flex items-center">
                                                            <i class="fas fa-building w-5 text-blue-600"></i>
                                                            <span class="ml-2">{{ $project->department }}</span>
                                                        </p>
                                                        
                                                        <p class="flex items-center">
                                                            <i class="fas fa-calendar-alt w-5 text-blue-600"></i>
                                                            <span class="ml-2 text-sm">{{ $project->created_at->format('F d, Y') }}</span>
                                                        </p>
                                                        
                                                        <div class="flex items-center justify-between mt-3 pt-3 border-t border-gray-100">
                                                            <div class="flex items-center space-x-3">
                                                                <span class="flex items-center bg-blue-50 px-2 py-1 rounded text-xs text-blue-600">
                                                                    <i class="fas fa-eye mr-1"></i> {{ number_format($project->view_count ?? 0) }}
                                                                </span>
                                                                <span class="flex items-center bg-blue-50 px-2 py-1 rounded text-xs text-blue-600">
                                                                    <i class="fas fa-download mr-1"></i> {{ number_format($project->download_count ?? 0) }}
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    @auth
                                                        <a href="{{ route('research.show', $project->id) }}"
                                                           class="group inline-flex items-center justify-center w-full bg-white border border-blue-500 text-blue-600 px-4 py-2.5 rounded-lg hover:bg-blue-600 hover:text-white transition-all duration-300 font-medium shadow-sm">
                                                            <span>Access Research</span>
                                                            <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform duration-300"></i>
                                                        </a>
                                                    @else
                                                        <a href="{{ route('login') }}"
                                                           class="group inline-flex items-center justify-center w-full bg-white border border-blue-500 text-blue-600 px-4 py-2.5 rounded-lg hover:bg-blue-600 hover:text-white transition-all duration-300 font-medium shadow-sm">
                                                            <span>Login to Access</span>
                                                            <i class="fas fa-lock ml-2"></i>
                                                        </a>
                                                    @endauth
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>

                <!-- Faculty Research Section -->
                <div class="py-16 bg-white border-t border-gray-200">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <div class="text-center mb-12" data-aos="fade-up">
                            <h2 class="text-3xl font-bold text-gray-900">Faculty Research</h2>
                            <p class="mt-4 text-lg text-gray-600">Explore research and projects by our faculty members</p>
                        </div>

                        @php
                            // Get faculty research grouped by department
                            $facultyResearchByDepartment = App\Models\ResearchRepository::where('faculty_research', true)
                                ->where('approved', 1)
                                ->get()
                                ->groupBy('department');
                        @endphp

                        @if($facultyResearchByDepartment->isNotEmpty())
                            @foreach($facultyResearchByDepartment as $department => $projects)
                                <div class="mb-12" data-aos="fade-up">
                                    <div class="flex justify-between items-center mb-6">
                                        <h3 class="text-2xl font-bold text-gray-900">{{ $department }}</h3>
                                        <a href="{{ route('research.index', ['department' => $department, 'type' => 'faculty']) }}" 
                                           class="text-purple-500 hover:text-purple-600 font-medium group flex items-center">
                                            View All <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform duration-300"></i>
                                        </a>
                                    </div>
                                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                                        @foreach($projects->take(3) as $project)
                                            <div class="bg-white rounded-xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden border border-gray-100 group">
                                                <div class="relative">
                                                    @if($project->banner_image)
                                                        <img src="{{ asset('storage/' . $project->banner_image) }}" 
                                                             alt="Faculty Research"
                                                             class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-500">
                                                    @else
                                                        <div class="w-full h-48 bg-gradient-to-r from-purple-600 to-indigo-700 flex items-center justify-center">
                                                            <i class="fas fa-chalkboard-teacher text-6xl text-white opacity-30 group-hover:opacity-50 transition-opacity duration-300"></i>
                                                        </div>
                                                    @endif
                                                    <div class="absolute top-4 right-4 bg-purple-600 text-white px-3 py-1 rounded-full text-sm font-medium shadow-sm">
                                                        Faculty Research
                                                    </div>
                                                </div>

                                                <div class="p-6">
                                                    <h4 class="font-bold text-xl mb-4 text-gray-900 line-clamp-2 group-hover:text-purple-600 transition-colors duration-300">
                                                        {{ Str::limit($project->project_name, 60, '...') }}
                                                    </h4>

                                                    <div class="space-y-3 mb-5 text-gray-600">
                                                        <p class="flex items-center">
                                                            <i class="fas fa-user-tie w-5 text-purple-600"></i>
                                                            <span class="ml-2 font-medium">{{ Str::limit($project->members, 40, '...') }}</span>
                                                        </p>
                                                        
                                                        <p class="flex items-center">
                                                            <i class="fas fa-university w-5 text-purple-600"></i>
                                                            <span class="ml-2">{{ $project->department }}</span>
                                                        </p>
                                                        
                                                        <p class="flex items-center">
                                                            <i class="fas fa-calendar-alt w-5 text-purple-600"></i>
                                                            <span class="ml-2 text-sm">{{ $project->created_at->format('F d, Y') }}</span>
                                                        </p>
                                                        
                                                        <div class="flex items-center justify-between mt-3 pt-3 border-t border-gray-100">
                                                            <div class="flex items-center space-x-3">
                                                                <span class="flex items-center bg-purple-50 px-2 py-1 rounded text-xs text-purple-600">
                                                                    <i class="fas fa-eye mr-1"></i> {{ number_format($project->view_count ?? 0) }}
                                                                </span>
                                                                <span class="flex items-center bg-purple-50 px-2 py-1 rounded text-xs text-purple-600">
                                                                    <i class="fas fa-download mr-1"></i> {{ number_format($project->download_count ?? 0) }}
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    @auth
                                                        <a href="{{ route('research.show', $project->id) }}"
                                                           class="group inline-flex items-center justify-center w-full bg-white border border-purple-500 text-purple-600 px-4 py-2.5 rounded-lg hover:bg-purple-600 hover:text-white transition-all duration-300 font-medium shadow-sm">
                                                            <span>Access Faculty Research</span>
                                                            <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform duration-300"></i>
                                                        </a>
                                                    @else
                                                        <a href="{{ route('login') }}"
                                                           class="group inline-flex items-center justify-center w-full bg-white border border-purple-500 text-purple-600 px-4 py-2.5 rounded-lg hover:bg-purple-600 hover:text-white transition-all duration-300 font-medium shadow-sm">
                                                            <span>Login to Access</span>
                                                            <i class="fas fa-lock ml-2"></i>
                                                        </a>
                                                    @endauth
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="text-center py-12 bg-gray-50 rounded-lg">
                                <i class="fas fa-chalkboard-teacher text-5xl text-gray-300 mb-4"></i>
                                <p class="text-gray-500 text-lg">No faculty research available yet.</p>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Academic Works (Dissertations & Theses) -->
                <div id="academic" class="py-16 bg-gray-50 border-t border-gray-200">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <div class="text-center mb-12" data-aos="fade-up">
                            <h2 class="text-3xl font-bold text-gray-900">Academic Works</h2>
                            <p class="mt-4 text-lg text-gray-600">Explore our collection of dissertations and theses</p>
                        </div>
                        
                        <!-- Dissertations Section -->
                        <div class="mb-16">
                            <div class="flex justify-between items-center mb-6">
                                <h3 class="text-2xl font-bold text-gray-900">Dissertations</h3>
                                <a href="{{ route('dissertation.index', ['type' => 'dissertation']) }}" 
                                   class="text-blue-600 hover:text-blue-700 font-medium group flex items-center">
                                    View All <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform duration-300"></i>
                                </a>
                            </div>
                            
                            @php
                                $dissertations = App\Models\Dissertation::where('type', 'dissertation')
                                    ->where('status', 'approved')
                                    ->take(6)
                                    ->get();
                            @endphp
                            
                            @if($dissertations->count() > 0)
                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                                    @foreach($dissertations as $dissertation)
                                        <div class="bg-white rounded-xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden border border-gray-100 group"
                                             data-aos="fade-up"
                                             data-aos-delay="{{ $loop->index * 100 }}">
                                            <div class="relative">
                                                <div class="w-full h-48 bg-gradient-to-r from-blue-600 to-indigo-800 flex items-center justify-center">
                                                    <i class="fas fa-book text-6xl text-white opacity-30 group-hover:opacity-50 transition-opacity duration-300"></i>
                                                </div>
                                                <div class="absolute top-4 right-4 bg-blue-600 text-white px-3 py-1 rounded-full text-sm font-medium shadow-sm">
                                                    Dissertation
                                                </div>
                                                <div class="absolute top-4 left-4 bg-indigo-600 text-white px-3 py-1 rounded-full text-xs flex items-center shadow-sm">
                                                    {{ $dissertation->year }}
                                                </div>
                                            </div>

                                            <div class="p-6">
                                                <h4 class="font-bold text-xl mb-4 text-gray-900 line-clamp-2 group-hover:text-blue-600 transition-colors duration-300">
                                                    {{ Str::limit($dissertation->title, 60, '...') }}
                                                </h4>

                                                <div class="space-y-3 mb-5 text-gray-600">
                                                    <p class="flex items-center">
                                                        <i class="fas fa-user-graduate w-5 text-blue-600"></i>
                                                        <span class="ml-2 font-medium">{{ $dissertation->author }}</span>
                                                    </p>
                                                    
                                                    <p class="flex items-center">
                                                        <i class="fas fa-university w-5 text-blue-600"></i>
                                                        <span class="ml-2">{{ $dissertation->department }}</span>
                                                    </p>
                                                    
                                                    <div class="flex items-center justify-between mt-3 pt-3 border-t border-gray-100">
                                                        <div class="flex items-center space-x-3">
                                                            <span class="flex items-center bg-blue-50 px-2 py-1 rounded text-xs text-blue-600">
                                                                <i class="fas fa-eye mr-1"></i> {{ number_format($dissertation->view_count ?? 0) }}
                                                            </span>
                                                            <span class="flex items-center bg-blue-50 px-2 py-1 rounded text-xs text-blue-600">
                                                                <i class="fas fa-download mr-1"></i> {{ number_format($dissertation->download_count ?? 0) }}
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>

                                                @auth
                                                    <a href="{{ route('dissertation.show', $dissertation->id) }}"
                                                       class="group inline-flex items-center justify-center w-full bg-white border border-blue-500 text-blue-600 px-4 py-2.5 rounded-lg hover:bg-blue-600 hover:text-white transition-all duration-300 font-medium shadow-sm">
                                                        <span>Access Dissertation</span>
                                                        <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform duration-300"></i>
                                                    </a>
                                                @else
                                                    <a href="{{ route('login') }}"
                                                       class="group inline-flex items-center justify-center w-full bg-white border border-blue-500 text-blue-600 px-4 py-2.5 rounded-lg hover:bg-blue-600 hover:text-white transition-all duration-300 font-medium shadow-sm">
                                                        <span>Login to Access</span>
                                                        <i class="fas fa-lock ml-2"></i>
                                                    </a>
                                                @endauth
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="text-center py-8 bg-white rounded-lg border border-gray-200">
                                    <p class="text-gray-500">No dissertations available at this time.</p>
                                </div>
                            @endif
                        </div>
                        
                        <!-- Theses Section -->
                        <div>
                            <div class="flex justify-between items-center mb-6">
                                <h3 class="text-2xl font-bold text-gray-900">Theses</h3>
                                <a href="{{ route('dissertation.index', ['type' => 'thesis']) }}" 
                                   class="text-green-600 hover:text-green-700 font-medium group flex items-center">
                                    View All <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform duration-300"></i>
                                </a>
                            </div>
                            
                            @php
                                $theses = App\Models\Dissertation::where('type', 'thesis')
                                    ->where('status', 'approved')
                                    ->take(6)
                                    ->get();
                            @endphp
                            
                            @if($theses->count() > 0)
                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                                    @foreach($theses as $thesis)
                                        <div class="bg-white rounded-xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden border border-gray-100 group"
                                             data-aos="fade-up"
                                             data-aos-delay="{{ $loop->index * 100 }}">
                                            <div class="relative">
                                                <div class="w-full h-48 bg-gradient-to-r from-green-600 to-teal-700 flex items-center justify-center">
                                                    <i class="fas fa-scroll text-6xl text-white opacity-30 group-hover:opacity-50 transition-opacity duration-300"></i>
                                                </div>
                                                <div class="absolute top-4 right-4 bg-green-600 text-white px-3 py-1 rounded-full text-sm font-medium shadow-sm">
                                                    Thesis
                                                </div>
                                                <div class="absolute top-4 left-4 bg-teal-600 text-white px-3 py-1 rounded-full text-xs flex items-center shadow-sm">
                                                    {{ $thesis->year }}
                                                </div>
                                            </div>

                                            <div class="p-6">
                                                <h4 class="font-bold text-xl mb-4 text-gray-900 line-clamp-2 group-hover:text-green-600 transition-colors duration-300">
                                                    {{ Str::limit($thesis->title, 60, '...') }}
                                                </h4>

                                                <div class="space-y-3 mb-5 text-gray-600">
                                                    <p class="flex items-center">
                                                        <i class="fas fa-user-graduate w-5 text-green-600"></i>
                                                        <span class="ml-2 font-medium">{{ $thesis->author }}</span>
                                                    </p>
                                                    
                                                    <p class="flex items-center">
                                                        <i class="fas fa-university w-5 text-green-600"></i>
                                                        <span class="ml-2">{{ $thesis->department }}</span>
                                                    </p>
                                                    
                                                    <div class="flex items-center justify-between mt-3 pt-3 border-t border-gray-100">
                                                        <div class="flex items-center space-x-3">
                                                            <span class="flex items-center bg-green-50 px-2 py-1 rounded text-xs text-green-600">
                                                                <i class="fas fa-eye mr-1"></i> {{ number_format($thesis->view_count ?? 0) }}
                                                            </span>
                                                            <span class="flex items-center bg-green-50 px-2 py-1 rounded text-xs text-green-600">
                                                                <i class="fas fa-download mr-1"></i> {{ number_format($thesis->download_count ?? 0) }}
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>

                                                @auth
                                                    <a href="{{ route('dissertation.show', $thesis->id) }}"
                                                       class="group inline-flex items-center justify-center w-full bg-white border border-green-500 text-green-600 px-4 py-2.5 rounded-lg hover:bg-green-600 hover:text-white transition-all duration-300 font-medium shadow-sm">
                                                        <span>Access Thesis</span>
                                                        <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform duration-300"></i>
                                                    </a>
                                                @else
                                                    <a href="{{ route('login') }}"
                                                       class="group inline-flex items-center justify-center w-full bg-white border border-green-500 text-green-600 px-4 py-2.5 rounded-lg hover:bg-green-600 hover:text-white transition-all duration-300 font-medium shadow-sm">
                                                        <span>Login to Access</span>
                                                        <i class="fas fa-lock ml-2"></i>
                                                    </a>
                                                @endauth
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="text-center py-8 bg-white rounded-lg border border-gray-200">
                                    <p class="text-gray-500">No theses available at this time.</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="py-12 bg-white">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center" id="about-uspf">
                        <h2 class="text-3xl font-bold text-gray-900 mb-4">About the University of Southern Philippines Foundation</h2>
                        <p class="text-lg text-gray-600 mb-8 max-w-3xl mx-auto">
                            Founded in 1927, USPF has established itself as a leading institution for higher education in Cebu City. 
                            Our research repository showcases the academic excellence and innovative spirit of our students and faculty.
                        </p>
                        <div class="mt-8 flex justify-center">
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-left max-w-4xl">
                                <div class="bg-gray-50 p-6 rounded-lg">
                                    <div class="text-blue-600 mb-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                                        </svg>
                                    </div>
                                    <h3 class="text-lg font-semibold mb-2">Research Excellence</h3>
                                    <p class="text-gray-600">Our repository features over 1,000 research papers across various disciplines.</p>
                                </div>
                                <div class="bg-gray-50 p-6 rounded-lg">
                                    <div class="text-blue-600 mb-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                        </svg>
                                    </div>
                                    <h3 class="text-lg font-semibold mb-2">Academic Heritage</h3>
                                    <p class="text-gray-600">Celebrating over 95 years of academic excellence and innovation.</p>
                                </div>
                                <div class="bg-gray-50 p-6 rounded-lg">
                                    <div class="text-blue-600 mb-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                                        </svg>
                                    </div>
                                    <h3 class="text-lg font-semibold mb-2">Global Impact</h3>
                                    <p class="text-gray-600">Our research contributes to knowledge and solutions on a global scale.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Footer -->
                <footer class="bg-gray-900 text-white py-12">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                            <div>
                                <h4 class="text-lg font-semibold mb-4">USPF Research Repository</h4>
                                <p class="text-gray-400 text-sm">
                                    A dedicated platform for preserving and sharing academic research and knowledge from 
                                    the University of Southern Philippines Foundation community.
                                </p>
                            </div>
                            <div>
                                <h4 class="text-lg font-semibold mb-4">Quick Links</h4>
                                <ul class="space-y-2 text-gray-400">
                                    <li><a href="#" class="hover:text-white transition-colors">About Us</a></li>
                                    <li><a href="#" class="hover:text-white transition-colors">Contact</a></li>
                                    <li><a href="#" class="hover:text-white transition-colors">Privacy Policy</a></li>
                                    <li><a href="#" class="hover:text-white transition-colors">Terms of Service</a></li>
                                </ul>
                            </div>
                            <div>
                                <h4 class="text-lg font-semibold mb-4">Resources</h4>
                                <ul class="space-y-2 text-gray-400">
                                    <li><a href="#" class="hover:text-white transition-colors">Submission Guidelines</a></li>
                                    <li><a href="#" class="hover:text-white transition-colors">Citation Help</a></li>
                                    <li><a href="#" class="hover:text-white transition-colors">Research Ethics</a></li>
                                    <li><a href="#" class="hover:text-white transition-colors">FAQs</a></li>
                                </ul>
                            </div>
                            <div>
                                <h4 class="text-lg font-semibold mb-4">Connect With Us</h4>
                                <div class="flex space-x-4 mb-4">
                                    <a href="#" class="text-gray-400 hover:text-white transition-colors">
                                        <i class="fab fa-facebook-f text-xl"></i>
                                    </a>
                                    <a href="#" class="text-gray-400 hover:text-white transition-colors">
                                        <i class="fab fa-twitter text-xl"></i>
                                    </a>
                                    <a href="#" class="text-gray-400 hover:text-white transition-colors">
                                        <i class="fab fa-instagram text-xl"></i>
                                    </a>
                                    <a href="#" class="text-gray-400 hover:text-white transition-colors">
                                        <i class="fab fa-linkedin-in text-xl"></i>
                                    </a>
                                </div>
                                <p class="text-gray-400 text-sm">
                                    <i class="fas fa-map-marker-alt mr-2"></i> USPF Main Campus, Lahug, Cebu City
                                </p>
                                <p class="text-gray-400 text-sm">
                                    <i class="fas fa-envelope mr-2"></i> research@uspf.edu.ph
                                </p>
                            </div>
                        </div>
                        <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400 text-sm">
                            <p>&copy; {{ date('Y') }} University of Southern Philippines Foundation. All rights reserved.</p>
                        </div>
                    </div>
                </footer>
            </main>
        </div>

        <!-- Add custom styles -->
        <style>
            .animate-fade-in {
                animation: fadeIn 1s ease-in;
            }
            .animate-fade-in-delayed {
                animation: fadeIn 1s ease-in 0.5s both;
            }
            .animate-subtle-zoom {
                animation: subtleZoom 20s infinite alternate;
            }
            @keyframes fadeIn {
                from { opacity: 0; transform: translateY(20px); }
                to { opacity: 1; transform: translateY(0); }
            }
            @keyframes subtleZoom {
                from { transform: scale(1); }
                to { transform: scale(1.1); }
            }
        </style>

        <script>
            document.addEventListener('alpine:init', () => {
                Alpine.data('carousel', () => ({
                    currentSlide: 0,
                    slides: [
                        { image: '{{ asset("images/image5.jpg") }}', alt: 'Library Background 1' },
                        { image: '{{ asset("images/image4.jpg") }}', alt: 'Library Background 2' },
                        { image: '{{ asset("images/image3.jpg") }}', alt: 'Library Background 3' }
                    ],
                    init() {
                        setInterval(() => {
                            this.currentSlide = (this.currentSlide + 1) % this.slides.length;
                        }, 5000); // Change slide every 5 seconds
                    }
                }));
            });
        </script>
    </body>
</html>