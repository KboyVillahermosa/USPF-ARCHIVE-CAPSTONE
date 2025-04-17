<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-bold text-2xl text-gray-800 leading-tight">
                <span id="titleDisplay" class="border-b-4 border-indigo-600 pb-1">Upload Dissertation/Thesis</span>
            </h2>
            <a href="{{ route('history') }}" class="inline-flex items-center text-sm text-gray-600 hover:text-indigo-600 transition-colors duration-200">
                <i class="fas fa-history mr-2"></i> View My Archives
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <!-- Show validation errors with enhanced styling -->
            @if ($errors->any())
                <div class="mb-6 bg-red-50 border-l-4 border-red-500 text-red-700 p-4 rounded-r shadow-md animate__animated animate__fadeIn">
                    <div class="flex items-center mb-2">
                        <i class="fas fa-exclamation-circle text-red-500 mr-2 text-lg"></i>
                        <h3 class="font-semibold">Please correct the following errors:</h3>
                    </div>
                    <ul class="list-disc list-inside ml-6 space-y-1 text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Show success message with enhanced styling -->
            @if (session('success'))
                <div class="mb-6 bg-green-50 border-l-4 border-green-500 text-green-700 p-4 rounded-r shadow-md animate__animated animate__fadeIn">
                    <div class="flex items-center">
                        <i class="fas fa-check-circle text-green-500 mr-2 text-lg"></i>
                        <p>{{ session('success') }}</p>
                    </div>
                </div>
            @endif

            <div class="bg-white shadow-xl rounded-lg overflow-hidden">
                <!-- Form Header -->
                <div id="formHeader" class="bg-gradient-to-r from-indigo-600 to-blue-800 px-8 py-4 text-white">
                    <h3 class="text-lg font-semibold">Submit Academic Research</h3>
                    <p class="text-indigo-100 text-sm">Complete all fields for proper documentation and classification</p>
                </div>

                <form action="{{ route('dissertation.store') }}" method="POST" enctype="multipart/form-data" id="dissertationForm" class="p-8">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="space-y-6">
                            <!-- Type with visual selector -->
                            <div>
                                <label class="block text-gray-700 font-semibold mb-2 flex items-center">
                                    <i id="typeIcon" class="fas fa-book text-indigo-600 mr-2"></i>
                                    Type
                                    <span class="text-red-500 ml-1">*</span>
                                </label>
                                <div class="grid grid-cols-2 gap-4">
                                    <div class="relative">
                                        <input type="radio" id="typeDissertation" name="type" value="dissertation" class="peer hidden" 
                                            {{ old('type') == 'dissertation' ? 'checked' : '' }} required>
                                        <label for="typeDissertation" 
                                            class="block p-4 text-center border border-gray-300 rounded-lg cursor-pointer 
                                            peer-checked:border-indigo-600 peer-checked:bg-indigo-50 peer-checked:text-indigo-600 hover:border-indigo-300">
                                            <i class="fas fa-book-open text-xl mb-2"></i>
                                            <div class="font-medium">Dissertation</div>
                                            <div class="text-xs text-gray-500">Doctoral Level</div>
                                        </label>
                                    </div>
                                    <div class="relative">
                                        <input type="radio" id="typeThesis" name="type" value="thesis" class="peer hidden"
                                            {{ old('type') == 'thesis' ? 'checked' : '' }}>
                                        <label for="typeThesis"
                                            class="block p-4 text-center border border-gray-300 rounded-lg cursor-pointer 
                                            peer-checked:border-green-600 peer-checked:bg-green-50 peer-checked:text-green-600 hover:border-green-300">
                                            <i class="fas fa-scroll text-xl mb-2"></i>
                                            <div class="font-medium">Thesis</div>
                                            <div class="text-xs text-gray-500">Master's Level</div>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- Title -->
                            <div>
                                <label class="block text-gray-700 font-semibold mb-2 flex items-center">
                                    <i class="fas fa-heading text-indigo-600 mr-2"></i>
                                    Title
                                    <span class="text-red-500 ml-1">*</span>
                                </label>
                                <input type="text" name="title" value="{{ old('title') }}"
                                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-200" 
                                    placeholder="Enter the full title of your research" required>
                            </div>

                            <!-- Author -->
                            <div>
                                <label class="block text-gray-700 font-semibold mb-2 flex items-center">
                                    <i class="fas fa-user-graduate text-indigo-600 mr-2"></i>
                                    Author
                                    <span class="text-red-500 ml-1">*</span>
                                </label>
                                <input type="text" name="author" value="{{ old('author') }}"
                                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-200" 
                                    placeholder="Enter your full name" required>
                            </div>

                            <!-- Department -->
                            <div>
                                <label class="block text-gray-700 font-semibold mb-2 flex items-center">
                                    <i class="fas fa-university text-indigo-600 mr-2"></i>
                                    Department
                                    <span class="text-red-500 ml-1">*</span>
                                </label>
                                <select name="department" id="dissertation_department"
                                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-200" required>
                                    <option value="">Select Department</option>
                                    <option value="College of Engineering and Architecture" {{ old('department') == 'College of Engineering and Architecture' ? 'selected' : '' }}>College of Engineering and Architecture</option>
                                    <option value="College of Computer Studies" {{ old('department') == 'College of Computer Studies' ? 'selected' : '' }}>College of Computer Studies</option>
                                    <option value="College of Health Sciences" {{ old('department') == 'College of Health Sciences' ? 'selected' : '' }}>College of Health Sciences</option>
                                    <option value="College of Social Work" {{ old('department') == 'College of Social Work' ? 'selected' : '' }}>College of Social Work</option>
                                    <option value="College of Teacher Education, Arts and Sciences" {{ old('department') == 'College of Teacher Education, Arts and Sciences' ? 'selected' : '' }}>College of Teacher Education, Arts and Sciences</option>
                                    <option value="School of Business and Accountancy" {{ old('department') == 'School of Business and Accountancy' ? 'selected' : '' }}>School of Business and Accountancy</option>
                                    <option value="Graduate School" {{ old('department') == 'Graduate School' ? 'selected' : '' }}>Graduate School</option>
                                    <option value="other">Other (specify)</option>
                                </select>
                                <div id="otherDepartmentContainer_dissertation" class="mt-2 hidden">
                                    <input type="text" id="otherDepartment_dissertation"
                                        class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-200"
                                        placeholder="Enter department name">
                                </div>
                            </div>
                        </div>

                        <div class="space-y-6">
                            <!-- Year with modern picker -->
                            <div>
                                <label class="block text-gray-700 font-semibold mb-2 flex items-center">
                                    <i class="fas fa-calendar-alt text-indigo-600 mr-2"></i>
                                    Year Completed
                                    <span class="text-red-500 ml-1">*</span>
                                </label>
                                <div class="relative">
                                    <input type="number" name="year" value="{{ old('year', date('Y')) }}"
                                        class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-200" 
                                        min="1900" max="{{ date('Y') + 1 }}" required>
                                    <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-gray-500">
                                        <i class="fas fa-calendar-check"></i>
                                    </div>
                                </div>
                            </div>

                            <!-- Keywords -->
                            <div>
                                <label class="block text-gray-700 font-semibold mb-2 flex items-center">
                                    <i class="fas fa-tags text-indigo-600 mr-2"></i>
                                    Keywords
                                    <span class="text-red-500 ml-1">*</span>
                                </label>
                                <input type="text" name="keywords" value="{{ old('keywords') }}"
                                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-200" 
                                    placeholder="Enter keywords separated by commas" required>
                                <p class="text-xs text-gray-500 mt-1">Example: machine learning, artificial intelligence, education</p>
                            </div>

                            <!-- Research File Upload -->
                            <div>
                                <label class="block text-gray-700 font-semibold mb-2 flex items-center">
                                    <i class="fas fa-file-pdf text-indigo-600 mr-2"></i>
                                    Document File
                                    <span class="text-red-500 ml-1">*</span>
                                </label>
                                <div id="dissertationFileDropArea"
                                    class="w-full border-2 border-dashed border-gray-300 bg-gray-50 rounded-lg px-6 py-8 text-center cursor-pointer hover:bg-gray-100 hover:border-indigo-500 transition-all duration-200">
                                    <i class="fas fa-file-upload text-indigo-500 text-3xl mb-2"></i>
                                    <p class="text-gray-600">Drag & Drop your file here or <span
                                            class="text-indigo-500 font-semibold">click to browse</span></p>
                                    <p class="text-xs text-gray-500 mt-1">Accepted formats: PDF, DOC, DOCX</p>
                                    <input type="file" name="file" id="dissertationFileInput" class="hidden" accept=".pdf,.doc,.docx"
                                        required>
                                </div>
                                <div id="dissertationFileName" class="flex items-center mt-2 text-sm text-gray-600 hidden p-2 bg-indigo-50 rounded">
                                    <i class="fas fa-paperclip mr-2"></i>
                                    <span></span>
                                </div>

                                <!-- PDF Preview -->
                                <div id="dissertationPdfPreviewContainer" class="hidden mt-4">
                                    <div class="border border-gray-200 rounded-lg overflow-hidden shadow-md">
                                        <div class="bg-gray-100 px-4 py-2 border-b border-gray-200 flex items-center">
                                            <i class="fas fa-file-pdf text-red-500 mr-2"></i>
                                            <span class="font-medium text-sm">Document Preview</span>
                                        </div>
                                        <iframe id="dissertationPdfPreview" class="w-full h-64"></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Abstract with Text Editor -->
                    <div class="mt-8">
                        <label class="block text-gray-700 font-semibold mb-2 flex items-center">
                            <i class="fas fa-align-left text-indigo-600 mr-2"></i>
                            Abstract
                            <span class="text-red-500 ml-1">*</span>
                        </label>
                        <input id="dissertation_abstract" type="hidden" name="abstract" value="{{ old('abstract') }}">
                        <div class="border border-gray-300 rounded-lg overflow-hidden">
                            <trix-editor input="dissertation_abstract"
                                class="min-h-[200px] prose max-w-none focus:outline-none"></trix-editor>
                        </div>
                        <p class="text-xs text-gray-500 mt-1">Provide a concise summary of your research (250-300 words recommended)</p>
                    </div>

                    <!-- Submit Buttons -->
                    <div class="mt-10 flex justify-between items-center">
                        <a href="{{ route('history') }}"
                            class="inline-flex items-center bg-gray-100 hover:bg-gray-200 text-gray-800 px-6 py-3 rounded-lg font-medium shadow-sm transition-all duration-200">
                            <i class="fas fa-history mr-2"></i>
                            My Archives
                        </a>
                            
                        <button type="submit" id="dissertationSubmitButton"
                            class="inline-flex items-center bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-lg font-semibold shadow-md transition-all duration-200">
                            <i class="fas fa-paper-plane mr-2"></i>
                            <span id="submitText">Submit Academic Work</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css">

    <script>
        // Handle custom department
        const departmentSelect = document.getElementById('dissertation_department');
        const otherDepartmentContainer = document.getElementById('otherDepartmentContainer_dissertation');
        const otherDepartment = document.getElementById('otherDepartment_dissertation');
        const dissertationForm = document.getElementById('dissertationForm');
        
        departmentSelect.addEventListener('change', function() {
            if (this.value === 'other') {
                otherDepartmentContainer.classList.remove('hidden');
                otherDepartment.setAttribute('required', 'required');
            } else {
                otherDepartmentContainer.classList.add('hidden');
                otherDepartment.removeAttribute('required');
            }
        });
        
        // Check if "other" is selected on page load (in case of form validation errors)
        if (departmentSelect.value === 'other') {
            otherDepartmentContainer.classList.remove('hidden');
            otherDepartment.setAttribute('required', 'required');
        }
        
        // Handle form submission
        dissertationForm.addEventListener('submit', function(e) {
            // If "other" is selected, we need to use the custom value
            if (departmentSelect.value === 'other' && otherDepartment.value.trim()) {
                e.preventDefault(); // Stop the form from submitting normally
                
                // Get the original select element
                const originalSelect = departmentSelect;
                
                // Change the value of the select to the custom department value
                originalSelect.value = otherDepartment.value.trim();
                
                // Submit the form
                this.submit();
            }
        });

        // Enhanced file handling
        document.getElementById('dissertationFileInput').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                document.getElementById('dissertationFileName').querySelector('span').textContent = file.name;
                document.getElementById('dissertationFileName').classList.remove('hidden');
            }
        });

        function setupDragAndDrop(dropAreaId, inputId, fileNameId, previewId = null, previewContainerId = null) {
            const dropArea = document.getElementById(dropAreaId);
            const fileInput = document.getElementById(inputId);
            const fileNameDisplay = fileNameId ? document.getElementById(fileNameId) : null;
            const preview = previewId ? document.getElementById(previewId) : null;
            const previewContainer = previewContainerId ? document.getElementById(previewContainerId) : null;

            dropArea.addEventListener("click", () => fileInput.click());

            dropArea.addEventListener("dragover", (event) => {
                event.preventDefault();
                dropArea.classList.add("border-indigo-500");
                dropArea.classList.add("bg-indigo-50");
            });

            dropArea.addEventListener("dragleave", () => {
                dropArea.classList.remove("border-indigo-500");
                dropArea.classList.remove("bg-indigo-50");
            });

            dropArea.addEventListener("drop", (event) => {
                event.preventDefault();
                dropArea.classList.remove("border-indigo-500");
                dropArea.classList.remove("bg-indigo-50");

                if (event.dataTransfer.files.length > 0) {
                    fileInput.files = event.dataTransfer.files;
                    updatePreview(fileInput.files[0]);
                }
            });

            fileInput.addEventListener("change", (event) => {
                if (event.target.files.length > 0) {
                    updatePreview(event.target.files[0]);
                }
            });

            function updatePreview(file) {
                if (fileNameDisplay) {
                    fileNameDisplay.querySelector('span').textContent = file.name;
                    fileNameDisplay.classList.remove("hidden");
                }

                if (file.type === "application/pdf" && previewContainer) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        document.getElementById("dissertationPdfPreview").src = e.target.result;
                        document.getElementById("dissertationPdfPreviewContainer").classList.remove("hidden");
                    };
                    reader.readAsDataURL(file);
                }
            }
        }

        // Dynamic UI updates based on selected type
        const typeRadios = document.querySelectorAll('input[name="type"]');
        const formHeader = document.getElementById('formHeader');
        const titleDisplay = document.getElementById('titleDisplay');
        const typeIcon = document.getElementById('typeIcon');
        const submitButton = document.getElementById('dissertationSubmitButton');
        const submitText = document.getElementById('submitText');

        function updateUIForType() {
            let selectedType = document.querySelector('input[name="type"]:checked')?.value;
            
            if (selectedType === 'dissertation') {
                formHeader.className = 'bg-gradient-to-r from-indigo-600 to-blue-800 px-8 py-4 text-white';
                titleDisplay.className = 'border-b-4 border-indigo-600 pb-1';
                typeIcon.className = 'fas fa-book text-indigo-600 mr-2';
                submitButton.className = 'inline-flex items-center bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-lg font-semibold shadow-md transition-all duration-200';
                submitText.textContent = 'Submit Dissertation';
            } else if (selectedType === 'thesis') {
                formHeader.className = 'bg-gradient-to-r from-green-600 to-teal-700 px-8 py-4 text-white';
                titleDisplay.className = 'border-b-4 border-green-600 pb-1';
                typeIcon.className = 'fas fa-scroll text-green-600 mr-2';
                submitButton.className = 'inline-flex items-center bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg font-semibold shadow-md transition-all duration-200';
                submitText.textContent = 'Submit Thesis';
            } else {
                // Default case
                formHeader.className = 'bg-gradient-to-r from-indigo-600 to-blue-800 px-8 py-4 text-white';
                titleDisplay.className = 'border-b-4 border-indigo-600 pb-1';
                typeIcon.className = 'fas fa-book text-indigo-600 mr-2';
                submitButton.className = 'inline-flex items-center bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-lg font-semibold shadow-md transition-all duration-200';
                submitText.textContent = 'Submit Academic Work';
            }
        }

        // Initial update
        updateUIForType();

        // Add event listeners to update UI on type change
        typeRadios.forEach(radio => {
            radio.addEventListener('change', updateUIForType);
        });

        setupDragAndDrop("dissertationFileDropArea", "dissertationFileInput", "dissertationFileName", "dissertationPdfPreview", "dissertationPdfPreviewContainer");
    </script>
</x-app-layout>