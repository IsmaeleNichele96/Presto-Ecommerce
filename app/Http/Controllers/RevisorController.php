<?php

namespace App\Http\Controllers;


use App\Mail\BecomeRevisor;
use App\Models\Announcement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;

class RevisorController extends Controller
{
    public function revisorIndex()
    {
        $announcement_to_check = Announcement::where('is_accepted', null)->first();
        return view('revisor.index', compact('announcement_to_check'));
    }

    public function acceptAnnouncement(Announcement $announcement)
    {
        $announcement->setAccepted(true);
        return redirect()->back()->with('message', "L'annuncio è stato accettato");
    }

    public function rejectAnnouncement(Announcement $announcement)
    {
        $announcement->setAccepted(false);
        return redirect()->back()->with('message', "L'annuncio è stato rifiutato");
    }

    public function IndexRevisor(){
        return view('revisor.indexRevisor');
    }

    public function becomeRevisor(Request $request)
    {
        

        Mail::to('admin@presto.it')->send(new BecomeRevisor(Auth::user(),$request->mexRevisor));
        return redirect('/')->with('message', 'Complimenti, hai richiesto di diventare revisore');
    }

    public function makeRevisor(User $user)
    {
        Artisan::call('presto:makeUserRevisor', ["email" => $user->email]);
        return redirect('/')->with('message', 'Complimenti, l\'utente è diventato revisore');
    }

    public function undoAnnouncement(){
        $announcement = Announcement::orderBy('created_at', 'desc')->whereNotNull('is_accepted')->first();
        $announcement->setAccepted(null);
        return redirect()->back()->with('message', "L'annuncio è stato riportato in revisione");
    
    }

    
}
