<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-bold text-2xl text-gray-800 leading-tight">
                <span class="border-b-4 border-blue-600 pb-1">Research Submission</span>
            </h2>
            <a href="{{ route('research.history') }}" class="inline-flex items-center text-sm text-gray-600 hover:text-blue-600 transition-colors duration-200">
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
                <div class="bg-gradient-to-r from-blue-600 to-blue-800 px-8 py-4 text-white">
                    <h3 class="text-lg font-semibold">Submit Your Research Project</h3>
                    <p class="text-blue-100 text-sm">Complete all fields for proper documentation and classification</p>
                </div>

                <form action="{{ route('research.store') }}" method="POST" enctype="multipart/form-data" id="uploadForm" class="p-8">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="space-y-6">
                            <!-- Project Name -->
                            <div>
                                <label class="block text-gray-700 font-semibold mb-2 flex items-center">
                                    <i class="fas fa-file-signature text-blue-600 mr-2"></i>
                                    Research Title
                                    <span class="text-red-500 ml-1">*</span>
                                </label>
                                <input type="text" name="project_name" value="{{ old('project_name') }}"
                                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200" 
                                    placeholder="Enter the full title of your research" required>
                            </div>

                            <!-- Members -->
                            <div>
                                <label class="block text-gray-700 font-semibold mb-2 flex items-center">
                                    <i class="fas fa-users text-blue-600 mr-2"></i>
                                    Authors
                                    <span class="text-red-500 ml-1">*</span>
                                </label>
                                <input type="text" name="members" value="{{ old('members') }}"
                                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200" 
                                    placeholder="Enter all authors (comma separated)" required>
                                <p class="text-xs text-gray-500 mt-1">Example: John Doe, Jane Smith</p>
                            </div>

                            <!-- Department -->
                            <div>
                                <label class="block text-gray-700 font-semibold mb-2 flex items-center">
                                    <i class="fas fa-university text-blue-600 mr-2"></i>
                                    Department
                                    <span class="text-red-500 ml-1">*</span>
                                </label>
                                <select name="department" id="department"
                                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200" required>
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
                                        class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200"
                                        placeholder="Enter department name">
                                </div>
                            </div>

                            <!-- Curriculum -->
                            <div>
                                <label class="block text-gray-700 font-semibold mb-2 flex items-center">
                                    <i class="fas fa-graduation-cap text-blue-600 mr-2"></i>
                                    Program
                                    <span class="text-red-500 ml-1">*</span>
                                </label>
                                <select name="curriculum"
                                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200" required>
                                    <option value="">Select Program</option>
                                    <option value="BSIT" {{ old('curriculum') == 'BSIT' ? 'selected' : '' }}>Bachelor of Science in Information Technology</option>
                                    <option value="BSCS" {{ old('curriculum') == 'BSCS' ? 'selected' : '' }}>Bachelor of Science in Computer Science</option>
                                    <option value="BSA-Arch" {{ old('curriculum') == 'BSA-Arch' ? 'selected' : '' }}>Bachelor of Science in Architecture</option>
                                    <option value="BSCE" {{ old('curriculum') == 'BSCE' ? 'selected' : '' }}>Bachelor of Science in Civil Engineering</option>
                                    <option value="BSGE" {{ old('curriculum') == 'BSGE' ? 'selected' : '' }}>Bachelor of Science in Geodetic Engineering</option>
                                    <option value="BSN" {{ old('curriculum') == 'BSN' ? 'selected' : '' }}>Bachelor of Science in Nursing</option>
                                    <option value="BSP" {{ old('curriculum') == 'BSP' ? 'selected' : '' }}>Bachelor of Science in Pharmacy</option>
                                    <option value="CSW" {{ old('curriculum') == 'CSW' ? 'selected' : '' }}>College of Social Work</option>
                                    <option value="BEED" {{ old('curriculum') == 'BEED' ? 'selected' : '' }}>Bachelor of Elementary Education</option>
                                    <option value="BSED-Secondary" {{ old('curriculum') == 'BSED-Secondary' ? 'selected' : '' }}>Bachelor of Secondary Education</option>
                                    <option value="BA-ELS" {{ old('curriculum') == 'BA-ELS' ? 'selected' : '' }}>Bachelor of Arts in English Language Studies</option>
                                    <option value="BA-LCS" {{ old('curriculum') == 'BA-LCS' ? 'selected' : '' }}>Bachelor of Arts in Literature and Cultural Studies</option>
                                    <option value="BA-Music" {{ old('curriculum') == 'BA-Music' ? 'selected' : '' }}>Bachelor of Arts in Music</option>
                                    <option value="BA-PoliSci" {{ old('curriculum') == 'BA-PoliSci' ? 'selected' : '' }}>Bachelor of Arts in Political Science</option>
                                    <option value="BSTM" {{ old('curriculum') == 'BSTM' ? 'selected' : '' }}>Bachelor of Science in Tourism Management</option>
                                    <option value="BSHM" {{ old('curriculum') == 'BSHM' ? 'selected' : '' }}>Bachelor of Science in Hospitality Management</option>
                                    <option value="BSA-Acct" {{ old('curriculum') == 'BSA-Acct' ? 'selected' : '' }}>Bachelor of Science in Accountancy</option>
                                    <option value="BSBA" {{ old('curriculum') == 'BSBA' ? 'selected' : '' }}>Bachelor of Science in Business Administration</option>
                                    <option value="EdD" {{ old('curriculum') == 'EdD' ? 'selected' : '' }}>Doctor of Education major in Educational Management</option>
                                    <option value="MSW" {{ old('curriculum') == 'MSW' ? 'selected' : '' }}>Master of Science in Social Work</option>
                                    <option value="MBA" {{ old('curriculum') == 'MBA' ? 'selected' : '' }}>Master of Business Administration</option>
                                    <option value="MAEd-EM" {{ old('curriculum') == 'MAEd-EM' ? 'selected' : '' }}>Master of Arts in Education major in Educational Management</option>
                                    <option value="MAEd-CI" {{ old('curriculum') == 'MAEd-CI' ? 'selected' : '' }}>Master of Arts in Education major in Curriculum and Instruction</option>
                                    <option value="MAEd-EE" {{ old('curriculum') == 'MAEd-EE' ? 'selected' : '' }}>Master of Arts in Education major in Elementary Education</option>
                                    <option value="MAEd-ECE" {{ old('curriculum') == 'MAEd-ECE' ? 'selected' : '' }}>Master of Arts in Education major in Early Childhood Education</option>
                                    <option value="MAEd-ME" {{ old('curriculum') == 'MAEd-ME' ? 'selected' : '' }}>Master of Arts in Education major in Math Education</option>
                                    <option value="MAEd-SE" {{ old('curriculum') == 'MAEd-SE' ? 'selected' : '' }}>Master of Arts in Education major in Science Education</option>
                                    <option value="MAEd-ELT" {{ old('curriculum') == 'MAEd-ELT' ? 'selected' : '' }}>Master of Arts in Education major in English Language Teaching</option>
                                    <option value="MAEd-PE" {{ old('curriculum') == 'MAEd-PE' ? 'selected' : '' }}>Master of Arts in Education major in Physical Education</option>
                                    <option value="MAEd-SpEd" {{ old('curriculum') == 'MAEd-SpEd' ? 'selected' : '' }}>Master of Arts in Education major in Special Education</option>
                                </select>
                            </div>
                        </div>

                        <div class="space-y-6">
                            <!-- Banner Image Upload -->
                            <div>
                                <label class="block text-gray-700 font-semibold mb-2 flex items-center">
                                    <i class="fas fa-image text-blue-600 mr-2"></i>
                                    Banner Image
                                </label>
                                <div id="bannerPreviewContainer" class="mb-4 hidden">
                                    <img id="bannerPreview" class="w-full h-40 object-cover rounded-lg shadow-md">
                                </div>
                                <div id="bannerDropArea"
                                    class="w-full border-2 border-dashed border-gray-300 bg-gray-50 rounded-lg px-6 py-8 text-center cursor-pointer hover:bg-gray-100 hover:border-blue-500 transition-all duration-200">
                                    <i class="fas fa-cloud-upload-alt text-blue-500 text-3xl mb-2"></i>
                                    <p class="text-gray-600">Drag & Drop an image here or <span
                                            class="text-blue-500 font-semibold">click to browse</span></p>
                                    <p class="text-xs text-gray-500 mt-1">Recommended: 1200 × 400px (3:1 ratio)</p>
                                    <input type="file" name="banner_image" id="bannerInput" class="hidden" accept="image/*">
                                </div>
                            </div>

                            <!-- Research File Upload -->
                            <div>
                                <label class="block text-gray-700 font-semibold mb-2 flex items-center">
                                    <i class="fas fa-file-pdf text-blue-600 mr-2"></i>
                                    Research File
                                    <span class="text-red-500 ml-1">*</span>
                                </label>
                                <div id="fileDropArea"
                                    class="w-full border-2 border-dashed border-gray-300 bg-gray-50 rounded-lg px-6 py-8 text-center cursor-pointer hover:bg-gray-100 hover:border-blue-500 transition-all duration-200">
                                    <i class="fas fa-file-upload text-blue-500 text-3xl mb-2"></i>
                                    <p class="text-gray-600">Drag & Drop your file here or <span
                                            class="text-blue-500 font-semibold">click to browse</span></p>
                                    <p class="text-xs text-gray-500 mt-1">Accepted formats: PDF, DOC, DOCX</p>
                                    <input type="file" name="file" id="fileInput" class="hidden" accept=".pdf,.doc,.docx"
                                        required>
                                </div>
                                <div id="fileName" class="flex items-center mt-2 text-sm text-gray-600 hidden p-2 bg-blue-50 rounded">
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
                            <i class="fas fa-align-left text-blue-600 mr-2"></i>
                            Abstract
                            <span class="text-red-500 ml-1">*</span>
                        </label>
                        <input id="abstract" type="hidden" name="abstract" value="{{ old('abstract') }}">
                        <div class="border border-gray-300 rounded-lg overflow-hidden">
                            <trix-editor input="abstract"
                                class="min-h-[200px] prose max-w-none focus:outline-none"></trix-editor>
                        </div>
                        <p class="text-xs text-gray-500 mt-1">Provide a concise summary of your research (250-300 words recommended)</p>
                    </div>

                    <!-- Submit Button -->
                    <div class="mt-10 flex justify-end">
                        <button type="submit" id="submitButton"
                            class="inline-flex items-center bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-semibold shadow-md transition-all duration-200">
                            <i class="fas fa-paper-plane mr-2"></i>
                            Submit Research Project
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

        // File handling
        document.getElementById('fileInput').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                document.getElementById('fileName').textContent = `Selected File: ${file.name}`;
                document.getElementById('fileName').classList.remove('hidden');
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
                dropArea.classList.add("border-blue-500");
            });

            dropArea.addEventListener("dragleave", () => {
                dropArea.classList.remove("border-blue-500");
            });

            dropArea.addEventListener("drop", (event) => {
                event.preventDefault();
                dropArea.classList.remove("border-blue-500");

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
                    fileNameDisplay.textContent = `Selected File: ${file.name}`;
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