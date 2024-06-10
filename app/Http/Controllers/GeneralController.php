<?php

namespace App\Http\Controllers;
use App\Models\Tournament; 

use App\Models\Berita;

class GeneralController extends Controller
{
    public function home()
    {
        return view('frontend.home');
    }

    public function detailtour($id)
    {
        $tournament = Tournament::find($id);
        return view('frontend/detail_tour', compact('tournament'));
    }

    public function authadmin()
    {
        return view('frontend.authadmin');
    }

    // public function detailtour()
    // {
    //     return view('frontend.detailtour');
    // }

    public function detailtourvalo()
    {
        return view('frontend.detailtourvalo');
    }

    public function detaildonation()
    {
        return view('frontend.detaildonation');
    }

    public function mainblog(){
        $beritas = Berita::all(); // Fetch all articles
        return view('frontend.mainblog', compact('beritas'));
    }

    public function blog($id){
        $berita = Berita::findOrFail($id); // Fetch a specific article
        return view('frontend/blog', compact('berita'));
    }

    public function about()
    {
        return view('frontend.about');
    }

    public function contact()
    {
        return view('frontend.contact');
    }
    public function tournament(){
        return view('frontend/tournament');
    }

}
