<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use App\Models\User;
use App\Models\Transaksi;
use App\Models\TransaksiObat;
use App\Models\Obat;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function laporan(Request $request){
        $dariTgl = $request->input('dariTgl');
        $sampaiTgl = $request->input('sampaiTgl');

        $laporan = DB::table('users')
        ->select('users.id','users.name','transaksi.tanggal_transaksi','transaksi_obat.kuantitas','transaksi_obat.harga','obat.nama_obat')
        ->join('transaksi','users.id','transaksi.users_id')
        ->join('transaksi_obat','transaksi.id','transaksi_obat.transaksi_id')
        ->join('obat','transaksi_obat.obat_id','obat.id')
        ->get();
        // dd($laporan);
        return view('laporan.rekapbulanan',compact('laporan'));
    }

    // public function laporan(Request $request){
    //     $dariTgl = $request->input('dariTgl');
    //     $sampaiTgl = $request->input('sampaiTgl');

    //     $laporan = Transaksi::where('tanggal_transaksi','>=',$dariTgl)
    //     ->where('tanggal_transaksi','<=',$sampaiTgl)
    //     ->get();

    //     return view('laporan.rekapbulanan',compact('laporan'));
    // }
}
