@extends('layouts.app')

@section('content')
<div class="admin-page" style="padding-top: 80px;">
    <div class="max-w-4xl mx-auto px-6 py-12">
        <!-- Menu Tab Admin -->
        <div class="flex gap-4 mb-8 flex-wrap">
            <a href="{{ route('admin.profile.edit') }}" class="px-4 py-2 bg-sky-600 rounded-lg">Profile</a>
            <a href="{{ route('admin.portfolio.index') }}" class="px-4 py-2 border border-sky-500 rounded-lg hover:bg-sky-500/20 transition">Portfolio</a>
            <a href="{{ route('admin.contact.edit') }}" class="px-4 py-2 border border-sky-500 rounded-lg hover:bg-sky-500/20 transition">Contact</a>
            <form method="POST" action="{{ route('logout') }}" class="ml-auto">
                @csrf
                <button class="px-4 py-2 bg-red-600 rounded-lg hover:bg-red-700 transition">Logout</button>
            </form>
        </div>

        <h1 class="text-3xl font-bold mb-8">Edit Profile</h1>

        @if(session('success'))
            <div class="bg-green-600/20 border border-green-500 text-green-400 p-3 rounded-lg mb-6">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('admin.profile.update') }}" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label class="block mb-2 font-semibold">Nama</label>
                <input type="text" name="name" value="{{ old('name', $profile->name) }}" class="w-full p-3 bg-gray-900 border border-gray-700 rounded-lg focus:border-sky-500 focus:outline-none">
            </div>

            <div>
                <label class="block mb-2 font-semibold">Title / Jabatan</label>
                <input type="text" name="title" value="{{ old('title', $profile->title) }}" class="w-full p-3 bg-gray-900 border border-gray-700 rounded-lg focus:border-sky-500 focus:outline-none">
            </div>

            <div>
                <label class="block mb-2 font-semibold">Bio Singkat (Landing Page)</label>
                <textarea name="bio" rows="3" class="w-full p-3 bg-gray-900 border border-gray-700 rounded-lg focus:border-sky-500 focus:outline-none">{{ old('bio', $profile->bio) }}</textarea>
            </div>

            <div>
                <label class="block mb-2 font-semibold">About (Halaman About — panjang)</label>
                <textarea name="about_long" rows="8" class="w-full p-3 bg-gray-900 border border-gray-700 rounded-lg focus:border-sky-500 focus:outline-none">{{ old('about_long', $profile->about_long) }}</textarea>
            </div>

            <div>
                <label class="block mb-2 font-semibold">Foto Profile</label>
                <input type="file" name="photo" accept="image/*" class="w-full p-3 bg-gray-900 border border-gray-700 rounded-lg">
                @if($profile->photo)
                    <img src="{{ asset('storage/'.$profile->photo) }}" class="w-24 h-24 object-cover rounded-lg mt-2">
                @endif
            </div>

            <div>
                <label class="block mb-2 font-semibold">Model 3D (.glb atau .gltf, max 20MB)</label>
                <input type="file" name="model_3d" accept=".glb,.gltf" class="w-full p-3 bg-gray-900 border border-gray-700 rounded-lg">
                @if($profile->model_3d)
                    <p class="text-sm text-green-400 mt-2">✓ Model terupload</p>
                @endif
            </div>

            <div>
                <label class="block mb-2 font-semibold">CV (PDF)</label>
                <input type="file" name="cv_file" accept=".pdf" class="w-full p-3 bg-gray-900 border border-gray-700 rounded-lg">
                @if($profile->cv_file)
                    <p class="text-sm text-green-400 mt-2">✓ CV terupload</p>
                @endif
            </div>

            <button type="submit" class="px-6 py-3 bg-sky-600 hover:bg-sky-700 rounded-lg transition font-semibold">Save Changes</button>
        </form>
    </div>
</div>
@endsection