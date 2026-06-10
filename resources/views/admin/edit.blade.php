@extends('layouts.app')

@section('content')
<div class="admin-page" style="padding-top: 80px;">
    <div class="max-w-3xl mx-auto px-6 py-12">
        <div class="flex gap-4 mb-8 flex-wrap">
            <a href="{{ route('admin.profile.edit') }}" class="px-4 py-2 border border-sky-500 rounded-lg hover:bg-sky-500/20 transition">Profile</a>
            <a href="{{ route('admin.portfolio.index') }}" class="px-4 py-2 bg-sky-600 rounded-lg">Portfolio</a>
            <a href="{{ route('admin.contact.edit') }}" class="px-4 py-2 border border-sky-500 rounded-lg hover:bg-sky-500/20 transition">Contact</a>
        </div>

        <h1 class="text-3xl font-bold mb-8">Edit Project</h1>

        <form method="POST" action="{{ route('admin.portfolio.update', $portfolio) }}" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')
            @include('admin.portfolio.form')
            <div class="flex gap-4">
                <button type="submit" class="px-6 py-2 bg-sky-600 rounded-lg hover:bg-sky-700 transition">Update</button>
                <a href="{{ route('admin.portfolio.index') }}" class="px-6 py-2 border border-gray-600 rounded-lg hover:bg-gray-800 transition">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection