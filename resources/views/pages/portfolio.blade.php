@extends('layouts.app')
@section('title', 'Portfolio')

@section('content')
<section class="py-20 px-6 max-w-7xl mx-auto">
    <h1 class="font-orbitron text-5xl font-bold text-center mb-4">
        My <span class="text-blue-400">Portfolio</span>
    </h1>
    <p class="text-center text-gray-400 mb-16">Selected works in sound engineering</p>

    @if($portfolios->isEmpty())
        <p class="text-center text-gray-500">Belum ada project. Tambahkan dari admin panel.</p>
    @else
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($portfolios as $p)
        <div class="card group">
            @if($p->image)
                <div class="overflow-hidden">
                    <img src="{{ asset('storage/'.$p->image) }}" class="w-full h-56 object-cover group-hover:scale-110 transition duration-500">
                </div>
            @else
                <div class="w-full h-56 bg-gradient-to-br from-blue-900/40 to-black flex items-center justify-center">
                    <span class="text-blue-400 text-5xl">🎚️</span>
                </div>
            @endif
            <div class="p-6">
                <span class="text-xs text-blue-400 font-orbitron tracking-widest">{{ $p->category ?? 'PROJECT' }}</span>
                <h3 class="text-2xl font-bold mt-2 mb-3">{{ $p->title }}</h3>
                <p class="text-gray-400 mb-4 line-clamp-3">{{ $p->description }}</p>
                <div class="text-sm text-gray-500 space-y-1">
                    @if($p->client)<p>Client: <span class="text-gray-300">{{ $p->client }}</span></p>@endif
                    @if($p->project_date)<p>Date: <span class="text-gray-300">{{ $p->project_date->format('M Y') }}</span></p>@endif
                </div>
                @if($p->link)
                    <a href="{{ $p->link }}" target="_blank" class="inline-block mt-4 text-blue-400 hover:text-blue-300">View Project →</a>
                @endif
            </div>
        </div>
        @endforeach
    </div>
    @endif
</section>
@endsection
