@extends('layouts.app')
@section('title', 'About Me')

@section('content')
<section class="py-20 px-6 max-w-7xl mx-auto">
    <h1 class="font-orbitron text-5xl font-bold text-center mb-16">
        About <span class="text-blue-400">Me</span>
    </h1>

    <div class="grid md:grid-cols-2 gap-12 items-center">
        {{-- KANAN: Model 3D --}}
        <div class="order-2 md:order-1">
            <div id="model-viewer" class="w-full h-[600px] bg-gradient-to-br from-blue-900/20 to-black rounded-2xl border border-blue-900/40 relative overflow-hidden">
                <div id="model-loading" class="absolute inset-0 flex items-center justify-center text-blue-400">
                    Loading 3D Model...
                </div>
            </div>
            <p class="text-center text-gray-500 text-sm mt-3">🖱️ Drag to rotate • Scroll to zoom</p>
        </div>

        {{-- KIRI: Info --}}
        <div class="order-1 md:order-2">
            <p class="text-blue-400 font-orbitron tracking-widest mb-3">WHO AM I</p>
            <h2 class="text-4xl font-bold mb-6">{{ $profile->name ?? 'Your Name' }}</h2>
            <p class="text-xl text-gray-300 mb-6">{{ $profile->title ?? 'Sound Engineer' }}</p>
            <div class="text-gray-400 space-y-4 leading-relaxed">
                {!! nl2br(e($profile->about_long ?? 'Tulis cerita panjang tentang dirimu di halaman admin. Ceritakan pengalaman sound engineering, alat yang dikuasai, project pernah dikerjakan, dan filosofi audio kamu.')) !!}
            </div>

            @if($profile && $profile->cv_file)
            <a href="{{ asset('storage/'.$profile->cv_file) }}" target="_blank" class="btn-primary inline-block mt-8">
                📄 Download CV
            </a>
            @endif
        </div>
    </div>
</section>

{{-- Three.js untuk model 3D --}}
<script type="importmap">
{
    "imports": {
        "three": "[unpkg.com](https://unpkg.com/three@0.160.0/build/three.module.js)",
        "three/addons/": "[unpkg.com](https://unpkg.com/three@0.160.0/examples/jsm/)"
    }
}
</script>

<script type="module">
import * as THREE from 'three';
import { OrbitControls } from 'three/addons/controls/OrbitControls.js';
import { GLTFLoader } from 'three/addons/loaders/GLTFLoader.js';

const container = document.getElementById('model-viewer');
const loading = document.getElementById('model-loading');

const scene = new THREE.Scene();
scene.background = null;

const camera = new THREE.PerspectiveCamera(45, container.clientWidth / container.clientHeight, 0.1, 1000);
camera.position.set(0, 1.5, 3.5);

const renderer = new THREE.WebGLRenderer({ antialias: true, alpha: true });
renderer.setSize(container.clientWidth, container.clientHeight);
renderer.setPixelRatio(window.devicePixelRatio);
container.appendChild(renderer.domElement);

// Lighting biru elegan
const ambient = new THREE.AmbientLight(0x4060ff, 0.5);
scene.add(ambient);

const keyLight = new THREE.DirectionalLight(0x60a5fa, 1.2);
keyLight.position.set(2, 3, 2);
scene.add(keyLight);

const fillLight = new THREE.DirectionalLight(0x3b82f6, 0.6);
fillLight.position.set(-2, 1, -1);
scene.add(fillLight);

const rimLight = new THREE.PointLight(0x60a5fa, 1, 10);
rimLight.position.set(0, 2, -3);
scene.add(rimLight);

// Controls
const controls = new OrbitControls(camera, renderer.domElement);
controls.enableDamping = true;
controls.dampingFactor = 0.05;
controls.minDistance = 2;
controls.maxDistance = 8;
controls.target.set(0, 1, 0);

// Load model
const modelPath = "{{ $profile && $profile->model_3d ? asset('storage/'.$profile->model_3d) : '' }}";

if (modelPath) {
    const loader = new GLTFLoader();
    loader.load(
        modelPath,
        (gltf) => {
            const model = gltf.scene;
            // Auto-center & scale
            const box = new THREE.Box3().setFromObject(model);
            const size = box.getSize(new THREE.Vector3()).length();
            const center = box.getCenter(new THREE.Vector3());
            model.position.x -= center.x;
            model.position.y -= center.y;
            model.position.z -= center.z;
            const scale = 2 / size;
            model.scale.setScalar(scale);
            scene.add(model);
            loading.style.display = 'none';
        },
        (xhr) => {
            loading.textContent = `Loading... ${Math.round(xhr.loaded / xhr.total * 100)}%`;
        },
        (error) => {
            loading.textContent = 'Gagal memuat model.';
            console.error(error);
        }
    );
} else {
    // Placeholder: kubus biru sebagai dummy
    const geometry = new THREE.IcosahedronGeometry(1, 1);
    const material = new THREE.MeshStandardMaterial({
        color: 0x3b82f6,
        wireframe: true,
        emissive: 0x1e40af,
        emissiveIntensity: 0.5
    });
    const placeholder = new THREE.Mesh(geometry, material);
    placeholder.position.y = 1;
    scene.add(placeholder);
    loading.textContent = 'Upload model 3D di admin panel';
    loading.classList.add('bottom-4', 'top-auto');
}

// Animate
function animate() {
    requestAnimationFrame(animate);
    controls.update();
    renderer.render(scene, camera);
}
animate();

// Resize
window.addEventListener('resize', () => {
    camera.aspect = container.clientWidth / container.clientHeight;
    camera.updateProjectionMatrix();
    renderer.setSize(container.clientWidth, container.clientHeight);
});
</script>
@endsection
