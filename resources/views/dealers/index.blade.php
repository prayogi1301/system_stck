@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Data Dealer</h2>
            </div>
            <div class="pull-right">
                @can('dealer-create')
                    <a class="btn btn-success" href="{{ route('dealers.create') }}"> Tambah Dealer</a>
                @endcan
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Kode Lokasi</th>
            <th>Kode Dealer</th>
            <th>Nama Dealer</th>
            <th>Penanggung Jawab</th>
            <th>Alamat</th>
            <th width="280px">Aksi</th>
        </tr>
        @php
            $no = 1;
            @endphp
	    @foreach ($dealers as $dealer)
	    <tr>
	        <td>{{ $no++ }}</td>
	        <td>{{ $dealer->kode_lokasi }}</td>
	        <td>{{ $dealer->kode_dealer }}</td>
            <td>{{ $dealer->nama_dealer }}</td>
            <td>{{ $dealer->nama_pj }}</td>
            <td>{{ $dealer->alamat }}</td>
	        <td>
                <form action="{{ route('dealers.destroy', $dealer->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('dealers.show', $dealer->id) }}">Show</a>
                    @can('dealer-edit')
                    <a class="btn btn-primary" href="{{ route('dealers.edit', $dealer->id) }}">Edit</a>
                    @endcan
                @csrf
                @method('DELETE')
                @can('dealer-delete')
                <button type="submit" onclick="return confirm('Anda yakin ingin menghapus data ini?')"
                    class="btn btn-danger">Hapus
                </button>
                @endcan
            </form>
	        </td>
	    </tr>
	    @endforeach
    </table>
    {{-- {!! $dealers->links() !!} --}}
    {{ $dealers->links('vendor.pagination.bootstrap-4') }}
@endsection