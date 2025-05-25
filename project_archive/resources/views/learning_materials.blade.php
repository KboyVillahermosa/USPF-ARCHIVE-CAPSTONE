<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Research Learning Materials') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Introduction Section -->
            <div class="bg-gradient-to-r from-blue-600 to-blue-800 rounded-lg shadow-lg mb-8 overflow-hidden">
                <div class="md:flex">
                    <div class="md:w-2/3 p-8">
                        <h1 class="text-3xl font-bold text-white mb-4">Research Skills Development</h1>
                        <p class="text-blue-100 text-lg mb-6">
                            Enhance your research capabilities with our comprehensive learning materials designed for USPF students and faculty.
                        </p>
                        <div class="flex flex-wrap gap-3">
                            <a href="#methodology" class="bg-white text-blue-700 px-4 py-2 rounded-full text-sm font-medium hover:bg-blue-50 transition">
                                Research Methodology
                            </a>
                            <a href="#writing" class="bg-white text-blue-700 px-4 py-2 rounded-full text-sm font-medium hover:bg-blue-50 transition">
                                Academic Writing
                            </a>
                            <a href="#templates" class="bg-white text-blue-700 px-4 py-2 rounded-full text-sm font-medium hover:bg-blue-50 transition">
                                Template
                            </a>
                            <a href="#videos" class="bg-white text-blue-700 px-4 py-2 rounded-full text-sm font-medium hover:bg-blue-50 transition">
                                Video Tutorials
                            </a>
                        </div>
                    </div>
                    <div class="md:w-1/3 bg-blue-800 flex items-center justify-center p-6">
                        <img src="{{ asset('images/image5.jpg') }}" alt="Research Illustration" class="h-48">
                    </div>
                </div>
            </div>

            <!-- Research Methodology Section -->
            <section id="methodology" class="mb-12">
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <div class="border-b border-gray-200">
                        <div class="px-6 py-4">
                            <h2 class="text-2xl font-bold text-gray-900 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                                </svg>
                                Research Methodology
                            </h2>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <!-- Qualitative Research -->
                            <div class="border rounded-lg overflow-hidden hover:shadow-md transition-shadow">
                                <div class="bg-blue-50 p-4">
                                    <h3 class="font-semibold text-lg text-gray-900 mb-2">Qualitative Research</h3>
                                    <p class="text-sm text-gray-600">
                                        Learn about interviews, focus groups, observations, and textual analysis.
                                    </p>
                                </div>
                                <div class="p-4 bg-white">
                                    <ul class="space-y-2 text-sm">
                                        <li class="flex items-center">
                                            <svg class="h-4 w-4 text-blue-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            Interviews & Focus Groups
                                        </li>
                                        <li class="flex items-center">
                                            <svg class="h-4 w-4 text-blue-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            Case Studies
                                        </li>
                                        <li class="flex items-center">
                                            <svg class="h-4 w-4 text-blue-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            Content Analysis
                                        </li>
                                    </ul>
                                    <a href="#" class="mt-4 text-blue-600 hover:text-blue-800 flex items-center text-sm font-medium">
                                        View Materials
                                        <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                        </svg>
                                    </a>
                                </div>
                            </div>

                            <!-- Quantitative Research -->
                            <div class="border rounded-lg overflow-hidden hover:shadow-md transition-shadow">
                                <div class="bg-indigo-50 p-4">
                                    <h3 class="font-semibold text-lg text-gray-900 mb-2">Quantitative Research</h3>
                                    <p class="text-sm text-gray-600">
                                        Explore surveys, experiments, statistical analysis, and hypothesis testing.
                                    </p>
                                </div>
                                <div class="p-4 bg-white">
                                    <ul class="space-y-2 text-sm">
                                        <li class="flex items-center">
                                            <svg class="h-4 w-4 text-indigo-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            Survey Design
                                        </li>
                                        <li class="flex items-center">
                                            <svg class="h-4 w-4 text-indigo-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            Statistical Methods
                                        </li>
                                        <li class="flex items-center">
                                            <svg class="h-4 w-4 text-indigo-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            Experimental Design
                                        </li>
                                    </ul>
                                    <a href="#" class="mt-4 text-indigo-600 hover:text-indigo-800 flex items-center text-sm font-medium">
                                        View Materials
                                        <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                        </svg>
                                    </a>
                                </div>
                            </div>

                            <!-- Research Process -->
                            <div class="border rounded-lg overflow-hidden hover:shadow-md transition-shadow">
                                <div class="bg-purple-50 p-4">
                                    <h3 class="font-semibold text-lg text-gray-900 mb-2">Research Process</h3>
                                    <p class="text-sm text-gray-600">
                                        Step-by-step guide to planning and executing research projects.
                                    </p>
                                </div>
                                <div class="p-4 bg-white">
                                    <ul class="space-y-2 text-sm">
                                        <li class="flex items-center">
                                            <svg class="h-4 w-4 text-purple-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            Problem Formulation
                                        </li>
                                        <li class="flex items-center">
                                            <svg class="h-4 w-4 text-purple-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            Literature Review
                                        </li>
                                        <li class="flex items-center">
                                            <svg class="h-4 w-4 text-purple-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            Methodology Selection
                                        </li>
                                    </ul>
                                    <a href="#" class="mt-4 text-purple-600 hover:text-purple-800 flex items-center text-sm font-medium">
                                        View Materials
                                        <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Academic Writing Section -->
            <section id="writing" class="mb-12">
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <div class="border-b border-gray-200">
                        <div class="px-6 py-4">
                            <h2 class="text-2xl font-bold text-gray-900 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                                Academic Writing
                            </h2>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Citation Styles -->
                            <div class="bg-amber-50 rounded-lg p-6">
                                <h3 class="font-semibold text-xl text-gray-900 mb-4">Citation Styles</h3>
                                <p class="text-gray-600 mb-4">
                                    Comprehensive guides to properly format citations and references.
                                </p>
                                <div class="space-y-4">
                                    <div class="bg-white p-3 rounded-lg shadow-sm">
                                        <h4 class="font-medium text-gray-900 mb-1">APA Style (7th Edition)</h4>
                                        <p class="text-sm text-gray-600 mb-2">American Psychological Association format</p>
                                        <a href="#" class="text-amber-600 text-sm flex items-center">Download Guide <svg class="ml-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg></a>
                                    </div>
                                    <div class="bg-white p-3 rounded-lg shadow-sm">
                                        <h4 class="font-medium text-gray-900 mb-1">MLA Style (9th Edition)</h4>
                                        <p class="text-sm text-gray-600 mb-2">Modern Language Association format</p>
                                        <a href="#" class="text-amber-600 text-sm flex items-center">Download Guide <svg class="ml-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg></a>
                                    </div>
                                    <div class="bg-white p-3 rounded-lg shadow-sm">
                                        <h4 class="font-medium text-gray-900 mb-1">IEEE Citation Style</h4>
                                        <p class="text-sm text-gray-600 mb-2">Institute of Electrical and Electronics Engineers format</p>
                                        <a href="#" class="text-amber-600 text-sm flex items-center">Download Guide <svg class="ml-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg></a>
                                    </div>
                                </div>
                            </div>

                            <!-- Writing Guides -->
                            <div class="bg-green-50 rounded-lg p-6">
                                <h3 class="font-semibold text-xl text-gray-900 mb-4">Academic Writing Guides</h3>
                                <p class="text-gray-600 mb-4">
                                    Resources to help you write effectively and avoid common pitfalls.
                                </p>
                                <div class="space-y-4">
                                    <div class="bg-white p-4 rounded-lg shadow-sm flex">
                                        <div class="bg-green-100 rounded p-2 mr-4">
                                            <svg class="h-6 w-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                            </svg>
                                        </div>
                                        <div>
                                            <h4 class="font-medium text-gray-900 mb-1">Avoiding Plagiarism</h4>
                                            <p class="text-sm text-gray-600 mb-1">Guidelines for proper citation and academic integrity</p>
                                            <a href="#" class="text-green-600 text-sm">Read Guide →</a>
                                        </div>
                                    </div>
                                    <div class="bg-white p-4 rounded-lg shadow-sm flex">
                                        <div class="bg-green-100 rounded p-2 mr-4">
                                            <svg class="h-6 w-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                            </svg>
                                        </div>
                                        <div>
                                            <h4 class="font-medium text-gray-900 mb-1">Literature Review Writing</h4>
                                            <p class="text-sm text-gray-600 mb-1">How to write comprehensive literature reviews</p>
                                            <a href="#" class="text-green-600 text-sm">Read Guide →</a>
                                        </div>
                                    </div>
                                    <div class="bg-white p-4 rounded-lg shadow-sm flex">
                                        <div class="bg-green-100 rounded p-2 mr-4">
                                            <svg class="h-6 w-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                            </svg>
                                        </div>
                                        <div>
                                            <h4 class="font-medium text-gray-900 mb-1">Scientific Writing Style</h4>
                                            <p class="text-sm text-gray-600 mb-1">Best practices for clarity and precision</p>
                                            <a href="#" class="text-green-600 text-sm">Read Guide →</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Templates Section -->
            <section id="templates" class="mb-12">
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <div class="border-b border-gray-200">
                        <div class="px-6 py-4">
                            <h2 class="text-2xl font-bold text-gray-900 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z" />
                                </svg>
                                Templates & Examples
                            </h2>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div class="border rounded-lg overflow-hidden hover:shadow-md transition-shadow">
                                <div class="bg-gray-100 p-4 flex items-center justify-center">
                                    <img src="{{ asset('images/doc-icon.svg') }}" alt="Document" class="h-20">
                                </div>
                                <div class="p-4">
                                    <h3 class="font-semibold text-gray-900 mb-2">Research Paper Template</h3>
                                    <p class="text-sm text-gray-600 mb-4">Standard format for undergraduate research papers</p>
                                    <a href="#" class="inline-flex items-center text-blue-600 hover:text-blue-800 text-sm">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                        </svg>
                                        Download (.docx)
                                    </a>
                                </div>
                            </div>
                            
                            <div class="border rounded-lg overflow-hidden hover:shadow-md transition-shadow">
                                <div class="bg-gray-100 p-4 flex items-center justify-center">
                                    <img src="{{ asset('images/doc-icon.svg') }}" alt="Document" class="h-20">
                                </div>
                                <div class="p-4">
                                    <h3 class="font-semibold text-gray-900 mb-2">Thesis Outline Template</h3>
                                    <p class="text-sm text-gray-600 mb-4">Structure and formatting for thesis documents</p>
                                    <a href="#" class="inline-flex items-center text-blue-600 hover:text-blue-800 text-sm">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                        </svg>
                                        Download (.docx)
                                    </a>
                                </div>
                            </div>
                            
                            <div class="border rounded-lg overflow-hidden hover:shadow-md transition-shadow">
                                <div class="bg-gray-100 p-4 flex items-center justify-center">
                                    <img src="{{ asset('images/doc-icon.svg') }}" alt="Document" class="h-20">
                                </div>
                                <div class="p-4">
                                    <h3 class="font-semibold text-gray-900 mb-2">Literature Review Template</h3>
                                    <p class="text-sm text-gray-600 mb-4">Format for comprehensive literature reviews</p>
                                    <a href="#" class="inline-flex items-center text-blue-600 hover:text-blue-800 text-sm">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                        </svg>
                                        Download (.docx)
                                    </a>
                                </div>
                            </div>
                        </div>
                        
                        <h3 class="font-semibold text-xl text-gray-900 mt-8 mb-4">Example Research Papers</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="border rounded-lg p-5 hover:shadow-md transition-shadow">
                                <div class="flex items-start">
                                    <div class="flex-shrink-0 bg-red-100 rounded-lg p-3 mr-4">
                                        <svg class="h-8 w-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="font-medium text-lg text-gray-900 mb-1">Sample Quantitative Research</h4>
                                        <p class="text-sm text-gray-600 mb-2">
                                            An example of a well-structured quantitative research paper with proper methodology.
                                        </p>
                                        <a href="#" class="inline-flex items-center text-red-600 hover:text-red-800 text-sm font-medium">
                                            View Sample (PDF)
                                            <svg class="ml-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M11 3a1 1 0 100 2h2.586l-6.293 6.293a1 1 0 101.414 1.414L15 6.414V9a1 1 0 102 0V4a1 1 0 00-1-1h-5z" />
                                                <path d="M5 5a2 2 0 00-2 2v8a2 2 0 002 2h8a2 2 0 002-2v-3a1 1 0 10-2 0v3H5V7h3a1 1 0 000-2H5z" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="border rounded-lg p-5 hover:shadow-md transition-shadow">
                                <div class="flex items-start">
                                    <div class="flex-shrink-0 bg-red-100 rounded-lg p-3 mr-4">
                                        <svg class="h-8 w-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="font-medium text-lg text-gray-900 mb-1">Sample Literature Review</h4>
                                        <p class="text-sm text-gray-600 mb-2">
                                            Award-winning literature review with comprehensive analysis and synthesis.
                                        </p>
                                        <a href="#" class="inline-flex items-center text-red-600 hover:text-red-800 text-sm font-medium">
                                            View Sample (PDF)
                                            <svg class="ml-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M11 3a1 1 0 100 2h2.586l-6.293 6.293a1 1 0 101.414 1.414L15 6.414V9a1 1 0 102 0V4a1 1 0 00-1-1h-5z" />
                                                <path d="M5 5a2 2 0 00-2 2v8a2 2 0 002 2h8a2 2 0 002-2v-3a1 1 0 10-2 0v3H5V7h3a1 1 0 000-2H5z" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Video Tutorials Section -->
            <section id="videos" class="mb-12">
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <div class="border-b border-gray-200">
                        <div class="px-6 py-4">
                            <h2 class="text-2xl font-bold text-gray-900 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                                </svg>
                                Video Tutorials
                            </h2>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            <!-- Video 1 -->
                            <div class="rounded-lg overflow-hidden shadow-sm border border-gray-200 hover:shadow-md transition-shadow">
                                <div class="relative">
                                    <div class="aspect-w-16 aspect-h-9 bg-gray-100">
                                        <div class="flex items-center justify-center">
                                            <svg class="h-20 w-20 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="absolute inset-0 flex items-center justify-center">
                                        <button class="h-16 w-16 rounded-full bg-blue-600 bg-opacity-90 flex items-center justify-center hover:bg-opacity-100 transition">
                                            <svg class="h-8 w-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M8 5v14l11-7z" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                <div class="p-4">
                                    <h3 class="font-semibold text-gray-900 mb-1">How to Formulate a Research Problem</h3>
                                    <p class="text-sm text-gray-600 mb-2">Learn techniques for identifying and articulating research problems.</p>
                                    <div class="flex items-center justify-between mt-3">
                                        <span class="text-xs text-gray-500">Duration: 15:30</span>
                                        <span class="text-xs text-green-600 bg-green-50 px-2 py-1 rounded">Beginner</span>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Video 2 -->
                            <div class="rounded-lg overflow-hidden shadow-sm border border-gray-200 hover:shadow-md transition-shadow">
                                <div class="relative">
                                    <div class="aspect-w-16 aspect-h-9 bg-gray-100">
                                        <div class="flex items-center justify-center">
                                            <svg class="h-20 w-20 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="absolute inset-0 flex items-center justify-center">
                                        <button class="h-16 w-16 rounded-full bg-blue-600 bg-opacity-90 flex items-center justify-center hover:bg-opacity-100 transition">
                                            <svg class="h-8 w-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M8 5v14l11-7z" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                <div class="p-4">
                                    <h3 class="font-semibold text-gray-900 mb-1">Data Analysis Techniques</h3>
                                    <p class="text-sm text-gray-600 mb-2">Introduction to qualitative and quantitative data analysis methods.</p>
                                    <div class="flex items-center justify-between mt-3">
                                        <span class="text-xs text-gray-500">Duration: 22:45</span>
                                        <span class="text-xs text-yellow-600 bg-yellow-50 px-2 py-1 rounded">Intermediate</span>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Video 3 -->
                            <div class="rounded-lg overflow-hidden shadow-sm border border-gray-200 hover:shadow-md transition-shadow">
                                <div class="relative">
                                    <div class="aspect-w-16 aspect-h-9 bg-gray-100">
                                        <div class="flex items-center justify-center">
                                            <svg class="h-20 w-20 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="absolute inset-0 flex items-center justify-center">
                                        <button class="h-16 w-16 rounded-full bg-blue-600 bg-opacity-90 flex items-center justify-center hover:bg-opacity-100 transition">
                                            <svg class="h-8 w-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M8 5v14l11-7z" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                <div class="p-4">
                                    <h3 class="font-semibold text-gray-900 mb-1">Thesis Defense Preparation</h3>
                                    <p class="text-sm text-gray-600 mb-2">How to prepare for and deliver an effective thesis defense presentation.</p>
                                    <div class="flex items-center justify-between mt-3">
                                        <span class="text-xs text-gray-500">Duration: 18:15</span>
                                        <span class="text-xs text-red-600 bg-red-50 px-2 py-1 rounded">Advanced</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Video Playlist -->
                        <div class="mt-6 bg-gray-50 rounded-lg p-4 border border-gray-200">
                            <h3 class="font-semibold text-lg text-gray-900 mb-3">Complete Research Process Playlist</h3>
                            <p class="text-sm text-gray-600 mb-4">A comprehensive series of videos covering the entire research process from start to finish.</p>
                            
                            <div class="space-y-2">
                                <div class="bg-white rounded p-3 flex items-center hover:bg-blue-50 transition cursor-pointer border border-gray-100">
                                    <div class="flex-shrink-0 mr-3 text-blue-600">
                                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <div class="flex-grow">
                                        <p class="font-medium text-sm">1. Getting Started with Research</p>
                                    </div>
                                    <div class="flex-shrink-0 text-xs text-gray-500">8:45</div>
                                </div>
                                
                                <div class="bg-white rounded p-3 flex items-center hover:bg-blue-50 transition cursor-pointer border border-gray-100">
                                    <div class="flex-shrink-0 mr-3 text-blue-600">
                                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <div class="flex-grow">
                                        <p class="font-medium text-sm">2. Literature Review Techniques</p>
                                    </div>
                                    <div class="flex-shrink-0 text-xs text-gray-500">12:30</div>
                                </div>
                                
                                <div class="bg-white rounded p-3 flex items-center hover:bg-blue-50 transition cursor-pointer border border-gray-100">
                                    <div class="flex-shrink-0 mr-3 text-blue-600">
                                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <div class="flex-grow">
                                        <p class="font-medium text-sm">3. Methodology Selection</p>
                                    </div>
                                    <div class="flex-shrink-0 text-xs text-gray-500">15:20</div>
                                </div>
                                
                                <a href="#" class="text-blue-600 hover:text-blue-800 text-sm font-medium flex items-center justify-center mt-4">
                                    View Complete Playlist (10 videos)
                                    <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Additional Resources -->
            <section class="mb-12">
                <div class="bg-blue-50 rounded-lg shadow-md overflow-hidden border border-blue-100">
                    <div class="p-6">
                        <h2 class="text-2xl font-bold text-gray-900 mb-4">Additional Resources</h2>
                        <p class="text-gray-600 mb-6">
                            Explore these external resources to further enhance your research skills.
                        </p>
                        
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <a href="#" class="bg-white rounded-lg p-4 border border-gray-200 hover:border-blue-300 transition flex flex-col h-full">
                                <h3 class="font-semibold text-gray-900 mb-2">USPF Library Database</h3>
                                <p class="text-sm text-gray-600 mb-4 flex-grow">Access the university's comprehensive library of academic journals and books.</p>
                                <span class="text-blue-600 text-sm flex items-center mt-auto">Access Database <svg class="ml-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M11 3a1 1 0 100 2h2.586l-6.293 6.293a1 1 0 101.414 1.414L15 6.414V9a1 1 0 102 0V4a1 1 0 00-1-1h-5z"></path><path d="M5 5a2 2 0 00-2 2v8a2 2 0 002 2h8a2 2 0 002-2v-3a1 1 0 10-2 0v3H5V7h3a1 1 0 000-2H5z"></path></svg></span>
                            </a>
                            
                            <a href="#" class="bg-white rounded-lg p-4 border border-gray-200 hover:border-blue-300 transition flex flex-col h-full">
                                <h3 class="font-semibold text-gray-900 mb-2">Research Ethics Committee</h3>
                                <p class="text-sm text-gray-600 mb-4 flex-grow">Guidelines and forms for research ethics approval.</p>
                                <span class="text-blue-600 text-sm flex items-center mt-auto">View Guidelines <svg class="ml-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M11 3a1 1 0 100 2h2.586l-6.293 6.293a1 1 0 101.414 1.414L15 6.414V9a1 1 0 102 0V4a1 1 0 00-1-1h-5z"></path><path d="M5 5a2 2 0 00-2 2v8a2 2 0 002 2h8a2 2 0 002-2v-3a1 1 0 10-2 0v3H5V7h3a1 1 0 000-2H5z"></path></svg></span>
                            </a>
                            
                            <a href="#" class="bg-white rounded-lg p-4 border border-gray-200 hover:border-blue-300 transition flex flex-col h-full">
                                <h3 class="font-semibold text-gray-900 mb-2">Academic Support Center</h3>
                                <p class="text-sm text-gray-600 mb-4 flex-grow">Schedule consultations with faculty research advisors.</p>
                                <span class="text-blue-600 text-sm flex items-center mt-auto">Book Consultation <svg class="ml-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M11 3a1 1 0 100 2h2.586l-6.293 6.293a1 1 0 101.414 1.414L15 6.414V9a1 1 0 102 0V4a1 1 0 00-1-1h-5z"></path><path d="M5 5a2 2 0 00-2 2v8a2 2 0 002 2h8a2 2 0 002-2v-3a1 1 0 10-2 0v3H5V7h3a1 1 0 000-2H5z"></path></svg></span>
                            </a>
                        </div>
                    </div>
                </div>
            </section>
            
            <!-- Feedback Section -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden mb-12">
                <div class="p-6">
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">Feedback & Suggestions</h2>
                    <p class="text-gray-600 mb-6">
                        Have ideas for additional learning materials or spotted any issues? We'd love to hear from you.
                    </p>
                    
                    <form class="space-y-4">
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Your Email</label>
                            <input type="email" id="email" name="email" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>
                        <div>
                            <label for="message" class="block text-sm font-medium text-gray-700 mb-1">Your Feedback</label>
                            <textarea id="message" name="message" rows="4" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"></textarea>
                        </div>
                        <div>
                            <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                Submit Feedback
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>