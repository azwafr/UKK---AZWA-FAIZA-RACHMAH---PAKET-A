@extends('layouts.master')

@section('title')
    Home Pengaduan
@endsection

@section('content')
@if (Auth::user()->role == 'masyarakat')
<form action="{{ route('pengaduan.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="card">
                <div class="card-header border-bottom p-1">
                    <div class="head-label">
                        <h4 class="mb-0">Tambah Pengaduan</h4>
                    </div>
                </div>
                <div class="card-body pt-2">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Isi Laporan</strong>
                                <textarea name="isi_laporan" id="isi_laporan" rows="8" placeholder="Isi Laporan Anda" aria-valuemax="{{ old('description') }}" class="form-control" required></textarea>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <strong>Tanggal Pengaduan</strong>
                                <input type="date" name="tgl_pengaduan" class="form-control" placeholder="Tanggal Pengaduan" required>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <strong>Foto</strong>
                                <input type="file" name="foto" class="form-control" placeholder="Tanggal Pengaduan" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" name="status" class="form-control" value="pending" hidden>
                        </div>
                    </div><br>
                    <button class="btn btn-primary data-submit mr-1">Submit</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endif

<div class="card">
    <div class="card-header border-bottom p-1">
        <div class="head-label">
            <h4 class="mb-0">Data Pengaduan</h4>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered zero-configuration">
            <thead>
                <tr>
                    <th class="text-center">Foto</th>
                    <th class="text-center">Nama</th>
                    <th width='100px' class="text-center">Tanggal Pengaduan</th>
                    <th class="text-center">Status</th>
                    <th width='150px' class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pengaduans as $pengaduan)
                <tr>
                    <td width='50px' class="text-center"><img src="{{ asset('/uploads/'. $pengaduan->foto) }}"
                        width="100px" alt="foto"></td>
                    <td class="text-center">{{ $pengaduan->users ? $pengaduan->users->name : '' }}</td>
                    <td width='400px' class="text-center">{{ $pengaduan->created_at->format('l, d F Y H:i:s') }}</td>
                    <td class="text-center">
                        @if ($pengaduan->status == 'pending')
                        <span class="badge badge-sm bg-gradient-secondary">Pending</span>
                        @elseif($pengaduan->status == 'terverifikasi')
                        <span class="badge badge-sm bg-gradient-success">Terverifikasi</span>
                        @elseif($pengaduan->status == 'proses')
                        <span class="badge badge-sm bg-gradient-primary">Proses</span>
                        @elseif($pengaduan->status == 'selesai')
                        <span class="badge badge-sm bg-gradient-success">Selesai</span>
                        @endif
                    </td>
                    <td class="text-center">
                        @if (Auth::user()->role == 'admin')
                        <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                            action="{{ route('pengaduan.destroy', $pengaduan->id) }}" method="POST">
                            <a href="{{ route('pengaduan.show', $pengaduan->id) }}" class="btn btn-warning btn-sm"
                                title="show"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                    <path
                                        d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                    <path
                                        d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                </svg></a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" title="delete">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-trash" viewBox="0 0 16 16">
                                    <path
                                        d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                    <path fill-rule="evenodd"
                                        d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                </svg>
                            </button>
                        </form>
                        @elseif(Auth::user()->role == 'petugas')
                        <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                            action="{{ route('pengaduan.destroy', $pengaduan->id) }}" method="POST">
                            <a href="{{ route('pengaduan.show', $pengaduan->id) }}" class="btn btn-warning btn-sm"
                                title="show"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                    <path
                                        d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                    <path
                                        d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                </svg></a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" title="delete">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-trash" viewBox="0 0 16 16">
                                    <path
                                        d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                    <path fill-rule="evenodd"
                                        d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                </svg>
                            </button>
                        </form>
                        @elseif(Auth::user()->role == 'masyarakat')
                        <a href="{{ route('pengaduan.show', $pengaduan->id) }}" class="btn btn-warning btn-sm"
                            title="show"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                <path
                                    d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                <path
                                    d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                            </svg></a>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

{{ $pengaduans->links() }}
@endsection