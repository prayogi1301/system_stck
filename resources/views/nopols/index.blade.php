@extends('layouts.app')

@section('content')
@include('layouts.alert')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Data Nopol</h2>
            </div>
            <div class="pull-right">
                    <a class="btn btn-success" href="{{ route('nopols.create') }}"> Tambah Nopol</a>
            </div>
        </div>
    </div>

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Nopol A</th>
            <th>Nopol B</th>
            <th>Nopol C</th>
            <th>Nopol</th>
            <th width="280px">Aksi</th>
        </tr>
        @php
            $no = 1;
            @endphp
	    @foreach ($nopols as $nopol)
	    <tr>
	        <td>{{ $no++ }}</td>
	        <td>{{ $nopol->nopola }}</td>
            <td>{{ $nopol->nopolb }}</td>
            <td>{{ $nopol->nopolc }}</td>
            <td>{{ $nopol->nopol }}</td>
	        <td>
                <form action="{{ route('nopols.destroy', $nopol->id) }}" method="POST">
                    {{-- <a class="btn btn-info" href="{{ route('nopols.show', $nopol->id) }}">Show</a> --}}
                    <a class="btn btn-primary" href="{{ route('nopols.edit', $nopol->id) }}">Edit</a>
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
    {{-- {!! $nopols->links() !!} --}}
    {{ $nopols->links('vendor.pagination.bootstrap-4') }}
@endsection