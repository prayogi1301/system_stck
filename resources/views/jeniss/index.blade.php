@extends('layouts.app')

@section('content')
@include('layouts.alert')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Data Jenis Kendaraan</h2>
            </div>
            <div class="pull-right">
                    <a class="btn btn-success" href="{{ route('jenis.create') }}"> Tambah Data</a>
            </div>
        </div>
    </div>

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Nama Jenis</th>
            <th>Golongan Kendaraan</th>
            <th>NAPKB</th>
            <th>Keterangan</th>
            <th width="280px">Aksi</th>
        </tr>
        @php
            $no = 1;
            @endphp
	    @foreach ($jeniss as $jenis)
	    <tr>
	        <td>{{ $no++ }}</td>
	        <td>{{ $jenis->najen }}</td>
	        <td>{{ $jenis->golkend }}</td>
            <td>{{ $jenis->napkb }}</td>
            <td>{{ $jenis->ket }}</td>
	        <td>
                <form action="{{ route('jenis.destroy', $jenis->id) }}" method="POST">
                    {{-- <a class="btn btn-info" href="{{ route('jenis.show', $jenis->id) }}">Show</a> --}}
                    <a class="btn btn-primary" href="{{ route('jenis.edit', $jenis->id) }}">Edit</a>
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Anda yakin ingin menghapus data ini?')"
                    class="btn btn-danger">Hapus
                </button>
            </form>
	        </td>
	    </tr>
	    @endforeach
    </table>
    {{-- {!! $jenis->links() !!} --}}
    {{ $jeniss->links('vendor.pagination.bootstrap-4') }}
@endsection