<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Portfolio {{ $profile['name'] }} - {{ $profile['title'] }}">
    <title>@yield('title', $profile['name']) | Portfolio</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="[fonts.googleapis.com](https://fonts.googleapis.com)">
    <link rel="preconnect" href="[fonts.gstatic.com](https://fonts.gstatic.com)" crossorigin>
    <link href="[fonts.googleapis.com](https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Playfair+Display:wght@600;700&display=swap)" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="[cdnjs.cloudflare.com](https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css)">
    
    <!-- AOS Animation -->
    <link href="[unpkg.com](https://unpkg.com/aos@2.3.1/dist/aos.css)" rel="stylesheet">
    
    <style>
        :root {
            --primary: #6366f1;
            --primary-dark: #4f46e5;
            --secondary: #0ea5e9;
            --dark: #0f172a;
            --dark-light: #1e293b;
            --gray: #64748b;
            --light: #f1f5f9;
            --white: #ffffff;
            --gradient: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--dark);
            color: var(--light);
            line-height: 1.6;
            overflow-x: hidden;
        }

        h1, h2, h3, h4 {
            font-family: 'Playfair Display', serif;
        }

        a {
            text-decoration: none;
            color: inherit;
            transition: all 0.3s ease;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Navbar */
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            padding: 20px 0;
            transition: all 0.3s ease;
        }

        .navbar.scrolled {
            background: rgba(15, 23, 42, 0.95);
            backdrop-filter: blur(10px);
            padding: 15px 0;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.3);
        }

        .navbar .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 1.8rem;
            font-weight: 800;
            background: var(--gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .nav-links {
            display: flex;
            gap: 40px;
            list-style: none;
        }

        .nav-links a {
            font-weight: 500;
            color: var(--light);
            position: relative;
            padding: 5px 0;
        }

        .nav-links a::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--gradient);
            transition: width 0.3s ease;
        }

        .nav-links a:hover::after,
        .nav-links a.active::after {
            width: 100%;
        }

        .nav-links a.active {
            color: var(--primary);
        }

        .mobile-toggle {
            display: none;
            flex-direction: column;
            gap: 6px;
            cursor: pointer;
            z-index: 1001;
        }

        .mobile-toggle span {
            width: 25px;
            height: 2px;
            background: var(--light);
            transition: all 0.3s ease;
        }

        /* Buttons */
        .btn {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 14px 32px;
            border-radius: 50px;
            font-weight: 600;
            cursor: pointer;
            border: none;
            transition: all 0.3s ease;
            font-size: 1rem;
        }

        .btn-primary {
            background: var(--gradient);
            color: var(--white);
            box-shadow: 0 4px 20px rgba(99, 102, 241, 0.4);
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 30px rgba(99, 102, 241, 0.5);
        }

        .btn-outline {
            background: transparent;
            color: var(--light);
            border: 2px solid var(--gray);
        }

        .btn-outline:hover {
            border-color: var(--primary);
            color: var(--primary);
        }

        /* Section Styles */
        .section {
            padding: 100px 0;
        }

        .section-header {
            text-align: center;
            margin-bottom: 60px;
        }

        .section-subtitle {
            display: inline-block;
            padding: 8px 20px;
            background: rgba(99, 102, 241, 0.1);
            border-radius: 50px;
            color: var(--primary);
            font-size: 0.9rem;
            font-weight: 600;
            margin-bottom: 15px;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .section-title {
            font-size: 2.8rem;
            margin-bottom: 20px;
            background: var(--gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .section-desc {
            color: var(--gray);
            max-width: 600px;
            margin: 0 auto;
            font-size: 1.1rem;
        }

        /* Cards */
        .card {
            background: var(--dark-light);
            border-radius: 20px;
            overflow: hidden;
            transition: all 0.4s ease;
            border: 1px solid rgba(255, 255, 255, 0.05);
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
            border-color: rgba(99, 102, 241, 0.3);
        }

        /* Footer */
        .footer {
            background: var(--dark-light);
            padding: 60px 0 30px;
            border-top: 1px solid rgba(255, 255, 255, 0.05);
        }

        .footer-content {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr;
            gap: 60px;
            margin-bottom: 40px;
        }

        .footer-brand p {
            color: var(--gray);
            margin: 20px 0;
            max-width: 350px;
        }

        .footer-social {
            display: flex;
            gap: 15px;
        }

        .footer-social a {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.05);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--light);
            transition: all 0.3s ease;
        }

        .footer-social a:hover {
            background: var(--gradient);
            transform: translateY(-3px);
        }

        .footer-links h4 {
            font-family: 'Inter', sans-serif;
            font-size: 1.1rem;
            margin-bottom: 25px;
            color: var(--white);
        }

        .footer-links ul {
            list-style: none;
        }

        .footer-links li {
            margin-bottom: 12px;
        }

        .footer-links a {
            color: var(--gray);
        }

        .footer-links a:hover {
            color: var(--primary);
        }

        .footer-bottom {
            text-align: center;
            padding-top: 30px;
            border-top: 1px solid rgba(255, 255, 255, 0.05);
            color: var(--gray);
        }

        /* Responsive */
        @media (max-width: 992px) {
            .footer-content {
                grid-template-columns: 1fr 1fr;
            }
        }

        @media (max-width: 768px) {
            .mobile-toggle {
                display: flex;
            }

            .nav-links {
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: var(--dark);
                flex-direction: column;
                align-items: center;
                justify-content: center;
                gap: 30px;
                transform: translateX(100%);
                transition: transform 0.3s ease;
            }

            .nav-links.active {
                transform: translateX(0);
            }

            .section-title {
                font-size: 2rem;
            }

            .footer-content {
                grid-template-columns: 1fr;
                gap: 40px;
                text-align: center;
            }

            .footer-brand p {
                max-width: 100%;
            }

            .footer-social {
                justify-content: center;
            }
        }

        /* Page specific styles will be in each page */
        @yield('styles')
    </style>
    @stack('styles')
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar" id="navbar">
        <div class="container">
            <a href="{{ route('home') }}" class="logo">{{ explode(' ', $profile['name'])[0] }}.</a>
            
            <ul class="nav-links" id="navLinks">
                <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a></li>
                <li><a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">Tentang</a></li>
                <li><a href="{{ route('portfolio') }}" class="{{ request()->routeIs('portfolio*') ? 'active' : '' }}">Portfolio</a></li>
                <li><a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}">Kontak</a></li>
            </ul>

            <div class="mobile-toggle" id="mobileToggle">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-brand">
                    <a href="{{ route('home') }}" class="logo">{{ explode(' ', $profile['name'])[0] }}.</a>
                    <p>{{ $profile['bio'] }}</p>
                    <div class="footer-social">
                        <a href="{{ $profile['social']['github'] }}" target="_blank"><i class="fab fa-github"></i></a>
                        <a href="{{ $profile['social']['linkedin'] }}" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                        <a href="{{ $profile['social']['instagram'] }}" target="_blank"><i class="fab fa-instagram"></i></a>
                        <a href="{{ $profile['social']['twitter'] }}" target="_blank"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>

                <div class="footer-links">
                    <h4>Quick Links</h4>
                    <ul>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('about') }}">Tentang Saya</a></li>
                        <li><a href="{{ route('portfolio') }}">Portfolio</a></li>
                        <li><a href="{{ route('contact') }}">Kontak</a></li>
                    </ul>
                </div>

                <div class="footer-links">
                    <h4>Kontak</h4>
                    <ul>
                        <li><i class="fas fa-envelope"></i> {{ $profile['email'] }}</li>
                        <li><i class="fas fa-phone"></i> {{ $profile['phone'] }}</li>
                        <li><i class="fas fa-map-marker-alt"></i> {{ $profile['location'] }}</li>
                    </ul>
                </div>
            </div>

            <div class="footer-bottom">
                <p>&copy; {{ date('Y') }} {{ $profile['name'] }}. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- AOS Animation -->
    <script src="[unpkg.com](https://unpkg.com/aos@2.3.1/dist/aos.js)"></script>
    <script>
        AOS.init({
            duration: 800,
            easing: 'ease-out-cubic',
            once: true
        });

        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // Mobile menu toggle
        const mobileToggle = document.getElementById('mobileToggle');
        const navLinks = document.getElementById('navLinks');
        
        mobileToggle.addEventListener('click', function() {
            navLinks.classList.toggle('active');
        });
    </script>
    @stack('scripts')
</body>
</html>
