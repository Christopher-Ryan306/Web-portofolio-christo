<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Portfolio;
use App\Models\Contact;

class PageController extends Controller
{
    public function home()
    {
        $profile = Profile::first();
        $portfolios = Portfolio::latest()->get();
        $contact = Contact::first();
        
        // Buat default jika data kosong
        if (!$profile) {
            $profile = new \App\Models\Profile();
            $profile->name = 'Your Name';
            $profile->title = 'Sound Engineer';
            $profile->bio = 'Mixing the perfect sound, one frequency at a time.';
            $profile->about_long = 'Tulis cerita panjang tentang dirimu di halaman admin.';
        }
        
        if (!$contact) {
            $contact = new \App\Models\Contact();
        }
        
        return view('pages.home', compact('profile', 'portfolios', 'contact'));
    }

    // TAMBAHKAN METHOD INI UNTUK DETAIL PORTFOLIO
    public function portfolioDetail($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        $profile = Profile::first();
        return view('pages.portfolio-detail', compact('portfolio', 'profile'));
    }
}