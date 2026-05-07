<?php

namespace App\Http\Controllers;

use App\Models\pengarang;
use Illuminate\Http\Request;

class PengarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Pengarang::all();
        return view('admin.pengarang.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pengarang.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Pengarang::create($request->all());
        return redirect('/admin/pengarang');
    }

    /**
     * Display the specified resource.
     */
    public function show(pengarang $pengarang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(pengarang $pengarang)
    {
        return view('admin.pengarang.edit', compact('pengarang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, pengarang $pengarang)
    {
        $pengarang->update($request->all());
        return redirect('/admin/pengarang');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(pengarang $pengarang)
    {
        $pengarang->delete();
        return back();
    }
}
