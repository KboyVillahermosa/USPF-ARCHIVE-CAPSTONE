
@extends('layouts.app')

@section('title', 'About Us - University of Southern Philippines Foundation')

@section('content')
<div class="container my-5">
    <!-- Hero Section -->
    <div class="row mb-5">
        <div class="col-12 text-center">
            <h1 class="display-4 fw-bold text-primary">About USPF</h1>
            <p class="lead">Building futures through excellence in education since 1927</p>
        </div>
    </div>

    <!-- Mission, Vision, Values Section -->
    <div class="row mb-5">
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body text-center">
                    <i class="fas fa-compass fa-3x text-primary mb-3"></i>
                    <h3 class="card-title">Our Mission</h3>
                    <p class="card-text">To provide quality education that develops competent and socially responsible professionals who can meet the challenges of a rapidly changing society.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body text-center">
                    <i class="fas fa-eye fa-3x text-primary mb-3"></i>
                    <h3 class="card-title">Our Vision</h3>
                    <p class="card-text">To be a premier institution of higher learning committed to excellence, innovation, and global competitiveness.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body text-center">
                    <i class="fas fa-heart fa-3x text-primary mb-3"></i>
                    <h3 class="card-title">Our Core Values</h3>
                    <p class="card-text">Excellence, Integrity, Service, Leadership, Innovation, and Social Responsibility.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- History Section -->
    <div class="row mb-5">
        <div class="col-lg-6">
            <h2 class="mb-4">Our History</h2>
            <p>The University of Southern Philippines Foundation (USPF) was established in 1927 as the Southern Philippines Commercial School by prominent Cebuano educators. Over the decades, it has evolved from a modest institution to one of the leading universities in the Visayas region.</p>
            <p>In 1949, the school was incorporated and renamed as the University of Southern Philippines. The university gained foundation status in 1953, becoming the University of Southern Philippines Foundation we know today.</p>
            <p>Throughout its rich history, USPF has remained committed to providing quality education to generations of students, producing notable alumni who have made significant contributions in various fields locally and internationally.</p>
        </div>
        <div class="col-lg-6">
            <div class="ratio ratio-16x9 h-100">
                <img src="{{ asset('images/campus-history.jpg') }}" class="rounded shadow-sm img-fluid" alt="USPF Campus Historical Photo">
            </div>
        </div>
    </div>

    <!-- Academic Programs Section -->
    <div class="row mb-5">
        <div class="col-12">
            <h2 class="mb-4">Academic Excellence</h2>
            <p>USPF offers a wide range of undergraduate and graduate programs across various disciplines:</p>
            
            <div class="row mt-4">
                <div class="col-md-4 mb-3">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title"><i class="fas fa-laptop-code me-2 text-primary"></i>College of Information Technology</h5>
                            <p class="card-text">Preparing students for careers in the rapidly evolving technology sector with programs in Computer Science, Information Technology, and Information Systems.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title"><i class="fas fa-briefcase me-2 text-primary"></i>College of Business Administration</h5>
                            <p class="card-text">Offering programs in Accountancy, Business Administration, and Marketing designed to develop future business leaders.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title"><i class="fas fa-user-graduate me-2 text-primary"></i>College of Education</h5>
                            <p class="card-text">Training the next generation of educators with programs in Elementary and Secondary Education with various specializations.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Campus Life Section -->
    <div class="row mb-5">
        <div class="col-12 text-center mb-4">
            <h2>Campus Life</h2>
            <p class="lead">Experience a vibrant and enriching environment that fosters holistic development</p>
        </div>
        
        <div class="col-md-6 mb-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <h4><i class="fas fa-users me-2 text-primary"></i>Student Organizations</h4>
                    <p>With over 30 student organizations, USPF offers numerous opportunities for students to develop leadership skills, pursue interests, and build lasting friendships.</p>
                </div>
            </div>
        </div>
        
        <div class="col-md-6 mb-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <h4><i class="fas fa-trophy me-2 text-primary"></i>Athletics</h4>
                    <p>Our varsity teams compete in various regional and national competitions, bringing pride to the USPF community with their achievements in basketball, volleyball, swimming, and more.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Leadership Section -->
    <div class="row mb-5">
        <div class="col-12">
            <h2 class="mb-4">University Leadership</h2>
            <p>USPF is led by dedicated administrators and faculty members committed to maintaining the highest standards of academic excellence.</p>
            
            <div class="row mt-4">
                <div class="col-md-4 mb-4 text-center">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <img src="{{ asset('images/president.jpg') }}" alt="University President" class="rounded-circle mb-3" width="150">
                            <h5>Dr. Jane Doe</h5>
                            <p class="text-muted">University President</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4 text-center">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <img src="{{ asset('images/vp-academic.jpg') }}" alt="VP for Academic Affairs" class="rounded-circle mb-3" width="150">
                            <h5>Dr. John Smith</h5>
                            <p class="text-muted">VP for Academic Affairs</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4 text-center">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <img src="{{ asset('images/vp-admin.jpg') }}" alt="VP for Administration" class="rounded-circle mb-3" width="150">
                            <h5>Dr. Maria Garcia</h5>
                            <p class="text-muted">VP for Administration</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="row">
        <div class="col-12 text-center">
            <div class="card bg-primary text-white p-5 rounded-lg">
                <h2>Join the USPF Family</h2>
                <p class="lead">Be part of our legacy of excellence and innovation</p>
                <a href="{{ route('admissions') }}" class="btn btn-light btn-lg mt-3">Apply Now</a>
            </div>
        </div>
    </div>
</div>
@endsection