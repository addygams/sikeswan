<?php

namespace App\Http\Controllers;

use App\Models\Golongan;
use App\Models\Obat;
use App\Models\ObatPakai;
use App\Models\Penunjang;
use App\Models\RekamPasif;
use App\Models\TenagaMedik;
use App\Models\TransaksiMedis;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;

use Illuminate\Http\Request;

class RekamPasifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rekampasifs = DB::table('rekam_pasifs')->orderBy('tanggal')->get();
        return view('rekampasifs.index', compact('rekampasifs'));
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
    public function edit(RekamPasif $rekampasif)
    {
        $kecamatan = DB::table("kecamatan")->pluck("nama","id");
        $kelurahan = DB::table("kelurahan")->where('id_kecamatan','=',$rekampasif->kecamatan)->pluck("nama","id")->toArray();
        $tenagamedis = DB::table('transaksi_medis')->get();
        $dokters = DB::table('tenaga_mediks')->where('jenis', '=', 'Dokter')->get();
        $paramediks = DB::table('tenaga_mediks')->where('jenis', '=', 'Paramedis')->get();
        $diagnosasementara = DB::table('diagnosa_sementaras')->get();
        $penunjang = DB::table('penunjangs')->where('foreign', $rekampasif->id)->get();
        $obats = DB::table('obats')->get();
        $tambahans = DB::table('terapi_tambahans')->get();
        $golongan = Golongan::with('obat')->get();
        $listpenunjangs = DB::table('list_penunjangs')->get();
        $obatpakai = ObatPakai::with('obat')->where('foreign',$rekampasif->id)->get();
        // $obatpakai = ObatPakai::get();
        // dd(count($dokters));
        // dd($penunjang);
        return view('rekampasifs.edit', compact('tenagamedis','rekampasif', 'dokters', 'paramediks', 'diagnosasementara', 'penunjang', 'obats', 'tambahans', 'golongan','listpenunjangs','obatpakai','kecamatan','kelurahan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RekamPasif $rekampasif, TenagaMedik $tenagamedik, Penunjang $penunjang)
    {
        // foreach($request->obat as $key => $value){
        //     if (!is_null($request->obat[$key])) {
        //         // dd($request->obat[$key]);
        //         $request->validate([
        //             'dosis_obat[]' => 'required',
        //         ]);
        //     }
        //     // dd($request->dosis_obat[$key]);
        //     else if (!is_null($request->dosis_obat[$key])) {
        //         $request->validate([
        //             'obat[]' => 'required',
        //         ]);
        //     }
        // }

        $penunjang = DB::table('penunjangs')->get();
        // dd($request);
        // $dokterss = Str::of(DB::table('tenaga_mediks')->where('jenis', '=', 'Dokter'))->explode(' ');
        // $dokters = DB::table('tenaga_mediks')->where('jenis', '=', 'Dokter')->get();
        // $paramediks = DB::table('tenaga_mediks')->where('jenis', '=', 'Paramedis')->get();
        RekamPasif::where('id', $rekampasif->id)->update([
            'tanggal' => $request->tanggal,
            'nama' => $request->nama,
            'ktp' => $request->ktp,
            'hp' => $request->hp,
            'alamat' => $request->alamat,
            'kecamatan' => $request->kecamatan,
            'kelurahan' => $request->kelurahan,
            'nama_hewan' => $request->nama_hewan,
            'nama_hewan2' => $request->nama_hewan2,
            'nama_hewan3' => $request->nama_hewan3,
            'jenis_hewan' => $request->jenis_hewan,
            'gejala' => $request->gejala,
            'anamnesa' => $request->anamnesa,
            'suhu' => $request->suhu,
            'pulsus' => $request->pulsus,
            'frekuensi' => $request->frekuensi,
            'berat' => $request->berat,
            'khusus' => $request->khusus,
            'diags' => $request->diags,
            'diaga' => $request->diaga,
            'terapi' => $request->terapi,
            'tambahan' => $request->tambahan,
        ]);

        $filterDokter = DB::table('transaksi_medis')->where('id_pasif',$rekampasif->id)->pluck('id_tenagamedis')->toArray();
        
        if ($request->dokter) {
            $differenceDokter = array_diff($filterDokter, $request->dokter);
            // dd(Empty($filterDokter));
            if (Empty($filterDokter)) {
                foreach ($request->dokter as $key => $value) {
                    $form_data = array(
                        'id_pasif' => $rekampasif->id,
                        'id_tenagamedis' => $value,
                        'jenis' => 'Dokter',
                    );
                    TransaksiMedis::create($form_data);
                }
            }
            else if ($differenceDokter) {
                TransaksiMedis::where('id_pasif',$rekampasif->id)->where('jenis','Dokter')->delete();
                foreach ($request->dokter as $key => $value) {
                    $form_data = array(
                        'id_pasif' => $rekampasif->id,
                        'id_tenagamedis' => $value,
                        'jenis' => 'Dokter',
                    );
                    TransaksiMedis::create($form_data);
                }
            }
        }

        $filterParamedik = DB::table('transaksi_medis')->where('id_pasif',$rekampasif->id)->pluck('id_tenagamedis')->toArray();
        
        if ($request->paramedik) {
            $differenceParamedik = array_diff($filterParamedik, $request->paramedik);
            if (Empty($filterParamedik)) {
                foreach ($request->paramedik as $key => $value) {
                    $form_data = array(
                        'id_pasif' => $rekampasif->id,
                        'id_tenagamedis' => $value,
                        'jenis' => 'paramedik',
                    );
                    TransaksiMedis::create($form_data);
                }
            }
            else if ($differenceParamedik) {
                TransaksiMedis::where('id_pasif',$rekampasif->id)->where('jenis','Paramedis')->delete();
                foreach ($request->paramedik as $key => $value) {
                    $form_data = array(
                        'id_pasif' => $rekampasif->id,
                        'id_tenagamedis' => $value,
                        'jenis' => 'Paramedis',
                    );
                    TransaksiMedis::create($form_data);
                }
            }
        }

        $PakaiObat = ObatPakai::where('foreign','=',$rekampasif->id)->get();
        // dd($obat2);
        // dd($request->dosis_obat);
        foreach($request->obat as $key => $value){
            // dd($value);
            $PakaiObat2 = ObatPakai::where('foreign','=',$rekampasif->id)
                                    ->where('id_obat','=',$value)
                                    ->first();
            $obat2 = Obat::where('id','=',$value)->first();
            // dd($PakaiObat2);
            // dd($request[$key]->dosis_obat);
            if ($PakaiObat->contains('id_obat', $value)) {
                if ($PakaiObat2->dosis_obat == $request->dosis_obat) {
                    // None
                }
                else {
                    $margin = $PakaiObat2->dosis_obat - $request->dosis_obat[$key];
                    Obat::where('id','=',$value)->update([
                        'sisa' => $obat2->sisa + $margin
                    ]);
                    $PakaiObat2->update([
                        'dosis_obat' => $request->dosis_obat[$key]
                    ]);
                }
                if ($obat2->sisa > $obat2->kapasitas) {
                    Obat::where('id','=',$value)->update([
                        'stok' => $obat2->stok + 1,
                        'sisa' => $obat2->sisa - $obat2->kapasitas
                    ]);
                } else if ($obat2->sisa < $obat2->kapasitas) {
                    Obat::where('id','=',$value)->update([
                        'stok' => $obat2->stok - 1,
                        'sisa' => $obat2->kapasitas + $obat2->sisa,
                    ]);
                }
            }
            Else {
                if (!is_null($value)) {
                    // dd($request->dosis_obat);
                    ObatPakai::create([
                        'foreign' => $rekampasif->id,
                        'id_obat' => $value,
                        'dosis_obat' => $request->dosis_obat[$key],
                    ]);
                    $margin = $request->dosis_obat[$key];
                    // dd($margin);
                    Obat::where('id','=',$value)->update([
                        'sisa' => $obat2->sisa + $margin
                    ]);
                
                    if ($obat2->sisa > $obat2->kapasitas) {
                        Obat::where('id','=',$value)->update([
                            'stok' => $obat2->stok + 1,
                            'sisa' => $obat2->sisa - $obat2->kapasitas
                        ]);
                    } else if ($obat2->sisa < $obat2->kapasitas) {
                        Obat::where('id','=',$value)->update([
                            'stok' => $obat2->stok - 1,
                            'sisa' => $obat2->kapasitas + $obat2->sisa,
                        ]);
                    }
                }
            }
            // Create PakaiObat baru
            // Kurangi di stok obat


            // if($PakaiObat->isEmpty()){
            //     if($obat2->sisa - $request->dosis_terapi < 0){
            //         Obat::where('nama','=',$value)->update([
            //             'sisa' => $obat2->sisa + $obat2->kapasitas - $request->dosis_terapi,
            //             'stok' => $obat2->stok - 1
            //         ]);                    
            //     } else {
            //         Obat::where('nama','=',$value)->update([
            //             'sisa' => $obat2->sisa - $request->dosis_terapi
            //         ]);
            //     }
                // ObatPakai::updateOrCreate([
                //     'foreign' => $rekampasif->id,
                //     'nama_obat' => $value,
                //     'dosis_obat' => $request->dosis_terapi,
                // ]);
            // }
        }

        // foreach ($PakaiObat as $key => $value) {
        //     $obat = Obat::where('nama','=',$value->nama_obat)->first();
        //     if($obat){
        //         $jumlah = $obat->sisa + $value->dosis_obat;
        //         if($jumlah > $obat->kapasitas) {
        //             $jumlah -= $obat->kapasitas; 
        //             $obat->stok++;
        //         }
        //         $obat->sisa = $jumlah;
        //         $obat->save();
        //         $value->delete();
        //     }
        //     ObatPakai::create([
        //         'foreign' => $rekampasif->id,
        //         'nama_obat' => $request->obat,
        //         'dosis_obat' => $request->dosis_terapi,
        //     ]);
        // }   
        // dd($request);

        if ($request->foto) {
            foreach ($request->penunjang as $key => $value ) {
                // dd($request);
                if (Arr::exists($request->foto,$key)) {
                    # code...
                    $name = $request->foto[$key]->getClientOriginalName();
                    $request->foto[$key]->storeAs('public/packages/', $name);
                    Penunjang::updateOrCreate([
                        'nama' => $value,
                        'foreign' => $rekampasif->id,
                        'foto' => $name,
                    ]);
                }
            }
        }
        // return back()->with('success', 'New subject has been added.');

        return redirect()->route('rekampasifs.index')
            ->with(['success' => 'Rekam Medis Berhasil Disunting !']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(RekamPasif $rekampasif)
    {
        // $penunjang->delete();
        // dd($request);
        $rekampasif->delete();
  
        return redirect()->route('rekampasifs.index')
                        ->with(['success'=>'Rekam Medis berhasil dihapus']);
    }

    public function delete(Penunjang $penunjang)
    {
        $penunjang->delete();

        return redirect()->route('rekampasifs.index')
            ->with(['success'=>'Rekam Medis berhasil dihapus']);
    }

    public function deleteObat(ObatPakai $pakai)
    {
        // dd($pakai);
        // TODO
        // Sisa obat ditambah dosis obat
        $obat2 = Obat::where('id','=',$pakai->id_obat)->first();
        $obat2->sisa = $obat2->sisa + $pakai->dosis_obat;

        // Cek dosis di stok
        if ($obat2->sisa > $obat2->kapasitas) {
            Obat::where('id','=',$pakai->id_obat)->update([
                'stok' => $obat2->stok + 1,
                'sisa' => $obat2->sisa - $obat2->kapasitas
            ]);
        } else if ($obat2->sisa < $obat2->kapasitas) {
            Obat::where('id','=',$pakai->id_obat)->update([
                'stok' => $obat2->stok - 1,
                'sisa' => $obat2->kapasitas + $obat2->sisa,
            ]);
        }
        // delete
        $pakai->delete();

        return redirect()->route('rekampasifs.index')
            ->with(['success'=>'Rekam Medis berhasil dihapus']);
    }
}
