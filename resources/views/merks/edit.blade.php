@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Merk</h2>
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

    <form action="{{ route('merks.update', $merk->id) }}" method="POST">
    	@csrf
        @method('PUT')
         <div class="row">
		    <div class="col-md-12">
		        <div class="form-group">
		            <strong>Nama Merk:</strong>
		            <input type="text" name="nama_merk" value="{{ $merk->nama_merk }}" class="form-control">
		        </div>
		    </div>
		    <div class="col-md-12 text-center">
		      <button type="submit" class="btn btn-info">Update</button>
              <a class="btn btn-primary" href="{{ route('merks.index') }}"> Kembali</a>
		    </div>
		</div>
    </form>
@endsection