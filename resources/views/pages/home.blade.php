@extends('layouts.app')
@section('title', 'Sound Engineer Portfolio')

@section('content')
{{-- ========== HERO SECTION (HOME) dengan Model 3D ========== --}}
<section id="home" class="min-h-screen flex items-center justify-center relative overflow-hidden pt-20">
    <!-- Background Audio Wave Animation -->
    <canvas id="waveCanvas" class="absolute inset-0 w-full h-full opacity-30"></canvas>
    
    <div class="relative z-10 max-w-7xl mx-auto px-6">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <!-- Left Side - Text -->
            <div class="text-center md:text-left">
                <p class="text-sky-400 font-semibold tracking-[0.3em] mb-4">SOUND ENGINEER</p>
                <h1 class="text-5xl md:text-7xl font-black mb-4">
                    {{ $profile->name ?? 'YOUR NAME' }}
                </h1>
                <div class="text-xl md:text-2xl text-sky-400 font-semibold mb-6 h-10">
                    <span class="typing-text"></span>
                </div>
                <p class="text-gray-300 mb-8 text-lg">
                    {{ $profile->bio ?? 'Mixing the perfect sound, one frequency at a time.' }}
                </p>
                <div class="flex gap-4 justify-center md:justify-start flex-wrap">
                    <a href="#portfolio" class="px-8 py-3 bg-sky-600 hover:bg-sky-700 rounded-lg transition-all duration-300 font-semibold shadow-lg shadow-sky-600/30">
                        View Projects
                    </a>
                    <a href="#contact" class="px-8 py-3 border border-sky-500 hover:bg-sky-500/10 rounded-lg transition">
                        Get in Touch
                    </a>
                </div>
            </div>
            
            <!-- Right Side - 3D Model -->
            <div>
                <div id="model-viewer" class="w-full h-[500px] md:h-[550px] relative overflow-hidden" style="background: transparent; border: none;">
                    <div id="model-loading" class="absolute inset-0 flex items-center justify-center text-sky-400">
                        Loading 3D Model...
                    </div>
                </div>
                <p class="text-center text-gray-500 text-sm mt-3">🖱️ Drag to rotate • Scroll to zoom</p>
            </div>
        </div>
    </div>
    
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
        <a href="#about" class="text-sky-400 text-2xl">↓</a>
    </div>
</section>
    
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
        <a href="#about" class="text-sky-400 text-2xl">↓</a>
    </div>
</section>

    {{-- ========== ABOUT SECTION dengan FOTO PROFILE ========== --}}
<section id="about" class="py-24 px-6 max-w-7xl mx-auto">
    <div class="text-center mb-16">
        <h2 class="text-4xl md:text-5xl font-bold mb-4">
            About <span class="text-sky-400">Me</span>
        </h2>
        <div class="w-20 h-1 bg-sky-500 mx-auto"></div>
    </div>
    
    <div class="grid md:grid-cols-2 gap-12 items-center">
        <!-- Left Side - Foto Profile -->
        <div class="flex justify-center">
            @if($profile && $profile->photo)
            <div class="relative">
                <div class="w-64 h-64 md:w-80 md:h-80 rounded-2xl overflow-hidden border-4 border-sky-500 shadow-2xl shadow-sky-500/30 bg-black">
                    <img src="{{ asset('storage/'.$profile->photo) }}" 
                         alt="Profile Photo" 
                         class="w-full h-full object-cover object-[center_15%]">
                </div>
                <!-- Decorative ring -->
                <div class="absolute -inset-4 rounded-2xl border-2 border-sky-500/20 -z-10"></div>
                <div class="absolute -inset-8 rounded-2xl border border-sky-500/10 -z-20"></div>
            </div>
            @else
            <div class="w-64 h-64 md:w-80 md:h-80 rounded-2xl bg-gradient-to-br from-sky-900/40 to-black flex items-center justify-center border-2 border-sky-500/30">
                <span class="text-sky-400 text-6xl">🎧</span>
            </div>
            @endif
        </div>
        
        <!-- Right Side - About Text -->
        <div>
            <p class="text-sky-400 font-semibold tracking-widest mb-3">WHO AM I</p>
            <h3 class="text-3xl font-bold mb-4">{{ $profile->name ?? 'Your Name' }}</h3>
            <p class="text-xl text-sky-400 mb-6">{{ $profile->title ?? 'Sound Engineer' }}</p>
            <div class="text-gray-300 space-y-4 leading-relaxed">
                {!! nl2br(e($profile->about_long ?? 'Tulis cerita panjang tentang dirimu di halaman admin. Ceritakan pengalaman sound engineering, alat yang dikuasai, project pernah dikerjakan, dan filosofi audio kamu.')) !!}
            </div>
            @if($profile && $profile->cv_file)
            <a href="{{ asset('storage/'.$profile->cv_file) }}" target="_blank" class="inline-flex items-center gap-2 mt-8 px-6 py-3 bg-sky-600 hover:bg-sky-700 rounded-lg transition">
                 Download CV
            </a>
            @endif
        </div>
    </div>
