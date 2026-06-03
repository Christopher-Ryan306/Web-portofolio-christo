@extends('layouts.app')

@section('title', 'Tentang Saya')

@push('styles')
<style>
    .page-header {
        padding: 150px 0 80px;
        text-align: center;
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

    .page-header h1 {
        font-size: 3rem;
        margin-bottom: 15px;
        color: var(--white);
    }

    .page-header p {
        color: var(--gray);
        font-size: 1.2rem;
    }

    /* About Content */
    .about-content {
        display: grid;
        grid-template-columns: 1fr 1.5fr;
        gap: 80px;
        align-items: start;
    }

    .about-image {
        position: sticky;
        top: 120px;
    }

    .about-image img {
        width: 100%;
        border-radius: 20px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
    }

    .about-image-decoration {
        position: absolute;
        bottom: -30px;
        right: -30px;
        width: 200px;
        height: 200px;
        background: var(--gradient);
        border-radius: 20px;
        z-index: -1;
        opacity: 0.3;
    }

    .about-text h2 {
        font-size: 2.2rem;
        color: var(--white);
        margin-bottom: 25px;
    }

    .about-text p {
        color: var(--gray);
        font-size: 1.1rem;
        margin-bottom: 20px;
        line-height: 1.8;
    }

    .about-info {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
        margin: 40px 0;
        padding: 30px;
        background: var(--dark-light);
        border-radius: 20px;
    }

    .info-item {
        display: flex;
        gap: 15px;
    }

    .info-item i {
        width: 45px;
        height: 45px;
        background: rgba(99, 102, 241, 0.1);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--primary);
        flex-shrink: 0;
    }

    .info-item span {
        color: var(--gray);
        font-size: 0.9rem;
    }

    .info-item strong {
        display: block;
        color: var(--white);
        margin-top: 5px;
    }

    /* Skills Section */
    .skills-section {
        background: var(--dark-light);
    }

    .skills-container {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 40px;
    }

    .skill-item {
        margin-bottom: 25px;
    }

    .skill-header {
        display: flex;
        justify-content: space-between;
        margin-bottom: 10px;
    }

    .skill-name {
        font-weight: 600;
        color: var(--white);
    }

    .skill-percent {
        color: var(--primary);
        font-weight: 600;
    }

    .skill-bar {
        height: 8px;
        background: var(--dark);
        border-radius: 10px;
        overflow: hidden;
    }

    .skill-progress {
        height: 100%;
        background: var(--gradient);
        border-radius: 10px;
        transition: width 1s ease;
    }

    /* Experience Section */
    .timeline {
        position: relative;
        padding-left: 40px;
    }

    .timeline::before {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        bottom: 0;
        width: 2px;
        background: var(--gradient);
    }

    .timeline-item {
        position: relative;
        padding-bottom: 40px;
    }

    .timeline-item:last-child {
        padding-bottom: 0;
    }

    .timeline-item::before {
        content: '';
        position: absolute;
        left: -44px;
        top: 5px;
        width: 12px;
        height: 12px;
        background: var(--primary);
        border-radius: 50%;
        box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.2);
    }

    .timeline-date {
        display: inline-block;
        padding: 5px 15px;
        background: rgba(99, 102, 241, 0.1);
        color: var(--primary);
        border-radius: 50px;
        font-size: 0.85rem;
        font-weight: 600;
        margin-bottom: 15px;
    }

    .timeline-item h3 {
        font-family: 'Inter', sans-serif;
        font-size: 1.3rem;
        color: var(--white);
        margin-bottom: 5px;
    }

    .timeline-item h4 {
        font-family: 'Inter', sans-serif;
        font-size: 1rem;
        color: var(--primary);
        font-weight: 500;
        margin-bottom: 15px;
    }

    .timeline-item p {
        color: var(--gray);
        line-height: 1.7;
    }

    /* Responsive */
    @media (max-width: 992px) {
        .about-content {
            grid-template-columns: 1fr;
            gap: 50px;
        }

        .about-image {
            position: relative;
            top: 0;
            max-width: 400px;
            margin: 0 auto;
        }

        .skills-container {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 576px) {
        .page-header h1 {
            font-size: 2rem;
        }

        .about-info {
            grid-template-columns: 1fr;
        }
    }
</style>
@endpush

@section('content')
    <!-- Page Header -->
    <section class="page-header">
        <div class="container">
            <span class="section-subtitle" data-aos="fade-up">Kenali Saya</span>
            <h1 data-aos="fade-up" data-aos-delay="100">Tentang Saya</h1>
            <p data-aos="fade-up" data-aos-delay="200">Passionate developer yang mencintai teknologi dan inovasi</p>
        </div>
    </section>

    <!-- About Content -->
    <section class="section" style="padding-top: 0;">
        <div class="container">
            <div class="about-content">
                <div class="about-image" data-aos="fade-right">
                    <img src="{{ $profile['photo'] }}" alt="{{ $profile['name'] }}">
                    <div class="about-image-decoration"></div>
                </div>
                <div class="about-text" data-aos="fade-left">
                    <h2>Saya {{ $profile['name'] }}, {{ $profile['title'] }}</h2>
                    <p>{{ $profile['bio'] }}</p>
                    <p>Saya memiliki passion yang kuat dalam mengembangkan solusi digital yang tidak hanya fungsional tetapi juga memiliki estetika yang menarik. Dengan pengalaman bertahun-tahun di industri teknologi, saya telah mengerjakan berbagai project dari skala kecil hingga enterprise.</p>
                    <p>Saya percaya bahwa teknologi harus memudahkan kehidupan manusia. Itulah mengapa saya selalu berusaha menciptakan produk yang user-friendly dan memberikan nilai tambah bagi penggunanya.</p>

                    <div class="about-info">
                        <div class="info-item">
                            <i class="fas fa-user"></i>
                            <div>
                                <span>Nama</span>
                                <strong>{{ $profile['name'] }}</strong>
                            </div>
                        </div>
                        <div class="info-item">
                            <i class="fas fa-envelope"></i>
                            <div>
                                <span>Email</span>
                                <strong>{{ $profile['email'] }}</strong>
                            </div>
                        </div>
                        <div class="info-item">
                            <i class="fas fa-phone"></i>
                            <div>
                                <span>Telepon</span>
                                <strong>{{ $profile['phone'] }}</strong>
                            </div>
                        </div>
                        <div class="info-item">
                            <i class="fas fa-map-marker-alt"></i>
                            <div>
                                <span>Lokasi</span>
                                <strong>{{ $profile['location'] }}</strong>
                            </div>
                        </div>
                    </div>

                    <a href="{{ $profile['cv_link'] }}" class="btn btn-primary" target="_blank">
                        <i class="fas fa-download"></i> Download CV
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Skills Section -->
    <section class="section skills-section">
        <div class="container">
            <div class="section-header" data-aos="fade-up">
                <span class="section-subtitle">Kemampuan</span>
                <h2 class="section-title">Skills & Expertise</h2>
                <p class="section-desc">Teknologi dan tools yang saya kuasai</p>
            </div>

            <div class="skills-container" data-aos="fade-up">
                @foreach(array_chunk($skills, ceil(count($skills) / 2)) as $skillGroup)
                <div>
                    @foreach($skillGroup as $skill)
                    <div class="skill-item">
                        <div class="skill-header">
                            <span class="skill-name">{{ $skill['name'] }}</span>
                            <span class="skill-percent">{{ $skill['level'] }}%</span>
                        </div>
                        <div class="skill-bar">
                            <div class="skill-progress" style="width: {{ $skill['level'] }}%"></div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Experience Section -->
    <section class="section">
        <div class="container">
            <div class="section-header" data-aos="fade-up">
                <span class="section-subtitle">Perjalanan Karir</span>
                <h2 class="section-title">Pengalaman Kerja</h2>
                <p class="section-desc">Jejak karir dan pengalaman profesional saya</p>
            </div>

            <div class="timeline" style="max-width: 800px; margin: 0 auto;">
                @foreach($experiences as $index => $exp)
                <div class="timeline-item" data-aos="fade-up" data-aos-delay="{{ ($index + 1) * 100 }}">
                    <span class="timeline-date">{{ $exp['period'] }}</span>
                    <h3>{{ $exp['title'] }}</h3>
                    <h4>{{ $exp['company'] }}</h4>
                    <p>{{ $exp['description'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
