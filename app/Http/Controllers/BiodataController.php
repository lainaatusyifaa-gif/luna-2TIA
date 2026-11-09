<?php

namespace App\Http\Controllers;

use App\Models\Biodata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class BiodataController extends Controller

{
    // Menampilkan semua data biodata
    public function index()
    {
        $biodata = Biodata::latest()->get();

        return view('admin.biodata.index', compact('biodata'));
    }

    // Menampilkan form tambah biodata
    public function create()
    {
        return view('admin.biodata.create');
    }

    // Menyimpan data biodata
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'nullable|string|max:20',
            'email' => 'nullable|email',
            'no_hp' => 'nullable|string|max:20',
            'alamat' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('biodata', 'public');
        }

        Biodata::create($data);

        return redirect()->route('biodata.index')
            ->with('success', 'Data biodata berhasil ditambahkan!');
    }

    // Menampilkan form edit
    public function edit(Biodata $biodatum)
    {
        return view('admin.biodata.edit', [
            'biodata' => $biodatum
        ]);
    }

    // Memperbarui data biodata
    public function update(Request $request, Biodata $biodatum)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'nullable|string|max:20',
            'email' => 'nullable|email',
            'no_hp' => 'nullable|string|max:20',
            'alamat' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            if ($biodatum->foto) {
                Storage::disk('public')->delete($biodatum->foto);
            }

            $data['foto'] = $request->file('foto')->store('biodata', 'public');
        }

        $biodatum->update($data);

        return redirect()->route('biodata.index')
            ->with('success', 'Data biodata berhasil diperbarui!');
    }

    // Menghapus data biodata
    public function destroy(Biodata $biodatum)
    {
        if ($biodatum->foto) {
            Storage::disk('public')->delete($biodatum->foto);
        }

        $biodatum->delete();

        return redirect()->route('biodata.index')
            ->with('success', 'Data biodata berhasil dihapus!');
    }

    public function show(Biodata $biodatum)
    {
        return view('admin.biodata.cv', [
            'biodata' => $biodatum
        ]);
    }
}
