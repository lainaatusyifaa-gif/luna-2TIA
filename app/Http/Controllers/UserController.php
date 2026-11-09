<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['dataUser'] = User::all();
        return view('admin.user.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        return view('admin.user.create');
    }
    // menyimpan data user

    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'name'     => 'required|string|max:100',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        // Mengambil data dari form
        $data = $request->all();

        // Mengenkripsi password
        $data['password'] = Hash::make($request->password);

        // Menyimpan data user
        User::create($data);

        // Kembali ke halaman user dengan pesan sukses
        return redirect()->route('user.index')
            ->with('success', 'Data user berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['dataUser'] = User::findOrFail($id);
        return view('admin.user.edit', $data);
    }

    public function update(Request $request, string $id)
    {
        // Cari data user berdasarkan ID
        $user = User::findOrFail($id);

        // Validasi data
        $request->validate([
            'name'     => 'required|string|max:100',
            'email'    => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:8|confirmed',
        ]);

        // Update nama dan email
        $user->name  = $request->name;
        $user->email = $request->email;

        // Update password jika diisi
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        // Simpan perubahan
        $user->save();

        // Kembali ke halaman user
        return redirect()->route('user.index')
            ->with('success', 'Data user berhasil diperbarui!');
    }

    public function destroy(string $id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->delete();
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('pelanggan.index')->with('success', 'Data Berhasil Dihapus!');
        return redirect()->route('user.index')
            ->with('success', 'Data user berhasil ditambahkan!');
        return redirect()->route('user.index')
            ->with('success', 'Data user berhasil diperbarui!');
    }

    public function rules()
    {
        return [
            'name'     => 'required|string|max:255',
            'email'    => 'required|email',
            'password' => 'required|min:8|confirmed',
        ];
    }

    public function messages()
    {
        return [
            'email.email'        => 'Format email tidak valid.',
            'password.min'       => 'Password minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
        ];
    }
}