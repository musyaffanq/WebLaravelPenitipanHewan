@extends('layouts.app')
@section('content')
<div class="container">
<div id="pemilik">
    <h2>Detail Data Pemilik</h2>
    <table class="table table-striped">
    <tr>
        <th>Nama</th>
        <td>{{ $pemilik->nama_pemilik}}</td>
    </tr>
    <tr>
        <th>Telepon</th>
        <td>{{ $pemilik->nomor_telepon}}</td>
    </tr>
    <tr>
        <th>Alamat</th>
        <td>{{ $pemilik->alamat}}</td>
    </tr>
    <tr>
        <th>Batas Waktu Titip</th>
        <td>{{ $pemilik->batas_waktu_titip }}</td>
    </tr>
    <tr>
        <th>Jenis Hewan</th>
        <td>
            @foreach($pemilik->hewan as $item)
            <span>{{ $item->jenis_hewan }}</span>
            @endforeach
        </td>
    </tr>
    <tr>
        <th>Nama Hewan</th>
        <td>
        @foreach($pemilik->hewan as $penitip)
            <span>{{ $penitip->pivot->nama_hewan }}</span>
        @endforeach
        </td>
    </tr>
    <tr>
        <th>Jenis Kelamin</th>
        <td>
        @foreach($pemilik->hewan as $penitip)
            <span>{{ $penitip->pivot->jenis_kelamin }}</span>
        @endforeach
        </td>
    </tr>
    <tr>
        <th>Foto</th>
        @if (isset($pemilik->hewan))
        @foreach($pemilik->hewan as $hewanpemilik)
        <td>
        <table>
        
        <tr><th style="text-align:center;">{{ $hewanpemilik->pivot->nama_hewan }}</th></tr>
        <tr>
        <td>
        
            <img src="{{ asset('fotoupload/' . $hewanpemilik->pivot->foto) }}">
        
        </td>
        </tr>
        </table>
        </td>
        @endforeach
        @else
        <td>-</td>
        @endif
    </tr>
    </table>
    <a href="{{ url()->previous() }}" class="btn btn-outline-primary mt-2">Kembali</a>
</div>
</div>
@stop