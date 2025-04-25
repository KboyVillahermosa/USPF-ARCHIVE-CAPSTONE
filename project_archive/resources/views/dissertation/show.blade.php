<x-app-layout>
    <style>
        body {
            -webkit-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;
          }
    </style>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Top Stats Bar - Fixed position for easy access -->
            <div class="bg-white border-b border-gray-200 shadow-sm sticky top-0 z-20 rounded-t-lg">
                <div class="px-4 py-4 sm:px-6 flex flex-wrap items-center justify-between">
                    <div class="flex items-center">
                        <h1 class="text-xl font-bold text-gray-900 mr-4 truncate max-w-lg">
                            {{ $dissertation->title }}
                        </h1>
                        <div class="hidden sm:flex items-center space-x-4 ml-4">
                            <!-- Views Counter -->
                            <div class="flex items-center text-gray-500">
                                <svg class="w-5 h-5 mr-1 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                                <span>{{ number_format($dissertation->view_count ?? 0) }}</span>
                            </div>
                            
                            <!-- Downloads Counter -->
                            <div class="flex items-center text-gray-500">
                                <svg class="w-5 h-5 mr-1 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                                </svg>
                                <span>{{ number_format($dissertation->download_count ?? 0) }}</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="flex items-center space-x-3">
                        @if($dissertation->status === 'approved')
                            @auth
                                <!-- Show download button for authenticated users -->
                                <button data-download-trigger 
                                    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg flex items-center text-sm font-medium transition-colors duration-200">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                                    </svg>
                                    Download
                                </button>
                            @else
                                <!-- Show login to download for guests -->
                                <a href="{{ route('login') }}" 
                                    class="bg-gray-100 hover:bg-gray-200 text-gray-800 border border-gray-300 px-4 py-2 rounded-lg flex items-center text-sm font-medium transition-colors duration-200">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                                    </svg>
                                    Login to Download
                                </a>
                            @endauth
                        @endif
                        
                        <a href="{{ url()->previous() }}" 
                            class="text-gray-600 hover:text-gray-800 flex items-center text-sm font-medium">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                            </svg>
                            Back
                        </a>
                    </div>
                </div>
            </div>

            <!-- Add a notification for guests -->
            @guest
            <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4 mb-4">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-yellow-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-sm font-medium text-yellow-800">
                            Login required for downloads
                        </h3>
                        <div class="mt-2 text-sm text-yellow-700">
                            <p>
                                You're viewing this dissertation as a guest. <a href="{{ route('login') }}" class="font-medium underline">Log in</a> to download this document.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            @endguest

            <!-- Main Content with Sidebar Tabs -->
            <div class="bg-white overflow-hidden shadow-sm rounded-b-lg flex flex-col md:flex-row" x-data="{ activeTab: 'overview' }">
                <!-- Sidebar Navigation -->
                <div class="w-full md:w-64 bg-gray-50 border-r border-gray-200">
                    <div class="p-4 border-b border-gray-200 bg-white">
                        <div class="flex flex-col">
                            <h2 class="text-lg font-semibold text-gray-800">Dissertation Details</h2>
                            <p class="text-sm text-gray-500">{{ $dissertation->department }}</p>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium mt-2
                                {{ $dissertation->status === 'approved' ? 'bg-green-100 text-green-800' : 
                                  ($dissertation->status === 'rejected' ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800') }}">
                                {{ ucfirst($dissertation->status) }}
                            </span>
                        </div>
                    </div>

                    <!-- Tabs Navigation -->
                    <nav class="flex flex-col p-2 space-y-1">
                        <button @click="activeTab = 'overview'" 
                                :class="{'bg-blue-50 text-blue-700 border-l-4 border-blue-600': activeTab === 'overview',
                                        'text-gray-700 hover:bg-gray-100': activeTab !== 'overview'}"
                                class="flex items-center px-4 py-3 rounded-lg transition-colors duration-200">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                            </svg>
                            Overview
                        </button>

                        <button @click="activeTab = 'abstract'" 
                                :class="{'bg-blue-50 text-blue-700 border-l-4 border-blue-600': activeTab === 'abstract',
                                        'text-gray-700 hover:bg-gray-100': activeTab !== 'abstract'}"
                                class="flex items-center px-4 py-3 rounded-lg transition-colors duration-200">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                            Abstract
                        </button>

                        @if($dissertation->status === 'approved')
                            <button @click="activeTab = 'document'" 
                                    :class="{'bg-blue-50 text-blue-700 border-l-4 border-blue-600': activeTab === 'document',
                                            'text-gray-700 hover:bg-gray-100': activeTab !== 'document'}"
                                    class="flex items-center px-4 py-3 rounded-lg transition-colors duration-200">
                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                                </svg>
                                Document
                            </button>
                        @endif

                        <button @click="activeTab = 'citation'" 
                                :class="{'bg-blue-50 text-blue-700 border-l-4 border-blue-600': activeTab === 'citation',
                                        'text-gray-700 hover:bg-gray-100': activeTab !== 'citation'}"
                                class="flex items-center px-4 py-3 rounded-lg transition-colors duration-200">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"/>
                            </svg>
                            Citation
                        </button>

                        <button @click="activeTab = 'related'" 
                                :class="{'bg-blue-50 text-blue-700 border-l-4 border-blue-600': activeTab === 'related',
                                        'text-gray-700 hover:bg-gray-100': activeTab !== 'related'}"
                                class="flex items-center px-4 py-3 rounded-lg transition-colors duration-200">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"/>
                            </svg>
                            Related
                        </button>

                        <div class="pt-4 mt-4 border-t border-gray-200">
                            <button onclick="toggleToc()" class="flex items-center px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg transition-colors duration-200">
                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"/>
                                </svg>
                                Table of Contents
                            </button>

                            <button onclick="copyToClipboard()" class="flex items-center px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg transition-colors duration-200">
                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"/>
                                </svg>
                                Share
                            </button>
                        </div>
                    </nav>

                    <!-- Mobile Stats (visible on small screens) -->
                    <div class="md:hidden border-t border-gray-200 p-4">
                        <div class="flex justify-around">
                            <!-- Views Counter -->
                            <div class="flex flex-col items-center">
                                <div class="text-xl font-bold text-blue-600">{{ number_format($dissertation->view_count ?? 0) }}</div>
                                <div class="text-xs text-gray-500">Views</div>
                            </div>
                            
                            <!-- Downloads Counter -->
                            <div class="flex flex-col items-center">
                                <div class="text-xl font-bold text-green-600">{{ number_format($dissertation->download_count ?? 0) }}</div>
                                <div class="text-xs text-gray-500">Downloads</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Content Area -->
                <div class="flex-1 overflow-auto">
                    <!-- Tab Panels -->
                    <div class="p-6">
                        <!-- Overview Tab Panel -->
                        <div x-show="activeTab === 'overview'" class="space-y-6 animate-fadeIn">
                            <div class="flex flex-col sm:flex-row sm:items-center justify-between pb-4 border-b border-gray-200">
                                <h2 class="text-2xl font-bold text-gray-900">Dissertation Overview</h2>
                                <p class="text-sm text-gray-500 mt-1 sm:mt-0">
                                    Published: {{ $dissertation->created_at->format('F d, Y') }}
                                </p>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                <div class="md:col-span-2 space-y-4">
                                    <div>
                                        <h3 class="text-lg font-medium text-gray-900">Dissertation Information</h3>
                                        <div class="mt-2 space-y-2 text-gray-700">
                                            <p><span class="font-medium text-gray-900">Type:</span> {{ ucfirst($dissertation->type) }}</p>
                                            <p><span class="font-medium text-gray-900">Department:</span> {{ $dissertation->department }}</p>
                                            <p><span class="font-medium text-gray-900">Year:</span> {{ $dissertation->year }}</p>
                                            <p><span class="font-medium text-gray-900">Keywords:</span> {{ $dissertation->keywords }}</p>
                                        </div>
                                    </div>

                                    <!-- Author Section -->
                                    <div>
                                        <h3 class="text-lg font-medium text-gray-900">Author</h3>
                                        <div class="flex flex-wrap gap-2 mt-2">
                                            <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm">
                                                {{ $dissertation->author }}
                                            </span>
                                        </div>
                                    </div>

                                    <!-- Research Brief -->
                                    <div>
                                        <h3 class="text-lg font-medium text-gray-900">Abstract Brief</h3>
                                        <div class="mt-2 prose max-w-none text-gray-700">
                                            <p>{{ Str::limit(strip_tags($dissertation->abstract), 300) }}</p>
                                            <button @click="activeTab = 'abstract'" class="text-blue-600 hover:text-blue-800 text-sm mt-2">
                                                Read full abstract →
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <!-- Quick Links -->
                                    <div class="bg-gray-50 rounded-lg p-4">
                                        <h3 class="font-medium text-gray-900 mb-3">Quick Actions</h3>
                                        <div class="space-y-2">
                                            <button @click="activeTab = 'abstract'" class="flex items-center text-blue-600 hover:text-blue-800">
                                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                                </svg>
                                                Read Full Abstract
                                            </button>
                                            @if($dissertation->status === 'approved')
                                                <button @click="activeTab = 'document'" class="flex items-center text-blue-600 hover:text-blue-800">
                                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                                                    </svg>
                                                    View Document
                                                </button>
                                            @endif
                                            <button @click="activeTab = 'citation'" class="flex items-center text-blue-600 hover:text-blue-800">
                                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"/>
                                                </svg>
                                                Get Citation
                                            </button>
                                            @if($dissertation->status === 'approved')
                                                @auth
                                                    <button data-download-trigger class="flex items-center text-blue-600 hover:text-blue-800">
                                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                                                        </svg>
                                                        Download Dissertation
                                                    </button>
                                                @else
                                                    <a href="{{ route('login') }}" class="flex items-center text-gray-500 hover:text-gray-700">
                                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                                        </svg>
                                                        Login to Download
                                                    </a>
                                                @endauth
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Status Card -->
                                    <div class="mt-6 p-4 rounded-lg {{ $dissertation->status === 'approved' ? 'bg-green-50' : ($dissertation->status === 'rejected' ? 'bg-red-50' : 'bg-yellow-50') }}">
                                        <div class="flex items-center">
                                            <svg class="w-5 h-5 mr-2 {{ $dissertation->status === 'approved' ? 'text-green-500' : ($dissertation->status === 'rejected' ? 'text-red-500' : 'text-yellow-500') }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                @if($dissertation->status === 'approved')
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                                @elseif($dissertation->status === 'rejected')
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                                @else
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                                @endif
                                            </svg>
                                            <h3 class="font-medium {{ $dissertation->status === 'approved' ? 'text-green-800' : ($dissertation->status === 'rejected' ? 'text-red-800' : 'text-yellow-800') }}">
                                                Status: {{ ucfirst($dissertation->status) }}
                                            </h3>
                                        </div>
                                        <p class="mt-2 text-sm {{ $dissertation->status === 'approved' ? 'text-green-700' : ($dissertation->status === 'rejected' ? 'text-red-700' : 'text-yellow-700') }}">
                                            @if($dissertation->status === 'approved')
                                                This dissertation has been reviewed and approved. You can view and download the full document.
                                            @elseif($dissertation->status === 'rejected')
                                                This dissertation has been reviewed and rejected. The full document is not available.
                                            @else
                                                This dissertation is currently under review. The full document will be available once approved.
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- Stats Card -->
                            <div class="bg-gray-50 rounded-lg p-5 mt-6">
                                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                                    <div class="text-center p-3">
                                        <div class="text-3xl font-bold text-blue-600">{{ number_format($dissertation->view_count ?? 0) }}</div>
                                        <div class="text-sm text-gray-500 mt-1">Total Views</div>
                                    </div>
                                    <div class="text-center p-3">
                                        <div class="text-3xl font-bold text-green-600">{{ number_format($dissertation->download_count ?? 0) }}</div>
                                        <div class="text-sm text-gray-500 mt-1">Downloads</div>
                                    </div>
                                    <div class="text-center p-3">
                                        <div class="text-3xl font-bold text-purple-600">{{ $dissertation->year }}</div>
                                        <div class="text-sm text-gray-500 mt-1">Year</div>
                                    </div>
                                    <div class="text-center p-3">
                                        <div class="text-3xl font-bold text-amber-600">{{ $dissertation->created_at->diffForHumans() }}</div>
                                        <div class="text-sm text-gray-500 mt-1">Published</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Abstract Tab Panel -->
                        <div x-show="activeTab === 'abstract'" class="space-y-6 animate-fadeIn">
                            <div class="flex justify-between items-center pb-4 border-b border-gray-200">
                                <h2 class="text-2xl font-bold text-gray-900">Abstract</h2>
                            </div>

                            <div class="bg-gray-50 p-6 rounded-lg">
                                <div class="prose max-w-none text-gray-700 leading-relaxed">
                                    {!! $dissertation->abstract !!}
                                </div>
                            </div>

                            <div class="flex justify-end pt-4">
                                @if($dissertation->status === 'approved')
                                    <button @click="activeTab = 'document'" class="flex items-center text-blue-600 hover:text-blue-800">
                                        Continue to Document
                                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                        </svg>
                                    </button>
                                @else
                                    <button @click="activeTab = 'citation'" class="flex items-center text-blue-600 hover:text-blue-800">
                                        View Citation
                                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                        </svg>
                                    </button>
                                @endif
                            </div>
                        </div>

                        <!-- Document Tab Panel -->
                        @if($dissertation->status === 'approved')
                        <div x-show="activeTab === 'document'" class="space-y-6 animate-fadeIn" id="documentTab">
                            <div class="flex justify-between items-center pb-4 border-b border-gray-200">
                                <h2 class="text-2xl font-bold text-gray-900">Dissertation Document</h2>
                            </div>

                            @if(File::exists(storage_path('app/public/' . $dissertation->file_path)))
                                <div class="bg-white shadow-lg rounded-lg border border-gray-200">
                                    <div id="pdfContainer" class="relative flex-1">
                                        <div id="pdfLoadingOverlay" class="absolute inset-0 flex flex-col items-center justify-center bg-white bg-opacity-90 z-10">
                                            <div class="w-16 h-16 border-4 border-blue-400 border-t-blue-600 rounded-full animate-spin mb-4"></div>
                                            <p class="text-gray-700">Loading document...</p>
                                        </div>
                                        <div class="w-full h-[600px] bg-gray-100">
                                            <embed 
                                                src="{{ asset('storage/' . $dissertation->file_path) }}#toolbar=1&navpanes=1&scrollbar=1" 
                                                type="application/pdf"
                                                width="100%"
                                                height="600px"
                                                class="w-full h-[600px]">
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="bg-yellow-50 p-6 rounded-lg">
                                    <div class="flex items-center mb-4">
                                        <svg class="w-6 h-6 text-yellow-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <h3 class="text-lg font-medium text-yellow-800">Document Not Available</h3>
                                    </div>
                                    
                                    <p class="text-yellow-700 mb-4">The PDF file could not be found on the server. This could be due to:</p>
                                    <ul class="list-disc ml-6 mb-4 text-yellow-700">
                                        <li>The file was uploaded but not properly saved</li>
                                        <li>The file was moved or deleted from storage</li>
                                        <li>The storage link was not created (<code>php artisan storage:link</code>)</li>
                                    </ul>
                                    
                                    @if(isset($storagePath) && isset($publicUrl))
                                        <div class="bg-white p-4 rounded-lg border border-yellow-200 text-sm font-mono overflow-x-auto">
                                            <p><strong>File Path:</strong> {{ $dissertation->file_path }}</p>
                                            <p><strong>Storage Path:</strong> {{ $storagePath }}</p>
                                            <p><strong>Public URL:</strong> {{ $publicUrl }}</p>
                                        </div>
                                    @endif

                                    <div class="p-4 bg-gray-100 rounded-lg">
                                        <p>File path: {{ $dissertation->file_path }}</p>
                                        <p>Full path: {{ storage_path('app/public/' . $dissertation->file_path) }}</p>
                                        <p>Exists: {{ File::exists(storage_path('app/public/' . $dissertation->file_path)) ? 'Yes' : 'No' }}</p>
                                    </div>

                                    <div class="p-4 bg-gray-100 rounded-lg mb-4">
                                        <p><strong>Debug Info:</strong></p>
                                        <p>File path: {{ $dissertation->file_path }}</p>
                                        <p>Asset URL: {{ asset('storage/' . $dissertation->file_path) }}</p>
                                        <p>Direct URL attempt: <a href="{{ asset('storage/' . $dissertation->file_path) }}" target="_blank">Click to test direct access</a></p>
                                        <p>Exists check: {{ File::exists(storage_path('app/public/' . $dissertation->file_path)) ? 'Yes' : 'No' }}</p>
                                    </div>
                                </div>
                            @endif
                        </div>
                        @endif

                        <!-- Citation Tab Panel -->
                        <div x-show="activeTab === 'citation'" class="space-y-6 animate-fadeIn">
                            <div class="flex justify-between items-center pb-4 border-b border-gray-200">
                                <h2 class="text-2xl font-bold text-gray-900">Citation Formats</h2>
                            </div>

                            <div class="space-y-6">
                                <div class="bg-gray-50 p-5 rounded-lg">
                                    <div class="flex justify-between items-center mb-2">
                                        <h3 class="font-semibold text-lg">APA Format</h3>
                                        <button onclick="copyCitation('apa-citation')" class="text-blue-600 hover:text-blue-800 text-sm flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                                            </svg>
                                            Copy
                                        </button>
                                    </div>
                                    <div id="apa-citation" class="bg-white p-4 rounded border border-gray-200 text-gray-700">
                                        @php
                                            // Format author for APA (Last Name, First Initial.)
                                            $authorParts = array_map('trim', explode(' ', $dissertation->author));
                                            $lastName = array_pop($authorParts);
                                            $initials = array_map(function($part) {
                                                return strtoupper(substr($part, 0, 1)) . '.';
                                            }, $authorParts);
                                            $formattedAuthor = $lastName . ', ' . implode(' ', $initials);
                                        @endphp
                                        {{ $formattedAuthor }} ({{ $dissertation->year }}). 
                                        <em>{{ $dissertation->title }}</em> 
                                        [{{ ucfirst($dissertation->type) }}]. 
                                        {{ $dissertation->department }}.
                                    </div>
                                </div>

                                <div class="bg-gray-50 p-5 rounded-lg">
                                    <div class="flex justify-between items-center mb-2">
                                        <h3 class="font-semibold text-lg">IEEE Format</h3>
                                        <button onclick="copyCitation('ieee-citation')" class="text-blue-600 hover:text-blue-800 text-sm flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                                            </svg>
                                            Copy
                                        </button>
                                    </div>
                                    <div id="ieee-citation" class="bg-white p-4 rounded border border-gray-200 text-gray-700">
                                        @php
                                            // Format IEEE citation (just initials, no last name first)
                                            $authorParts = array_map('trim', explode(' ', $dissertation->author));
                                            $firstInitials = array_map(function($part) {
                                                return strtoupper(substr($part, 0, 1)) . '.';
                                            }, array_slice($authorParts, 0, -1));
                                            $lastName = end($authorParts);
                                            $ieeeAuthor = implode(' ', $firstInitials) . ' ' . $lastName;
                                        @endphp
                                        [1] {{ $ieeeAuthor }}, "{{ $dissertation->title }}," {{ ucfirst($dissertation->type) }}, {{ $dissertation->department }}, {{ $dissertation->year }}.
                                    </div>
                                </div>

                                <div class="bg-gray-50 p-5 rounded-lg">
                                    <div class="flex justify-between items-center mb-2">
                                        <h3 class="font-semibold text-lg">MLA Format</h3>
                                        <button onclick="copyCitation('mla-citation')" class="text-blue-600 hover:text-blue-800 text-sm flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                                            </svg>
                                            Copy
                                        </button>
                                    </div>
                                    <div id="mla-citation" class="bg-white p-4 rounded border border-gray-200 text-gray-700">
                                        @php
                                            // Format author for MLA (Last Name, First Name)
                                            $authorParts = array_map('trim', explode(' ', $dissertation->author));
                                            $lastName = array_pop($authorParts);
                                            $firstName = implode(' ', $authorParts);
                                            $formattedAuthorMLA = $lastName . ', ' . $firstName;
                                        @endphp
                                        {{ $formattedAuthorMLA }}. "<em>{{ $dissertation->title }}</em>." 
                                        {{ ucfirst($dissertation->type) }}, {{ $dissertation->department }}, 
                                        {{ $dissertation->year }}.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Related Tab Panel -->
                        <div x-show="activeTab === 'related'" class="space-y-6 animate-fadeIn">
                            <div class="flex justify-between items-center pb-4 border-b border-gray-200">
                                <h2 class="text-2xl font-bold text-gray-900">Related Dissertations</h2>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                @php $relatedCount = 0; @endphp
                                @foreach($relatedDissertations ?? [] as $related)
                                    @php
                                        // Skip if it's the same dissertation
                                        if($related->id === $dissertation->id) continue;
                                        
                                        // Calculate title similarity
                                        $mainWords = preg_split('/\s+/', strtolower($dissertation->title));
                                        $relatedWords = preg_split('/\s+/', strtolower($related->title));
                                        
                                        // Filter out very common words
                                        $stopWords = ['the', 'a', 'an', 'of', 'and', 'in', 'on', 'at', 'for', 'to', 'with', 'by'];
                                        $mainWords = array_diff($mainWords, $stopWords);
                                        $relatedWords = array_diff($relatedWords, $stopWords);
                                        
                                        $commonWords = array_intersect($mainWords, $relatedWords);
                                        
                                        // Calculate other relationship factors
                                        $departmentMatch = $dissertation->department === $related->department;
                                        $typeMatch = $dissertation->type === $related->type;
                                        $yearMatch = abs(intval($dissertation->year) - intval($related->year)) <= 3;
                                        
                                        // Extract keywords
                                        $dissertationKeywords = array_map('trim', explode(',', $dissertation->keywords ?? ''));
                                        $relatedKeywords = array_map('trim', explode(',', $related->keywords ?? ''));
                                        $commonKeywords = array_intersect($dissertationKeywords, $relatedKeywords);
                                        
                                        // Calculate title similarity score (prioritize multi-word matches)
                                        $titleSimilarityScore = 0;
                                        if (count($commonWords) >= 3) {
                                            $titleSimilarityScore = 10; // High match - multiple significant words
                                        } elseif (count($commonWords) == 2) {
                                            $titleSimilarityScore = 7;  // Medium match - couple words in common
                                        } elseif (count($commonWords) == 1 && strlen(reset($commonWords)) > 4) {
                                            $titleSimilarityScore = 3;  // Low match - one significant word
                                        }
                                        
                                        // Calculate total relevance score
                                        $relevanceScore = 0;
                                        $relevanceScore += $titleSimilarityScore;            // Title is most important
                                        $relevanceScore += $departmentMatch ? 3 : 0;         // Same department
                                        $relevanceScore += $typeMatch ? 2 : 0;               // Same type
                                        $relevanceScore += count($commonKeywords) * 2;       // Each matching keyword
                                        $relevanceScore += $yearMatch ? 1 : 0;               // Recent timeframe
                                        
                                        // Determine relationship type
                                        $relationType = "";
                                        if ($titleSimilarityScore >= 7) {
                                            $relationType = "Similar title";
                                        } elseif (!empty($commonKeywords) && count($commonKeywords) >= 2) {
                                            $relationType = "Related topics";
                                        } elseif ($titleSimilarityScore >= 3) {
                                            $relationType = "Related title";
                                        } elseif ($departmentMatch && $typeMatch) {
                                            $relationType = "Same department & type";
                                        }
                                        
                                        // Only show if there's a meaningful relationship (title match prioritized)
                                        $isRelated = $relevanceScore >= 3;
                                    @endphp

                                    @if($isRelated)
                                        @php $relatedCount++; @endphp
                                        <div class="bg-white p-4 rounded-lg border border-gray-200 shadow-sm hover:shadow-md transition-shadow duration-200">
                                            <div class="flex justify-between items-start mb-3">
                                                <h3 class="font-semibold text-lg text-gray-900">{{ $related->title }}</h3>
                                            </div>

                                            <div class="space-y-2 mb-3 text-gray-700">
                                                <p class="text-sm">
                                                    <span class="font-medium">Author:</span> {{ $related->author }}
                                                </p>
                                                <p class="text-sm">
                                                    <span class="font-medium">Department:</span> {{ $related->department }}
                                                </p>
                                                <p class="text-sm">
                                                    <span class="font-medium">Year:</span> {{ $related->year }}
                                                </p>
                                                <p class="text-sm line-clamp-2 mt-2 text-gray-600">
                                                    {{ Str::limit(strip_tags($related->abstract), 120) }}
                                                </p>
                                                
                                                <!-- Show relationship indicators -->
                                                <div class="flex flex-wrap gap-2 mt-2">
                                                    @if(!empty($relationType))
                                                        <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-full">
                                                            {{ $relationType }}
                                                        </span>
                                                    @endif
                                                    
                                                    @if($titleSimilarityScore >= 7)
                                                        <span class="bg-indigo-100 text-indigo-800 text-xs px-2 py-1 rounded-full">
                                                            Title match
                                                        </span>
                                                    @endif
                                                    
                                                    @if(!empty($commonKeywords))
                                                        <span class="bg-purple-100 text-purple-800 text-xs px-2 py-1 rounded-full">
                                                            Common keywords: {{ implode(', ', array_slice($commonKeywords, 0, 2)) }}{{ count($commonKeywords) > 2 ? '...' : '' }}
                                                        </span>
                                                    @endif
                                                    
                                                    @if($yearMatch && abs(intval($dissertation->year) - intval($related->year)) <= 1)
                                                        <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full">
                                                            Same timeframe
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="flex justify-end">
                                                <a href="{{ route('dissertation.show', $related->id) }}"
                                                   class="inline-flex items-center text-blue-600 hover:text-blue-800 text-sm font-medium">
                                                    View Dissertation
                                                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach

                                @if($relatedCount === 0)
                                    <div class="col-span-2 p-6 text-center bg-gray-50 rounded-lg">
                                        <svg class="w-12 h-12 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <p class="text-gray-500">No related dissertations found based on title, keywords, or content.</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Download Purpose Modal -->
    <div id="downloadModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 hidden items-center justify-center z-50 backdrop-blur-sm">
        <div class="bg-white p-6 rounded-xl shadow-2xl max-w-md w-full mx-4 transform transition-all">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-xl font-semibold text-gray-800">Download Dissertation</h3>
                <button id="cancelDownloadX" class="text-gray-500 hover:text-gray-700">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            
            <p class="text-gray-600 mb-6">
                To help us improve our repository, please let us know how you plan to use this document:
            </p>

            <form action="{{ route('dissertation.download', $dissertation->id) }}" method="POST" id="downloadForm">
                @csrf
                <div class="mb-6 space-y-3">
                    <div class="flex items-start">
                        <input type="checkbox" name="purpose[]" value="academic_research" 
                            class="mt-1 mr-3 h-4 w-4 text-blue-600 focus:ring-blue-500" id="academic_research">
                        <label for="academic_research" class="text-gray-700">
                            <span class="font-medium block">Academic Research</span>
                            <span class="text-sm text-gray-500">Using for research purposes</span>
                        </label>
                    </div>

                    <div class="flex items-start">
                        <input type="checkbox" name="purpose[]" value="literature_review" 
                            class="mt-1 mr-3 h-4 w-4 text-blue-600 focus:ring-blue-500" id="literature_review">
                        <label for="literature_review" class="text-gray-700">
                            <span class="font-medium block">Literature Review</span>
                            <span class="text-sm text-gray-500">Surveying existing research on this topic</span>
                        </label>
                    </div>

                    <div class="flex items-start">
                        <input type="checkbox" name="purpose[]" value="personal_study" 
                            class="mt-1 mr-3 h-4 w-4 text-blue-600 focus:ring-blue-500" id="personal_study">
                        <label for="personal_study" class="text-gray-700">
                            <span class="font-medium block">Personal Study</span>
                            <span class="text-sm text-gray-500">Personal learning or reference</span>
                        </label>
                    </div>

                    <div class="flex items-start">
                        <input type="checkbox" name="purpose[]" value="other" 
                            class="mt-1 mr-3 h-4 w-4 text-blue-600 focus:ring-blue-500" id="other_purpose">
                        <label for="other_purpose" class="text-gray-700">
                            <span class="font-medium block">Other Purpose</span>
                            <span class="text-sm text-gray-500">Please specify below</span>
                        </label>
                    </div>

                    <div id="otherPurposeField" class="hidden mt-3 pl-7">
                        <input type="text" name="other_purpose_text" 
                            class="w-full p-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Please specify your purpose">
                    </div>
                </div>

                <div class="flex justify-end gap-3">
                    <button type="button" id="cancelDownload" 
                        class="px-4 py-2 text-gray-600 hover:text-gray-800 rounded-lg hover:bg-gray-100">
                        Cancel
                    </button>
                    <button type="submit" 
                        class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors shadow-sm">
                        Download Now
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Modal functionality
        const downloadModal = document.getElementById('downloadModal');
        const downloadForm = document.getElementById('downloadForm');
        const checkboxes = downloadForm ? downloadForm.querySelectorAll('input[type="checkbox"]') : [];
        const otherCheckbox = document.getElementById('other_purpose');
        const otherPurposeField = document.getElementById('otherPurposeField');

        // Show modal when download button is clicked
        document.querySelectorAll('[data-download-trigger]').forEach(button => {
            button.addEventListener('click', (e) => {
                e.preventDefault(); // Prevent any default link behavior
                downloadModal.classList.remove('hidden');
                downloadModal.classList.add('flex');
            });
        });

        // Hide modal when cancel is clicked
        if (document.getElementById('cancelDownload')) {
            document.getElementById('cancelDownload').addEventListener('click', hideDownloadModal);
        }
        if (document.getElementById('cancelDownloadX')) {
            document.getElementById('cancelDownloadX').addEventListener('click', hideDownloadModal);
        }

        // Close when clicking outside
        downloadModal.addEventListener('click', (e) => {
            if (e.target === downloadModal) {
                hideDownloadModal();
            }
        });

        function hideDownloadModal() {
            downloadModal.classList.remove('flex');
            downloadModal.classList.add('hidden');
            // Reset form
            if (checkboxes.length) {
                checkboxes.forEach(checkbox => checkbox.checked = false);
            }
            if (otherPurposeField) {
                otherPurposeField.classList.add('hidden');
            }
        }

        // Toggle other purpose text field
        if (otherCheckbox && otherPurposeField) {
            otherCheckbox.addEventListener('change', (e) => {
                if (e.target.checked) {
                    otherPurposeField.classList.remove('hidden');
                } else {
                    otherPurposeField.classList.add('hidden');
                }
            });
        }

        // Validate form before submission
        if (downloadForm) {
            downloadForm.addEventListener('submit', (e) => {
                // Don't prevent default submission at start
                
                const checkedBoxes = Array.from(checkboxes).filter(cb => cb.checked);
                
                if (checkedBoxes.length === 0) {
                    e.preventDefault(); // Now prevent default
                    alert('Please select at least one purpose for downloading.');
                    return false;
                }

                if (otherCheckbox && otherCheckbox.checked && downloadForm.other_purpose_text && !downloadForm.other_purpose_text.value.trim()) {
                    e.preventDefault(); // Now prevent default
                    alert('Please specify your other purpose.');
                    return false;
                }

                // If we got here, form is valid, let it submit
                console.log('Form is valid, submitting...');
                return true;
            });
        }
    </script>

    <style>
        /* Animation classes */
        .animate-fadeIn {
            animation: fadeIn 0.3s ease-in-out;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        
        /* Hide scrollbar but allow scrolling */
        .hide-scrollbar::-webkit-scrollbar {
            display: none;
        }
        
        .hide-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
        
        /* Adjust margin-top for smooth scrolling to sections */
        .scroll-mt-20 {
            scroll-margin-top: 5rem;
        }
        
        /* Allow iframe content to be focused */
        iframe {
            pointer-events: auto;
        }
    </style>
</x-app-layout>