@extends('layouts.app')

@section('content')
<div class="admin-page">
    <div class="max-w-4xl mx-auto px-6 py-12">
        <!-- Menu Tab Admin -->
        <div class="flex gap-4 mb-8 flex-wrap">
            <a href="{{ route('admin.profile.edit') }}" class="px-4 py-2 border border-sky-500 rounded-lg hover:bg-sky-500/20 transition">Profile</a>
            <a href="{{ route('admin.portfolio.index') }}" class="px-4 py-2 border border-sky-500 rounded-lg hover:bg-sky-500/20 transition">Portfolio</a>
            <a href="{{ route('admin.contact.edit') }}" class="px-4 py-2 bg-sky-600 rounded-lg">Contact</a>
            <form method="POST" action="{{ route('logout') }}" class="ml-auto">
                @csrf
                <button class="px-4 py-2 bg-red-600 rounded-lg hover:bg-red-700 transition">Logout</button>
            </form>
        </div>

        <h1 class="text-3xl font-bold mb-8">Edit Contact</h1>

        @if(session('success'))
            <div class="bg-green-600/20 border border-green-500 text-green-400 p-3 rounded-lg mb-6">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('admin.contact.update') }}" class="space-y-6">
            @csrf
            @method('PUT')
            
            <div>
                <label class="block mb-2 font-semibold">Email</label>
                <input type="email" name="email" value="{{ old('email', $contact->email) }}" class="w-full p-3 bg-gray-900 border border-gray-700 rounded-lg focus:border-sky-500 focus:outline-none">
            </div>

            <div>
                <label class="block mb-2 font-semibold">Phone</label>
                <input type="text" name="phone" value="{{ old('phone', $contact->phone) }}" class="w-full p-3 bg-gray-900 border border-gray-700 rounded-lg focus:border-sky-500 focus:outline-none">
            </div>

            <div>
                <label class="block mb-2 font-semibold">WhatsApp</label>
                <input type="text" name="whatsapp" value="{{ old('whatsapp', $contact->whatsapp) }}" class="w-full p-3 bg-gray-900 border border-gray-700 rounded-lg focus:border-sky-500 focus:outline-none">
            </div>

            <div>
                <label class="block mb-2 font-semibold">Instagram</label>
                <input type="text" name="instagram" value="{{ old('instagram', $contact->instagram) }}" class="w-full p-3 bg-gray-900 border border-gray-700 rounded-lg focus:border-sky-500 focus:outline-none">
            </div>

            <div>
                <label class="block mb-2 font-semibold">YouTube</label>
                <input type="text" name="youtube" value="{{ old('youtube', $contact->youtube) }}" class="w-full p-3 bg-gray-900 border border-gray-700 rounded-lg focus:border-sky-500 focus:outline-none">
            </div>

            <div>
                <label class="block mb-2 font-semibold">LinkedIn</label>
                <input type="text" name="linkedin" value="{{ old('linkedin', $contact->linkedin) }}" class="w-full p-3 bg-gray-900 border border-gray-700 rounded-lg focus:border-sky-500 focus:outline-none">
            </div>

            <div>
                <label class="block mb-2 font-semibold">Studio Address</label>
                <textarea name="address" rows="4" class="w-full p-3 bg-gray-900 border border-gray-700 rounded-lg focus:border-sky-500 focus:outline-none">{{ old('address', $contact->address) }}</textarea>
            </div>

            <button type="submit" class="px-6 py-3 bg-sky-600 hover:bg-sky-700 rounded-lg transition font-semibold">Save Changes</button>
        </form>
    </div>
</div>
@endsection