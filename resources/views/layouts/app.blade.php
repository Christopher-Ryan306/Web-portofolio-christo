<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sound Engineer Portfolio')</title>
    
    <!-- Font Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-black text-white">

<!-- Navbar Fixed -->
<nav class="fixed top-0 left-0 w-full z-50 bg-black/90 backdrop-blur-md border-b border-sky-500/30 py-4">
    <div class="max-w-7xl mx-auto px-6 flex justify-between items-center">
        <a href="#home" class="text-2xl font-black tracking-wider">
            <span class="text-sky-400">RY</span>PROJECT
        </a>
        
        <div class="hidden md:flex gap-8 items-center">
            <a href="#home" class="nav-link hover:text-sky-400 transition">Home</a>
            <a href="#about" class="nav-link hover:text-sky-400 transition">About</a>
            <a href="#portfolio" class="nav-link hover:text-sky-400 transition">Portfolio</a>
            <a href="#contact" class="nav-link hover:text-sky-400 transition">Contact</a>
            @auth
                <a href="{{ route('admin.profile.edit') }}" class="px-4 py-2 bg-sky-600 hover:bg-sky-700 rounded-lg transition">Admin</a>
            @else
                <a href="{{ route('login') }}" class="px-4 py-2 border border-sky-500 hover:bg-sky-500/20 rounded-lg transition">Login</a>
            @endauth
        </div>
        
        <!-- Mobile Menu Button -->
        <button id="mobileMenuBtn" class="md:hidden text-2xl">
            ☰
        </button>
    </div>
    
    <!-- Mobile Menu -->
    <div id="mobileMenu" class="hidden md:hidden bg-black/95 backdrop-blur-md absolute top-full left-0 w-full py-4 border-t border-sky-500/30">
        <div class="flex flex-col items-center gap-4">
            <a href="#home" class="nav-link py-2 hover:text-sky-400">Home</a>
            <a href="#about" class="nav-link py-2 hover:text-sky-400">About</a>
            <a href="#portfolio" class="nav-link py-2 hover:text-sky-400">Portfolio</a>
            <a href="#contact" class="nav-link py-2 hover:text-sky-400">Contact</a>
            @auth
                <a href="{{ route('admin.profile.edit') }}" class="px-4 py-2 bg-sky-600 rounded-lg">Admin</a>
            @else
                <a href="{{ route('login') }}" class="px-4 py-2 border border-sky-500 rounded-lg">Login</a>
            @endauth
        </div>
    </div>
</nav>

<main>
    @yield('content')
</main>

<footer class="bg-black/90 border-t border-sky-500/30 py-8 text-center text-gray-500">
    <p>© {{ date('Y') }} RY Project Portfolio. Built with passion 🎧</p>
</footer>

<script>
    // Mobile menu toggle
    const mobileBtn = document.getElementById('mobileMenuBtn');
    const mobileMenu = document.getElementById('mobileMenu');
    if (mobileBtn) {
        mobileBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    }
    
    // Close mobile menu after clicking link
    document.querySelectorAll('.nav-link').forEach(link => {
        link.addEventListener('click', () => {
            mobileMenu.classList.add('hidden');
        });
    });
    
    // Active nav link on scroll
    window.addEventListener('scroll', () => {
        const sections = document.querySelectorAll('section');
        const navLinks = document.querySelectorAll('.nav-link');
        
        let current = '';
        sections.forEach(section => {
            const sectionTop = section.offsetTop - 100;
            const sectionHeight = section.clientHeight;
            if (pageYOffset >= sectionTop) {
                current = section.getAttribute('id');
            }
        });
        
        navLinks.forEach(link => {
            link.classList.remove('text-sky-400');
            if (link.getAttribute('href') === '#' + current) {
                link.classList.add('text-sky-400');
            }
        });
    });
</script>
</body>
</html>