</section>
    

{{-- ========== PORTFOLIO SECTION ========== --}}
<section id="portfolio" class="py-24 px-6 bg-black/40">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-bold mb-4">
                My <span class="text-sky-400">Portofolio</span>
            </h2>
            <div class="w-20 h-1 bg-sky-500 mx-auto"></div>
            <p class="text-gray-400 mt-4"></p>
        </div>
        
        @if($portfolios->isEmpty())
            <p class="text-center text-gray-500">Belum ada project. Tambahkan dari admin panel.</p>
        @else
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($portfolios as $p)
<a href="{{ route('portfolio.detail', $p->id) }}" class="group bg-gradient-to-br from-gray-900 to-black border border-sky-500/20 rounded-xl overflow-hidden hover:border-sky-500/60 transition-all duration-300 hover:-translate-y-2 block">
    @if($p->image)
        <div class="overflow-hidden">
            <img src="{{ asset('storage/'.$p->image) }}" class="w-full h-56 object-cover group-hover:scale-110 transition duration-500">
        </div>
    @else
        <div class="w-full h-56 bg-gradient-to-br from-sky-900/40 to-black flex items-center justify-center">
            <span class="text-sky-400 text-5xl">🎚️</span>
        </div>
    @endif
    <div class="p-6">
        <span class="text-xs text-sky-400 font-semibold tracking-widest">{{ $p->category ?? 'PROJECT' }}</span>
        <h3 class="text-xl font-bold mt-2 mb-3 group-hover:text-sky-400 transition">{{ $p->title }}</h3>
        <p class="text-gray-400 mb-4 line-clamp-2 text-sm">{{ $p->description }}</p>
        <div class="text-sm text-gray-500 space-y-1">
            @if($p->client)<p>Client: <span class="text-gray-300">{{ $p->client }}</span></p>@endif
            @if($p->projectdate)<p>Date: <span class="text-gray-300">{{ $p->projectdate->format('M Y') }}</span></p>@endif
        </div>
    </div>
</a>
@endforeach
                </div>
        @endif
    </div>
</section>

{{-- ========== CONTACT SECTION ========== --}}
<section id="contact" class="py-24 px-6 max-w-6xl mx-auto">
    <div class="text-center mb-16">
        <h2 class="text-4xl md:text-5xl font-bold mb-4">
            My <span class="text-sky-400">Contact</span>
        </h2>
        <div class="w-20 h-1 bg-sky-500 mx-auto"></div>
        <p class="text-gray-400 mt-4"></p>
    </div>
    
    <div class="grid md:grid-cols-2 gap-6">
        @php
            $items = [
                ['icon' => '', 'label' => 'Email', 'value' => $contact->email ?? null, 'link' => $contact->email ? 'mailto:'.$contact->email : null],
                ['icon' => '', 'label' => 'Phone', 'value' => $contact->phone ?? null, 'link' => $contact->phone ? 'tel:'.$contact->phone : null],
                ['icon' => '', 'label' => 'WhatsApp', 'value' => $contact->whatsapp ?? null, 'link' => $contact->whatsapp ? 'https://wa.me/'.preg_replace('/[^0-9]/', '', $contact->whatsapp) : null],
                ['icon' => '', 'label' => 'Instagram', 'value' => $contact->instagram ?? null, 'link' => $contact->instagram ? 'https://instagram.com/'.ltrim($contact->instagram, '@') : null],
                ['icon' => '', 'label' => 'YouTube', 'value' => $contact->youtube ?? null, 'link' => $contact->youtube ?? null],
                ['icon' => '', 'label' => 'LinkedIn', 'value' => $contact->linkedin ?? null, 'link' => $contact->linkedin ?? null],
            ];
        @endphp

        @foreach($items as $item)
            @if($item['value'])
            <a href="{{ $item['link'] }}" target="_blank" class="group flex items-center gap-4 p-6 bg-gradient-to-br from-gray-900 to-black border border-sky-500/20 rounded-xl hover:border-sky-500/60 transition-all duration-300 hover:-translate-y-1">
                <span class="text-4xl">{{ $item['icon'] }}</span>
                <div>
                    <p class="text-sky-400 text-sm font-semibold">{{ $item['label'] }}</p>
                    <p class="text-white font-medium">{{ $item['value'] }}</p>
                </div>
            </a>
            @endif
        @endforeach
    </div>
    
    @if($contact && $contact->address)
    <div class="mt-6 p-6 bg-gradient-to-br from-gray-900 to-black border border-sky-500/20 rounded-xl">
        <p class="text-sky-400 text-sm font-semibold mb-2">📍 Studio Location</p>
        <p class="text-gray-300">{{ $contact->address }}</p>
    </div>
    @endif
