<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Standing;
use App\Models\Tournament;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Collection;

class StandingController extends Controller
{
    public function index(Tournament $tournament)
    {
        // Memanggil prosedur yang telah dibuat di database
        $standingsArray = DB::select('CALL GetStandingsRanking(?)', [$tournament->id]);
        // Ubah jadi Collection
        $standings = collect($standingsArray);
        
        
        if (Auth::user()->hasRole('pengguna_biasa')) {
            return view('frontend.indexstandinguser', compact('standings', 'tournament'));
        } else if (Auth::user()->hasRole('admin')) {
            return view('indexstanding', compact('standings', 'tournament'));
        }
    }

    public function edit(Tournament $tournament, Standing $standing)
    {
        // if ($standings->tournament_id !== $tournament->id) {
        //     abort(404);
        // }

        if (Auth::user()->hasRole('pengguna_biasa')) {
            return view('frontend.editstandinguser', compact('standing', 'tournament'));
        } else if (Auth::user()->hasRole('admin')) {
            return view('editstanding', compact('standing', 'tournament'));
        }
    }

    public function update(Request $request, Standing $standing)
    {
        // $redirect = null;
    
        // if (Auth::user()->hasRole('pengguna_biasa')) {
        //     $redirect = 'pengguna_biasa.standing.index';
        // } else if (Auth::user()->hasRole('admin')) {
        //     $redirect = 'admin.standing.index';
        // } else {
        //     return redirect()->route('guest.login');
        // }

        $validatedData = $request->validate([
            'win' => 'required|integer|min:0',
            'lose' => 'required|integer|min:0',
        ]);

        $totalMatches = $validatedData['win'] + $validatedData['lose'];
        $winRate = $totalMatches > 0 ? round(($validatedData['win'] / $totalMatches) * 100) : 0;

        $standing->update([
            'win' => $validatedData['win'],
            'lose' => $validatedData['lose'],
            'wr' => $winRate,
        ]);

        if (Auth::check() && Auth::user()->hasRole('pengguna_biasa'))
        {
            return redirect()->route('pengguna_biasa.standing.index', $standing->tournament_id)->with('success', 'Standings berhasil diperbarui!');
        } else if (Auth::check() && Auth::user()->hasRole('admin'))
        {
            return redirect()->route('admin.standing.index', $standing->tournament_id)->with('success', 'Standings berhasil diperbarui!');
        }
        return redirect()->back()->with('error','Unexpected Error');

        // if ($redirect) {
        //     return redirect()->route($redirect, $standing->tournament_id)->with('success', 'Standing created successfully.');
        // } else {
        //     return redirect()->route('guest.login')->with('error', 'An error occurred.');
        // }
    }

    // public function create(Tournament $tournament)
    // {
    //     return view('createstanding', compact('tournament'));

    //     // if (Auth::user()->hasRole('pengguna_biasa')) {
    //     //     return view('frontend.createstanding', compact('tournament'));
    //     // } else if (Auth::user()->hasRole('admin')) {
    //     //     return view('createstanding', compact('tournament'));
    //     // }
    //     // return redirect()->route('guest.login')->with('error', 'You are not authenticated');
    // }

    // public function store(Request $request, Tournament $tournament)
    // {
    //     $validatedData = $request->validate([
    //         'team_name' => 'required|string|max:255',
    //     ]);

    //     $lastRank = $tournament->standings()->max('rank');
    //     $newRank = $lastRank + 1;

    //     Standing::create([
    //         'tournament_id' => $tournament->id,
    //         'rank' => $newRank,
    //         'team_name' => $validatedData['team_name'],
    //         'win' => 0,
    //         'lose' => 0,
    //         'wr' => 0,
    //     ]);

    //     return redirect()->route('admin.standing.index', $tournament->id)
    //         ->with('success', 'Team added successfully');
    //     // if (Auth::user()->hasRole('pengguna_biasa')) {
    //     //     return redirect()->route('ppengguna_.standing.index', $tournament->id)
    //     //     ->with('success', 'Team added successfully');
    //     // } else if (Auth::user()->hasRole('admin')) {
    //     //     return redirect()->route('admin.standing.index', $tournament->id)
    //     //     ->with('success', 'Team added successfully');
    //     // }
    //     // return redirect()->route('guest.login')->with('error', 'You are not authenticated');
    // }
}