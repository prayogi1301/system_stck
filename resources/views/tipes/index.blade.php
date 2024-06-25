@extends('layouts.app')

@section('content')
@include('layouts.alert')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Data Tipe Kendaraan</h2>
            </div>
            <div class="pull-right">
                    <a class="btn btn-success" href="{{ route('tipes.create') }}"> Tambah Tipe</a>
            </div>
        </div>
    </div>
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Nopol</th>
            <th>Merk</th>
            <th>Nama Tipe</th>
            <th>Jenis</th>
            <th>Model</th>
            <th>Tahun</th>
            <th>CC</th>
            <th>No Rangka</th>
            <th>No Mesin</th>
            <th>Warna</th>
            <th>Bahan Bakar</th>
            <th>Tanggal Daftar</th>
            <th>Masa Berlaku</th>
            <th>Pemohon</th>
            <th width="280px">Aksi</th>
        </tr>
        @php
            $no = 1;
            @endphp
	    @foreach ($tipes as $tipe)
	    <tr>
	        <td>{{ $no++ }}</td>
	        <td>
                {{ $tipe->nopol }}
            </td>
            <td>
                {{ $tipe->merk }}
            </td>
	        <td>{{ $tipe->nama_tipe }}</td>
            <td>
                {{ $tipe->jenis }}
            </td>
            <td>
                {{ $tipe->model }}
            </td>
            <td>{{ $tipe->tahun_buat }}</td>
            <td>{{ $tipe->besar_cc }}</td>
            <td>{{ $tipe->no_rangka }}</td>
            <td>{{ $tipe->no_mesin }}</td>
            <td>{{ $tipe->warna }}</td>
            <td>{{ $tipe->bahan_bakar }}</td>
            <td>{{ date('d/m/Y', strtotime($tipe->tgl_daftar)) }}</td>
            <td>{{ date('d/m/Y', strtotime($tipe->tgl_mslaku)) }}</td>
            <td>
                {{ $tipe->pemohon }}
            </td>
	        <td>
                <form action="{{ route('tipes.destroy', $tipe->id) }}" method="POST">
                    @role('admin')
                    <a class="btn btn-secondary" href="{{ route('tipes.cetak', $tipe->id) }}" target="blank">Cetak</a>
                    <!-- <a class="btn btn-info" href="{{ route('tipes.show', $tipe->id) }}">Show</a> -->
                    <a class="btn btn-primary" href="{{ route('tipes.edit', $tipe->id) }}">Edit</a>
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Anda yakin ingin menghapus data ini?')"
                    class="btn btn-danger">Hapus
                </button>
                @endrole
                @role('user')
                    <a class="btn btn-secondary" href="{{ route('tipes.cetak', $tipe->id) }}" target="blank">Cetak</a>
                    <a class="btn btn-primary" href="{{ route('tipes.edit', $tipe->id) }}">Edit</a>
                @endrole
            </form>
	        </td>
	    </tr>
	    @endforeach
    </table>
    {{-- {!! $tipes->links() !!} --}}
    {{ $tipes->links('vendor.pagination.bootstrap-4') }}
@endsection