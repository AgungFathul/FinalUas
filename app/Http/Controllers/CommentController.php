<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Berita;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    public function indexkomentar(Request $request)
    {
        $data = Comment::all();
        return view('indexkomentar', compact('data', 'request'));
    }
    public function store(Request $request, $beritaId)
    {
        $request->validate([
            'comment' => 'required|max:1000',
        ]);

        Comment::create([
            'user_id' => Auth::id(),
            'berita_id' => $beritaId,
            'comment' => $request->comment,
        ]);

        return back()->with('success', 'Komentar berhasil ditambahkan.');
    }

    public function rank()
    {
        $ranks = DB::table('comments')
            ->join('users', 'comments.user_id', '=', 'users.id')
            ->select('users.id', 'users.name', DB::raw('COUNT(comments.id) as total_comments'))
            ->groupBy('users.id', 'users.name')
            ->orderByDesc('total_comments')
            ->get();

        return view('indexkomentarrank', compact('ranks'));
    }
}
