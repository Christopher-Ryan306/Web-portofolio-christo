@extends('layouts.app')

@section('content')
<div class="admin-page" style="padding-top: 80px;">
    <div class="max-w-6xl mx-auto px-6 py-12">
        <!-- Menu Tab Admin -->
        <div class="flex gap-4 mb-8 flex-wrap">
            <a href="{{ route('admin.profile.edit') }}" class="px-4 py-2 border border-sky-500 rounded-lg hover:bg-sky-500/20 transition">Profile</a>
            <a href="{{ route('admin.portfolio.index') }}" class="px-4 py-2 bg-sky-600 rounded-lg">Portfolio</a>
            <a href="{{ route('admin.contact.edit') }}" class="px-4 py-2 border border-sky-500 rounded-lg hover:bg-sky-500/20 transition">Contact</a>
        </div>

        <div class="flex justify-between items-center mb-6 flex-wrap gap-4">
            <h1 class="text-3xl font-bold">Manage Portfolio</h1>
            <a href="{{ route('admin.portfolio.create') }}" class="px-5 py-2 bg-sky-600 hover:bg-sky-700 rounded-lg transition">+ New Project</a>
        </div>

        @if(session('success'))
            <div class="bg-green-600/20 border border-green-500 text-green-400 p-3 rounded-lg mb-6">
                {{ session('success') }}
            </div>
        @endif

        @forelse($portfolios as $p)
        <div class="bg-gradient-to-br from-gray-900 to-black border border-sky-500/20 rounded-xl p-4 mb-4 flex gap-4 items-center flex-wrap hover:border-sky-500/60 transition">
            @if($p->image)
                <img src="{{ asset('storage/'.$p->image) }}" class="w-16 h-16 object-cover rounded-lg">
            @else
                <div class="w-16 h-16 bg-sky-900/30 rounded-lg flex items-center justify-center text-2xl">🎚️</div>
            @endif
            
            <div class="flex-1">
                <h3 class="font-bold text-lg">{{ $p->title }}</h3>
                <p class="text-sm text-gray-400">{{ $p->category ?? 'No category' }}</p>
            </div>
            
            <div class="flex gap-2">
                <a href="{{ route('admin.portfolio.edit', $p) }}" class="px-3 py-1 bg-sky-600 rounded-lg hover:bg-sky-700 transition text-sm">Edit</a>
                <form method="POST" action="{{ route('admin.portfolio.destroy', $p) }}" onsubmit="return confirm('Yakin hapus project ini?')">
                    @csrf
                    @method('DELETE')
                    <button class="px-3 py-1 bg-red-600 rounded-lg hover:bg-red-700 transition text-sm">Delete</button>
                </form>
            </div>
        </div>
        @empty
            <div class="text-center py-12 text-gray-500">
                <p class="text-5xl mb-4">📂</p>
                <p>Belum ada project portfolio.</p>
                <a href="{{ route('admin.portfolio.create') }}" class="text-sky-400 hover:underline mt-2 inline-block">+ Tambah project pertama</a>
            </div>
        @endforelse
    </div>
</div>
@endsection