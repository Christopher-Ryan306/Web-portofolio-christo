@extends('layouts.app')

@section('title', $portfolio['title'])

@push('styles')
<style>
    .page-header {
        padding: 150px 0 60px;
        position: relative;
        overflow: hidden;
    }

    .page-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 800px;
        height: 800px;
        background: radial-gradient(circle, rgba(99, 102, 241, 0.1) 0%, transparent 70%);
        border-radius: 50%;
    }

    .breadcrumb {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 20px;
        font-size: 0.95rem;
    }

    .breadcrumb a {
        color: var(--gray);
    }

    .breadcrumb a:hover {
        color: var(--primary);
    }

    .breadcrumb span {
        color: var(--gray);
    }

    .breadcrumb .current {
        color: var(--primary);
    }

    .page-header h1 {
        font-size: 2.8rem;
        margin-bottom: 15px;
        color: var(--white);
    }

    .project-meta {
        display: flex;
        gap: 30px;
        flex-wrap: wrap;
        margin-top: 25px;
    }

    .meta-item {
        display: flex;
        align-items: center;
        gap: 10px;
        color: var(--gray);
    }

    .meta-item i {
        color: var(--primary);
    }

    /* Project Image */
    .project-image {
        margin-bottom: 60px;
    }

    .project-image img {
        width: 100%;
        border-radius: 20px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
    }

    /* Project Content */
    .project-content {
        display: grid;
        grid-template-columns: 2fr 1fr;
        gap: 60px;
    }

    .project-description h2 {
        font-size: 1.8rem;
        color: var(--white);
        margin-bottom: 25px;
    }

    .project-description p {
        color: var(--gray);
        font-size: 1.1rem;
        line-height: 1.8;
        margin-bottom: 20px;
    }

    /* Project Sidebar */
    .project-sidebar {
        position: sticky;
        top: 120px;
    }

    .sidebar-card {
        background: var(--dark-light);
        border-radius: 20px;
        padding: 30px;
        margin-bottom: 30px;
    }

    .sidebar-card h3 {
        font-family: 'Inter', sans-serif;
        font-size: 1.1rem;
        color: var(--white);
        margin-bottom: 20px;
        padding-bottom: 15px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }

    .tech-list {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }

    .tech-list span {
        padding: 8px 16px;
        background: rgba(99, 102, 241, 0.1);
        color: var(--primary);
        border-radius: 50px;
        font-size: 0.9rem;
        font-weight: 500;
    }

    .project-links {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    .project-links a {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        padding: 14px 20px;
        border-radius: 12px;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .link-live {
        background: var(--gradient);
        color: var(--white);
    }

    .link-live:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 30px rgba(99, 102, 241, 0.4);
    }

    .link-github {
        background: rgba(255, 255, 255, 0.05);
        color: var(--light);
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    .link-github:hover {
        background: rgba(255, 255, 255, 0.1);
        border-color: var(--primary);
    }

    /* Navigation */
    .project-nav {
        display: flex;
        justify-content: space-between;
        padding-top: 60px;
        border-top: 1px solid rgba(255, 255, 255, 0.05);
        margin-top: 60px;
    }

    .project-nav a {
        display: flex;
        align-items: center;
        gap: 15px;
        color: var(--gray);
    }

    .project-nav a:hover {
        color: var(--primary);
    }

    .project-nav span {
        font-size: 0.9rem;
    }

    .project-nav strong {
        display: block;
        font-size: 1.1rem;
        color: var(--white);
        margin-top: 5px;
    }

    /* Responsive */
    @media (max-width: 992px) {
        .project-content {
            grid-template-columns: 1fr;
        }

        .project-sidebar {
            position: relative;
            top: 0;
        }
    }

    @media (max-width: 576px) {
        .page-header h1 {
            font-size: 2rem;
        }

        .project-meta {
            flex-direction: column;
            gap: 15px;
        }
    }
</style>
@endpush

@section('content')
    <!-- Page Header -->
    <section class="page-header">
        <div class="container">
            <div class="breadcrumb" data-aos="fade-up">
                <a href="{{ route('home') }}">Home</a>
                <span>/</span>
                <a href="{{ route('portfolio') }}">Portfolio</a>
                <span>/</span>
                <span class="current">{{ $portfolio['title'] }}</span>
            </div>
            <span class="section-subtitle" data-aos="fade-up">{{ $portfolio['category'] }}</span>
            <h1 data-aos="fade-up" data-aos-delay="100">{{ $portfolio['title'] }}</h1>
            <div class="project-meta" data-aos="fade-up" data-aos-delay="200">
                <div class="meta-item">
                    <i class="fas fa-folder"></i>
                    <span>{{ $portfolio['category'] }}</span>
                </div>
                <div class="meta-item">
                    <i class="fas fa-calendar"></i>
                    <span>2024</span>
                </div>
                <div class="meta-item">
                    <i class="fas fa-user"></i>
                    <span>{{ $profile['name'] }}</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Project Image -->
    <section class="section" style="padding-top: 0; padding-bottom: 60px;">
        <div class="container">
            <div class="project-image" data-aos="fade-up">
                <img src="{{ $portfolio['image'] }}" alt="{{ $portfolio['title'] }}">
            </div>
        </div>
    </section>

    <!-- Project Content -->
    <section class="section" style="padding-top: 0;">
        <div class="container">
            <div class="project-content">
                <div class="project-description" data-aos="fade-right">
                    <h2>Tentang Project</h2>
                    <p>{{ $portfolio['full_description'] }}</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.</p>
                    <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    
                    <h2 style="margin-top: 40px;">Tantangan & Solusi</h2>
                    <p>Tantangan utama dalam project ini adalah... (tambahkan deskripsi tantangan dan solusi yang Anda terapkan)</p>
                </div>

                <div class="project-sidebar" data-aos="fade-left">
                    <div class="sidebar-card">
                        <h3>Teknologi</h3>
                        <div class="tech-list">
                            @foreach($portfolio['technologies'] as $tech)
                            <span>{{ $tech }}</span>
                            @endforeach
                        </div>
                    </div>

                    <div class="sidebar-card">
                        <h3>Links</h3>
                        <div class="project-links">
                            <a href="{{ $portfolio['link'] }}" class="link-live" target="_blank">
                                <i class="fas fa-external-link-alt"></i> Live Demo
                            </a>
                            <a href="{{ $portfolio['github'] }}" class="link-github" target="_blank">
                                <i class="fab fa-github"></i> Source Code
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Project Navigation -->
            <div class="project-nav" data-aos="fade-up">
                <a href="{{ route('portfolio') }}">
                    <i class="fas fa-arrow-left"></i>
                    <div>
                        <span>Kembali ke</span>
                        <strong>Semua Project</strong>
                    </div>
                </a>
                <a href="{{ route('contact') }}">
                    <div style="text-align: right;">
                        <span>Tertarik?</span>
                        <strong>Hubungi Saya</strong>
                    </div>
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </section>
@endsection
