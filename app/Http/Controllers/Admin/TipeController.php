<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Dealer;
use App\Jenisk;
use App\Merk;
use App\Nopol;
use App\Tipe;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\DB;

class TipeController extends Controller
{
    public function index()
    {
        $nopols = Nopol::get();
        $tipes = Tipe::latest()->paginate(config('stck.admin_pagination'));
        return view('tipes.index', [
            'tipes' => $tipes,
            'nopols' => $nopols,
        ]);
    }

    public function create()
    {
        $jenisks = Jenisk::get();
        $merks = Merk::get();
        $dealers = Dealer::get();
        $nopols = Nopol::get();

        return view('tipes.create', [
            'jenisks' => $jenisks,
            'merks' => $merks,
            'dealers' => $dealers,
            'nopols' => $nopols,
        ]);
    }

    public function store(Request $request)
    {
        $today = Carbon::now();
        $berlaku = Carbon::now()->addDays(14);

        request()->validate([
            'nopol' => 'required',
            'merk' => 'required',
            'nama_tipe' => 'required',
            'jenis' => 'required',
            'model' => 'required',
            'tahun_buat' => 'required',
            'besar_cc' => 'required',
            'no_rangka' => 'unique:tipes,no_rangka',
            'no_mesin' => 'required',
            'pemohon' => 'required',
        ]);
        // Tipe::create($request->all());
        Tipe::create([
            'nopol' => $request->nopol,
            'merk' => $request->merk,
            'nama_tipe' => $request->nama_tipe,
            'jenis' => $request->jenis,
            'model' => $request->model,
            'tahun_buat' => $request->tahun_buat,
            'besar_cc' => $request->besar_cc,
            'kepentingan' => $request->kepentingan,
            'no_rangka' => $request->no_rangka,
            'no_mesin' => $request->no_mesin,
            'warna' => $request->warna,
            'pemohon' => $request->pemohon,
            'bahan_bakar' => $request->bahan_bakar,
            'tgl_daftar' => $today,
            'tgl_cetak' => $today,
            'tgl_mslaku' => $berlaku,
        ]);
        return redirect()->route('tipes.index')->with('success', 'Data Tipe berhasil ditambahkan');
    }

    public function show($id)
    {
        $today = Carbon::now();
        $tipe = DB::table('tipes')
            ->select('tipes.*')
            ->where('tipes.id', '=', $id)
            ->get();

        return view('tipes.show', [
            'tipe' => $tipe,
            'today' =>$today,
        ]);
    }

    public function edit(Tipe $tipe)
    {
        return view('tipes.edit', compact('tipe'));
    }

    public function update(Request $request, Tipe $tipe)
    {
        request()->validate([
            'nopol' => 'required',
            'merk' => 'required',
            'nama_tipe' => 'required',
            'jenis' => 'required',
            'model' => 'required',
            'tahun_buat' => 'required',
            'besar_cc' => 'required',
            'no_rangka' => 'unique:tipes,no_rangka',
            'no_mesin' => 'required',
            'pemohon' => 'required',
        ]);

        $tipe->update($request->all());

        return  redirect()->route('tipes.index')->with('info', 'Data Tipe Kendaraan berhasil diupdate');
    }

    public function destroy(Tipe $tipe)
    {
        $tipe->delete();

        return  redirect()->route('tipes.index')->with('danger', 'Data Tipe Kendaraan berhasil dihapus');
    }

    public function cetak($id)
    {
        // $tipes = Tipe::find($id);

        $tipes = DB::table('tipes')
            // ->join('nopols', 'tipes.id', '=', 'nopols.id')
            // ->join('dealers', 'tipes.id', '=', 'dealers.id')
            // ->join('merks', 'tipes.id', '=', 'merks.id')
            ->select('tipes.*')
            ->where('tipes.id', $id)
            ->get();

        // $pdf = PDF::loadview('tipes.tipe_pdf', [
        //     'tipes'=>$tipes,
        // ]);
        // PDF::loadHTML($html)->setPaper('a4', 'landscape')->setWarnings(false)->save('myfile.pdf')
        // $pdf = PDF::loadView('tipes.cetak_pdf', compact('cetak'));
        $pdf = PDF::loadview('tipes.tipe_pdf', [
           'tipes'=>$tipes, 
       ])->setPaper('STCK', 'landscape');
        // return $pdf->download('cetakpdf.pdf');
        return $pdf->stream('cetak.pdf');
    }
}
