<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Berita;
use App\Models\Game;
use App\Models\Tournament;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('isAdmin');
    }

    public function dashboard()
    {
        $userCount = User::count();
        $beritacount = Berita::count();
        $tourcount = Tournament::count();
        $komentarcount = Comment::count();
        return view('dashboard', ['userCount' => $userCount, 'beritacount' => $beritacount, 'tourcount' => $tourcount, 'komentarcount' => $komentarcount]);

        return abort(403);
    }


    public function index(Request $request)
    {

        $data = new User;

        if ($request->get('search')) {
            $data = $data->where('name', 'LIKE', '%' . $request->get('search') . '%')
                ->orWhere('email', 'LIKE', '%' . $request->get('search') . '%');
        }

        if ($request->get('tanggal')) {
            $data = $data->where('name', 'LIKE', '%' . $request->get('search') . '%')
                ->orWhere('email', 'LIKE', '%' . $request->get('search') . '%');
        }

        // $data = $data->onlyTrashed();

        $data = $data->get();

        return view('index', compact('data', 'request'));
    }

    public function assets(Request $request)
    {

        $data = new User;

        if ($request->get('search')) {
            $data = $data->where('name', 'LIKE', '%' . $request->get('search') . '%')
                ->orWhere('email', 'LIKE', '%' . $request->get('search') . '%');
        }

        if ($request->get('tanggal')) {
            $data = $data->where('name', 'LIKE', '%' . $request->get('search') . '%')
                ->orWhere('email', 'LIKE', '%' . $request->get('search') . '%');
        }

        $data = $data->get();

        if ($request->get('export') == 'pdf') {
            $pdf = Pdf::loadView('pdf.assets', ['data' => $data]);
            return $pdf->stream('Data Assets.pdf');
        }

        return view('assets', compact('data', 'request'));
    }

    public function create()
    {
        return view('createadmin');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6'
        ]);

        $photo      = $request->file('image');
        $filename   = date('Y-m-d') . $photo->getClientOriginalName();
        $path       = 'photo-user/' . $filename;

        Storage::disk('public')->put($path, file_get_contents($photo));

        $user = User::create([
            'image' => $request->image,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $user->assignRole('admin');

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('admin.index');
        } else {
            return redirect()->route('admin.index')->with('failed', 'Email atau Password Salah');
        }
    }
    // public function store(Request $request)
    // {
    //     dd($request->all());
    //     $validator = Validator::make($request->all(), [
    //         'image' => 'required|mimes:png,jpg,jpeg|max:2048',
    //         'email' => 'required|email',
    //         'name'  => 'required',
    //         'password' => 'required',
    //     ]);

    //     if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

    //     $photo      = $request->file('image');
    //     $filename   = date('Y-m-d') . $photo->getClientOriginalName();
    //     $path       = 'photo-user/' . $filename;

    //     Storage::disk('public')->put($path, file_get_contents($photo));


    //     $data['email']      = $request->email;
    //     $data['name']       = $request->name;
    //     $data['password']   = Hash::make($request->password);
    //     $data['image']      = $filename;

    //     User::create($data);

    //     return redirect()->route('admin.index');
    // }

    public function edit(Request $request, $id)
    {
        $data = User::find($id);

        return view('edit', compact('data'));
    }
    public function showDashboard()
{
    $userCount = User::count(); 

    return view('dashboard', ['userCount' => $userCount]);
}

    public function detail(Request $request, $id)
    {
        $data = User::find($id);

        return view('detail', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'email'     => 'required|email',
            'name'      => 'required',
            'password'  => 'nullable',
            'image'     => 'nullable|mimes:png,jpg,jpeg|max:2048',
        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $find = User::find($id);

        $data['email']      = $request->email;
        $data['name']       = $request->name;

        if ($request->password) {
            $data['password']   = Hash::make($request->password);
        }

        $photo      = $request->file('image');

        if ($photo) {

            $filename   = date('Y-m-d') . $photo->getClientOriginalName();
            $path       = 'photo-user/' . $filename;

            if ($find->image) {
                Storage::disk('public')->delete('photo-user/' . $find->image);
            }

            Storage::disk('public')->put($path, file_get_contents($photo));

            $data['image']      = $filename;
        }

        $find->update($data);

        return redirect()->route('admin.index');
    }

    public function delete(Request $request, $id)
    {
        $data = User::find($id);

        if ($data) {
            $data->forceDelete();
        }

        return redirect()->route('admin.index');
    }

    //Frontend
    
    // public function blog(){
    //      // Fetch a specific article
    //     return view('frontend/blog');
    // }

    public function creategame(){
        return view('creategame');
    }
}
