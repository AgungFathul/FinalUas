<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Standing;
use App\Models\RegistrationSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeamController extends Controller
{
    // ... (fungsi lain di TeamController)

    public function register(Request $request)
    {
        // Validate the input data
        $request->validate([
            'team_name' => 'required|string|max:255',
            'captain_name' => 'required|string|max:255',
            'captain_game_id' => 'required|string|max:255',
            'tournament_id' => 'required|exists:tournaments,id',
        ]);

        // Check if the user is already registered for this tournament
        $existingTeam = Team::where('user_id', auth()->id())
                            ->where('tournament_id', $request->tournament_id)
                            ->first();

        if ($existingTeam) {
            return back()->withErrors(['user_id' => 'You have already registered a team for this tournament.'])->withInput();
        }

        // Get the registration settings for the tournament
        $registrationSetting = RegistrationSetting::where('tournament_id', $request->tournament_id)->first();

        if (!$registrationSetting) {
            return back()->withErrors(['tournament_id' => 'Tournament registration settings not found.'])->withInput();
        }

        // Check if the registration limit has been reached
        $currentTeamCount = Team::where('tournament_id', $request->tournament_id)->count();

        if ($currentTeamCount >= $registrationSetting->jumlah_anggota_tim) {
            return back()->withErrors(['tournament_id' => 'The registration limit for this tournament has been reached.'])->withInput();
        }

        // Create a new team
        $team = Team::create([
            'name' => $request->team_name,
            'captain_name' => $request->captain_name,
            'captain_game_id' => $request->captain_game_id,
            'user_id' => auth()->id(), // Use the authenticated user's ID
            'tournament_id' => $request->tournament_id,
        ]);
    
        // Create a new standing entry for the team
        Standing::create([
            'tournament_id' => $request->tournament_id,
            'team_id' => $team->id, 
            'rank' => null, 
            'win' => 0,
            'lose' => 0,
            'wr' => 0,
        ]);

        // Return the same view with a success message
        return back()->with('success', 'Team registered successfully!');
    }
}

