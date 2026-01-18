<?php

namespace App\Http\Controllers\Backend;

use App\Models\AboutMe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $aboutMe = AboutMe::first();
        return view('backend.about.index', compact('aboutMe'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'nullable|string',
            'description' => 'nullable|string',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'link'        => 'nullable|url',
        ]);

        $aboutMe                = AboutMe::first() ?? new AboutMe();
        // Social Links as JSON Array
        $socialLinks = [
            'facebook'   => $request->facebook,
            'instagram' => $request->instagram,
            'linkedin'  => $request->linkedin,
            'twitter'   => $request->twitter,
            'github'    => $request->github,
        ];
        $aboutMe->title         = $request->title;
        $aboutMe->description   = strip_tags($request->description);
        $aboutMe->cv_link       = $request->link;
        $aboutMe->social_links  = $socialLinks;

        if ($request->hasFile('image')) {

            // delete old image if exists
            if (!empty($aboutMe->image) && Storage::disk('public')->exists($aboutMe->image)) {
                Storage::disk('public')->delete($aboutMe->image);
            }

            $originalName = $request->file('image')->getClientOriginalName();
            $imagePath = $request->file('image')->storeAs('about_me', $originalName, 'public');
            $aboutMe->image = $imagePath;
        }

        $aboutMe->save();

        return redirect()->back()->with('success', 'Info saved successfully!');
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
}
