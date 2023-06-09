@extends('layouts.master')

@section('content')
<div class="card">
    <div class="card-header border-bottom p-1">
        <div class="head-label">
            <h4 class="mb-0">Data Laporan</h4>
        </div>
        <div class="dt-action-buttons text-right">
            <div class="dt-buttons">
                <a href="{{ url('laporan/cetak') }}" type="button" class="dt-button export-excel btn btn-danger form-control export-pdf"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-filetype-pdf" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M14 4.5V14a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5L14 4.5ZM1.6 11.85H0v3.999h.791v-1.342h.803c.287 0 .531-.057.732-.173.203-.117.358-.275.463-.474a1.42 1.42 0 0 0 .161-.677c0-.25-.053-.476-.158-.677a1.176 1.176 0 0 0-.46-.477c-.2-.12-.443-.179-.732-.179Zm.545 1.333a.795.795 0 0 1-.085.38.574.574 0 0 1-.238.241.794.794 0 0 1-.375.082H.788V12.48h.66c.218 0 .389.06.512.181.123.122.185.296.185.522Zm1.217-1.333v3.999h1.46c.401 0 .734-.08.998-.237a1.45 1.45 0 0 0 .595-.689c.13-.3.196-.662.196-1.084 0-.42-.065-.778-.196-1.075a1.426 1.426 0 0 0-.589-.68c-.264-.156-.599-.234-1.005-.234H3.362Zm.791.645h.563c.248 0 .45.05.609.152a.89.89 0 0 1 .354.454c.079.201.118.452.118.753a2.3 2.3 0 0 1-.068.592 1.14 1.14 0 0 1-.196.422.8.8 0 0 1-.334.252 1.298 1.298 0 0 1-.483.082h-.563v-2.707Zm3.743 1.763v1.591h-.79V11.85h2.548v.653H7.896v1.117h1.606v.638H7.896Z"/>
                  </svg>Cetak <i class="fas fa-print"></i></a>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered zero-configuration">
            <thead>
                <tr>
                    <th width='50px' class="text-center">No</th>
                    <th class="text-center">Isi Laporan</th>
                    <th class="text-center">Tanggal</th>
                    <th class="text-center">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($laporans as $laporan)
                <tr>
                    <td width='50px' class="text-center">{{ $loop->iteration }}</td>
                    <td class="text-center">{{ $laporan->isi_laporan }}</td>
                    <td width='400px' class="text-center">{{ $laporan->created_at->format('l, d F Y H:i:s') }}</td>
                    <td class="text-center">
                        @if ($laporan->status == 'pending')
                        <span class="badge badge-sm bg-gradient-secondary">Pending</span>
                        @elseif($laporan->status == 'proses')
                        <span class="badge badge-sm bg-gradient-primary">Proses</span>
                        @elseif($laporan->status == 'selesai')
                        <span class="badge badge-sm bg-gradient-success">Selesai</span>
                        @elseif($laporan->status == 'terverifikasi')
                        <span class="badge badge-sm bg-gradient-success">Terverifikasi</span>
                        @endif  
                    </td>
                </tr>   
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection