<?php
namespace App\Http\Controllers;
use App\Models\User;
use App\Models\RegistrationSetting;
use App\Http\Controllers\GameController;
use App\Models\Game;
use App\Models\Tournament; 
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\RedirectResponse;
use Spatie\Permission\Traits\HasRoles;

class TournamentController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('isAdmin');
    //     $this->middleware('isPengguna_biasa');
    // }
    
    // public function detailtour($id)
    // {
    //     $tournament = Tournament::find($id);
    //     return view('frontend/detail_tour', compact('tournament'));
    // }

    // public function registertim(Request $request)
    // {
        
    // }


    
    
    


    public function indextour(Request $request)
    {
        
        $query = Tournament::with('game');

        // if (Auth::user()->hasRole('pengguna_biasa')) {
        //     $query->where('user_id', Auth::user()->id);
        //     $view = 'frontend.indextouruser';
        // } else {
        //     $view = 'indextour';
        // }

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($query) use ($search) {
                $query->where('nama', 'LIKE', '%' . $search . '%')
                    ->orWhere('deskripsi', 'LIKE', '%' . $search . '%');
            });
        }

        $data = $query->get();
        

        return view('indextour', compact('data', 'request'));
        // return view($view, compact('data', 'request'));
    }
    
    
    public function createtourfe(Request $request){
        $games = Game::all(); // Ambil semua game dari database
        return view('frontend/Create_Tournament', compact('games'));
    }

    public function storetourfe(Request $request): RedirectResponse
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'user_id'         => 'required|exists:users,id',
            'game_id'         => 'required|exists:games,id',
            'nama'            => 'required',
            'url'             => 'required',
            'jadwal_mulai'    => 'required|date',
            'jadwal_selesai'  => 'required|date|after_or_equal:jadwal_mulai',
            'deskripsi'       => 'required|string',
            'tipe'            => 'required|in:Online,Offline',
            'alamat'          => 'nullable|string|required_if:tipe,Offline',
            'fee'            => 'required|integer',
            'url_live'       => 'required|string|max:255',
            'format'         => 'required|string|max:255',
            'hadiah'          => 'required',
            'rules'           => 'required',
            'jenis_pendaftaran' => 'required',
            // 'jumlah_peserta'    => 'required|integer|min:1',
            'jumlah_anggota_tim' => 'nullable|integer|min:1|required_if:jenis_pendaftaran,Tim',
            'batas_pendaftaran' => 'required|date|before_or_equal:jadwal_mulai',
            
        ], [
            'nama.required'                     => 'Nama turnamen diperlukan.',
            'game_id.required'                  => 'Pilih Game.',
            'url.required'                      => 'URL turnamen diperlukan.',
            'jadwal_mulai.required'             => 'Jadwal mulai diperlukan.',
            'jadwal_selesai.required'           => 'Jadwal selesai diperlukan.',
            'jadwal_selesai.after_or_equal'     => 'Jadwal selesai harus setelah atau sama dengan jadwal mulai.',
            'deskripsi.required'                => 'Deskripsi diperlukan.',
            'format.required'                   => 'Format diperlukan',
            'fee.required'                      => 'Fee diperlukan',
            'url_live.required'                   => 'URL live diperlukan',
            'hadiah.required'                   => 'Hadiah diperlukan.',
            'tipe.required'                     => 'Tipe turnamen diperlukan.',
            'alamat.required_if'                => 'Alamat diperlukan jika tipe turnamen adalah Offline.',
            'rules.required'                    => 'Rules diperlukan.',
            'jenis_pendaftaran.required'        => 'Jenis pendaftaran harus dipilih.',
            'jenis_pendaftaran.in'              => 'Jenis pendaftaran tidak valid.',
            // 'jumlah_peserta.required'           => 'Jumlah peserta harus diisi.',
            // 'jumlah_peserta.integer'            => 'Jumlah peserta harus berupa angka.',
            // 'jumlah_peserta.min'                => 'Jumlah peserta minimal 1.',
            'jumlah_anggota_tim.integer'        => 'Jumlah anggota tim harus berupa angka.',
            'jumlah_anggota_tim.min'            => 'Jumlah anggota tim minimal 1.',
            'jumlah_anggota_tim.required_if'    => 'Jumlah anggota tim harus diisi jika jenis pendaftaran adalah Tim.',
            'batas_pendaftaran.required'        => 'Batas pendaftaran harus diisi.',
            'batas_pendaftaran.date'            => 'Batas pendaftaran harus berupa tanggal yang valid.',
            'batas_pendaftaran.before_or_equal'  => 'Batas pendaftaran harus setelah atau sama dengan jadwal mulai.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $tournament = Tournament::create([
            'user_id'        => Auth::user()->id,
            'game_id'        => $request->game_id, 
            'nama'           => $request->nama,
            'url'            => $request->url,
            'fee'            => $request->fee,
            'url_live'       => $request->url_live,
            'format'         => $request->format,
            'jadwal_mulai'   => $request->jadwal_mulai,
            'jadwal_selesai' => $request->jadwal_selesai,
            'deskripsi'      => $request->deskripsi,
            'tipe'           => $request->tipe,
            'alamat'         => $request->alamat,
            'hadiah'         => $request->hadiah,
            'rules'          => $request->rules,
            
        ]);

        $tournament->registrationSetting()->create([
            'jenis_pendaftaran' => $request->jenis_pendaftaran,
            'jumlah_peserta'    => $request->jumlah_peserta,
            'jumlah_anggota_tim' => $request->jumlah_anggota_tim,
            'batas_pendaftaran' => $request->batas_pendaftaran,
        ]);

        return redirect()->route('tournament');
    }

    public function createtour(Request $request)
    {
       
        $games = Game::all(); // Ambil semua game dari database
        return view('createtour', compact('games'));

        // if (Auth::check() && Auth::user()->hasRole('pengguna_biasa'))
        // {
        //     return view('frontend.createtouruser', compact('games'));
        // } else if (Auth::check() && Auth::user()->hasRole('admin'))
        // {
        //     return view('createtour', compact('games'));
        // } 

    }

    public function storetour(Request $request): RedirectResponse
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'user_id'         => 'required|exists:users,id',
            'game_id'         => 'required|exists:games,id',
            'nama'            => 'required',
            'url'             => 'required',
            'jadwal_mulai'    => 'required|date',
            'jadwal_selesai'  => 'required|date|after_or_equal:jadwal_mulai',
            'deskripsi'       => 'required|string',
            'tipe'            => 'required|in:Online,Offline',
            'alamat'          => 'nullable|string|required_if:tipe,Offline',
            'fee'            => 'required|integer',
            'url_live'       => 'required|string|max:255',
            'format'         => 'required|string|max:255',
            'hadiah'          => 'required',
            'rules'           => 'required',
            'jenis_pendaftaran' => 'required',
            // 'jumlah_peserta'    => 'required|integer|min:1',
            'jumlah_anggota_tim' => 'nullable|integer|min:1|required_if:jenis_pendaftaran,Tim',
            'batas_pendaftaran' => 'required|date|before_or_equal:jadwal_mulai',
            
        ], [
            'nama.required'                     => 'Nama turnamen diperlukan.',
            'game_id.required'                  => 'Pilih Game.',
            'url.required'                      => 'URL turnamen diperlukan.',
            'jadwal_mulai.required'             => 'Jadwal mulai diperlukan.',
            'jadwal_selesai.required'           => 'Jadwal selesai diperlukan.',
            'jadwal_selesai.after_or_equal'     => 'Jadwal selesai harus setelah atau sama dengan jadwal mulai.',
            'deskripsi.required'                => 'Deskripsi diperlukan.',
            'format.required'                   => 'Format diperlukan',
            'fee.required'                      => 'Fee diperlukan',
            'url_live.required'                   => 'URL live diperlukan',
            'hadiah.required'                   => 'Hadiah diperlukan.',
            'tipe.required'                     => 'Tipe turnamen diperlukan.',
            'alamat.required_if'                => 'Alamat diperlukan jika tipe turnamen adalah Offline.',
            'rules.required'                    => 'Rules diperlukan.',
            'jenis_pendaftaran.required'        => 'Jenis pendaftaran harus dipilih.',
            'jenis_pendaftaran.in'              => 'Jenis pendaftaran tidak valid.',
            // 'jumlah_peserta.required'           => 'Jumlah peserta harus diisi.',
            // 'jumlah_peserta.integer'            => 'Jumlah peserta harus berupa angka.',
            // 'jumlah_peserta.min'                => 'Jumlah peserta minimal 1.',
            'jumlah_anggota_tim.integer'        => 'Jumlah anggota tim harus berupa angka.',
            'jumlah_anggota_tim.min'            => 'Jumlah anggota tim minimal 1.',
            'jumlah_anggota_tim.required_if'    => 'Jumlah anggota tim harus diisi jika jenis pendaftaran adalah Tim.',
            'batas_pendaftaran.required'        => 'Batas pendaftaran harus diisi.',
            'batas_pendaftaran.date'            => 'Batas pendaftaran harus berupa tanggal yang valid.',
            'batas_pendaftaran.before_or_equal'  => 'Batas pendaftaran harus setelah atau sama dengan jadwal mulai.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $tournament = Tournament::create([
            'user_id'        => Auth::user()->id,
            'game_id'        => $request->game_id, 
            'nama'           => $request->nama,
            'url'            => $request->url,
            'fee'            => $request->fee,
            'url_live'       => $request->url_live,
            'format'         => $request->format,
            'jadwal_mulai'   => $request->jadwal_mulai,
            'jadwal_selesai' => $request->jadwal_selesai,
            'deskripsi'      => $request->deskripsi,
            'tipe'           => $request->tipe,
            'alamat'         => $request->alamat,
            'hadiah'         => $request->hadiah,
            'rules'          => $request->rules,
            
        ]);

        $tournament->registrationSetting()->create([
            'jenis_pendaftaran' => $request->jenis_pendaftaran,
            'jumlah_peserta'    => $request->jumlah_peserta,
            'jumlah_anggota_tim' => $request->jumlah_anggota_tim,
            'batas_pendaftaran' => $request->batas_pendaftaran,
        ]);

        return redirect()->route('admin.tour.index');
        // if (Auth::check() && Auth::user()->hasRole('pengguna_biasa'))
        // {
        //     return redirect()->route('pengguna_biasa.tour.index');
        // } else if (Auth::check() && Auth::user()->hasRole('admin'))
        // {
        //     return redirect()->route('admin.tour.index')->with('success', 'Turnamen berhasil dibuat!');
        // } 
        // return redirect()->back()->with('error','Unexpected Error');
    }

    public function edittour(Request $request, $id)
    {
        $data = Tournament::with('registrationSetting')->findOrFail($id);
        $games = Game::all(); // Mengambil semua game dari database

        // if (Auth::check()) {
        //     $user = Auth::user();

        //     // Check if the user is a regular user and not the owner of the tournament
        //     if ($user->hasRole('pengguna_biasa') && $data->user_id != $user->id) {
        //         return redirect()->back()->with('error', 'You do not have permission to edit this tournament.');
        //     }

        //     // Load the appropriate view based on the user's role
        //     if ($user->hasRole('pengguna_biasa')) {
        //         return view('frontend.edittouruser', compact('data', 'games'));
        //     } else if ($user->hasRole('admin')) {
        //         return view('edittour', compact('data', 'games'));
        //     }
        // }

        // return redirect()->back()->with('error', 'Unexpected Error');

        return view('edittour', compact('data', 'games'));
    }

    public function updatetour(Request $request, $id): RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'nama'            => 'required',
            'url'             => 'required',
            'jadwal_mulai'    => 'required|date',
            'jadwal_selesai'  => 'required|date|after_or_equal:jadwal_mulai',
            'deskripsi'       => 'required|string',
            'tipe'            => 'required|in:Online,Offline',
            'alamat'          => 'nullable|string|required_if:tipe,Offline',
            'hadiah'          => 'required',
            'rules'           => 'required',
            'fee'            => 'required|integer',
            'url_live'       => 'required|string|max:255',
            'format'         => 'required|string|max:255',
            'jenis_pendaftaran' => 'required',
            // 'jumlah_peserta'    => 'required|integer|min:1',
            'jumlah_anggota_tim' => 'nullable|integer|min:1|required_if:jenis_pendaftaran,Tim',
            'batas_pendaftaran' => 'required|date|before_or_equal:jadwal_mulai',
        ], [
            'nama.required'                     => 'Nama turnamen diperlukan.',
            'url.required'                      => 'URL turnamen diperlukan.',
            'jadwal_mulai.required'             => 'Jadwal mulai diperlukan.',
            'jadwal_selesai.required'           => 'Jadwal selesai diperlukan.',
            'jadwal_selesai.after_or_equal'     => 'Jadwal selesai harus setelah atau sama dengan jadwal mulai.',
            'deskripsi.required'                => 'Deskripsi diperlukan.',
            'hadiah.required'                   => 'Hadiah diperlukan.',
            'tipe.required'                     => 'Tipe turnamen diperlukan.',
            'alamat.required_if'                => 'Alamat diperlukan jika tipe turnamen adalah Offline.',
            'rules.required'                    => 'Rules diperlukan.',
            'format.required'                   => 'Format diperlukan',
            'fee.required'                      => 'Fee diperlukan',
            'url_live.required'                   => 'URL live diperlukan',
            'jenis_pendaftaran.required'        => 'Jenis pendaftaran harus dipilih.',
            'jenis_pendaftaran.in'              => 'Jenis pendaftaran tidak valid.',
            // 'jumlah_peserta.required'           => 'Jumlah peserta harus diisi.',
            // 'jumlah_peserta.integer'            => 'Jumlah peserta harus berupa angka.',
            // 'jumlah_peserta.min'                => 'Jumlah peserta minimal 1.',
            'jumlah_anggota_tim.integer'        => 'Jumlah anggota tim harus berupa angka.',
            'jumlah_anggota_tim.min'            => 'Jumlah anggota tim minimal 1.',
            'jumlah_anggota_tim.required_if'    => 'Jumlah anggota tim harus diisi jika jenis pendaftaran adalah Tim.',
            'batas_pendaftaran.required'        => 'Batas pendaftaran harus diisi.',
            'batas_pendaftaran.date'            => 'Batas pendaftaran harus berupa tanggal yang valid.',
            'batas_pendaftaran.before_or_equal'  => 'Batas pendaftaran harus setelah atau sama dengan jadwal mulai.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $data = Tournament::findOrFail($id);
        $data->update([
            'nama'             => $request->nama,
            'game_id'          => $request->game_id, 
            'url'              => $request->url,
            'jadwal_mulai'     => $request->jadwal_mulai,
            'jadwal_selesai'   => $request->jadwal_selesai,
            'deskripsi'        => $request->deskripsi,
            'tipe'             => $request->tipe,
            'alamat'           => $request->alamat,
            'hadiah'           => $request->hadiah,
            'rules'            => $request->rules,
            'fee'            => $request->fee,
            'url_live'       => $request->url_live,
            'format'         => $request->format,
        ]);

        $data->registrationSetting()->update([
            'jenis' => $request->jenis_pendaftaran,
            'jumlah_peserta'    => $request->jumlah_peserta,
            'jumlah_anggota_tim' => $request->jumlah_anggota_tim,
            'batas_pendaftaran' => $request->batas_pendaftaran,
        ]);

        // if (Auth::check() && Auth::user()->hasRole('pengguna_biasa'))
        // {
        //     return redirect()->route('pengguna_biasa.tour.index')->with('success', 'Turnamen berhasil diperbarui!');
        // } else if (Auth::check() && Auth::user()->hasRole('pengguna_biasa'))
        // {
        //     return redirect()->route('admin.tour.index')->with('success', 'Turnamen berhasil diperbarui!');
        // }
        // return redirect()->back()->with('error','Unexpected Error');
        return redirect()->route('admin.tour.index')->with('success', 'Turnamen berhasil diperbarui!');
    }


    // ... (fungsi update)
    public function deletetour($id)
    {
        $data = Tournament::findOrFail($id);
        if ($data) {
            $data->forceDelete();
        }

        return redirect()->route('admin.tour.index')->with('success', 'Turnamen berhasil dihapus!');

        // if (Auth::check()) {
        //     $user = Auth::user();

        //     // Check if the user is an admin or the owner of the tournament
        //     if ($user->hasRole('admin') || ($user->hasRole('pengguna_biasa') && $data->user_id == $user->id)) {
        //         $data->forceDelete();
        //         return redirect()->route('tour.index')->with('success', 'Tournament deleted successfully!');
        //     } else {
        //         return redirect()->back()->with('error', 'You do not have permission to delete this tournament.');
        //     }
        // }

        // return redirect()->back()->with('error', 'Unexpected Error, Try to log in again');
    }

}
