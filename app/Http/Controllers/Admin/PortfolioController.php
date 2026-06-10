<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PortfolioController extends Controller
{
    public function index()
    {
        $portfolios = Portfolio::latest()->get();
        return view('admin.portfolio.index', compact('portfolios'));
    }

    public function create()
    {
        return view('admin.portfolio.create');
    }

    public function store(Request $request)
    {
        $data = $this->validateData($request);
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('portfolio', 'public');
        }
        Portfolio::create($data);
        return redirect()->route('admin.portfolio.index')->with('success', 'Project ditambahkan!');
    }

    public function edit(Portfolio $portfolio)
    {
        return view('admin.portfolio.edit', compact('portfolio'));
    }

    public function update(Request $request, Portfolio $portfolio)
    {
        $data = $this->validateData($request);
        if ($request->hasFile('image')) {
            if ($portfolio->image) Storage::disk('public')->delete($portfolio->image);
            $data['image'] = $request->file('image')->store('portfolio', 'public');
        }
        $portfolio->update($data);
        return redirect()->route('admin.portfolio.index')->with('success', 'Project diperbarui!');
    }

    public function destroy(Portfolio $portfolio)
    {
        if ($portfolio->image) Storage::disk('public')->delete($portfolio->image);
        $portfolio->delete();
        return back()->with('success', 'Project dihapus!');
    }

    private function validateData(Request $request)
    {
        return $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'client' => 'nullable|string|max:255',
            'project_date' => 'nullable|date',
            'link' => 'nullable|url',
            'image' => 'nullable|image|max:4096',
        ]);
    }
}
