@extends('layouts.app')

@section ('content')
<div class="container">
    <div id="pemilik">
        <h2>Tambah Penitip</h2>
        
        <form action="{{ url ('layouts') }}" method="POST" enctype="multipart/form-data">
        @csrf

<!-- Nama -->
    <div class="form-group">
        <label for="nama_pemilik" class="control-label">Nama</label>
<input class="form-control @error('nama_pemilik') is-invalid @enderror"
name="nama_pemilik" id="nama_pemilik" type="text" class="form-control" value="{{old('nama_pemilik')}}">
@error('nama_pemilik')
    <div class="alert alert-danger mt-2">{{ $message }}</div>
@enderror
    </div>

<!-- Input Telepon -->
<div class="form-group">
    <label for="nomor_telepon" class="control-label">Telepon</label>
    <input class="form-control @error('nomor_telepon') is-invalid @enderror"
    name="nomor_telepon" id="nomor_telepon" type="number" class="form-control" value="{{old('nomor_telepon')}}">
    @error('nomor_telepon')
        <div class="alert alert-danger mt-2">{{ $message }}</div>
    @enderror
</div>

<!-- Alamat -->
<div class="form-group">
        <label for="alamat" class="control-label">Alamat</label>
<input class="form-control @error('alamat') is-invalid @enderror"
name="alamat" id="alamat" type="text" class="form-control" value="{{old('alamat')}}">
@error('alamat')
    <div class="alert alert-danger mt-2">{{ $message }}</div>
@enderror
    </div>

    <!-- Lama Waktu Penitipan -->
    <div class="form-group">
        <label for="waktu_titip" class="control-label">Lama Waktu Penitipan</label>
<input class="form-control @error('batas_waktu_titip') is-invalid @enderror"
type="number" name="batas_waktu_titip" id="batas_waktu_titip" class="form-control" value="{{old('batas_waktu_titip')}}">
@error('batas_waktu_titip')
    <div class="alert alert-danger mt-2">{{ $message }}</div>
@enderror
    </div>

<!-- Nama Hewan -->
    <div class="form-group">
        <label for="nama_hewan" class="control-label">Nama Hewan</label>
<input class="form-control @error('nama_hewan') is-invalid @enderror"
name="nama_hewan" id="nama_hewan" type="text" class="form-control" value="{{old('nama_hewan')}}">
@error('nama_hewan')
    <div class="alert alert-danger mt-2">{{ $message }}</div>
@enderror
    </div>

<!-- Input Jenis Hewan -->
<div class="form-group">
<label for="jenis_hewan" class="control-label">Hewan: </label>
@if (count($list_hewan) > 0 )
<select class="form-control @error('jenis_hewan') is-invalid @enderror" name="hewan_pemilik[0]">
    <option value="" selected disabled>Pilih Jenis Hewan</option>
    @foreach($list_hewan as $id=>$jenis_hewan)
        <option value="{{ $id }}" {{ old('jenis_hewan') == $jenis_hewan ? 'selected' : '' }} >{{ $jenis_hewan }}</option>
    @endforeach
</select>
@else
    <p>Tidak ada pilihan hewan, buat dulu ya...</p>
@endif

@error('jenis_hewan')
    <div class="alert alert-danger mt-2">{{ $message }}</div>
@enderror
</div>

    <div class="form-group">
        <label for="jenis kelamin" class="control-label">Jenis kelamin hewan:</label>
        <div class="radio">
        <label><input name="jenis_kelamin" type="radio" class="form-check-input @error('jenis_kelamin') is-invalid @enderror"
            value="Jantan"  id="jenis_kelamin" {{ old('jenis_kelamin') == 'Jantan' ? 'checked' : '' }}>Jantan</label>
                </div>
        <div class="radio">
        <label><input name="jenis_kelamin" type="radio" class="form-check-input @error('jenis_kelamin') is-invalid @enderror"
                value="Betina" id="jenis_kelamin" {{ old('jenis_kelamin') == 'Betina' ? 'checked' : '' }}>Betina</label>
                </div>
    </div>
@error('jenis_kelamin')
    <div class="alert alert-danger mt-2">{{ $message }}</div>
@enderror

<!-- Input Foto -->
<div class="form-group">
    <label for="foto" class="control-label">Foto Hewan: </label>
    <input class="form-control @error('foto') is-invalid @enderror"
    name="foto" id="foto" type="file" class="form-control" value="{{old('foto')}}">
    @error('foto')
        <div class="alert alert-danger mt-2">{{ $message }}</div>
    @enderror
</div>

    <div class="form-group">
    <input class="btn btn-primary form-control" type="submit" value="Simpan">
    </div>
        </form>
    </div>
</div>
@stop
