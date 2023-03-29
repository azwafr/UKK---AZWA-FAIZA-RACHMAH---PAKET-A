<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PDF;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $start_date = @$request->start_date != null ? $request->start_date : date('l, d F Y - H:i:s');
        $end_date   = @$request->end_date != null ? $request->end_date : date('l, d F Y - H:i:s');

        $laporans = Pengaduan::with('users')->get();
        // dd($laporans);
        if(!is_null($request->start_date) && !is_null($request->end_date)){
            $laporans =  Pengaduan::whereBetween('tgl_pengaduan', [Carbon::parse($request->start_date), Carbon::parse(date($request->end_date). ' 23:59:59')])->get();
        }
        // dd($laporans);
        return view('laporan.index', [
            'start_date' => $start_date,
            'end_date' => $end_date,
            'laporans' => $laporans,
        ]);
    }

    // public function cetak()
    // {
    //     $pengaduan = User::orderBy('created_at', 'DESC')->get();

    //     $pdf = PDF::loadview('laporan.cetak', [
    //         'pengaduan' => $pengaduan
    //     ]);
    //     return $pdf->download('laporan.pdf');
    // }

    public function show(Request $request){

        $start_date = @$request->start_date != null ? $request->start_date : date('l, d F Y - H:i:s');
        $end_date   = @$request->end_date != null ? $request->end_date : date('l, d F Y - H:i:s');

        $pengaduan = Pengaduan::with('tanggapan', 'users')->get();
        // dd($pengaduan);
        if(!is_null($request->start_date) && !is_null($request->end_date)){
            $pengaduan =  Pengaduan::whereBetween('tgl_pengaduan', [Carbon::parse($request->start_date), Carbon::parse(date($request->end_date). ' 23:59:59')])->get();
        }

        $pdf = PDF::loadview('laporan.cetak', compact('pengaduan'))->setPaper('a2');
        return $pdf->download('laporan.pdf');
    }
}