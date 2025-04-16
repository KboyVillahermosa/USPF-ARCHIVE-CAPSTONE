<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $type === 'faculty' ? 'Faculty Research Repository' : 'Research Repository' }}
            </h2>
            <div>
                @php
                    // Check if user has faculty or admin role based on a "role" column or property
                    $isFaculty = auth()->user()->role === 'faculty' || auth()->user()->role === 'admin';
                    $isStudent = auth()->user()->role === 'student';
                @endphp
                
                @if($isFaculty)
                    <a href="{{ route('research.faculty.create') }}" class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded">
                        Add Faculty Research
                    </a>
                @elseif($isStudent)
                    <a href="{{ route('research.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Add Research Project
                    </a>
                @endif
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Filter Section -->
            <div class="mb-8 bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-medium mb-4">Filter Research</h3>
                <form action="{{ route('research.index') }}" method="GET" class="grid grid-cols-1 md:grid-cols-4 gap-6">
                    <div>
                        <label for="department" class="block text-sm font-medium text-gray-700 mb-1">Department</label>
                        <select name="department" id="department" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                            <option value="">All Departments</option>
                            @foreach($departments as $dept)
                                <option value="{{ $dept }}" {{ request('department') == $dept ? 'selected' : '' }}>{{ $dept }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="type" class="block text-sm font-medium text-gray-700 mb-1">Type</label>
                        <select name="type" id="type" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                            <option value="">All Types</option>
                            <option value="faculty" {{ request('type') == 'faculty' ? 'selected' : '' }}>Faculty Research</option>
                            <option value="student" {{ request('type') == 'student' ? 'selected' : '' }}>Student Projects</option>
                        </select>
                    </div>

                    <div>
                        <label for="search" class="block text-sm font-medium text-gray-700 mb-1">Search</label>
                        <input type="text" name="search" id="search" value="{{ request('search') }}" placeholder="Search by title, author, or keywords" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>

                    <div class="flex items-end">
                        <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">
                            Apply Filters
                        </button>
                    </div>

                    @if(request('department') || request('type') || request('search'))
                        <div class="md:col-span-4">
                            <a href="{{ route('research.index') }}" class="text-indigo-600 hover:text-indigo-900">
                                <i class="fas fa-times-circle mr-1"></i> Clear all filters
                            </a>
                        </div>
                    @endif
                </form>
            </div>

            @if(session('success'))
                <div class="mb-4 bg-green-100 border-l-4 border-green-500 text-green-700 p-4" role="alert">
                    <p>{{ session('success') }}</p>
                </div>
            @endif

            <!-- Research Grid -->
            <div class="mb-8">
                <h3 class="text-xl font-semibold mb-6">
                    {{ $type === 'faculty' ? 'Faculty Research Projects' : ($type === 'student' ? 'Student Research Projects' : 'All Research Projects') }}
                    @if($department)
                        - {{ $department }}
                    @endif
                </h3>
                
                @if($projects->count() > 0)
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($projects as $project)
                            <div class="bg-white rounded-xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden border border-gray-100">
                                <div class="relative">
                                    @if($project->banner_image)
                                        <img src="{{ asset('storage/' . $project->banner_image) }}" 
                                             alt="Research Banner"
                                             class="w-full h-48 object-cover transform hover:scale-105 transition-transform duration-300">
                                    @else
                                        <div class="w-full h-48 bg-gradient-to-r {{ $project->faculty_research ? 'from-purple-600 to-indigo-800' : 'from-blue-600 to-blue-800' }} flex items-center justify-center">
                                            <i class="fas {{ $project->faculty_research ? 'fa-chalkboard-teacher' : 'fa-file-alt' }} text-6xl text-white opacity-30"></i>
                                        </div>
                                    @endif
                                    <div class="absolute top-4 right-4 {{ $project->faculty_research ? 'bg-purple-500' : 'bg-blue-500' }} text-white px-3 py-1 rounded-full text-sm">
                                        {{ $project->faculty_research ? 'Faculty Research' : $project->curriculum }}
                                    </div>
                                </div>

                                <div class="p-6">
                                    <h4 class="font-bold text-xl mb-3 text-gray-900 line-clamp-2">
                                        {{ Str::limit($project->project_name, 60, '...') }}
                                    </h4>

                                    <div class="space-y-2 mb-4 text-gray-600 text-sm">
                                        <p class="flex items-center">
                                            <i class="fas {{ $project->faculty_research ? 'fa-user-tie' : 'fa-users' }} w-5 {{ $project->faculty_research ? 'text-purple-500' : 'text-blue-500' }}"></i>
                                            <span class="ml-2">{{ Str::limit($project->members, 40, '...') }}</span>
                                        </p>
                                        <p class="flex items-center">
                                            <i class="fas fa-building w-5 {{ $project->faculty_research ? 'text-purple-500' : 'text-blue-500' }}"></i>
                                            <span class="ml-2">{{ $project->department }}</span>
                                        </p>
                                        <p class="flex items-center">
                                            <i class="fas fa-calendar-alt w-5 {{ $project->faculty_research ? 'text-purple-500' : 'text-blue-500' }}"></i>
                                            <span class="ml-2">{{ $project->created_at->format('F d, Y') }}</span>
                                        </p>
                                        <div class="flex justify-between mt-1">
                                            <p class="flex items-center">
                                                <i class="fas fa-eye w-5 text-gray-400"></i>
                                                <span class="ml-2">{{ $project->view_count ?? 0 }}</span>
                                            </p>
                                            <p class="flex items-center">
                                                <i class="fas fa-download w-5 text-gray-400"></i>
                                                <span class="ml-2">{{ $project->download_count ?? 0 }}</span>
                                            </p>
                                        </div>
                                    </div>

                                    <a href="{{ route('research.show', $project->id) }}"
                                       class="inline-flex items-center justify-center w-full bg-gray-50 {{ $project->faculty_research ? 'text-purple-500 hover:bg-purple-500' : 'text-blue-500 hover:bg-blue-500' }} px-4 py-2 rounded-lg hover:text-white transition-colors duration-300 font-medium">
                                        View Details
                                        <i class="fas fa-arrow-right ml-2"></i>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    <div class="mt-8">
                        {{ $projects->appends(request()->query())->links() }}
                    </div>
                @else
                    <div class="bg-white rounded-lg shadow-sm p-8 text-center">
                        <div class="text-5xl text-gray-300 mb-4">
                            <i class="fas {{ $type === 'faculty' ? 'fa-chalkboard-teacher' : 'fa-search' }}"></i>
                        </div>
                        <h3 class="text-lg font-medium text-gray-700 mb-2">No Research Found</h3>
                        <p class="text-gray-500">There are no research projects matching your criteria.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>