<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\RedirectResponse;

class GameController extends Controller
{
    public function indexgame(Request $request)
    {
        $data = Game::query();

        if ($request->get('search')) {
            $data->where('judul', 'LIKE', '%' . $request->get('search') . '%');
        }

        $data = $data->get();

        return view('indexgame', compact('data', 'request'));
    }

    public function creategame()
    {
        return view('creategame');
    }

    public function storegame(Request $request): RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'photogame' => 'required|mimes:png,jpg,jpeg|max:2048',
            'judul' => 'required',
            'platform' => 'required',
        ], [
            'photogame.required' => 'Photo is required.',
            'photogame.mimes'    => 'Photo must be a file of type: png, jpg, jpeg.',
            'photogame.max'      => 'Photo may not be greater than 2048 kilobytes.',
            'judul.required' => 'Title is required.',
            'platform.required' => 'Platform is required.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $photo = $request->file('photogame');
        $filename = now()->format('Y-m-d') . '-' . $photo->getClientOriginalName();
        $path = 'photo-game/' . $filename;

        Storage::disk('public')->put($path, file_get_contents($photo));

        Game::create([
            'judul' => $request->judul,
            'platform' => $request->platform,
            'photo'    => $filename,
        ]);

        return redirect()->route('admin.game.index');
    }

    public function editgame($id)
    {
        $data = Game::findOrFail($id);
        return view('editgame', compact('data'));
    }

    public function updategame(Request $request, $id): RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'judul'     => 'required',
            'platform' => 'required',
            'photogame' => 'nullable|mimes:png,jpg,jpeg|max:2048',
        ], [
            'judul.required'     => 'Title is required.',
            'platform.required' => 'Platform is required.',
            'photogame.mimes'    => 'Photo must be a file of type: png, jpg, jpeg.',
            'photogame.max'      => 'Photo may not be greater than 2048 kilobytes.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $game = Game::findOrFail($id);
        $game->update([
            'judul' => $request->judul,
            'platform' => $request->platform,
        ]);

        if ($request->hasFile('photogame')) {
            $photo = $request->file('photogame');
            $filename = now()->format('Y-m-d') . '-' . $photo->getClientOriginalName();
            $path = 'photo-game/' . $filename;

            Storage::disk('public')->put($path, file_get_contents($photo));
            if ($game->photo) {
                Storage::disk('public')->delete('photo-game/' . $game->photo);
            }
            $game->update(['photo' => $filename]);
        }

        return redirect()->route('admin.game.index');
    }

    public function deletegame($id): RedirectResponse
    {
        $game = Game::findOrFail($id);

        if ($game->photo) {
            Storage::disk('public')->delete('photo-game/' . $game->photo);
        }

        $game->delete();

        return redirect()->route('admin.game.index');
    }
}