</section>

{{-- Animasi Audio Wave --}}
<script>
const canvas = document.getElementById('waveCanvas');
if (canvas) {
    const ctx = canvas.getContext('2d');
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;
    
    let t = 0;
    function drawWave() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        ctx.strokeStyle = '#38bdf8';
        ctx.lineWidth = 2;
        for (let i = 0; i < 5; i++) {
            ctx.beginPath();
            ctx.globalAlpha = 0.3 - (i * 0.05);
            for (let x = 0; x < canvas.width; x += 5) {
                const y = canvas.height/2 + Math.sin((x + t + i*100) * 0.01) * (50 + i*20);
                x === 0 ? ctx.moveTo(x, y) : ctx.lineTo(x, y);
            }
            ctx.stroke();
        }
        t += 2;
        requestAnimationFrame(drawWave);
    }
    drawWave();
    
    window.addEventListener('resize', () => {
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;
    });
}

// Typing animation
const words = ['Sound Engineer', 'Stage Crew', 'Live Sound Expert', 'Visual Jockey'];
let wordIndex = 0;
let charIndex = 0;
let isDeleting = false;
const typingElement = document.querySelector('.typing-text');

function typeEffect() {
    const currentWord = words[wordIndex];
    if (isDeleting) {
        typingElement.textContent = currentWord.substring(0, charIndex - 1);
        charIndex--;
    } else {
        typingElement.textContent = currentWord.substring(0, charIndex + 1);
        charIndex++;
    }
    
    if (!isDeleting && charIndex === currentWord.length) {
        isDeleting = true;
        setTimeout(typeEffect, 2000);
        return;
    }
    
    if (isDeleting && charIndex === 0) {
        isDeleting = false;
        wordIndex = (wordIndex + 1) % words.length;
    }
    
    setTimeout(typeEffect, isDeleting ? 100 : 150);
}

if (typingElement) typeEffect();
</script>

{{-- Three.js untuk Model 3D --}}
<script type="importmap">
{
    "imports": {
        "three": "https://unpkg.com/three@0.160.0/build/three.module.js",
        "three/addons/": "https://unpkg.com/three@0.160.0/examples/jsm/"
    }
}
</script>

<script type="module">
import * as THREE from 'three';
import { OrbitControls } from 'three/addons/controls/OrbitControls.js';
import { GLTFLoader } from 'three/addons/loaders/GLTFLoader.js';

