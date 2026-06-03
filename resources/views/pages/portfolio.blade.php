@extends('layouts.app')

@section('title', 'Portfolio')

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

    /* Filter Buttons */
    .filter-buttons {
        display: flex;
        justify-content: center;
        gap: 15px;
        flex-wrap: wrap;
        margin-bottom: 50px;
    }

    .filter-btn {
        padding: 12px 28px;
        border: 2px solid rgba(255, 255, 255, 0.1);
        background: transparent;
        color: var(--gray);
        border-radius: 50px;
        cursor: pointer;
        transition: all 0.3s ease;
        font-weight: 500;
    }

    .filter-btn:hover,
    .filter-btn.active {
        border-color: var(--primary);
        color: var(--primary);
        background: rgba(99, 102, 241, 0.1);
    }

    /* Portfolio Grid */
    .portfolio-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 30px;
    }

    .portfolio-card {
        cursor: pointer;
        overflow: hidden;
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
        background: linear-gradient(180deg, transparent 0%, rgba(15, 23, 42, 0.95) 100%);
        opacity: 0;
        transition: opacity 0.3s ease;
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
        padding: 30px;
    }

    .portfolio-card:hover .portfolio-overlay {
        opacity: 1;
    }

    .portfolio-overlay-content {
        transform: translateY(20px);
        transition: transform 0.3s ease;
    }

    .portfolio-card:hover .portfolio-overlay-content {
        transform: translateY(0);
    }

    .portfolio-overlay h3 {
        font-family: 'Inter', sans-serif;
        font-size: 1.3rem;
        color: var(--white);
        margin-bottom: 10px;
    }

    .portfolio-overlay p {
        color: var(--gray);
        font-size: 0.95rem;
        margin-bottom: 15px;
    }

    .portfolio-overlay .btn {
        padding: 10px 20px;
        font-size: 0.9rem;
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
        margin-bottom: 12px;
    }

    .portfolio-info h3 {
        font-family: 'Inter', sans-serif;
        font-size: 1.3rem;
        color: var(--white);
        margin-bottom: 10px;
    }

    .portfolio-info p {
        color: var(--gray);
        font-size: 0.95rem;
    }

    .portfolio-tech {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
        margin-top: 15px;
    }

    .portfolio-tech span {
        padding: 5px 12px;
        background: var(--dark);
        color: var(--gray);
        border-radius: 5px;
        font-size: 0.8rem;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .page-header h1 {
            font-size: 2rem;
        }

        .portfolio-grid {
            grid-template-columns: 1fr;
        }
    }
</style>
@endpush

@section('content')
    <!-- Page Header -->
    <section class="page-header">
        <div class="container">
            <span class="section-subtitle" data-aos="fade-up">Karya Saya</span>
            <h1 data-aos="fade-up" data-aos-delay="100">Portfolio</h1>
            <p data-aos="fade-up" data-aos-delay="200">Kumpulan project dan karya yang telah saya kerjakan</p>
        </div>
    </section>

    <!-- Portfolio Section -->
    <section class="section" style="padding-top: 0;">
        <div class="container">
            <!-- Filter Buttons -->
            <div class="filter-buttons" data-aos="fade-up">
                <button class="filter-btn active" data-filter="all">Semua</button>
                <button class="filter-btn" data-filter="Web Development">Web Development</button>
                <button class="filter-btn" data-filter="Mobile App">Mobile App</button>
                <button class="filter-btn" data-filter="UI/UX Design">UI/UX Design</button>
            </div>

            <!-- Portfolio Grid -->
            <div class="portfolio-grid">
                @foreach($portfolios as $index => $portfolio)
                <a href="{{ route('portfolio.detail', $portfolio['id']) }}" class="card portfolio-card" data-category="{{ $portfolio['category'] }}" data-aos="fade-up" data-aos-delay="{{ ($index + 1) * 100 }}">
                    <div class="portfolio-image">
                        <img src="{{ $portfolio['image'] }}" alt="{{ $portfolio['title'] }}">
                        <div class="portfolio-overlay">
                            <div class="portfolio-overlay-content">
                                <h3>{{ $portfolio['title'] }}</h3>
                                <p>{{ $portfolio['description'] }}</p>
                                <span class="btn btn-primary">Lihat Detail <i class="fas fa-arrow-right"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="portfolio-info">
                        <span class="portfolio-category">{{ $portfolio['category'] }}</span>
                        <h3>{{ $portfolio['title'] }}</h3>
                        <p>{{ $portfolio['description'] }}</p>
                        <div class="portfolio-tech">
                            @foreach(array_slice($portfolio['technologies'], 0, 3) as $tech)
                            <span>{{ $tech }}</span>
                            @endforeach
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script>
    // Simple filter functionality
    document.querySelectorAll('.filter-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            // Update active button
            document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
            this.classList.add('active');

            const filter = this.getAttribute('data-filter');
            
            document.querySelectorAll('.portfolio-card').forEach(card => {
                if (filter === 'all' || card.getAttribute('data-category') === filter) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    });
</script>
@endpush
