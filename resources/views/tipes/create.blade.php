@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Tambah Tipe</h2>
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

    <form action="{{ route('tipes.store') }}" method="POST">
    	@csrf
         <div class="row">
			 <div class="col-md-6">
		        <div class="form-group">
		            <strong>Nopol:</strong>
		            <input type="text" name="nopol" class="form-control" placeholder="Masukkan Nopol">
                    {{-- <select name="nopol[]" id="" class="form-control">
                        <option>--Pilih Nopol--</option>
                        @foreach ($nopols as $nopol)
                        <option value="{{ $nopol->id }}">{{ $nopol->nopol }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('nopol'))
                        <p class="text-danger">
                            {{ $errors->first('nopol') }}
                        </p>
                    @endif --}}
		        </div>
		    </div>
            <div class="col-md-6">
		        <div class="form-group">
		            <strong>Merk:</strong>
		            {{-- <input type="text" name="merk" class="form-control" placeholder="Masukkan Merk"> --}}
					<select name="merk" id="" class="form-control">
						<option value="">--Pilih Merk--</option>
						<option value="HONDA">HONDA</option>
						<option value="YAMAHA">YAMAHA</option>
						<option value="SUZUKI">SUZUKI</option>
						<option value="KAWASAKI">KAWASAKI</option>
					</select>
		        </div>
		    </div>
		    <div class="col-md-6">
		        <div class="form-group">
		            <strong>Nama Tipe:</strong>
		            <input type="text" name="nama_tipe" class="form-control" placeholder="Nama Tipe">
		        </div>
		    </div>
            <div class="col-md-6">
		        <div class="form-group">
		            <strong>Jenis:</strong>
		            {{-- <input type="text" name="jenis" class="form-control" placeholder="Jenis"> --}}
					<select name="jenis" id="" class="form-control">
						<option value="">--Pilih Jenis--</option>
						<option value="MOBIL PENUMPANG">MOBIL PENUMPANG</option>
						<option value="MOBIL BARANG">MOBIL BARANG</option>
						<option value="SEPEDA MOTOR">SEPEDA MOTOR</option>
					</select>
		        </div>
		    </div>
            <div class="col-md-6">
		        <div class="form-group">
		            <strong>Model:</strong>
		            {{-- <input type="text" name="model" class="form-control" placeholder="Model"> --}}
					<select name="model" id="" class="form-control">
						<option value="">--Pilih Model--</option>
						<option value="SEDAN">SEDAN</option>
						<option value="MINIBUS">MINIBUS</option>
						<option value="PICKUP">PICKUP</option>
						<option value="JEEP">JEEP</option>
						<option value="SOLO">SPD SOLO</option>
						<option value="Spd Roda 3">SPD RODA 3</option>
					</select>
		        </div>
		    </div>
            <div class="col-md-6">
		        <div class="form-group">
		            <strong>Tahun:</strong>
		            {{-- <input type="text" name="tahun_buat" class="form-control" placeholder="Tahun Buat"> --}}
					<select name="tahun_buat" id="" class="form-control">
						<option value="">--Pilih Tahun--</option>
						<option value="2020">2020</option>
						<option value="2021">2021</option>
					</select>
		        </div>
		    </div>
            <div class="col-md-6">
		        <div class="form-group">
		            <strong>Besar cc:</strong>
		            {{-- <input type="text" name="besar_cc" class="form-control" placeholder="besar cc"> --}}
					<select name="besar_cc" id="" class="form-control">
						<option value="">--Pilih CC--</option>
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
		            <input type="text" name="no_rangka" class="form-control" placeholder="Nomor Rangka">
		        </div>
		    </div>
            <div class="col-md-6">
		        <div class="form-group">
		            <strong>No Mesin:</strong>
		            <input type="text" name="no_mesin" class="form-control" placeholder="Nomor Mesin">
		        </div>
		    </div>
            <div class="col-md-6">
		        <div class="form-group">
		            <strong>Warna:</strong>
		            <input type="text" name="warna" class="form-control" placeholder="Warna">
		        </div>
		    </div>
            <div class="col-md-6">
		        <div class="form-group">
		            <strong>Bahan Bakar:</strong>
		            {{-- <input type="text" name="bahan_bakar" class="form-control" placeholder="Bahan Bakar"> --}}
					<select name="bahan_bakar" id="" class="form-control">
						<option value="">--Pilih Bahan Bakar--</option>
						<option value="Bensin">Bensin</option>
						<option value="Solar">Solar</option>
						<option value="Campur">Campur</option>
						<option value="Listrik">Listrik</option>
					</select>
		        </div>
		    </div>
			<div class="col-md-6">
		        <div class="form-group">
		            <strong>Kepentingan:</strong>
		            <input type="text" name="kepentingan" class="form-control" placeholder="Kepentingan">
		        </div>
		    </div>
			<div class="col-md-6">
		        <div class="form-group">
		            <strong>Pemohon:</strong>
		            <input type="text" name="pemohon" class="form-control" placeholder="Masukkan Nama Dealer">
					{{-- <select name="dealer[]" id="" class="form-control">
                        <option>--Pilih Nama Dealer--</option>
                        @foreach ($dealers as $dealer)
                        <option value="{{ $dealer->id }}">{{ $dealer->pemohon }} - {{ $dealer->nama_dealer }}
                        </option>
                        @endforeach
                    </select> --}}
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Tambah</button>
                <a class="btn btn-primary" href="{{ route('tipes.index') }}"> Kembali</a>
		    </div>
		</div>
    </form>
@endsection