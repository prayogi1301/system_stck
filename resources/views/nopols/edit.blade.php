@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Nopol</h2>
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

    <form action="{{ route('nopols.update', $nopol->id) }}" method="POST">
    	@csrf
        @method('PUT')
         <div class="row">
		    <div class="col-md-12">
		        <div class="form-group">
		            <strong>Nopol A:</strong>
		            <input type="text" name="nopola" value="{{ $nopol->nopola }}" class="form-control">
		        </div>
		    </div>
            <div class="col-md-12">
		        <div class="form-group">
		            <strong>Nopol B:</strong>
		            <input type="text" name="nopolb" value="{{ $nopol->nopolb }}" class="form-control">
		        </div>
		    </div>
            <div class="col-md-12">
		        <div class="form-group">
		            <strong>Nopol C:</strong>
		            <input type="text" name="nopolc" value="{{ $nopol->nopolc }}" class="form-control">
		        </div>
		    </div>
            <div class="col-md-12">
		        <div class="form-group">
		            <strong>Nopol:</strong>
		            <input type="text" name="nopol" value="{{ $nopol->nopol }}" class="form-control">
		        </div>
		    </div>
		    <div class="col-md-12 text-center">
		      <button type="submit" class="btn btn-primary">Update</button>
              <a class="btn btn-primary" href="{{ route('nopols.index') }}"> Kembali</a>
		    </div>
		</div>
    </form>
@endsection