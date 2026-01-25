<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeBannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banners = HomeBanner::latest()->get();
        return view('admin.componets.benner', compact('banners'));
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
            'subtitle' => 'required',
            'title' => 'required',
            'highlight_title' => 'required',
            'description' => 'required',
            'button_text' => 'required',
            'button_link' => 'required',
            'image' => 'required|image',
            'status' => 'required'
        ]);


        if ($request->status == 1) {
            HomeBanner::where('status', 1)->update(['status' => 0]);
        }

        $image = $request->file('image')->store('home', 'public');

        HomeBanner::create([
            'subtitle' => $request->subtitle,
            'title' => $request->title,
            'highlight_title' => $request->highlight_title,
            'description' => $request->description,
            'button_text' => $request->button_text,
            'button_link' => $request->button_link,
            'image' => $image,
            'status' => $request->status,
        ]);

        return redirect()->back()->with('success', 'Banner added');
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
    public function edit(HomeBanner $homeBanner)
    {
        return response()->json($homeBanner);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HomeBanner $homeBanner)
    {
        $data = $request->validate([
            'subtitle' => 'required',
            'title' => 'required',
            'highlight_title' => 'required',
            'description' => 'required',
            'button_text' => 'required',
            'button_link' => 'required',
            'status' => 'required',
            'image' => 'nullable|image',
        ]);


        if ($request->status == 1) {
            HomeBanner::where('id', '!=', $homeBanner->id)
                    ->update(['status' => 0]);
        }

        if ($request->hasFile('image')) {

            if ($homeBanner->image && Storage::disk('public')->exists($homeBanner->image)) {
                Storage::disk('public')->delete($homeBanner->image);
            }

            $data['image'] = $request->file('image')->store('home', 'public');
        }

        $homeBanner->update($data);

        return redirect()->back()->with('success', 'Banner updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HomeBanner $homeBanner)
    {
        Storage::disk('public')->delete($homeBanner->image);
        $homeBanner->delete();

        return redirect()->back()->with('success', 'Banner deleted');
    }
}
