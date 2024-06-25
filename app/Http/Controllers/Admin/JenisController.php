<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jenisk;
use Illuminate\Http\Request;

class JenisController extends Controller
{
    public function index()
    {
        $jeniss = Jenisk::latest()->paginate(config('stck.admin_pagination'));
        return view('jeniss.index', [
            'jeniss' => $jeniss
        ]);
    }

    public function create()
    {
        return view('jeniss.create');
    }

    public function store(Request $request)
    {
        request()->validate([
            'najen' => 'required',
            'golkend' => 'required',
            'napkb' => 'required',
            'ket' => 'required'
        ]);
        Jenisk::create($request->all());
        return redirect()->route('jenis.index')->with('success', 'Data Jenisk berhasil ditambahkan');
    }

    public function show(Jenisk $jenis)
    {
        return view('jeniss.show', compact('jenis'));
    }

    public function edit(Jenisk $jenis)
    {
        // dd($jenis);
        return view('jeniss.edit', compact('jenis'));
    }

    public function update(Request $request, Jenisk $jenis)
    {
        request()->validate([
            'najen' => 'required',
            'golkend' => 'required',
            'napkb' => 'required',
            'ket' => 'required'
        ]);
        $jenis->update($request->all());
        return redirect()->route('jenis.index')->with('info', 'Data Jenis berhasil diupdate');
    }

    public function destroy(Jenisk $jenis)
    {
        $jenis->delete();
        return  redirect()->route('jenis.index')->with('danger', 'Data Jenis berhasil dihapus');
    }
}
