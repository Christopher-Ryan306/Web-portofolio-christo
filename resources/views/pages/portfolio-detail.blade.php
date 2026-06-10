@extends('layouts.app')
@section('title', $portfolio->title)

@section('content')
<section class="py-24 px-6 max-w-4xl mx-auto">
    <!-- Tombol Back -->
    <a href="{{ route('home') }}#portfolio" class="inline-flex items-center gap-2 text-sky-400 hover:text-sky-300 mb-8 transition">
        ← Back to Portfolio
    </a>

    <!-- Image Hero -->
    @if($portfolio->image)
    <div class="rounded-2xl overflow-hidden mb-8 border border-sky-500/20">
        <img src="{{ asset('storage/'.$portfolio->image) }}" alt="{{ $portfolio->title }}" class="w-full object-cover max-h-[500px]">
    </div>
    @else
    <div class="w-full h-64 bg-gradient-to-br from-sky-900/40 to-black rounded-2xl flex items-center justify-center mb-8 border border-sky-500/20">
        <span class="text-sky-400 text-7xl">🎚️</span>
    </div>
    @endif

    <!-- Category -->
    @if($portfolio->category)
    <div class="mb-4">
        <span class="px-3 py-1 bg-sky-500/20 text-sky-400 rounded-full text-sm font-semibold">
            {{ $portfolio->category }}
        </span>
    </div>
    @endif

    <!-- Title -->
    <h1 class="text-4xl md:text-5xl font-bold mb-4">{{ $portfolio->title }}</h1>

    <!-- Client & Date -->
    <div class="flex flex-wrap gap-6 mb-8 pb-8 border-b border-gray-800">
        @if($portfolio->client)
        <div>
            <p class="text-gray-500 text-sm">Client</p>
            <p class="font-semibold">{{ $portfolio->client }}</p>
        </div>
        @endif
        @if($portfolio->projectdate)
        <div>
            <p class="text-gray-500 text-sm">Project Date</p>
            <p class="font-semibold">{{ $portfolio->projectdate->format('F Y') }}</p>
        </div>
        @endif
    </div>

    <!-- Description -->
    <div class="prose prose-invert max-w-none">
        <h3 class="text-xl font-semibold text-sky-400 mb-4">Project Description</h3>
        <p class="text-gray-300 leading-relaxed whitespace-pre-line">{{ $portfolio->description }}</p>
    </div>

    <!-- External Link -->
    @if($portfolio->link)
    <div class="mt-10">
        <a href="{{ $portfolio->link }}" target="_blank" class="inline-flex items-center gap-2 px-6 py-3 bg-sky-600 hover:bg-sky-700 rounded-lg transition">
            🔗 View Live Project
        </a>
    </div>
    @endif
</section>
@endsection