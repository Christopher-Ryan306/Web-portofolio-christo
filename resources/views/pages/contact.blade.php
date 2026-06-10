@extends('layouts.app')
@section('title', 'Contact')

@section('content')
<section class="py-20 px-6 max-w-4xl mx-auto">
    <h1 class="font-orbitron text-5xl font-bold text-center mb-4">
        Get in <span class="text-blue-400">Touch</span>
    </h1>
    <p class="text-center text-gray-400 mb-16">Let's create something amazing together</p>

    <div class="grid md:grid-cols-2 gap-6">
        @php
            $items = [
                ['icon' => '📧', 'label' => 'Email', 'value' => $contact->email ?? null, 'link' => $contact->email ? 'mailto:'.$contact->email : null],
                ['icon' => '📱', 'label' => 'Phone', 'value' => $contact->phone ?? null, 'link' => $contact->phone ? 'tel:'.$contact->phone : null],
                ['icon' => '💬', 'label' => 'WhatsApp', 'value' => $contact->whatsapp ?? null, 'link' => $contact->whatsapp ? '[wa.me](https://wa.me/)'.preg_replace('/[^0-9]/', '', $contact->whatsapp) : null],
                ['icon' => '📸', 'label' => 'Instagram', 'value' => $contact->instagram ?? null, 'link' => $contact->instagram ? '[instagram.com](https://instagram.com/)'.ltrim($contact->instagram, '@') : null],
                ['icon' => '🎬', 'label' => 'YouTube', 'value' => $contact->youtube ?? null, 'link' => $contact->youtube ?? null],
                ['icon' => '💼', 'label' => 'LinkedIn', 'value' => $contact->linkedin ?? null, 'link' => $contact->linkedin ?? null],
            ];
        @endphp

        @foreach($items as $item)
            @if($item['value'])
            <a href="{{ $item['link'] }}" target="_blank" class="card p-6 flex items-center gap-4">
                <span class="text-4xl">{{ $item['icon'] }}</span>
                <div>
                    <p class="text-blue-400 text-sm">{{ $item['label'] }}</p>
                    <p class="text-white font-semibold">{{ $item['value'] }}</p>
                </div>
            </a>
            @endif
        @endforeach
    </div>

    @if($contact && $contact->address)
    <div class="card p-6 mt-6">
        <p class="text-blue-400 text-sm mb-2">📍 Studio Location</p>
        <p class="text-gray-300">{{ $contact->address }}</p>
    </div>
    @endif
</section>
@endsection
