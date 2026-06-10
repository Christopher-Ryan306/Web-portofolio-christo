<div>
    <label class="block mb-2 font-semibold">Judul Project <span class="text-red-400">*</span></label>
    <input type="text" name="title" required value="{{ old('title', $portfolio->title ?? '') }}" 
           class="w-full p-3 bg-gray-900 border border-gray-700 rounded-lg focus:border-sky-500 focus:outline-none">
</div>

<div>
    <label class="block mb-2 font-semibold">Kategori</label>
    <input type="text" name="category" value="{{ old('category', $portfolio->category ?? '') }}" 
           placeholder="Contoh: Live Sound, Studio Mix, Event Production"
           class="w-full p-3 bg-gray-900 border border-gray-700 rounded-lg focus:border-sky-500 focus:outline-none">
</div>

<div>
    <label class="block mb-2 font-semibold">Deskripsi</label>
    <textarea name="description" rows="5" 
              class="w-full p-3 bg-gray-900 border border-gray-700 rounded-lg focus:border-sky-500 focus:outline-none">{{ old('description', $portfolio->description ?? '') }}</textarea>
</div>

<div>
    <label class="block mb-2 font-semibold">Client / Perusahaan</label>
    <input type="text" name="client" value="{{ old('client', $portfolio->client ?? '') }}" 
           class="w-full p-3 bg-gray-900 border border-gray-700 rounded-lg focus:border-sky-500 focus:outline-none">
</div>

<div>
    <label class="block mb-2 font-semibold">Tanggal Project</label>
    <input type="date" name="projectdate" value="{{ old('projectdate', isset($portfolio->projectdate) ? $portfolio->projectdate->format('Y-m-d') : '') }}" 
           class="w-full p-3 bg-gray-900 border border-gray-700 rounded-lg focus:border-sky-500 focus:outline-none">
</div>

<div>
    <label class="block mb-2 font-semibold">Link External (opsional)</label>
    <input type="url" name="link" value="{{ old('link', $portfolio->link ?? '') }}" 
           placeholder="https://..."
           class="w-full p-3 bg-gray-900 border border-gray-700 rounded-lg focus:border-sky-500 focus:outline-none">
</div>

<div>
    <label class="block mb-2 font-semibold">Gambar Project</label>
    <input type="file" name="image" accept="image/*" 
           class="w-full p-3 bg-gray-900 border border-gray-700 rounded-lg focus:border-sky-500 focus:outline-none">
    @if(isset($portfolio) && $portfolio->image)
        <div class="mt-3">
            <p class="text-sm text-green-400 mb-2">Gambar saat ini:</p>
            <img src="{{ asset('storage/'.$portfolio->image) }}" class="w-32 rounded-lg border border-sky-500/30">
        </div>
    @endif
    <p class="text-xs text-gray-500 mt-1">Format: JPG, PNG (Max 4MB)</p>
</div>