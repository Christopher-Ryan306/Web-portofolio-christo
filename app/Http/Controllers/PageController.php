<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    // Data dummy - nanti bisa diganti dari database
    private $profile = [
        'name' => 'Nama Lengkap Anda',
        'title' => 'Web Developer & Designer',
        'email' => 'email@example.com',
        'phone' => '+62 812 3456 7890',
        'location' => 'Jakarta, Indonesia',
        'bio' => 'Tulis bio singkat tentang diri Anda di sini. Ceritakan passion, pengalaman, dan apa yang membuat Anda unik.',
        'photo' => '[via.placeholder.com](https://via.placeholder.com/400x400)',
        'cv_link' => '#',
        'social' => [
            'github' => '[github.com](https://github.com/username)',
            'linkedin' => '[linkedin.com](https://linkedin.com/in/username)',
            'instagram' => '[instagram.com](https://instagram.com/username)',
            'twitter' => '[twitter.com](https://twitter.com/username)',
        ]
    ];

    private $skills = [
        ['name' => 'HTML/CSS', 'level' => 90],
        ['name' => 'JavaScript', 'level' => 85],
        ['name' => 'PHP/Laravel', 'level' => 80],
        ['name' => 'MySQL', 'level' => 75],
        ['name' => 'UI/UX Design', 'level' => 70],
        ['name' => 'Git', 'level' => 80],
    ];

    private $experiences = [
        [
            'title' => 'Senior Web Developer',
            'company' => 'Nama Perusahaan',
            'period' => '2024 - Sekarang',
            'description' => 'Deskripsi singkat pekerjaan dan tanggung jawab Anda.'
        ],
        [
            'title' => 'Junior Developer',
            'company' => 'Nama Perusahaan Lain',
            'period' => '2022 - 2024',
            'description' => 'Deskripsi singkat pekerjaan dan tanggung jawab Anda.'
        ],
    ];

    private $portfolios = [
        [
            'id' => 1,
            'title' => 'Project Pertama',
            'category' => 'Web Development',
            'image' => '[via.placeholder.com](https://via.placeholder.com/600x400)',
            'description' => 'Deskripsi singkat project ini.',
            'full_description' => 'Deskripsi lengkap tentang project ini. Jelaskan teknologi yang digunakan, tantangan yang dihadapi, dan solusi yang diterapkan.',
            'technologies' => ['Laravel', 'Vue.js', 'MySQL', 'Tailwind CSS'],
            'link' => '#',
            'github' => '#',
        ],
        [
            'id' => 2,
            'title' => 'Project Kedua',
            'category' => 'Mobile App',
            'image' => '[via.placeholder.com](https://via.placeholder.com/600x400)',
            'description' => 'Deskripsi singkat project ini.',
            'full_description' => 'Deskripsi lengkap tentang project ini.',
            'technologies' => ['React Native', 'Firebase', 'Node.js'],
            'link' => '#',
            'github' => '#',
        ],
        [
            'id' => 3,
            'title' => 'Project Ketiga',
            'category' => 'UI/UX Design',
            'image' => '[via.placeholder.com](https://via.placeholder.com/600x400)',
            'description' => 'Deskripsi singkat project ini.',
            'full_description' => 'Deskripsi lengkap tentang project ini.',
            'technologies' => ['Figma', 'Adobe XD', 'Photoshop'],
            'link' => '#',
            'github' => '#',
        ],
        [
            'id' => 4,
            'title' => 'Project Keempat',
            'category' => 'Web Development',
            'image' => '[via.placeholder.com](https://via.placeholder.com/600x400)',
            'description' => 'Deskripsi singkat project ini.',
            'full_description' => 'Deskripsi lengkap tentang project ini.',
            'technologies' => ['WordPress', 'PHP', 'JavaScript'],
            'link' => '#',
            'github' => '#',
        ],
    ];

    public function home()
    {
        return view('pages.home', [
            'profile' => $this->profile,
            'portfolios' => array_slice($this->portfolios, 0, 3), // 3 project terbaru
            'skills' => $this->skills,
        ]);
    }

    public function about()
    {
        return view('pages.about', [
            'profile' => $this->profile,
            'skills' => $this->skills,
            'experiences' => $this->experiences,
        ]);
    }

    public function portfolio()
    {
        return view('pages.portfolio', [
            'profile' => $this->profile,
            'portfolios' => $this->portfolios,
        ]);
    }

    public function portfolioDetail($id)
    {
        $portfolio = collect($this->portfolios)->firstWhere('id', (int)$id);
        
        if (!$portfolio) {
            abort(404);
        }

        return view('pages.portfolio-detail', [
            'profile' => $this->profile,
            'portfolio' => $portfolio,
        ]);
    }

    public function contact()
    {
        return view('pages.contact', [
            'profile' => $this->profile,
        ]);
    }

    public function sendMessage(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);


        return back()->with('success', 'Pesan berhasil dikirim! Saya akan segera menghubungi Anda.');
    }
}
