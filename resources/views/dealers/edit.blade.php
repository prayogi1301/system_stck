@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Dealer</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('dealers.index') }}"> Back</a>
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

    <form action="{{ route('dealers.update', $dealer->id) }}" method="POST">
    	@csrf
        @method('PUT')
         <div class="row">
		    <div class="col-md-12">
		        <div class="form-group">
		            <strong>Kode Lokasi:</strong>
		            <input type="text" name="kode_lokasi" value="{{ $dealer->kode_lokasi }}" class="form-control">
		        </div>
		    </div>
            <div class="col-md-12">
		        <div class="form-group">
		            <strong>Kode Dealer:</strong>
		            <input type="text" name="kode_dealer" value="{{ $dealer->kode_dealer }}" class="form-control">
		        </div>
		    </div>
            <div class="col-md-12">
		        <div class="form-group">
		            <strong>Penanggung Jawab:</strong>
		            <input type="text" name="nama_pj" value="{{ $dealer->nama_pj }}" class="form-control">
		        </div>
		    </div>
            <div class="col-md-12">
		        <div class="form-group">
		            <strong>Nama Dealer:</strong>
		            <input type="text" name="nama_dealer" value="{{ $dealer->nama_dealer }}" class="form-control">
		        </div>
		    </div>
		    <div class="col-md-12">
		        <div class="form-group">
		            <strong>Alamat:</strong>
		            <textarea class="form-control" style="height:150px" name="alamat" placeholder="Alamat">{{ $dealer->alamat }}</textarea>
		        </div>
		    </div>
		    <div class="col-md-12 text-center">
		      <button type="submit" class="btn btn-primary">Update</button>
              <a class="btn btn-primary" href="{{ route('dealers.index') }}"> Kembali</a>
		    </div>
		</div>


    </form>
@endsection