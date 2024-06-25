@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Tambah No Seri</h2>
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

    <form action="{{ route('seris.store') }}" method="POST">
    	@csrf
         <div class="row">
		    <div class="col-md-12">
		        <div class="form-group">
		            <strong>No Seri:</strong>
		            <input type="text" name="no_seri" class="form-control" placeholder="No Seri">
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Tambah</button>
                <a class="btn btn-primary" href="{{ route('seris.index') }}"> Kembali</a>
		    </div>
		</div>
    </form>
@endsection