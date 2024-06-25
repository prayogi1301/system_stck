 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Cetak PDF</title>
 </head>

 <body><br><br>
    @foreach($tipes as $tipe)
    <div style="margin-left: 165px">
        {{ $tipe->nopol }}   
    </div><br>
    <div style="margin-left: 85px">
        {{ $tipe->merk }}                
    </div>
    <div style="margin-left: 85px">
        {{ $tipe->nama_tipe }}                
    </div>
    <div style="margin-left: 85px">
        {{ $tipe->jenis }}                
    </div>
    <div style="margin-left: 85px">
        {{ $tipe->model }}  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $tipe->kepentingan }}              
    </div>
    <div style="margin-left: 85px">
        {{ $tipe->besar_cc }} CC / {{ $tipe->tahun_buat }}
    </div>
    <div style="margin-left: 85px">
        {{ $tipe->no_rangka }}                
    </div>
    <div style="margin-left: 85px">
        {{ $tipe->no_mesin }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ $tipe->pemohon }}              
    </div>
    <div style="margin-left: 85px">
        {{ $tipe->bahan_bakar }}              
    </div>
    <div style="margin-left: 85px">
        {{ $tipe->warna }}       
    </div>
    <!-- <div style="margin-right: 90px" align="right">
        {{ $tipe->pemohon }}-
    </div> -->
    <div style="margin-left: 330px">
    {{ date('d/m/Y', strtotime($tipe->tgl_daftar)) }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ date('d/m/Y', strtotime($tipe->tgl_mslaku)) }}
    </div>
    @endforeach
 </body>

 </html>
