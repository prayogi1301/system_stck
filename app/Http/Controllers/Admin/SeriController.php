<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Seri;
use Illuminate\Http\Request;

class SeriController extends Controller
{
    public function index()
    {
        $seris = Seri::latest()->paginate(config('stck.admin_pagination'));
        return view('seris.index', [
            'seris' => $seris
        ]);
    }

    public function create()
    {
        return view('seris.create');
    }

    public function store(Request $request)
    {
        request()->validate([
            'no_seri' => 'required',
        ]);
        Seri::create($request->all());
        return redirect()->route('seris.index')->with('success', 'Data Seri berhasil ditambahkan');
    }

    public function show(Seri $stck)
    {
        return view('seris.show', compact('seri'));
    }

    public function edit(Seri $seri)
    {
        return view('seris.edit', compact('seri'));
    }

    public function update(Request $request, Seri $seri)
    {
        request()->validate([
            'no_seri' => 'required',
        ]);

        $seri->update($request->all());

        return  redirect()->route('seris.index')->with('info', 'Data Seri berhasil diupdate');
    }

    public function destroy(Seri $seri)
    {
        $seri->delete();

        return  redirect()->route('seris.index')->with('danger', 'Data Seri berhasil dihapus');
    }
}
