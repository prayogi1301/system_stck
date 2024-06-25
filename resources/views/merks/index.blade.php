@extends('layouts.app')

@section('content')
@include('layouts.alert')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Data Merk</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('merks.create') }}"> Tambah Merk</a>
        </div>
    </div>
</div>

<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Nama Merk</th>
        <th width="280px">Aksi</th>
    </tr>
    @php
    $no = 1;
    @endphp
    @foreach ($merks as $merk)
    <tr>
        <td>{{ $no++ }}</td>
        <td>{{ $merk->nama_merk }}</td>
        <td>
            <form action="{{ route('merks.destroy', $merk->id) }}" method="POST">
                <a class="btn btn-info" href="{{ route('merks.show', $merk->id) }}">Show</a>
                <a class="btn btn-primary" href="{{ route('merks.edit', $merk->id) }}">Edit</a>
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
{{-- {!! $merks->links() !!} --}}
{{ $merks->links('vendor.pagination.bootstrap-4') }}
@endsection
