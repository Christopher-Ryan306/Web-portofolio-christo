@extends('layouts.app')

@section('title', 'Kontak')

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

    /* Contact Content */
    .contact-content {
        display: grid;
        grid-template-columns: 1fr 1.5fr;
        gap: 60px;
    }

    /* Contact Info */
    .contact-info-card {
        background: var(--dark-light);
        border-radius: 20px;
        padding: 40px;
        height: fit-content;
    }

    .contact-info-card h3 {
        font-family: 'Inter', sans-serif;
        font-size: 1.5rem;
        color: var(--white);
        margin-bottom: 10px;
    }

    .contact-info-card > p {
        color: var(--gray);
        margin-bottom: 40px;
    }

    .contact-item {
        display: flex;
        gap: 20px;
        margin-bottom: 30px;
    }

    .contact-item:last-of-type {
        margin-bottom: 40px;
    }

    .contact-icon {
        width: 55px;
        height: 55px;
        background: rgba(99, 102, 241, 0.1);
        border-radius: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--primary);
        font-size: 1.2rem;
        flex-shrink: 0;
    }

    .contact-item h4 {
        font-family: 'Inter', sans-serif;
        font-size: 1rem;
        color: var(--white);
        margin-bottom: 5px;
    }

    .contact-item p,
    .contact-item a {
        color: var(--gray);
        font-size: 0.95rem;
    }

    .contact-item a:hover {
        color: var(--primary);
    }

    .contact-social {
        display: flex;
        gap: 15px;
        padding-top: 20px;
        border-top: 1px solid rgba(255, 255, 255, 0.1);
    }

    .contact-social a {
        width: 50px;
        height: 50px;
        background: rgba(255, 255, 255, 0.05);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--light);
        font-size: 1.2rem;
        transition: all 0.3s ease;
    }

    .contact-social a:hover {
        background: var(--gradient);
        transform: translateY(-3px);
    }

    /* Contact Form */
    .contact-form-card {
        background: var(--dark-light);
        border-radius: 20px;
        padding: 50px;
    }

    .contact-form-card h3 {
        font-family: 'Inter', sans-serif;
        font-size: 1.5rem;
        color: var(--white);
        margin-bottom: 30px;
    }

    .form-group {
        margin-bottom: 25px;
    }

    .form-group label {
        display: block;
        color: var(--light);
        margin-bottom: 10px;
        font-weight: 500;
    }

    .form-group input,
    .form-group textarea {
        width: 100%;
        padding: 16px 20px;
        background: var(--dark);
        border: 2px solid rgba(255, 255, 255, 0.05);
        border-radius: 12px;
        color: var(--light);
        font-size: 1rem;
        transition: all 0.3s ease;
        font-family: 'Inter', sans-serif;
    }

    .form-group input:focus,
    .form-group textarea:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.1);
    }

    .form-group input::placeholder,
    .form-group textarea::placeholder {
        color: var(--gray);
    }

    .form-group textarea {
        min-height: 150px;
        resize: vertical;
    }

    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }

    .btn-submit {
        width: 100%;
        padding: 18px;
        font-size: 1.1rem;
    }

    /* Alert */
    .alert {
        padding: 15px 20px;
        border-radius: 12px;
        margin-bottom: 25px;
    }

    .alert-success {
        background: rgba(16, 185, 129, 0.1);
        border: 1px solid rgba(16, 185, 129, 0.3);
        color: #10b981;
    }

    .alert-danger {
        background: rgba(239, 68, 68, 0.1);
        border: 1px solid rgba(239, 68, 68, 0.3);
        color: #ef4444;
    }

    /* Map Section */
    .map-section {
        background: var(--dark-light);
    }

    .map-container {
        border-radius: 20px;
        overflow: hidden;
        height: 400px;
    }

    .map-container iframe {
        width: 100%;
        height: 100%;
        border: none;
        filter: grayscale(1) invert(1);
        opacity: 0.8;
    }

    /* Responsive */
    @media (max-width: 992px) {
        .contact-content {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 576px) {
        .page-header h1 {
            font-size: 2rem;
        }

        .form-row {
            grid-template-columns: 1fr;
        }

        .contact-form-card {
            padding: 30px;
        }
    }
</style>
@endpush

@section('content')
    <!-- Page Header -->
    <section class="page-header">
        <div class="container">
            <span class="section-subtitle" data-aos="fade-up">Mari Terhubung</span>
            <h1 data-aos="fade-up" data-aos-delay="100">Hubungi Saya</h1>
            <p data-aos="fade-up" data-aos-delay="200">Punya pertanyaan atau ingin berkolaborasi? Jangan ragu untuk menghubungi saya!</p>
        </div>
    </section>

    <!-- Contact Content -->
    <section class="section" style="padding-top: 0;">
        <div class="container">
            <div class="contact-content">
                <!-- Contact Info -->
                <div class="contact-info-card" data-aos="fade-right">
                    <h3>Informasi Kontak</h3>
                    <p>Saya selalu terbuka untuk diskusi tentang project baru, ide kreatif, atau kesempatan untuk menjadi bagian dari visi Anda.</p>

                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div>
                            <h4>Email</h4>
                            <a href="mailto:{{ $profile['email'] }}">{{ $profile['email'] }}</a>
                        </div>
                    </div>

                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div>
                            <h4>Telepon</h4>
                            <a href="tel:{{ $profile['phone'] }}">{{ $profile['phone'] }}</a>
                        </div>
                    </div>

                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div>
                            <h4>Lokasi</h4>
                            <p>{{ $profile['location'] }}</p>
                        </div>
                    </div>

                    <div class="contact-social">
                        <a href="{{ $profile['social']['github'] }}" target="_blank"><i class="fab fa-github"></i></a>
                        <a href="{{ $profile['social']['linkedin'] }}" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                        <a href="{{ $profile['social']['instagram'] }}" target="_blank"><i class="fab fa-instagram"></i></a>
                        <a href="{{ $profile['social']['twitter'] }}" target="_blank"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>

                <!-- Contact Form -->
                <div class="contact-form-card" data-aos="fade-left">
                    <h3>Kirim Pesan</h3>

                    @if(session('success'))
                    <div class="alert alert-success">
                        <i class="fas fa-check-circle"></i> {{ session('success') }}
                    </div>
                    @endif

                    @if($errors->any())
                    <div class="alert alert-danger">
                        <i class="fas fa-exclamation-circle"></i> Mohon periksa kembali form Anda.
                    </div>
                    @endif

                    <form action="{{ route('contact.send') }}" method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="form-group">
                                <label for="name">Nama Lengkap</label>
                                <input type="text" id="name" name="name" placeholder="Masukkan nama Anda" value="{{ old('name') }}" required>
                                @error('name')
                                <small style="color: #ef4444;">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" placeholder="Masukkan email Anda" value="{{ old('email') }}" required>
                                @error('email')
                                <small style="color: #ef4444;">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="subject">Subject</label>
                            <input type="text" id="subject" name="subject" placeholder="Apa yang ingin Anda diskusikan?" value="{{ old('subject') }}" required>
                            @error('subject')
                            <small style="color: #ef4444;">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="message">Pesan</label>
                            <textarea id="message" name="message" placeholder="Tulis pesan Anda di sini..." required>{{ old('message') }}</textarea>
                            @error('message')
                            <small style="color: #ef4444;">{{ $message }}</small>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary btn-submit">
                            <i class="fas fa-paper-plane"></i> Kirim Pesan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <section class="section map-section">
        <div class="container">
            <div class="section-header" data-aos="fade-up">
                <span class="section-subtitle">Lokasi</span>
                <h2 class="section-title">Temukan Saya</h2>
            </div>
            <div class="map-container" data-aos="fade-up">
                <!-- Ganti dengan koordinat lokasi Anda -->
                <iframe src="[google.com](https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126920.29279966tried4!2d106.68942982872921!3d-6.229386678479522!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f3e945e34b9d%3A0x5371bf0fdad786a2!2sJakarta%2C%20Indonesia!5e0!3m2!1sen!2sus!4v1641234567890!5m2!1sen!2sus)" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </section>
@endsection
