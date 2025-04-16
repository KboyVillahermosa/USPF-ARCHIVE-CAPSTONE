<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Research History') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Statistics Overview -->
            <div class="mb-8 grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border-l-4 border-blue-500">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-blue-100 mr-4">
                            <i class="fas fa-file-alt text-blue-500 text-xl"></i>
                        </div>
                        <div>
                            <div class="text-sm text-gray-500 font-medium">Student Research</div>
                            <div class="text-2xl font-bold">{{ $userProjects->count() }}</div>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border-l-4 border-purple-500">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-purple-100 mr-4">
                            <i class="fas fa-chalkboard-teacher text-purple-500 text-xl"></i>
                        </div>
                        <div>
                            <div class="text-sm text-gray-500 font-medium">Faculty Research</div>
                            <div class="text-2xl font-bold">{{ $facultyResearch->count() }}</div>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border-l-4 border-green-500">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-green-100 mr-4">
                            <i class="fas fa-book text-green-500 text-xl"></i>
                        </div>
                        <div>
                            <div class="text-sm text-gray-500 font-medium">Dissertations & Theses</div>
                            <div class="text-2xl font-bold">{{ $dissertations->count() }}</div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Tabbed Navigation for Research Types -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-8">
                <div x-data="{ activeTab: 'student' }" class="border-b border-gray-200">
                    <nav class="flex -mb-px">
                        <button @click="activeTab = 'student'" :class="{'border-blue-500 text-blue-600': activeTab === 'student'}" 
                                class="w-1/3 py-4 px-1 text-center border-b-2 font-medium text-sm transition-colors duration-200">
                            <i class="fas fa-file-alt mr-2"></i> Student Research
                        </button>
                        <button @click="activeTab = 'faculty'" :class="{'border-purple-500 text-purple-600': activeTab === 'faculty'}" 
                                class="w-1/3 py-4 px-1 text-center border-b-2 font-medium text-sm transition-colors duration-200">
                            <i class="fas fa-chalkboard-teacher mr-2"></i> Faculty Research
                        </button>
                        <button @click="activeTab = 'dissertation'" :class="{'border-green-500 text-green-600': activeTab === 'dissertation'}" 
                                class="w-1/3 py-4 px-1 text-center border-b-2 font-medium text-sm transition-colors duration-200">
                            <i class="fas fa-book mr-2"></i> Dissertations & Theses
                        </button>
                    </nav>

                    <!-- Student Research Tab -->
                    <div x-show="activeTab === 'student'" class="p-6">
                        @if($userProjects->count() > 0)
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Department</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Analytics</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach($userProjects as $project)
                                            <tr class="hover:bg-gray-50">
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        @if($project->banner_image)
                                                            <div class="flex-shrink-0 h-10 w-10">
                                                                <img class="h-10 w-10 rounded-md object-cover" src="{{ asset('storage/' . $project->banner_image) }}" alt="">
                                                            </div>
                                                        @else
                                                            <div class="flex-shrink-0 h-10 w-10 bg-blue-100 flex items-center justify-center rounded-md">
                                                                <i class="fas fa-file-alt text-blue-500"></i>
                                                            </div>
                                                        @endif
                                                        <div class="ml-4">
                                                            <div class="text-sm font-medium text-gray-900">
                                                                {{ Str::limit($project->project_name, 40) }}
                                                            </div>
                                                            <div class="text-sm text-gray-500">
                                                                {{ Str::limit($project->members, 30) }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm text-gray-900">{{ $project->department }}</div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    @if($project->approved)
                                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                            Approved
                                                        </span>
                                                    @elseif($project->rejected)
                                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                            Rejected
                                                        </span>
                                                    @else
                                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                                            Pending
                                                        </span>
                                                    @endif
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                    {{ $project->created_at->format('M d, Y') }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                    <div class="flex space-x-3">
                                                        <span class="flex items-center">
                                                            <i class="fas fa-eye text-gray-400 mr-1"></i> {{ $project->view_count ?? 0 }}
                                                        </span>
                                                        <span class="flex items-center">
                                                            <i class="fas fa-download text-gray-400 mr-1"></i> {{ $project->download_count ?? 0 }}
                                                        </span>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                    <a href="{{ route('research.show', $project->id) }}" class="text-blue-600 hover:text-blue-900 mr-3">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    @if(!$project->approved && !$project->rejected)
                                                        <a href="{{ route('research.edit', $project->id) }}" class="text-indigo-600 hover:text-indigo-900">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="text-center py-8">
                                <div class="inline-flex items-center justify-center w-16 h-16 bg-blue-100 rounded-full mb-4">
                                    <i class="fas fa-file-alt text-blue-500 text-2xl"></i>
                                </div>
                                <h3 class="text-gray-600 font-medium mb-2">No Student Research Yet</h3>
                                <p class="text-gray-500 max-w-md mx-auto mb-6">You haven't submitted any student research projects. Start contributing to the repository today.</p>
                                <a href="{{ route('research.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                    <i class="fas fa-plus mr-2"></i> Upload Research
                                </a>
                            </div>
                        @endif
                    </div>

                    <!-- Faculty Research Tab -->
                    <div x-show="activeTab === 'faculty'" class="p-6" x-cloak>
                        @if($facultyResearch->count() > 0)
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Department</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Analytics</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach($facultyResearch as $project)
                                            <tr class="hover:bg-gray-50">
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        @if($project->banner_image)
                                                            <div class="flex-shrink-0 h-10 w-10">
                                                                <img class="h-10 w-10 rounded-md object-cover" src="{{ asset('storage/' . $project->banner_image) }}" alt="">
                                                            </div>
                                                        @else
                                                            <div class="flex-shrink-0 h-10 w-10 bg-purple-100 flex items-center justify-center rounded-md">
                                                                <i class="fas fa-chalkboard-teacher text-purple-500"></i>
                                                            </div>
                                                        @endif
                                                        <div class="ml-4">
                                                            <div class="text-sm font-medium text-gray-900">
                                                                {{ Str::limit($project->project_name, 40) }}
                                                            </div>
                                                            <div class="text-sm text-gray-500">
                                                                {{ Str::limit($project->members, 30) }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm text-gray-900">{{ $project->department }}</div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    @if($project->approved)
                                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                            Approved
                                                        </span>
                                                    @elseif($project->rejected)
                                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                            Rejected
                                                        </span>
                                                    @else
                                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                                            Pending
                                                        </span>
                                                    @endif
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                    {{ $project->created_at->format('M d, Y') }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                    <div class="flex space-x-3">
                                                        <span class="flex items-center">
                                                            <i class="fas fa-eye text-gray-400 mr-1"></i> {{ $project->view_count ?? 0 }}
                                                        </span>
                                                        <span class="flex items-center">
                                                            <i class="fas fa-download text-gray-400 mr-1"></i> {{ $project->download_count ?? 0 }}
                                                        </span>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                    <a href="{{ route('research.show', $project->id) }}" class="text-purple-600 hover:text-purple-900 mr-3">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    @if(!$project->approved && !$project->rejected)
                                                        <a href="{{ route('faculty.research.edit', $project->id) }}" class="text-indigo-600 hover:text-indigo-900">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="text-center py-8">
                                <div class="inline-flex items-center justify-center w-16 h-16 bg-purple-100 rounded-full mb-4">
                                    <i class="fas fa-chalkboard-teacher text-purple-500 text-2xl"></i>
                                </div>
                                <h3 class="text-gray-600 font-medium mb-2">No Faculty Research Yet</h3>
                                <p class="text-gray-500 max-w-md mx-auto mb-6">You haven't submitted any faculty research projects. Share your academic work with the community.</p>
                                <a href="{{ route('faculty.research.create') }}" class="inline-flex items-center px-4 py-2 bg-purple-600 text-white rounded-md hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                                    <i class="fas fa-plus mr-2"></i> Submit Faculty Research
                                </a>
                            </div>
                        @endif
                    </div>

                    <!-- Dissertations Tab -->
                    <div x-show="activeTab === 'dissertation'" class="p-6" x-cloak>
                        @if($dissertations->count() > 0)
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Department</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Year</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach($dissertations as $dissertation)
                                            <tr class="hover:bg-gray-50">
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        <div class="flex-shrink-0 h-10 w-10 {{ $dissertation->type == 'dissertation' ? 'bg-blue-100' : 'bg-green-100' }} flex items-center justify-center rounded-md">
                                                            <i class="fas {{ $dissertation->type == 'dissertation' ? 'fa-book text-blue-500' : 'fa-scroll text-green-500' }}"></i>
                                                        </div>
                                                        <div class="ml-4">
                                                            <div class="text-sm font-medium text-gray-900">
                                                                {{ Str::limit($dissertation->title, 40) }}
                                                            </div>
                                                            <div class="text-sm text-gray-500">
                                                                {{ $dissertation->author }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $dissertation->type == 'dissertation' ? 'bg-blue-100 text-blue-800' : 'bg-green-100 text-green-800' }}">
                                                        {{ ucfirst($dissertation->type) }}
                                                    </span>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm text-gray-900">{{ $dissertation->department }}</div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    @if($dissertation->status == 'approved')
                                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                            Approved
                                                        </span>
                                                    @elseif($dissertation->status == 'rejected')
                                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                            Rejected
                                                        </span>
                                                    @else
                                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                                            Pending
                                                        </span>
                                                    @endif
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                    {{ $dissertation->year }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                    <a href="{{ route('dissertation.show', $dissertation->id) }}" class="text-green-600 hover:text-green-900 mr-3">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    @if($dissertation->status == 'pending')
                                                        <a href="{{ route('dissertation.edit', $dissertation->id) }}" class="text-indigo-600 hover:text-indigo-900">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="text-center py-8">
                                <div class="inline-flex items-center justify-center w-16 h-16 bg-green-100 rounded-full mb-4">
                                    <i class="fas fa-book text-green-500 text-2xl"></i>
                                </div>
                                <h3 class="text-gray-600 font-medium mb-2">No Dissertations or Theses Yet</h3>
                                <p class="text-gray-500 max-w-md mx-auto mb-6">You haven't uploaded any dissertations or theses. Share your academic achievements with the community.</p>
                                <a href="{{ route('dissertation.create') }}" class="inline-flex items-center px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                    <i class="fas fa-plus mr-2"></i> Upload Dissertation
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            
            <!-- Research Metrics Card -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Research Metrics</h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Publications by Type Chart -->
                    <div class="bg-white p-4 rounded-lg border border-gray-200">
                        <h4 class="text-sm font-medium text-gray-700 mb-4">Publications by Type</h4>
                        <div class="h-64" id="publications-chart"></div>
                    </div>
                    
                    <!-- Views and Downloads Chart -->
                    <div class="bg-white p-4 rounded-lg border border-gray-200">
                        <h4 class="text-sm font-medium text-gray-700 mb-4">Research Impact</h4>
                        <div class="h-64" id="impact-chart"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Publications by Type Chart
            var options = {
                series: [{
                    name: 'Publications',
                    data: [
                        {{ $userProjects->count() }}, 
                        {{ $facultyResearch->count() }}, 
                        {{ $dissertations->where('type', 'dissertation')->count() }}, 
                        {{ $dissertations->where('type', 'thesis')->count() }}
                    ]
                }],
                chart: {
                    type: 'bar',
                    height: 250,
                    toolbar: {
                        show: false
                    }
                },
                plotOptions: {
                    bar: {
                        borderRadius: 4,
                        horizontal: false,
                        columnWidth: '55%',
                    },
                },
                dataLabels: {
                    enabled: false
                },
                colors: ['#3b82f6', '#8b5cf6', '#10b981', '#f59e0b'],
                xaxis: {
                    categories: ['Student Research', 'Faculty Research', 'Dissertations', 'Theses'],
                },
                yaxis: {
                    title: {
                        text: 'Number of Publications'
                    }
                },
                fill: {
                    opacity: 1
                },
                tooltip: {
                    y: {
                        formatter: function (val) {
                            return val + " publications"
                        }
                    }
                }
            };

            var publicationsChart = new ApexCharts(document.querySelector("#publications-chart"), options);
            publicationsChart.render();
            
            // Research Impact Chart
            // Calculate total views and downloads
            let totalStudentViews = {{ $userProjects->sum('view_count') ?? 0 }};
            let totalStudentDownloads = {{ $userProjects->sum('download_count') ?? 0 }};
            let totalFacultyViews = {{ $facultyResearch->sum('view_count') ?? 0 }};
            let totalFacultyDownloads = {{ $facultyResearch->sum('download_count') ?? 0 }};
            
            var impactOptions = {
                series: [{
                    name: 'Views',
                    data: [totalStudentViews, totalFacultyViews]
                }, {
                    name: 'Downloads',
                    data: [totalStudentDownloads, totalFacultyDownloads]
                }],
                chart: {
                    type: 'bar',
                    height: 250,
                    stacked: false,
                    toolbar: {
                        show: false
                    }
                },
                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: '55%',
                    },
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    show: true,
                    width: 2,
                    colors: ['transparent']
                },
                xaxis: {
                    categories: ['Student Research', 'Faculty Research'],
                },
                yaxis: {
                    title: {
                        text: 'Count'
                    }
                },
                fill: {
                    opacity: 1
                },
                tooltip: {
                    y: {
                        formatter: function (val) {
                            return val
                        }
                    }
                },
                colors: ['#3b82f6', '#10b981']
            };

            var impactChart = new ApexCharts(document.querySelector("#impact-chart"), options);
            impactChart.render();
        });
    </script>
    @endpush
</x-app-layout>