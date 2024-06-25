@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit No Seri</h2>
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

    <form action="{{ route('seris.update', $seri->id) }}" method="POST">
    	@csrf
        @method('PUT')
         <div class="row">
		    <div class="col-md-12">
		        <div class="form-group">
		            <strong>No Seri:</strong>
		            <input type="text" name="no_seri" value="{{ $seri->no_seri }}" class="form-control">
		        </div>
		    </div>
		    <div class="col-md-12 text-center">
		      <button type="submit" class="btn btn-primary">Update</button>
              <a class="btn btn-primary" href="{{ route('seris.index') }}"> Kembali</a>
		    </div>
		</div>
    </form>
@endsection