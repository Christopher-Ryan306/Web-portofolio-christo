<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function edit()
    {
        $contact = Contact::firstOrCreate([]);
        return view('admin.contact', compact('contact'));
    }

    public function update(Request $request)
    {
        $contact = Contact::firstOrCreate([]);
        $data = $request->validate([
            'email' => 'nullable|email',
            'phone' => 'nullable|string|max:50',
            'whatsapp' => 'nullable|string|max:50',
            'instagram' => 'nullable|string|max:100',
            'youtube' => 'nullable|string|max:100',
            'linkedin' => 'nullable|string|max:100',
            'address' => 'nullable|string',
        ]);
        $contact->update($data);
        return back()->with('success', 'Kontak diperbarui!');
    }
}
