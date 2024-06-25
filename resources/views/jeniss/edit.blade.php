@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Jenis</h2>
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

    <form action="{{ route('jenis.update', $jenis->id) }}" method="POST">
    	@csrf
        @method('PUT')
         <div class="row">
		    <div class="col-md-12">
		        <div class="form-group">
		            <strong>Nama Jenis:</strong>
		            <input type="text" name="najen" value="{{ $jenis->najen }}" class="form-control">
		        </div>
		    </div>
            <div class="col-md-12">
		        <div class="form-group">
		            <strong>Golongan Kendaraan:</strong>
		            <input type="text" name="golkend" value="{{ $jenis->golkend }}" class="form-control">
		        </div>
		    </div>
            <div class="col-md-12">
		        <div class="form-group">
		            <strong>NAPKB:</strong>
		            <input type="text" name="napkb" value="{{ $jenis->napkb }}" class="form-control">
		        </div>
		    </div>
		    <div class="col-md-12">
		        <div class="form-group">
		            <strong>Keterangan:</strong>
		            <textarea class="form-control" style="height:150px" name="ket">{{ $jenis->ket }}</textarea>
		        </div>
		    </div>
		    <div class="col-md-12 text-center">
		      <button type="submit" class="btn btn-primary">Update</button>
              <a class="btn btn-primary" href="{{ route('jenis.index') }}"> Kembali</a>
		    </div>
		</div>
    </form>
@endsection