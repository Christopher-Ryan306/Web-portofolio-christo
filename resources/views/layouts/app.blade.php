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
<!-- Floating Chatbot Button -->
<button id="chatbotBtn" class="fixed top-24 left-4 z-50 bg-sky-600 hover:bg-sky-700 text-white rounded-full w-14 h-14 flex items-center justify-center shadow-lg transition-all duration-300 hover:scale-110">
    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path>
    </svg>
</button>

<!-- Chatbot Modal -->
<div id="chatbotModal" class="fixed top-24 left-4 z-50 w-80 bg-gray-900 rounded-xl border border-sky-500/30 shadow-2xl hidden transition-all duration-300">
    <!-- Header -->
    <div class="bg-gradient-to-r from-sky-600 to-sky-700 p-4 rounded-t-xl flex justify-between items-center">
        <div class="flex items-center gap-2">
            <div class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></div>
            <span class="font-semibold text-white">AI Assistant</span>
        </div>
        <button id="closeChatbot" class="text-white hover:text-gray-300">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
    </div>
    
    <!-- Chat Messages -->
    <div id="chatMessages" class="h-96 overflow-y-auto p-4 space-y-3 bg-gray-900">
        <div class="flex items-start gap-2">
            <div class="w-7 h-7 rounded-full bg-sky-600 flex items-center justify-center text-xs flex-shrink-0">AI</div>
            <div class="bg-gray-800 rounded-lg p-3 max-w-[85%]">
                <p class="text-sm text-gray-200">Halo! 👋 Saya asisten virtual. Tanya apapun tentang website ini ya!</p>
            </div>
        </div>
    </div>
    
    <!-- Input Area -->
    <div class="p-3 border-t border-gray-800 bg-gray-900 rounded-b-xl">
        <div class="flex gap-2">
            <input type="text" id="chatInput" placeholder="Tanya sesuatu..." class="flex-1 p-2 bg-gray-800 border border-gray-700 rounded-lg text-sm text-white focus:outline-none focus:border-sky-500">
            <button id="sendChat" class="px-4 py-2 bg-sky-600 hover:bg-sky-700 rounded-lg transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                </svg>
            </button>
        </div>
    </div>
</div>

<script>
    // Toggle chatbot
    const chatbotBtn = document.getElementById('chatbotBtn');
    const chatbotModal = document.getElementById('chatbotModal');
    const closeChatbot = document.getElementById('closeChatbot');
    const chatInput = document.getElementById('chatInput');
    const sendBtn = document.getElementById('sendChat');
    const chatMessages = document.getElementById('chatMessages');
    
    // Data website untuk chatbot
    const websiteInfo = {
        name: "Portfolio Sound Engineer",
        owner: "Christopher Ryan Johnson",
        role: "Mahasiswa dan Freelancer Sound Engineer",
        about: "Saya adalah mahasiswa aktif MMB PENS yang memiliki pengalaman di bidang technical crew dan event production. Saya pernah bekerja sebagai Sound Engineer, Visual Jockey, serta Band Stage Crew.",
        portfolio: "Website ini menampilkan portfolio project sound engineering seperti Live Sound, Studio Mix, dan Event Production.",
        contact: "Kontak bisa melalui Email: rynz3060@gmail.com, WhatsApp: 08813456890, Instagram: @nna.yrrr",
        features: "Website memiliki fitur: Landing page dengan animasi, model 3D interaktif, gallery portfolio, sistem login admin untuk mengelola konten.",
        tech: "Website ini dibuat dengan Laravel, Tailwind CSS, Three.js untuk model 3D, dan SQLite sebagai database."
    };
    
    // Fungsi bot reply
    function getBotReply(question) {
        const q = question.toLowerCase();
        
        if (q.includes('halo') || q.includes('hai') || q.includes('hello')) {
            return "Halo! 👋 Ada yang bisa saya bantu tentang website ini?";
        }
        if (q.includes('nama') || q.includes('siapa')) {
            return `Website ini adalah ${websiteInfo.name} milik ${websiteInfo.owner}. ${websiteInfo.role}.`;
        }
        if (q.includes('tentang') || q.includes('about')) {
            return websiteInfo.about;
        }
        if (q.includes('portfolio') || q.includes('project')) {
            return websiteInfo.portfolio;
        }
        if (q.includes('kontak') || q.includes('contact') || q.includes('email') || q.includes('wa')) {
            return websiteInfo.contact;
        }
        if (q.includes('fitur') || q.includes('bisa apa')) {
            return websiteInfo.features;
        }
        if (q.includes('teknologi') || q.includes('tech') || q.includes('dibuat')) {
            return websiteInfo.tech;
        }
        if (q.includes('model 3d') || q.includes('3d')) {
            return "Model 3D menggunakan Three.js. Kamu bisa drag untuk memutar, dan scroll untuk zoom. Model bisa diupload melalui halaman admin.";
        }
        if (q.includes('login') || q.includes('admin')) {
            return "Login admin menggunakan email: admin@admin.com, password: password123. Setelah login, kamu bisa mengubah profile, portfolio, dan kontak.";
        }
        if (q.includes('terima kasih') || q.includes('thanks')) {
            return "Sama-sama! 😊 Ada yang lain bisa saya bantu?";
        }
        
        return "Maaf, saya kurang paham. Coba tanya tentang: profil, portfolio, kontak, fitur, teknologi, atau login ya!";
    }
    
    // Tambah pesan ke chat
    function addMessage(text, isUser) {
        const messageDiv = document.createElement('div');
        messageDiv.className = `flex items-start gap-2 ${isUser ? 'flex-row-reverse' : ''}`;
        
        if (isUser) {
            messageDiv.innerHTML = `
                <div class="w-7 h-7 rounded-full bg-gray-700 flex items-center justify-center text-xs flex-shrink-0">👤</div>
                <div class="bg-sky-600 rounded-lg p-3 max-w-[85%]">
                    <p class="text-sm text-white">${text}</p>
                </div>
            `;
        } else {
            messageDiv.innerHTML = `
                <div class="w-7 h-7 rounded-full bg-sky-600 flex items-center justify-center text-xs flex-shrink-0">AI</div>
                <div class="bg-gray-800 rounded-lg p-3 max-w-[85%]">
                    <p class="text-sm text-gray-200">${text}</p>
                </div>
            `;
        }
        
        chatMessages.appendChild(messageDiv);
        chatMessages.scrollTop = chatMessages.scrollHeight;
    }
    
    // Kirim pesan
    function sendMessage() {
        const question = chatInput.value.trim();
        if (!question) return;
        
        addMessage(question, true);
        chatInput.value = '';
        
        setTimeout(() => {
            const reply = getBotReply(question);
            addMessage(reply, false);
        }, 500);
    }
    
    // Event listeners
    chatbotBtn.addEventListener('click', () => {
        chatbotModal.classList.toggle('hidden');
    });
    
    closeChatbot.addEventListener('click', () => {
        chatbotModal.classList.add('hidden');
    });
    
    sendBtn.addEventListener('click', sendMessage);
    
    chatInput.addEventListener('keypress', (e) => {
        if (e.key === 'Enter') sendMessage();
    });
    
    // Klik di luar modal untuk tutup (opsional)
    document.addEventListener('click', (e) => {
        if (!chatbotModal.contains(e.target) && !chatbotBtn.contains(e.target)) {
            chatbotModal.classList.add('hidden');
        }
    });
</script>
</body>
</html>