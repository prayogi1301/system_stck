@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Tambah Nopol</h2>
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

    <form action="{{ route('nopols.store') }}" method="POST">
    	@csrf
         <div class="row">
		    <div class="col-md-12">
		        <div class="form-group">
		            <strong>Nopol A:</strong>
		            <input type="text" name="nopola" class="form-control" placeholder="Nopol A">
		        </div>
		    </div>
            <div class="col-md-12">
		        <div class="form-group">
		            <strong>Nopol B:</strong>
		            <input type="text" name="nopolb" class="form-control" placeholder="Nopol B">
		        </div>
		    </div>
            <div class="col-md-12">
		        <div class="form-group">
		            <strong>Nopol C:</strong>
		            <input type="text" name="nopolc" class="form-control" placeholder="Nopol C">
		        </div>
		    </div>
            <div class="col-md-12">
		        <div class="form-group">
		            <strong>Nopol:</strong>
		            <input type="text" name="nopol" class="form-control" placeholder="Nopol">
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Tambah</button>
                <a class="btn btn-primary" href="{{ route('nopols.index') }}"> Kembali</a>
		    </div>
		</div>
    </form>
@endsection