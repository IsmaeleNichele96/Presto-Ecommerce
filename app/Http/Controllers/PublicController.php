<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Announcement;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function welcome()
    {
        $announcements = Announcement::where('is_accepted', true)->orderBy('created_at', 'DESC')->take(4)->get();
        // dd($announcements);
        return view('welcome', compact('announcements'));
    }

    public function categoryShow(Category $category)
    {

        return view('announcement.categoryShow', compact('category'));
    }

    public function searchAnnouncement(Request $request)
    {
        $announcements = Announcement::search($request->searched)->where('is_accepted', true)->paginate(10);

        return view('announcement.index', compact('announcements'));
    }

    public function setLocale($lang)
    {
        session()->put('locale', $lang);
        return redirect()->back();
    }
}
