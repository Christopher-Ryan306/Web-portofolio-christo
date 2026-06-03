@extends('layouts.app')

@section('title', 'Home')

@push('styles')
<style>
    /* Hero Section */
    .hero {
        min-height: 100vh;
        display: flex;
        align-items: center;
        position: relative;
        padding-top: 80px;
        overflow: hidden;
    }

    .hero::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -20%;
        width: 800px;
        height: 800px;
        background: radial-gradient(circle, rgba(99, 102, 241, 0.15) 0%, transparent 70%);
        border-radius: 50%;
    }

    .hero::after {
        content: '';
        position: absolute;
        bottom: -30%;
        left: -10%;
        width: 600px;
        height: 600px;
        background: radial-gradient(circle, rgba(14, 165, 233, 0.1) 0%, transparent 70%);
        border-radius: 50%;
    }

    .hero-content {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 60px;
        align-items: center;
        position: relative;
        z-index: 1;
    }

    .hero-text h1 {
        font-size: 3.5rem;
        line-height: 1.2;
        margin-bottom: 10px;
        color: var(--white);
    }

    .hero-text h1 span {
        background: var(--gradient);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .hero-subtitle {
        font-size: 1.5rem;
        color: var(--gray);
        margin-bottom: 25px;
    }

    .hero-desc {
        color: var(--gray);
        font-size: 1.1rem;
        margin-bottom: 35px;
        max-width: 500px;
    }

    .hero-buttons {
        display: flex;
        gap: 20px;
        flex-wrap: wrap;
    }

    .hero-image {
        position: relative;
    }

    .hero-image-wrapper {
        position: relative;
        width: 400px;
        height: 400px;
        margin: 0 auto;
    }

    .hero-image-wrapper::before {
        content: '';
        position: absolute;
        inset: -20px;
        background: var(--gradient);
        border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%;
        animation: morph 8s ease-in-out infinite;
        opacity: 0.3;
    }

    .hero-image-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%;
        animation: morph 8s ease-in-out infinite;
        position: relative;
        z-index: 1;
    }

    @keyframes morph {
        0%, 100% { border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%; }
        50% { border-radius: 70% 30% 30% 70% / 70% 70% 30% 30%; }
    }

    .floating-elements {
        position: absolute;
        width: 100%;
        height: 100%;
        pointer-events: none;
    }

    .floating-element {
        position: absolute;
        background: var(--gradient);
        border-radius: 50%;
        opacity: 0.6;
        animation: float 6s ease-in-out infinite;
    }

    .floating-element:nth-child(1) {
        width: 60px;
        height: 60px;
        top: 10%;
        left: 10%;
        animation-delay: 0s;
    }

    .floating-element:nth-child(2) {
        width: 40px;
        height: 40px;
        top: 60%;
        right: 10%;
        animation-delay: 2s;
    }

    .floating-element:nth-child(3) {
        width: 30px;
        height: 30px;
        bottom: 20%;
        left: 20%;
        animation-delay: 4s;
    }

    @keyframes float {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-20px); }
    }

    /* Stats Section */
    .stats {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 30px;
        padding: 60px 0;
        border-top: 1px solid rgba(255, 255, 255, 0.05);
        border-bottom: 1px solid rgba(255, 255, 255, 0.05);
    }

    .stat-item {
        text-align: center;
    }

    .stat-number {
        font-size: 3rem;
        font-weight: 800;
        background: var(--gradient);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .stat-label {
        color: var(--gray);
        font-size: 1rem;
        margin-top: 5px;
    }

    /* Skills Preview */
    .skills-preview {
        background: var(--dark-light);
    }

    .skills-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 30px;
    }

    .skill-card {
        padding: 40px 30px;
        border-radius: 20px;
        background: var(--dark);
        border: 1px solid rgba(255, 255, 255, 0.05);
        transition: all 0.3s ease;
    }

    .skill-card:hover {
        border-color: rgba(99, 102, 241, 0.3);
        transform: translateY(-5px);
    }

    .skill-icon {
        width: 60px;
        height: 60px;
        background: var(--gradient);
        border-radius: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        color: var(--white);
        margin-bottom: 20px;
    }

    .skill-card h3 {
        font-family: 'Inter', sans-serif;
        font-size: 1.2rem;
        margin-bottom: 10px;
        color: var(--white);
    }

    .skill-card p {
        color: var(--gray);
        font-size: 0.95rem;
    }

    /* Portfolio Preview */
    .portfolio-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 30px;
    }

    .portfolio-card {
        cursor: pointer;
    }

    .portfolio-image {
        position: relative;
        overflow: hidden;
        border-radius: 20px 20px 0 0;
        aspect-ratio: 16/10;
    }

    .portfolio-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .portfolio-card:hover .portfolio-image img {
        transform: scale(1.1);
    }

    .portfolio-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(180deg, transparent 0%, rgba(15, 23, 42, 0.9) 100%);
        opacity: 0;
        transition: opacity 0.3s ease;
        display: flex;
        align-items: flex-end;
        padding: 30px;
    }

    .portfolio-card:hover .portfolio-overlay {
        opacity: 1;
    }

    .portfolio-info {
        padding: 25px;
    }

    .portfolio-category {
        display: inline-block;
        padding: 5px 15px;
        background: rgba(99, 102, 241, 0.1);
        color: var(--primary);
        border-radius: 50px;
        font-size: 0.8rem;
        font-weight: 600;
        margin-bottom: 10px;
    }

    .portfolio-info h3 {
        font-family: 'Inter', sans-serif;
        font-size: 1.2rem;
        color: var(--white);
        margin-bottom: 8px;
    }

    .portfolio-info p {
        color: var(--gray);
        font-size: 0.9rem;
    }

    /* CTA Section */
    .cta {
        text-align: center;
        background: linear-gradient(180deg, var(--dark) 0%, var(--dark-light) 100%);
    }

    .cta-content {
        max-width: 700px;
        margin: 0 auto;
    }

    .cta h2 {
        font-size: 2.5rem;
        color: var(--white);
        margin-bottom: 20px;
    }

    .cta p {
        color: var(--gray);
        font-size: 1.1rem;
        margin-bottom: 35px;
    }

    /* Responsive */
    @media (max-width: 992px) {
        .hero-content {
            grid-template-columns: 1fr;
            text-align: center;
        }

        .hero-text h1 {
            font-size: 2.5rem;
        }

        .hero-desc {
            margin: 0 auto 35px;
        }

        .hero-buttons {
            justify-content: center;
        }

        .hero-image-wrapper {
            width: 300px;
            height: 300px;
        }

        .stats {
            grid-template-columns: repeat(2, 1fr);
        }

        .skills-grid,
        .portfolio-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 576px) {
        .hero-text h1 {
            font-size: 2rem;
        }

        .stats {
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .stat-number {
            font-size: 2rem;
        }

        .skills-grid,
        .portfolio-grid {
            grid-template-columns: 1fr;
        }
    }
</style>
@endpush

@section('content')
    <!-- Hero Section -->
    <section class="hero">
        <div class="floating-elements">
            <div class="floating-element"></div>
            <div class="floating-element"></div>
            <div class="floating-element"></div>
        </div>
        
        <div class="container">
            <div class="hero-content">
                <div class="hero-text" data-aos="fade-right">
                    <h1>Halo, Saya <span>{{ $profile['name'] }}</span></h1>
                    <p class="hero-subtitle">{{ $profile['title'] }}</p>
                    <p class="hero-desc">{{ $profile['bio'] }}</p>
                    <div class="hero-buttons">
                        <a href="{{ route('portfolio') }}" class="btn btn-primary">
                            <i class="fas fa-briefcase"></i> Lihat Portfolio
                        </a>
                        <a href="{{ $profile['cv_link'] }}" class="btn btn-outline" target="_blank">
                            <i class="fas fa-download"></i> Download CV
                        </a>
                    </div>
                </div>
                <div class="hero-image" data-aos="fade-left">
                    <div class="hero-image-wrapper">
                        <img src="{{ $profile['photo'] }}" alt="{{ $profile['name'] }}">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="section" style="padding-top: 0;">
        <div class="container">
            <div class="stats" data-aos="fade-up">
                <div class="stat-item">
                    <div class="stat-number">5+</div>
                    <div class="stat-label">Tahun Pengalaman</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">50+</div>
                    <div class="stat-label">Project Selesai</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">30+</div>
                    <div class="stat-label">Klien Puas</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">10+</div>
                    <div class="stat-label">Penghargaan</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Skills Preview -->
    <section class="section skills-preview">
        <div class="container">
            <div class="section-header" data-aos="fade-up">
                <span class="section-subtitle">Keahlian</span>
                <h2 class="section-title">Apa yang Saya Lakukan</h2>
                <p class="section-desc">Saya memiliki berbagai keahlian untuk membantu mewujudkan ide Anda menjadi kenyataan.</p>
            </div>

            <div class="skills-grid">
                <div class="skill-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="skill-icon">
                        <i class="fas fa-code"></i>
                    </div>
                    <h3>Web Development</h3>
                    <p>Membangun website modern, responsif, dan performa tinggi dengan teknologi terkini.</p>
                </div>
                <div class="skill-card" data-aos="fade-up" data-aos-delay="200">
                    <div class="skill-icon">
                        <i class="fas fa-mobile-alt"></i>
                    </div>
                    <h3>Mobile App</h3>
                    <p>Mengembangkan aplikasi mobile yang user-friendly untuk iOS dan Android.</p>
                </div>
                <div class="skill-card" data-aos="fade-up" data-aos-delay="300">
                    <div class="skill-icon">
                        <i class="fas fa-palette"></i>
                    </div>
                    <h3>UI/UX Design</h3>
                    <p>Mendesain interface yang menarik dan pengalaman pengguna yang optimal.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Portfolio Preview -->
    <section class="section">
        <div class="container">
            <div class="section-header" data-aos="fade-up">
                <span class="section-subtitle">Portfolio</span>
                <h2 class="section-title">Project Terbaru</h2>
                <p class="section-desc">Beberapa karya terbaik yang telah saya selesaikan.</p>
            </div>

            <div class="portfolio-grid">
                @foreach($portfolios as $index => $portfolio)
                <a href="{{ route('portfolio.detail', $portfolio['id']) }}" class="card portfolio-card" data-aos="fade-up" data-aos-delay="{{ ($index + 1) * 100 }}">
                    <div class="portfolio-image">
                        <img src="{{ $portfolio['image'] }}" alt="{{ $portfolio['title'] }}">
                        <div class="portfolio-overlay"></div>
                    </div>
                    <div class="portfolio-info">
                        <span class="portfolio-category">{{ $portfolio['category'] }}</span>
                        <h3>{{ $portfolio['title'] }}</h3>
                        <p>{{ $portfolio['description'] }}</p>
                    </div>
                </a>
                @endforeach
            </div>

            <div style="text-align: center; margin-top: 50px;" data-aos="fade-up">
                <a href="{{ route('portfolio') }}" class="btn btn-primary">
                    Lihat Semua Project <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="section cta">
        <div class="container">
            <div class="cta-content" data-aos="fade-up">
                <h2>Punya Project Menarik?</h2>
                <p>Mari bekerja sama untuk mewujudkan ide Anda. Saya selalu terbuka untuk diskusi tentang project baru, ide kreatif, atau kesempatan untuk menjadi bagian dari visi Anda.</p>
                <a href="{{ route('contact') }}" class="btn btn-primary">
                    <i class="fas fa-envelope"></i> Hubungi Saya
                </a>
            </div>
        </div>
    </section>
@endsection
