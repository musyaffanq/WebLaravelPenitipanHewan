@extends('layouts.app')

@section('content')
<div class="container">
  <h1 class="my-2">Edit Data Siswa</h1>

      <form action="/layouts/{{$pemilik->id}}" method="POST" class="my-4" enctype="multipart/form-data">
      @method('patch')
      @csrf
      <input type="hidden" id="id" name="id" value="{{ $pemilik->id }}">
        <div class="form-group row">
          <label for="nama_pemilik" class="col-sm-2 col-form-label">Nama Lengkap</label>
          <div class="col-sm-5">
            <input type="text"
              class="form-control @error('nama_pemilik') is-invalid @enderror"
              id="nama_pemilik"
              name="nama_pemilik"
              autofocus
              value="{{$pemilik->nama_pemilik}}"
            >
          @error('nama_pemilik')
            <div class="alert alert-danger mt-2">{{ $message }}</div>
          @enderror
          </div>
        </div>

        <div class="form-group row">
          <label for="telepon" class="col-sm-2 col-form-label">Nomor Telepon</label>
          <div class="col-sm-4">
            <input type="number"
            class="form-control @error('nomor_telepon') is-invalid @enderror"
            id="nomor_telepon"
            name="nomor_telepon"
            value="{{$pemilik->nomor_telepon}}"
          >
          @error('nomor_telepon')
            <div class="alert alert-danger mt-2">{{ $message }}</div>
          @enderror
          </div>
        </div>

        <div class="form-group row">
          <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
          <div class="col-sm-5">
            <input type="text"
              class="form-control @error('alamat') is-invalid @enderror"
              id="alamat"
              name="alamat"
              value="{{$pemilik->alamat}}"
            >
          @error('alamat')
            <div class="alert alert-danger mt-2">{{ $message }}</div>
          @enderror
          </div>
        </div>

        <div class="form-group row">
          <label for="batas_waktu_titip" class="col-sm-2 col-form-label">Batas Waktu Titip</label>
          <div class="col-sm-4">
            <input type="date"
            class="form-control @error('batas_waktu_titip') is-invalid @enderror"
            id="batas_waktu_titip"
            name="batas_waktu_titip"
            value="{{$pemilik->batas_waktu_titip }}"
          >
          @error('batas_waktu_titip')
            <div class="alert alert-danger mt-2">{{ $message }}</div>
          @enderror
          </div>
        </div>

        <div class="form-group row">
          <label for="nama_hewan" class="col-sm-2 col-form-label">Nama Hewan</label>
          <div class="col-sm-5">
          @foreach($pemilik->hewan as $penitip)
            <input type="text"
              class="form-control @error('nama_hewan') is-invalid @enderror"
              id="nama_hewan"
              name="nama_hewan"
              value="{{ $penitip->pivot->nama_hewan }}"
            >
            @endforeach
          @error('nama_hewan')
            <div class="alert alert-danger mt-2">{{ $message }}</div>
          @enderror
          </div>
        </div>

        <!-- Input Jenis Hewan -->
        <div class="form-group row">
        <label for="jenis_hewan" class="col-sm-2 col-form-label">Hewan: </label>
        <div class="col-sm-5">
        @if (count($list_hewan) > 0 )
        <select class="form-control @error('jenis_hewan') is-invalid @enderror" name="hewan_pemilik[0]">
            <option value="" selected disabled>Pilih Jenis Hewan</option>
            @foreach($list_hewan as $id=>$jenis_hewan)
                <option value="{{ $id }}" {{ $penitip->id == $id ? 'selected' : '' }}> {{ $jenis_hewan }}</option>
            @endforeach
        </select>
        @else
            <p>Tidak ada pilihan hewan, buat dulu ya...</p>
        @endif

        @error('jenis_hewan')
            <div class="alert alert-danger mt-2">{{ $message }}</div>
        @enderror
        </div>
        </div>

        <div class="form-group">
        <label for="jenis kelamin" class="control-label">Jenis kelamin hewan:</label>
        <div class="radio">
        <label><input name="jenis_kelamin" type="radio" class="form-check-input @error('jenis_kelamin') is-invalid @enderror"
            value="Jantan"  id="jenis_kelamin" {{ $penitip->pivot->jenis_kelamin == 'Jantan' ? 'checked' : '' }} >  Jantan</label>
                </div>
        <div class="radio">
        <label><input name="jenis_kelamin" type="radio" class="form-check-input @error('jenis_kelamin') is-invalid @enderror"
                value="Betina" id="jenis_kelamin" {{ $penitip->pivot->jenis_kelamin == 'Betina' ? 'checked' : '' }} >Betina</label>
                </div>
        </div>
        @error('jenis_kelamin')
            <div class="alert alert-danger mt-2">{{ $message }}</div>
        @enderror

        <!-- Input Foto -->
        <div class="form-group">
        <label for="foto" class="control-label">Foto: </label>
          <div class="col-sm-5">
          <input class="form-control @error('foto') is-invalid @enderror"
          name="foto" id="foto" type="file" class="form-control" value="{{old('foto')}}">
          @error('foto')
            <div class="alert alert-danger mt-2">{{ $message }}</div>
          @enderror

          <!-- MENAMPILKAN FOTO -->
          @if (isset($penitip->pivot->foto))
              <img src="{{ asset('fotoupload/' . $penitip->pivot->foto) }}">
          @else
            <?="-" ?>
          @endif
          </div>
        </div>

        <div class="form-group">
          <button type="submit" class="btn btn-primary mt-2 mr-2">Submit</button>
          <a href="{{ url()->previous() }}" class="btn btn-outline-primary mt-2">Kembali</a>
        </div>
      </form>
</div>
@endsection