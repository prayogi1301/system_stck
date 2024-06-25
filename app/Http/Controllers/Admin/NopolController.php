<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Nopol;
use Illuminate\Http\Request;

class NopolController extends Controller
{
    public function index()
    {
        $nopols = Nopol::latest()->paginate(config('nopol.admin_pagination'));
        return view('nopols.index', [
            'nopols' => $nopols
        ]);
    }

    public function create()
    {
        return view('nopols.create');
    }

    public function store(Request $request)
    {
        request()->validate([
            'nopola' => 'required',
            'nopolb' => 'required',
            'nopolc' => 'required',
            'nopol' => 'required',
        ]);
        Nopol::create($request->all());
        return redirect()->route('nopols.index')->with('success', 'Data Nopol berhasil ditambahkan');
    }

    public function show(Nopol $nopol)
    {
        return view('nopols.show', compact('nopol'));
    }

    public function edit(Nopol $nopol)
    {
        return view('nopols.edit', compact('nopol'));
    }

    public function update(Request $request, Nopol $nopol)
    {
        request()->validate([
            'nopola' => 'required',
            'nopolb' => 'required',
            'nopolc' => 'required',
            'nopol' => 'required',
        ]);

        $nopol->update($request->all());

        return  redirect()->route('nopols.index')->with('info', 'Data Nopol berhasil diupdate');
    }

    public function destroy(Nopol $nopol)
    {
        $nopol->delete();

        return  redirect()->route('nopols.index')->with('danger', 'Data Nopol berhasil dihapus');
    }
}
