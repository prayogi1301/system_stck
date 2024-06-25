@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Lihat Tipe</div>
                <a class="btn btn-danger" href="{{ route('tipes.cetak', $tipe->id) }}" target="blank">Cetak PDF</a>
            </div>
            <div class="card-body">
                No Registrasi: {{ $tipe->nopol }} <br>
                Merk: {{ $tipe->merk }} <br>
                Tipe: {{ $tipe->nama_tipe }} <br>
                Jenis: {{ $tipe->jenis }} <br>
                Model: {{ $tipe->model }} <br>
                Tahun: {{ $tipe->tahun_buat }} <br>
                No Rangka: {{ $tipe->no_rangka }} <br>
                No Mesin: {{ $tipe->no_mesin }} <br>
                Bahan Bakar: {{ $tipe->bahan_bakar }} <br>
                Warna: {{ $tipe->warna }} <br>
                Tujuan: {{ $tipe->kepentingan }} <br>
                Berlaku: {{ date('d/m/Y', strtotime($tipe->tgl_daftar)) }} Sampai {{ date('d/m/Y', strtotime($tipe->tgl_mslaku)) }}<br>
                Sumenep, {{ date('d/m/Y', strtotime($today)) }} <br>
                Pemohon: {{ $tipe->pemohon }} <br>
            </div>
        </div>
    </div>
</div>
@endsection