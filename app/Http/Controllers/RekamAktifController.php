<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\RekamAktif;
use App\Models\TransaksiMedis;

class RekamAktifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rekamaktifs = DB::table('rekam_aktifs')->orderBy('tanggal')->paginate(8);
        return view('rekamaktifs.index', compact('rekamaktifs'));
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
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($rekamaktifs)
    {
        $tenagamedis = DB::table('transaksi_medis')->get();
        $kecamatan = DB::table("kecamatan")->pluck("nama","id");
        $dokters = DB::table('tenaga_mediks')->where('jenis', '=', 'Dokter')->get();
        $paramediks = DB::table('tenaga_mediks')->where('jenis', '=', 'Paramedis')->get();
        $tambahans = DB::table('terapi_tambahans')->get();
        $aktif = RekamAktif::find($rekamaktifs);
        // $kecamatan = DB::table("kecamatan")->where('id','=',$aktif->kecamatan)->pluck("nama","id");
        $kelurahan = DB::table("kelurahan")->where('id_kecamatan','=',$aktif->kecamatan)->pluck("nama","id")->toArray();
        // dd($kelurahan[4]);
        return view('rekamaktifs.edit', compact('aktif','kecamatan','tambahans', 'dokters','paramediks','kelurahan','tenagamedis'));
    }

    public function getKelurahan(Request $request)
    {
        $kelurahan = DB::table("kelurahan")
            ->where("id_kecamatan", $request->id_kecamatan)
            ->pluck("nama","id");
        return response()->json($kelurahan);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $rekamAktif)
    {
        $aktif = RekamAktif::find($rekamAktif);
        RekamAktif::where('id', $aktif->id)->update([
            'tanggal' => $request->tanggal,
            'nama' => $request->nama,
            'ktp' => $request->ktp,
            'kecamatan' => $request->kecamatan,
            'kelurahan' => $request->kelurahan,
            'hp' => $request->hp,
            'kelompok' => $request->kelompok,
            'status' => $request->status,
            'jenis_hewan' => $request->jenis_hewan,
            'hewan_lain' => $request->hl,
            'jenkel' => $request->jenkel,
            'umur' => $request->umur,
            'ciri_khusus' => $request->ciri_khusus,
            'gejala' => $request->gejala,
            'dokter' => $request->dokter,
            'paramedik' => $request->paramedik,
            'anamnesa' => $request->anamnesa,
            'diagnosa' => $request->diagnosa,
            'terapi' => $request->terapi,
            'tambahan' => $request->tambahan,
        ]);

        $filterDokter = DB::table('transaksi_medis')->where('id_aktif',$aktif->id)->pluck('id_tenagamedis')->toArray();
        
        if ($request->dokter) {
            $differenceDokter = array_diff($filterDokter, $request->dokter);
            if (Empty($filterDokter)) {
                // dd($filterDokter);
                foreach ($request->dokter as $key => $value) {
                    $form_data = array(
                        'id_aktif' => $aktif->id,
                        'id_tenagamedis' => $value,
                        'jenis' => 'Dokter',
                    );
                    TransaksiMedis::create($form_data);
                }
            }
            else if ($differenceDokter) {
                TransaksiMedis::where('id_aktif',$aktif->id)->where('jenis','Dokter')->delete();
                foreach ($request->dokter as $key => $value) {
                    $form_data = array(
                        'id_aktif' => $aktif->id,
                        'id_tenagamedis' => $value,
                        'jenis' => 'Dokter',
                    );
                    TransaksiMedis::create($form_data);
                }
            }
        }

        $filterParamedik = DB::table('transaksi_medis')->where('id_aktif',$aktif->id)->pluck('id_tenagamedis')->toArray();
        
        if ($request->paramedik) {
            $differenceParamedik = array_diff($filterParamedik, $request->paramedik);
            if (Empty($filterParamedik)) {
                foreach ($request->paramedik as $key => $value) {
                    $form_data = array(
                        'id_aktif' => $aktif->id,
                        'id_tenagamedis' => $value,
                        'jenis' => 'Paramedis',
                    );
                    TransaksiMedis::create($form_data);
                }
            }
            else if ($differenceParamedik) {
                TransaksiMedis::where('id_aktif',$aktif->id)->where('jenis','Paramedis')->delete();
                foreach ($request->paramedik as $key => $value) {
                    $form_data = array(
                        'id_aktif' => $aktif->id,
                        'id_tenagamedis' => $value,
                        'jenis' => 'Paramedis',
                    );
                    TransaksiMedis::create($form_data);
                }
            }
        }

        return redirect()->route('rekamaktifs.index')
            ->with(['success' => 'Rekam Medis Berhasil Disunting !']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(RekamAktif $rekamAktif)
    {
        $rekamAktif->delete();
  
        return redirect()->route('rekamaktifs.index')
                        ->with(['success'=>'Rekam Medis berhasil dihapus']);
    }
}
