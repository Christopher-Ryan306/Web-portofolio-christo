<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function edit()
    {
        $profile = Profile::firstOrCreate([]);
        return view('admin.profile', compact('profile'));
    }

    public function update(Request $request)
    {
        // DEBUG: Lihat semua data yang masuk
        \Log::info('=== START UPDATE PROFILE ===');
        \Log::info('All request data:', $request->all());
        \Log::info('Has file model3d? ' . ($request->hasFile('model3d') ? 'YES' : 'NO'));
        
        if ($request->hasFile('model3d')) {
            $file = $request->file('model3d');
            \Log::info('File info:', [
                'name' => $file->getClientOriginalName(),
                'size' => $file->getSize(),
                'mime' => $file->getMimeType(),
                'error' => $file->getError()
            ]);
        }

        $profile = Profile::firstOrCreate([]);

        $data = $request->validate([
            'name' => 'nullable|string|max:255',
            'title' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
            'about_long' => 'nullable|string', // ← GANTI dari aboutlong
            'photo' => 'nullable|image|max:4096',
            'model_3d' => 'nullable|file|mimes:glb,gltf|max:20480',
            'cv_file' => 'nullable|file|mimes:pdf|max:8192', // ← GANTI dari cvfile
        ]);

        // Handle Photo
if ($request->hasFile('photo')) {
    if ($profile->photo) Storage::disk('public')->delete($profile->photo);
    $data['photo'] = $request->file('photo')->store('profile', 'public');
}

// Handle CV
if ($request->hasFile('cv_file')) { // ← GANTI dari cvfile
    if ($profile->cv_file) Storage::disk('public')->delete($profile->cv_file);
    $data['cv_file'] = $request->file('cv_file')->store('cv', 'public');
}

        // Handle Model 3D
        if ($request->hasFile('model3d')) {
            // Hapus file lama
            if ($profile->model3d) {
                Storage::disk('public')->delete($profile->model3d);
                \Log::info('Deleted old model: ' . $profile->model3d);
            }
            
            // Upload file baru
            $file = $request->file('model3d');
            $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '_' . preg_replace('/[^a-zA-Z0-9]/', '_', $originalName) . '.' . $extension;
            
            $path = $file->storeAs('models', $filename, 'public');
            
            if ($path) {
                $data['model3d'] = $path;
                \Log::info('Model 3D uploaded SUCCESS: ' . $path);
            } else {
                \Log::error('Model 3D upload FAILED');
            }
        } else {
            \Log::warning('No model3d file in request');
        }

        // Handle CV
        if ($request->hasFile('cvfile')) {
            if ($profile->cvfile) Storage::disk('public')->delete($profile->cvfile);
            $data['cvfile'] = $request->file('cvfile')->store('cv', 'public');
            \Log::info('CV uploaded: ' . $data['cvfile']);
        }

        $profile->update($data);
        
        $message = 'Profile berhasil diperbarui!';
        if (isset($data['model3d'])) {
            $message .= ' Model 3D: ' . $data['model3d'];
        } else {
            $message .= ' Model 3D: tidak ada file yang terupload. Pastikan file .glb dipilih.';
        }
        
        return back()->with('success', $message);
    }
}