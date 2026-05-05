<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Penerbit;
use App\Models\Pengarang;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index()
    {
        $data = Buku::with(['pengarang', 'penerbit'])->get();
        return view('admin.buku.index', compact('data'));
    }

    public function create()
    {
        $pengarang = Pengarang::all();
        $penerbit = Penerbit::all();

        return view('admin.buku.create', compact('pengarang', 'penerbit'));
    }

    public function store(Request $request)
    {
        Buku::create($request->all());
        return redirect('/admin/buku');
    }
}
