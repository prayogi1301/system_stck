<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Merk;
use Illuminate\Http\Request;

class MerkController extends Controller
{
    public function index()
    {
        $merks = Merk::latest()->paginate(config('stck.admin_pagination'));
        return view('merks.index', [
            'merks' => $merks
        ]);
    }

    public function create()
    {
        return view('merks.create');
    }

    public function store(Request $request)
    {
        request()->validate([
            'nama_merk' => 'required',
        ]);
        Merk::create($request->all());
        return redirect()->route('merks.index')->with('success', 'Data Merk berhasil ditambahkan');
    }

    public function show(Merk $merk)
    {
        return view('merks.show', compact('merk'));
    }

    public function edit(Merk $merk)
    {
        return view('merks.edit', compact('merk'));
    }

    public function update(Request $request, Merk $merk)
    {
        request()->validate([
            'nama_merk' => 'required',
        ]);

        $merk->update($request->all());
        return  redirect()->route('merks.index')->with('info', 'Data Merk berhasil diupdate');
    }

    public function destroy(Merk $merk)
    {
        $merk->delete();

        return  redirect()->route('merks.index')->with('danger', 'Data Merk berhasil dihapus');
    }
}