const container = document.getElementById('model-viewer');
if (container) {
    const loading = document.getElementById('model-loading');
    
    // Hapus background/warna container biar transparan
    container.style.background = 'transparent';
    container.style.border = 'none';
    
    const scene = new THREE.Scene();
    scene.background = null; // Transparan
    
    const camera = new THREE.PerspectiveCamera(45, container.clientWidth / container.clientHeight, 0.1, 1000);
    camera.position.set(0, 1.5, 4); // Posisi kamera di tengah
    
    const renderer = new THREE.WebGLRenderer({ antialias: true, alpha: true }); // alpha true = transparan
    renderer.setSize(container.clientWidth, container.clientHeight);
    renderer.setClearColor(0x000000, 0); // Clear color transparan
    renderer.setPixelRatio(window.devicePixelRatio);
    container.appendChild(renderer.domElement);
    
    // ========== LIGHTING YANG LEBIH TERANG ==========
    
    // Ambient light - terang merata
    const ambientLight = new THREE.AmbientLight(0xffffff, 0.7);
    scene.add(ambientLight);
    
    // Main light dari depan atas (warna putih terang)
    const mainLight = new THREE.DirectionalLight(0xffffff, 1.2);
    mainLight.position.set(2, 3, 2);
    scene.add(mainLight);
    
    // Fill light dari samping kiri
    const fillLight = new THREE.DirectionalLight(0x88aaff, 0.8);
    fillLight.position.set(-2, 1, 2);
    scene.add(fillLight);
    
    // Back light dari belakang (buat outline)
    const backLight = new THREE.DirectionalLight(0x3388ff, 0.6);
    backLight.position.set(0, 2, -3);
    scene.add(backLight);
    
    // Rim light dari kanan bawah (efek dramatis)
    const rimLight = new THREE.PointLight(0x44aaff, 0.5);
    rimLight.position.set(1, 0, 1.5);
    scene.add(rimLight);
    
    // Soft fill dari bawah
    const bottomFill = new THREE.PointLight(0x6699ff, 0.3);
    bottomFill.position.set(0, -1, 0);
    scene.add(bottomFill);
    
    // Controls
    const controls = new OrbitControls(camera, renderer.domElement);
    controls.enableDamping = true;
    controls.dampingFactor = 0.05;
    controls.minDistance = 2;
    controls.maxDistance = 8;
    controls.target.set(0, 1.2, 0); // Target di tengah
    
    // Ambil path dari database
    const modelPath = "{{ $profile && $profile->model_3d ? asset('storage/'.$profile->model_3d) : '' }}";
    console.log('📦 Model path:', modelPath);
    
    if (modelPath && modelPath !== '') {
        if (loading) loading.innerHTML = '⏳ Loading 3D model...';
        
        const loader = new GLTFLoader();
        loader.load(
            modelPath,
            (gltf) => {
                console.log('✅ Model loaded!', gltf);
                const model = gltf.scene;
                
                // Hitung bounding box
                const box = new THREE.Box3().setFromObject(model);
                const center = box.getCenter(new THREE.Vector3());
                const size = box.getSize(new THREE.Vector3());
                
                // Scale agar proporsional dengan container
                const maxDim = Math.max(size.x, size.y, size.z);
                const targetHeight = 2.2; // Tinggi target
                const scale = targetHeight / maxDim;
                model.scale.setScalar(scale);
                
                // Posisi di tengah (Y sumbu)
                model.position.x = -center.x * scale;
                model.position.y = -center.y * scale + 1.5; // Naikkan sedikit
                model.position.z = -center.z * scale;
                
                scene.add(model);
                
                // Update target controls ke posisi model
                controls.target.set(0, 1.2, 0);
                controls.update();
                
                if (loading) loading.style.display = 'none';
            },
            (xhr) => {
                const percent = Math.round(xhr.loaded / xhr.total * 100);
                if (loading) loading.innerHTML = `⏳ Loading... ${percent}%`;
            },
            (error) => {
                console.error('❌ Error:', error);
                if (loading) {
                    loading.innerHTML = '❌ Gagal memuat model 3D';
                }
                // Tampilkan placeholder
                const geometry = new THREE.IcosahedronGeometry(0.9, 1);
                const material = new THREE.MeshStandardMaterial({ color: 0x38bdf8, wireframe: true });
                const placeholder = new THREE.Mesh(geometry, material);
                placeholder.position.y = 1;
                scene.add(placeholder);
                if (loading) loading.style.display = 'none';
            }
        );
    } else {
        console.log('⚠️ No model path found');
        if (loading) loading.innerHTML = '📁 Belum ada model 3D';
        
        const geometry = new THREE.IcosahedronGeometry(0.9, 1);
        const material = new THREE.MeshStandardMaterial({ color: 0x38bdf8, wireframe: true });
        const placeholder = new THREE.Mesh(geometry, material);
        placeholder.position.y = 1;
        scene.add(placeholder);
        if (loading) loading.style.display = 'none';
    }
    
    function animate() {
        requestAnimationFrame(animate);
        controls.update();
        renderer.render(scene, camera);
    }
    animate();
    
    window.addEventListener('resize', () => {
        camera.aspect = container.clientWidth / container.clientHeight;
        camera.updateProjectionMatrix();
        renderer.setSize(container.clientWidth, container.clientHeight);
    });
}
</script>
@endsection