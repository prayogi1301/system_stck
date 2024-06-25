<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Nopol;
use Illuminate\Http\Request;
use App\Models\Cetak;
use App\Models\Dealer;
use App\Models\Jenisk;
use App\Models\Merk;
use App\Models\Seri;
use App\Models\Tipe;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class CetakController extends Controller
{
    public function index()
    {
        // $cetaks = Cetak::latest()->paginate(config('stck.admin_pagination'));
        $cetaks = DB::table('cetaks')
            ->join('nopols', 'cetaks.id', '=', 'nopols.id')
            ->join('dealers', 'cetaks.id', '=', 'dealers.id')
            ->join('merks', 'cetaks.id', '=', 'merks.id')
            ->join('tipes', 'cetaks.id', '=', 'tipes.id')
            ->join('jenisks', 'cetaks.id', '=', 'jenisks.id')
            ->select('cetaks.*', 'nopols.nopol', 'dealers.pemohon', 'merks.nama_merk', 'tipes.nama_tipe', 'jenisks.napkb', 'jenisks.najen', 'tipes.tahun_buat', 'tipes.no_rangka', 'tipes.no_mesin', 'tipes.bahan_bakar', 'tipes.warna')
            ->paginate(config('stck.admin_pagination'));

        $tipes = Tipe::all();
        $jeniss = Jenisk::get();
        $dealers = Dealer::get();
        $nopols = Nopol::get();
        $merks = Merk::get();
        return view('cetaks.index', [
            'cetaks' => $cetaks,
            'tipes' => $tipes,
            'jeniss' => $jeniss,
            'dealers' => $dealers,
            'nopols' => $nopols,
            'merks' => $merks,
        ]);
    }

    public function create()
    {
        $tipes = Tipe::get();
        $jenisks = Jenisk::get();
        $merks = Merk::get();
        $dealers = Dealer::get();
        $nopols = Nopol::get();

        return view('cetaks.create', [
            'tipes' => $tipes,
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
            'nopol.*' => 'required',
            'merk.*' => 'required',
            'jenisk.*' => 'required',
            'tipe.*' => 'required',
            'dealer.*' => 'required',
            'kepentingan' => 'required',
        ]);
        // Cetak::create($request->all());
        $cetak = Cetak::create([
            'kepentingan' => $request->kepentingan,
            'tgl_daftar' => $today,
            'tgl_cetak' => $today,
            'tgl_mslaku' => $berlaku,
        ]);
        $nopols = Nopol::find($request->nopol);
        $cetak->nopols()->attach($nopols);
        $merks = Merk::find($request->merk);
        $cetak->merks()->attach($merks);
        $jenisks = Jenisk::find($request->jenis);
        $cetak->jenisks()->attach($jenisks);
        $tipes = Tipe::find($request->tipe);
        $cetak->tipes()->attach($tipes);
        $dealers = Dealer::find($request->dealer);
        $cetak->dealers()->attach($dealers);

        return redirect()->route('cetaks.index')->with('success', 'Data Cetak berhasil ditambahkan');
    }

    public function show($id)
    {
        $today = Carbon::now();
        $cetak = Cetak::find($id);
        $nopol = Nopol::find($id);
        $merk = Merk::find($id);
        $jenis = Jenisk::find($id);
        $tipe = Tipe::find($id);
        $dealer = Dealer::find($id);
        return view('cetaks.show', [
            'cetak' => $cetak,
            'nopol' => $nopol,
            'merk' => $merk,
            'jenis' => $jenis,
            'tipe' => $tipe,
            'dealer' => $dealer,
            'today' =>$today,
        ]);
    }

    public function edit(Cetak $cetak)
    {
        $seris = Seri::get();
        $tipes = Tipe::get();
        $jeniss = Jenisk::get();
        $merks = Merk::get();

        return view('cetaks.edit', compact('cetak'), [
            'tipes' => $tipes,
            'jeniss' => $jeniss,
            'merks' => $merks,
            'seris' => $seris,
        ]);
    }

    public function update(Request $request, Cetak $cetak)
    {
        request()->validate([
            'kepentingan' => 'required',
            'tgl_daftar' => 'required',
            'tgl_cetak' => 'required',
            'tgl_mslaku' => 'required',
        ]);

        $cetak->update($request->all());

        return redirect()->route('cetaks.index')->with('info', 'Data Cetak berhasil diupdate');
    }

    public function destroy(Cetak $cetak)
    {
        $cetak->delete();

        return  redirect()->route('cetaks.index')->with('danger', 'Data Cetak berhasil dihapus');
    }

    public function cetak($id)
    {
        $nopol = Nopol::find($id);
        $merk = Merk::find($id);
        $jenis = Jenisk::find($id);
        $tipe = Tipe::find($id);
        $dealer = Dealer::find($id);

        $cetaks = DB::table('cetaks')
            ->join('nopols', 'cetaks.id', '=', 'nopols.id')
            ->join('dealers', 'cetaks.id', '=', 'dealers.id')
            ->join('merks', 'cetaks.id', '=', 'merks.id')
            ->join('tipes', 'cetaks.id', '=', 'tipes.id')
            ->join('jenisks', 'cetaks.id', '=', 'jenisks.id')
            ->select('cetaks.*', 'nopols.nopol', 'dealers.pemohon', 'merks.nama_merk', 'tipes.nama_tipe', 'jenisks.napkb', 'jenisks.najen', 'tipes.tahun_buat', 'tipes.no_rangka', 'tipes.no_mesin', 'tipes.bahan_bakar', 'tipes.warna')
            ->where('cetaks.id', $id)
            ->get();

        $pdf = PDF::loadview('cetaks.cetak_pdf', [
            'cetak'=>$cetaks,
            'nopol'=>$nopol,
            'merk'=>$merk,
            'jenis'=>$jenis,
            'tipe'=>$tipe,
            'dealer'=>$dealer,
        ]);
        // $pdf = PDF::loadView('cetaks.cetak_pdf', compact('cetak'));
        // $pdf = PDF::loadview('cetak_pdf')->setPaper('A4', 'potrait');
        // return $pdf->download('cetakpdf.pdf');
        return $pdf->stream('cetak.pdf');
    }
}
