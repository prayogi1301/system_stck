@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Tambah Data Jenis Kendaraan</h2>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('jenis.store') }}" method="POST">
    	@csrf
         <div class="row">
		    <div class="col-md-12">
		        <div class="form-group">
		            <strong>Nama Jenis:</strong>
		            <input type="text" name="najen" class="form-control" placeholder="Nama Jenis">
		        </div>
		    </div>
            <div class="col-md-12">
		        <div class="form-group">
		            <strong>Golongan Kendaraan:</strong>
		            <input type="text" name="golkend" class="form-control" placeholder="Golongan Kendaraan">
		        </div>
		    </div>
            <div class="col-md-12">
		        <div class="form-group">
		            <strong>NAPKB:</strong>
		            <input type="text" name="napkb" class="form-control" placeholder="NAPKB">
		        </div>
		    </div>
		    <div class="col-md-12">
		        <div class="form-group">
		            <strong>Keterangan:</strong>
		            <textarea class="form-control" style="height:150px" name="ket" placeholder="Keterangan"></textarea>
		        </div>
		    </div>
		    <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Tambah</button>
                <a class="btn btn-primary" href="{{ route('jenis.index') }}"> Kembali</a>
		    </div>
		</div>
    </form>
@endsection