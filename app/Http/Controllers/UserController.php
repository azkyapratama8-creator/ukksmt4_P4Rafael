<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // ================= PETUGAS =================
    public function petugas()
    {
        $data = User::where('role', 'petugas')->get();
        return view('admin.user.petugas.index', compact('data'));
    }

    public function createPetugas()
    {
        return view('admin.user.petugas.create');
    }

    public function storePetugas(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'petugas'
        ]);

        return redirect('/admin/petugas');
    }

    public function editPetugas(int $id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.petugas.edit', compact('user'));
    }

    public function updatePetugas(Request $request, int  $id)
    {
        $user = User::findOrFail($id);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => 'petugas'
        ]);

        if ($request->password) {
            $user->password = Hash::make($request->password);
            $user->save();
        }

        return redirect('/admin/petugas');
    }

    public function destroyPetugas(int $id)
    {
        User::destroy($id);
        return back();
    }

    // ================= ANGGOTA =================
    public function anggota()
    {
        $data = User::where('role', 'anggota')->get();
        return view('admin.user.anggota.index', compact('data'));
    }

    public function createAnggota()
    {
        return view('admin.user.anggota.create');
    }

    public function storeAnggota(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'anggota'
        ]);

        return redirect('/admin/anggota');
    }

    public function editAnggota(int $id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.anggota.edit', compact('user'));
    }

    public function updateAnggota(Request $request, int $id)
    {
        $user = User::findOrFail($id);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => 'anggota'
        ]);

        if ($request->password) {
            $user->password = Hash::make($request->password);
            $user->save();
        }

        return redirect('/admin/anggota');
    }

    public function destroyAnggota(int $id)
    {
        User::destroy($id);
        return back();
    }
}
