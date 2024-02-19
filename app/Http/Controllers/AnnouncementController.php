<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function createAnnouncement()
    {
        return view('announcement.create');
    }
    
    public function index()
    {
        $announcements = Announcement::where('is_accepted', true)->orderBy('created_at', 'DESC')->paginate(8);
        
        return view('announcement.index', compact('announcements'));
    }
    
    public function showAnnouncement(Announcement $announcement)
    {
        $announcements = Announcement::where('is_accepted', true)
        ->where('category_id', $announcement->category_id)
        ->where('id', '!=', $announcement->id)
        ->orderBy('created_at', 'DESC')
        ->get();
        
        return view('announcement.show', compact('announcement', 'announcements'));
    }
    
}
