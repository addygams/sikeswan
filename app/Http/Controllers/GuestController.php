<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TenagaMedik;
use App\Models\Daftars;
use App\Models\Kuota;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $date = Carbon::now()->isoFormat('/d/y');
        $tanggal = $request->tanggal;
        $latestKuota = Kuota::orderBy('tanggal','asc')->pluck('tanggal')->last();
        $startDate = Carbon::now()->toDateString();
        $endDate = Carbon::createFromFormat('Y/m/d', '9999/07/01');
        $daftaraktif = DB::table('daftar_aktifs')
                            ->select('daftar_aktifs.nama', 'daftar_aktifs.kelompok', 'daftar_aktifs.tanggal' ,'kelurahan.nama as namkel')
                            ->Join('kecamatan', 'daftar_aktifs.kecamatan','=','kecamatan.id')
                            ->Join('kelurahan', 'daftar_aktifs.kelurahan','=','kelurahan.id')
                            ->where('tanggal','>=',$startDate)
                            ->orderBy('daftar_aktifs.tanggal')
                            ->paginate(8);
        // dd($date);
        $daftar = DB::table('daftars')->orderBy('tanggal')->paginate(8);
        if (empty($tanggal)) {
            $daftars = DB::table('daftars') ->Where('tanggal',$startDate)
                                            ->orderBy('no')
                                            ->paginate(8);
        } else{
        $daftars = DB::table('daftars') ->where('tanggal', $tanggal)
                                        ->orderBy('no')
                                        ->paginate(8);
        }
        return view('layanan1',compact('daftars','daftaraktif','startDate','tanggal','latestKuota'));
    }

    public function index2()
    {
        $startDate = Carbon::now()->toDateString();
        $endDate = Carbon::createFromFormat('Y/m/d', '9999/07/01');
        $daftar = DB::table('daftars')->orderBy('tanggal')->paginate(8);
        $daftars = DB::table('daftars')->whereBetween('tanggal', [$startDate, $endDate])->orderBy('tanggal')->paginate(8);
        return view('layanan2',compact('daftars'));
    }

    public function profil()
    {
        $tenagamediks = DB::table('tenaga_mediks')->where('jenis','dokter')->get();
        $tenagamedik = DB::table('tenaga_mediks')->where('jenis','paramedis')->get();
        return view('profil',compact('tenagamedik','tenagamediks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $startDate = Carbon::now()->toDateString();
        $latestKuota = Kuota::orderBy('tanggal','asc')->pluck('tanggal')->last();
        $kecamatan = DB::table("kecamatan")->pluck("nama","id");

        return view('daftarAktif', compact('kecamatan','startDate'));
    }

    public function getKelurahan(Request $request)
    {
        $kelurahan = DB::table("kelurahan")
            ->where("id_kecamatan", $request->id_kecamatan)
            ->pluck("nama","id");

        return response()->json($kelurahan);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
