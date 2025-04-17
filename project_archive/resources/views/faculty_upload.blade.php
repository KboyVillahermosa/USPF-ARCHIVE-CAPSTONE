<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-bold text-2xl text-gray-800 leading-tight">
                <span class="border-b-4 border-purple-600 pb-1">Faculty Research Submission</span>
            </h2>
            <a href="{{ route('research.history') }}" class="inline-flex items-center text-sm text-gray-600 hover:text-purple-600 transition-colors duration-200">
                <i class="fas fa-history mr-2"></i> View Faculty Archives
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
                <div class="bg-gradient-to-r from-purple-600 to-indigo-800 px-8 py-4 text-white">
                    <h3 class="text-lg font-semibold">Submit Faculty Research Project</h3>
                    <p class="text-purple-100 text-sm">Complete all fields for proper documentation and classification</p>
                </div>

                <form action="{{ route('research.faculty.store') }}" method="POST" enctype="multipart/form-data" id="uploadForm" class="p-8">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="space-y-6">
                            <!-- Project Name -->
                            <div>
                                <label class="block text-gray-700 font-semibold mb-2 flex items-center">
                                    <i class="fas fa-file-signature text-purple-600 mr-2"></i>
                                    Research Title
                                    <span class="text-red-500 ml-1">*</span>
                                </label>
                                <input type="text" name="project_name" value="{{ old('project_name') }}"
                                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all duration-200" 
                                    placeholder="Enter the full title of your research" required>
                            </div>

                            <!-- Members -->
                            <div>
                                <label class="block text-gray-700 font-semibold mb-2 flex items-center">
                                    <i class="fas fa-users text-purple-600 mr-2"></i>
                                    Co-Researchers
                                    <span class="text-red-500 ml-1">*</span>
                                </label>
                                <input type="text" name="members" value="{{ old('members') }}"
                                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all duration-200" 
                                    placeholder="Enter all faculty researchers (comma separated)" required>
                                <p class="text-xs text-gray-500 mt-1">Example: Dr. John Doe, Prof. Jane Smith</p>
                            </div>

                            <!-- Department -->
                            <div>
                                <label class="block text-gray-700 font-semibold mb-2 flex items-center">
                                    <i class="fas fa-university text-purple-600 mr-2"></i>
                                    Department
                                    <span class="text-red-500 ml-1">*</span>
                                </label>
                                <select name="department" id="department"
                                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all duration-200" required>
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
                                <div id="otherDepartmentContainer" class="mt-2 hidden">
                                    <input type="text" id="otherDepartment"
                                        class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all duration-200"
                                        placeholder="Enter department name">
                                </div>
                            </div>
                        </div>

                        <div class="space-y-6">
                            <!-- Banner Image Upload -->
                            <div>
                                <label class="block text-gray-700 font-semibold mb-2 flex items-center">
                                    <i class="fas fa-image text-purple-600 mr-2"></i>
                                    Banner Image
                                </label>
                                <div id="bannerPreviewContainer" class="mb-4 hidden">
                                    <img id="bannerPreview" class="w-full h-40 object-cover rounded-lg shadow-md">
                                </div>
                                <div id="bannerDropArea"
                                    class="w-full border-2 border-dashed border-gray-300 bg-gray-50 rounded-lg px-6 py-8 text-center cursor-pointer hover:bg-gray-100 hover:border-purple-500 transition-all duration-200">
                                    <i class="fas fa-cloud-upload-alt text-purple-500 text-3xl mb-2"></i>
                                    <p class="text-gray-600">Drag & Drop an image here or <span
                                            class="text-purple-500 font-semibold">click to browse</span></p>
                                    <p class="text-xs text-gray-500 mt-1">Recommended: 1200 × 400px (3:1 ratio)</p>
                                    <input type="file" name="banner_image" id="bannerInput" class="hidden" accept="image/*">
                                </div>
                            </div>

                            <!-- Research File Upload -->
                            <div>
                                <label class="block text-gray-700 font-semibold mb-2 flex items-center">
                                    <i class="fas fa-file-pdf text-purple-600 mr-2"></i>
                                    Research File
                                    <span class="text-red-500 ml-1">*</span>
                                </label>
                                <div id="fileDropArea"
                                    class="w-full border-2 border-dashed border-gray-300 bg-gray-50 rounded-lg px-6 py-8 text-center cursor-pointer hover:bg-gray-100 hover:border-purple-500 transition-all duration-200">
                                    <i class="fas fa-file-upload text-purple-500 text-3xl mb-2"></i>
                                    <p class="text-gray-600">Drag & Drop your file here or <span
                                            class="text-purple-500 font-semibold">click to browse</span></p>
                                    <p class="text-xs text-gray-500 mt-1">Accepted formats: PDF, DOC, DOCX</p>
                                    <input type="file" name="file" id="fileInput" class="hidden" accept=".pdf,.doc,.docx"
                                        required>
                                </div>
                                <div id="fileName" class="flex items-center mt-2 text-sm text-gray-600 hidden p-2 bg-purple-50 rounded">
                                    <i class="fas fa-paperclip mr-2"></i>
                                    <span></span>
                                </div>

                                <!-- PDF Preview -->
                                <div id="pdfPreviewContainer" class="hidden mt-4">
                                    <div class="border border-gray-200 rounded-lg overflow-hidden shadow-md">
                                        <div class="bg-gray-100 px-4 py-2 border-b border-gray-200 flex items-center">
                                            <i class="fas fa-file-pdf text-red-500 mr-2"></i>
                                            <span class="font-medium text-sm">Document Preview</span>
                                        </div>
                                        <iframe id="pdfPreview" class="w-full h-64"></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Abstract with Text Editor -->
                    <div class="mt-8">
                        <label class="block text-gray-700 font-semibold mb-2 flex items-center">
                            <i class="fas fa-align-left text-purple-600 mr-2"></i>
                            Abstract
                            <span class="text-red-500 ml-1">*</span>
                        </label>
                        <input id="abstract" type="hidden" name="abstract" value="{{ old('abstract') }}">
                        <div class="border border-gray-300 rounded-lg overflow-hidden">
                            <trix-editor input="abstract"
                                class="min-h-[200px] prose max-w-none focus:outline-none"></trix-editor>
                        </div>
                        <p class="text-xs text-gray-500 mt-1">Provide a concise summary of your faculty research (250-300 words recommended)</p>
                    </div>

                    <!-- Submit Buttons -->
                    <div class="mt-10 flex justify-between items-center">
                        <a href="{{ route('research.history') }}"
                            class="inline-flex items-center bg-gray-100 hover:bg-gray-200 text-gray-800 px-6 py-3 rounded-lg font-medium shadow-sm transition-all duration-200">
                            <i class="fas fa-history mr-2"></i>
                            Research Archives
                        </a>
                            
                        <button type="submit" id="submitButton"
                            class="inline-flex items-center bg-purple-600 hover:bg-purple-700 text-white px-6 py-3 rounded-lg font-semibold shadow-md transition-all duration-200">
                            <i class="fas fa-paper-plane mr-2"></i>
                            Submit Faculty Research
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Scripts section (unchanged) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css">
    
    <script>
        // Handle custom department
        const departmentSelect = document.getElementById('department');
        const otherDepartmentContainer = document.getElementById('otherDepartmentContainer');
        const otherDepartment = document.getElementById('otherDepartment');
        const uploadForm = document.getElementById('uploadForm');
        
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
        uploadForm.addEventListener('submit', function(e) {
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

        function setupDragAndDrop(dropAreaId, inputId, fileNameId, previewId = null, previewContainerId = null) {
            const dropArea = document.getElementById(dropAreaId);
            const fileInput = document.getElementById(inputId);
            const fileNameDisplay = fileNameId ? document.getElementById(fileNameId) : null;
            const preview = previewId ? document.getElementById(previewId) : null;
            const previewContainer = previewContainerId ? document.getElementById(previewContainerId) : null;

            dropArea.addEventListener("click", () => fileInput.click());

            dropArea.addEventListener("dragover", (event) => {
                event.preventDefault();
                dropArea.classList.add("border-purple-500");
                dropArea.classList.add("bg-purple-50");
            });

            dropArea.addEventListener("dragleave", () => {
                dropArea.classList.remove("border-purple-500");
                dropArea.classList.remove("bg-purple-50");
            });

            dropArea.addEventListener("drop", (event) => {
                event.preventDefault();
                dropArea.classList.remove("border-purple-500");
                dropArea.classList.remove("bg-purple-50");

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
                if (preview && file.type.startsWith("image/")) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        preview.src = e.target.result;
                        previewContainer.classList.remove("hidden");
                    };
                    reader.readAsDataURL(file);
                }

                if (fileNameDisplay) {
                    fileNameDisplay.innerHTML = `<i class="fas fa-file-alt mr-2"></i> ${file.name}`;
                    fileNameDisplay.classList.remove("hidden");
                }

                if (file.type === "application/pdf") {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        document.getElementById("pdfPreview").src = e.target.result;
                        document.getElementById("pdfPreviewContainer").classList.remove("hidden");
                    };
                    reader.readAsDataURL(file);
                }
            }
        }

        setupDragAndDrop("bannerDropArea", "bannerInput", null, "bannerPreview", "bannerPreviewContainer");
        setupDragAndDrop("fileDropArea", "fileInput", "fileName");
    </script>
</x-app-layout>