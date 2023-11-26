<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Announcement/Announcement', [
            'announcements' => Announcement::with('user')->where('user_id', Auth::user()->id)->latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Announcement/CreateAnnouncement');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',

        ]);

     $request->user()->announcements()->create([
            'title' => $request->input('title'),
            'body' => $request->input('body'),
        ]);

        return redirect()->back()->with('success', 'Announcement Created Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Announcement $announcement)
    {
        return Inertia::render('Announcement/AnnouncementInformation', [
            'announcement' => $announcement
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function showAnnouncement(Announcement $announcement)
    {
        return Inertia::render('Homepage/partials/AnnouncementInfo', [
            'announcement' => $announcement
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Announcement $announcement)
    {
        return Inertia::render('Announcement/EditAnnouncement', [
            'announcement' => $announcement
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Announcement $announcement)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

         $announcement->update([
            'title' => $request->input('title'),
            'body' => $request->input('body'),
        ]);

        return redirect(route('announcement.index'))->with('success', 'Announcement Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Announcement $announcement)
    {
        $announcement->delete();
        return redirect(route('announcement.index'))->with('danger', 'Announcement Deleted!');
    }
}
