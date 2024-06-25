@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Tipe Kendaraan</h2>
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

    <form action="{{ route('tipes.update', $tipe->id) }}" method="POST">
    	@csrf
        @method('PUT')
         <div class="row">
			 <div class="col-md-6">
		        <div class="form-group">
		            <strong>Nopol:</strong>
		            <input type="text" name="nopol" value="{{ $tipe->nopol }}" class="form-control">
		        </div>
		    </div>
			<div class="col-md-6">
		        <div class="form-group">
		            <strong>Nama Merk:</strong>
		            {{-- <input type="text" name="merk" value="{{ $tipe->merk }}" class="form-control"> --}}
					<select name="merk" id="" class="form-control">
						<option value="{{ $tipe->merk ?? old('merk') }}">{{ $tipe->merk }}</option>
						<option value="Honda">Honda</option>
						<option value="Yamaha">Yamaha</option>
						<option value="Suzuki">Suzuki</option>
						<option value="Kawasaki">Kawasaki</option>
					</select>
		        </div>
		    </div>
		    <div class="col-md-6">
		        <div class="form-group">
		            <strong>Nama Tipe:</strong>
		            <input type="text" name="nama_tipe" value="{{ $tipe->nama_tipe }}" class="form-control">
		        </div>
		    </div>
            <div class="col-md-6">
		        <div class="form-group">
		            <strong>Jenis:</strong>
		            {{-- <input type="text" name="jenis" value="{{ $tipe->jenis }}" class="form-control"> --}}
					<select name="jenis" id="" class="form-control">
						{{-- <option value="">--Pilih Jenis--</option> --}}
						<option value="{{ $tipe->jenis ?? old('jenis') }}">{{ $tipe->jenis }}</option>
						<option value="Mobil Penumpang">Mobil Penumpang</option>
						<option value="Mobil Barang">Mobil Barang</option>
						<option value="Sepeda Motor">Sepeda Motor</option>
					</select>
		        </div>
		    </div>
            <div class="col-md-6">
		        <div class="form-group">
		            <strong>Model:</strong>
		            <input type="text" name="model" value="{{ $tipe->model }}" class="form-control">
		        </div>
		    </div>
            <div class="col-md-6">
		        <div class="form-group">
		            <strong>Tahun:</strong>
		            {{-- <input type="text" name="tahun_buat" value="{{ $tipe->tahun_buat }}" class="form-control"> --}}
					<select name="tahun_buat" id="" class="form-control">
					<option value="{{ $tipe->tahun_buat ?? old('tahun_buat') }}">{{ $tipe->tahun_buat }}</option>
					<option value="2020">2020</option>
					<option value="2021">2021</option>
					</select>
		        </div>
		    </div>
            <div class="col-md-6">
		        <div class="form-group">
		            <strong>Besar cc:</strong>
		            {{-- <input type="text" name="besar_cc" value="{{ $tipe->besar_cc }}" class="form-control"> --}}
					<select name="besar_cc" id="" class="form-control">
						<option value="{{ $tipe->besar_cc }}">{{ $tipe->besar_cc }}</option>
						<option value="100">100</option>
						<option value="110">110</option>
						<option value="125">125</option>
						<option value="150">150</option>
						<option value="155">155</option>
						<option value="200">200</option>
						<option value="250">250</option>
						<option value="< 1000">< 1000</option>
						<option value="1000">1000</option>
						<option value="1300">1300</option>
						<option value="1500">1500</option>
						<option value="1800">1800</option>
						<option value="2000">2000</option>
						<option value="2300">2300</option>
						<option value="2500">2500</option>
						<option value="3000">3000</option>
						<option value="3500">3500</option>
						<option value="4000">4000</option>
						<option value="> 4000">> 4000</option>
					</select>
		        </div>
		    </div>
            <div class="col-md-6">
		        <div class="form-group">
		            <strong>No Rangka:</strong>
		            <input type="text" name="no_rangka" value="{{ $tipe->no_rangka }}" class="form-control">
		        </div>
		    </div>
            <div class="col-md-6">
		        <div class="form-group">
		            <strong>No Mesin:</strong>
		            <input type="text" name="no_mesin" value="{{ $tipe->no_mesin }}" class="form-control">
		        </div>
		    </div>
            <div class="col-md-6">
		        <div class="form-group">
		            <strong>Warna:</strong>
		            <input type="text" name="warna" value="{{ $tipe->warna }}" class="form-control">
		        </div>
		    </div>
            <div class="col-md-6">
		        <div class="form-group">
		            <strong>Bahan Bakar:</strong>
		            {{-- <input type="text" name="bahan_bakar" value="{{ $tipe->bahan_bakar }}" class="form-control"> --}}
					<select name="bahan_bakar" id="" class="form-control">
						<option value="{{ $tipe->bahan_bakar }}">{{ $tipe->bahan_bakar }}</option>
						<option value="Bensin">Bensin</option>
						<option value="Solar">Solar</option>
						<option value="Campur">Campur</option>
						<option value="Listrik">Listrik</option>
					</select>
		        </div>
		    </div>
			<div class="col-md-6">
		        <div class="form-group">
		            <strong>Nama Dealer:</strong>
		            <input type="text" name="pemohon" value="{{ $tipe->pemohon }}" class="form-control">
		        </div>
		    </div>
		    <div class="col-md-12 text-center">
		      <button type="submit" class="btn btn-primary">Update</button>
              <a class="btn btn-primary" href="{{ route('tipes.index') }}"> Kembali</a>
		    </div>
		</div>
    </form>
@endsection