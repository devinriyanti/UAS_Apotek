<?php

namespace App\Http\Controllers;

use App\Laporan;
use App\User;
use App\Transaksi;
use App\TransaksiObat;
use App\Obat;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function laporan(Request $request){
        $dariTgl = $request->input('dariTgl');
        $sampaiTgl = $request->input('sampaiTgl');
        // dd($dariTgl);
        
        // $query = DB::table('transaksi')->select()
        // ->where('tanggal_transaksi', '>=', Carbon::now()->toDatetimeString())
        // ->orWhere('tanggal_transaksi','>=', $dariTgl)
        // ->where('tanggal_transaksi', '<=', Carbon::now()->toDatetimeString())
        // ->orWhere('tanggal_transaksi','>=', $sampaiTgl)
        // ->get();
        // dd($query);

        $laporan = DB::table('users')
        ->select('users.id','users.name','transaksi.tanggal_transaksi','transaksi_obat.kuantitas','transaksi_obat.harga','obat.nama_obat')
        ->join('transaksi','users.id','transaksi.users_id')
        ->join('transaksi_obat','transaksi.id','transaksi_obat.transaksi_id')
        ->join('obat','transaksi_obat.obat_id','obat.id')
        ->get();
        // dd($laporan);
        return view('laporan.rekapbulanan',compact('query','laporan'));
    }
}
