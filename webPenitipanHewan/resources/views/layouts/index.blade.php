@extends('layouts.app')

@section('content')
<div class="container">
<div id="siswa">
    <h2>Penitip Hewan</h2>
    @if(!empty($penitip_list))
    <table class="table" style="">
        <thead>
        <tr>
            <th>Nama</th>
            <th>Telepon</th>
            <th>Waktu Titip</th>
            <th>alamat</th>
            <th colspan="3" > <span style="margin-left: 100px"> Action</span> </th>
        </tr>
        </thead>
        <tbody>
        @foreach($penitip_list as $pemilik)
        <tr>
            <td>{{ $pemilik->nama_pemilik }} </td>
            <td>{{ $pemilik->nomor_telepon }} </td>
            <td>{{ $pemilik->batas_waktu_titip }}</td>
            <td>{{ $pemilik->alamat }} </td>
            <td><a href=" {{ url('layouts/' . $pemilik->id) }}" class='btn btn-success btn-sm'>Detail</a></td>
            <td><a href=" {{ url('layouts/' . $pemilik->id . '/edit') }}" class='btn btn-success btn-sm'>Edit</a></td>
            <td><form action="/layouts/{{$pemilik->id}}" method="POST" class="d-inline-block">
                @method('delete')
                @csrf
                <button type="submit" class="btn btn-danger mx-2">Hapus Data</button>
                </form></td>
        </tr>
        @endforeach
        </tbody>
    </table>
    @else
        <p>Tidak ada data penitip.</p>
    @endif

    <div class="table-nav">
    <div class="jumlah-data">
        <strong> Jumlah Penitip: {{ $jumlah_penitip }} </strong>
    </div>
    <div class="paging">
        {{ $penitip_list->links() }}
    </div>
    </div>

    <div class="tombol-nav">
    <div>
        <a href="layouts/create" class="btn btn-primary">
        Tambah Penitip</a>
    </div>
    </div>
</div>
</div>
@stop

@section('footer')
    @include('footer')
@stop