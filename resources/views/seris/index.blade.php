@extends('layouts.app')

@section('content')
@include('layouts.alert')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Data Seri</h2>
            </div>
            <div class="pull-right">
                    <a class="btn btn-success" href="{{ route('seris.create') }}"> Tambah No Seri</a>
            </div>
        </div>
    </div>

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>No Seri</th>
            <th width="280px">Aksi</th>
        </tr>
        @php
            $no = 1;
            @endphp
	    @foreach ($seris as $seri)
	    <tr>
	        <td>{{ $no++ }}</td>
	        <td>{{ $seri->no_seri }}</td>
	        <td>
                <form action="{{ route('seris.destroy', $seri->id) }}" method="POST">
                    {{-- <a class="btn btn-info" href="{{ route('seris.show', $seri->id) }}">Show</a> --}}
                    <a class="btn btn-primary" href="{{ route('seris.edit', $seri->id) }}">Edit</a>
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
    {{-- {!! $stcks->links() !!} --}}
    {{ $seris->links('vendor.pagination.bootstrap-4') }}
@endsection