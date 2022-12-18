<?php

namespace App\Http\Controllers;

use App\Models\DaftarAktif;
use App\Models\RekamAktif;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class DaftarAktifController extends Controller
{
    public function index()
    {
        $startDate = Carbon::now()->toDateString();
        $endDate = Carbon::createFromFormat('Y/m/d', '9999/07/01');
        $daftar = DB::table('daftar_aktifs')->where('status_pendaftaran','0')->orderBy('tanggal')->paginate(8);
        $daftar_aktifs = DB::table('daftar_aktifs')->where('status_pendaftaran','0')
                                        ->whereBetween('tanggal', [$startDate, $endDate])
                                        ->orderBy('tanggal')
                                        ->paginate(8);
        return view('daftaraktifs.index',compact('daftar_aktifs'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function show($daftarAktif)
    {
        $daftar = DaftarAktif::find($daftarAktif);
        // dd($daftar->ciri_khusus);
        return view('daftaraktifs.show',compact('daftar'));
    }

    public function lihatsemua()
    {
        $daftars = DB::table('daftar_aktifs')->orderBy('tanggal')->paginate(8);
        return view('daftaraktifs.showall',compact('daftars'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function store(Request $request)
    {
        // return $request;
        $no = DB::table('daftar_aktifs')->where('tanggal', $request->tanggal)->count();

        $request->validate([
            'tanggal' => 'required',
            'nama' => 'required',
            'kecamatan' => 'required',
            'kelurahan' => 'required',
            'hp' => 'required|max:14',
            'jenis_hewan' => 'required',
            'umur' => 'required',
            'gejala' => 'required',
        ]);

        $form_data = array(
            'tanggal'       =>   $request->tanggal,
            'no' => $no + 1,
            'nama'       =>   $request->nama,
            // 'status_pendaftaran' => '0',
            // 'ktp'       =>   $request->ktp,
            'hp'       =>   $request->hp,
            'kecamatan'       =>   $request->kecamatan,
            'kelurahan'       =>   $request->kelurahan,
            'kelompok'       =>   $request->kelompok,
            'jenis_hewan'       =>   $request->jenis_hewan,
            'hewan_lain' => $request->hl,
            'jenkel'       =>   $request->jenkel,
            'umur'       =>   $request->umur,
            'status'       =>   $request->status,
            'ciri_khusus'       =>   $request->ciri_khusus,
            'gejala'            =>   $request->gejala
        );

        DaftarAktif::create($form_data);

        return redirect()->route('layanan1')
        ->with(['success' => 'Nomor Antrian anda adalah '.($no +1)]);   
    }

    public function edit($daftarAktif)
    {
        $daftar = DaftarAktif::find($daftarAktif);

        $daftar->update([
            'status_pendaftaran' => 1,
        ]);

        $form_data = array(
            'tanggal'       =>   $daftar->tanggal,
            'no' => $daftar->no,
            'nama'       =>   $daftar->nama,
            'ktp'       =>   $daftar->ktp,
            'hp'       =>   $daftar->hp,
            'kecamatan'       =>   $daftar->kecamatan,
            'kelurahan'       =>   $daftar->kelurahan,
            'kelompok'       =>   $daftar->kelompok,
            'jenis_hewan'       =>   $daftar->jenis_hewan,
            'hewan_lain' => $daftar->hl,
            'jenkel'       =>   $daftar->jenkel,
            'umur'       =>   $daftar->umur,
            'status'       =>   $daftar->status,
            'ciri_khusus'       =>   $daftar->ciri_khusus,
            'gejala'            =>   $daftar->gejala
        );

        $rekamaktif = RekamAktif::create($form_data);

        return redirect()->route('daftaraktifs.index', compact('rekamaktif'))
                        ->with(['berhasil' => ' ', 'rekamaktif' => $rekamaktif]);
    }

    public function destroy(DaftarAktif $daftar)
    {
        $daftar->delete();
  
        return redirect()->route('daftaraktifs.index')
                        ->with(['success'=>'Antrian berhasil dihapus']);
    }

}