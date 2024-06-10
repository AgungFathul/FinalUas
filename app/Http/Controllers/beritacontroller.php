<?php
namespace App\Http\Controllers;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Http\RedirectResponse;

class BeritaController extends Controller
{
    public function indexberita(Request $request)
    {
         $data = new Berita;

        if ($request->get('search')) {
            $data = $data->where('judul', 'LIKE', '%' . $request->get('search') . '%')
                ->orWhere('isiberita', 'LIKE', '%' . $request->get('search') . '%');
        }

        if ($request->get('tanggal')) {
            $data = $data->where('judul', 'LIKE', '%' . $request->get('search') . '%')
                ->orWhere('isiberita', 'LIKE', '%' . $request->get('search') . '%');
        }

        // $data = $data->onlyTrashed();

        $data = $data->get();

        return view('indexberita', compact('data', 'request'));
    }

    public function createberita()
    {
        return view('createberita');
    }

    public function storeberita(Request $request): RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'photoberita' => 'required|mimes:png,jpg,jpeg|max:2048',
            'judul'       => 'required',
            'isiberita'   => 'required',
        ], [
            'photoberita.required' => 'Photo is required.',
            'photoberita.mimes'    => 'Photo must be a file of type: png, jpg, jpeg.',
            'photoberita.max'      => 'Photo may not be greater than 2048 kilobytes.',
            'judul.required'       => 'Title is required.',
            'isiberita.required'   => 'Content is required.',
        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $photo = $request->file('photoberita');
        $filename = now()->format('Y-m-d') . '-' . $photo->getClientOriginalName();
        $path = 'photo-berita/' . $filename;

        Storage::disk('public')->put($path, file_get_contents($photo));

        Berita::create([
            'judul'      => $request->judul,
            'isiberita'  => $request->isiberita,
            'photo'      => $filename,
        ]);

        return redirect()->route('admin.berita.index');
    }

    public function editberita(Request $request, $id)
    {
        $data = Berita::findOrFail($id);
        return view('editberita', compact('data'));
    }

    public function updateberita(Request $request, $id): RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'judul'      => 'required',
            'isiberita'  => 'required',
            'photoberita'=> 'nullable|mimes:png,jpg,jpeg|max:2048',
        ], [
            'judul.required'       => 'Title is required.',
            'isiberita.required'   => 'Content is required.',
            'photoberita.mimes'    => 'Photo must be a file of type: png, jpg, jpeg.',
            'photoberita.max'      => 'Photo may not be greater than 2048 kilobytes.',
        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $data = Berita::findOrFail($id);
        $data->update([
            'judul'      => $request->judul,
            'isiberita'  => $request->isiberita,
        ]);

        if ($request->hasFile('photoberita')) {
            $photo = $request->file('photoberita');
            $filename = now()->format('Y-m-d') . '-' . $photo->getClientOriginalName();
            $path = 'photo-berita/' . $filename;

            Storage::disk('public')->put($path, file_get_contents($photo));
            if ($data->photo) {
                Storage::disk('public')->delete('photo-berita/' . $data->photo);
            }
            $data->update(['photo' => $filename]);
        }

        return redirect()->route('admin.berita.index');
    }

    public function deleteberita(Request $request, $id)
    {
        $data = Berita::find($id);

        if ($data) {
            $data->forceDelete();
        }

        return redirect()->route('admin.berita.index');
    }
}
