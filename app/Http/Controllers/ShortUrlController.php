<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Short_Url;

class ShortUrlController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->role === 'SuperAdmin') {
            $shortUrls = Short_Url::all();
        } else
        if (auth()->user()->role === 'admin') {
            $shortUrls = Short_Url::where('company_id', auth()->user()->company_id)->get();
        } else {
            $shortUrls = Short_Url::where('user_id', auth()->id())->get();
        }

        return view('short_urls.index', compact('shortUrls'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('short_urls.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'original_url' => 'required|url',
            'short_code' => 'required|unique:short_urls,short_code',
        ]);

        Short_Url::create([
            'company_id' => auth()->user()->company_id,
            'original_url' => $request->original_url,
            'short_code' => $request->short_code,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('short-urls.index')->with('success', 'Short URL created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function redirect($shortCode)
    {
        $url = Short_Url::where('short_code', $shortCode)->first();


        if (!$url) {
            abort(404);
        }
        $url->increment('clicks');

        return redirect()->away($url->original_url);
    }
}
