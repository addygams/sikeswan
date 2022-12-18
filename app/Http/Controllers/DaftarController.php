<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Daftars;
use App\Models\Kuota;
use App\Models\RekamAktif;
use App\Models\RekamPasif;
use Illuminate\Support\Carbon;

class DaftarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $date = Carbon::now()->format('d M Y');
        $startDate = Carbon::now()->toDateString();
        $endDate = Carbon::createFromFormat('Y/m/d', '9999/07/01');
        $belum = DB::table('daftars')->leftJoin('rekam_pasifs', 'daftars.tanggal','=','rekam_pasifs.tanggal')
                                        ->where('daftars.no','rekam_pasifs.no');
        $daftar = DB::table('daftars')->orderBy('tanggal')->paginate(8);
        $daftars = DB::table('daftars')->whereBetween('tanggal', [$startDate, $endDate])
                                        ->where('status_pendaftaran','0')
                                        ->orderBy('tanggal')
                                        ->paginate(8);
        
        return view('daftars.index',compact('daftars','belum','date'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function lihatsemua()
    {
        $startDate = Carbon::now()->toDateString();
        $endDate = Carbon::createFromFormat('Y/m/d', '9999/07/01');
        $daftar = DB::table('daftars')->orderBy('tanggal')->get();
        // $daftars = DB::table('daftars') ->whereBetween('tanggal', [$startDate, $endDate])
        //                                 ->orderBy('tanggal')
        //                                 ->paginate(8);
        return view('daftars.showall',compact('daftar'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $startDate = Carbon::now()->toDateString();
        $latestKuota = Kuota::orderBy('tanggal','asc')->pluck('tanggal')->last();
        return view('daftar', compact('startDate','latestKuota'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        $no = DB::table('daftars')->where('tanggal', $request->tanggal)->count();

        $request->validate([
            'tanggal' => 'required',
            'nama' => 'required',
            'ktp' => 'required|max:16',
            'hp' => 'required|max:14',
            'jenis_hewan' => 'required',
            'gejala' => 'required',
        ]);
        
        $maks = DB::table('kuotas')->where('tanggal', $request->tanggal)->first();
        // dd($maks);
        if (is_null($maks)) {
            session()->flash('failed','Maaf, tanggal yang dipilih tidak tersedia');
            return redirect()->route('daftar');
        }
        else if ($no < $maks->kuota) {
            $form_data = array(
                'tanggal'       =>   $request->tanggal,
                'no' => $no + 1,
                'nama'       =>   $request->nama,
                'ktp'       =>   $request->ktp,
                'hp'       =>   $request->hp,
                'jenis_hewan'       =>   $request->jenis_hewan,
                'hewan_lain' => $request->hl,
                'nama_hewan'        =>   $request->nama_hewan,
                'nama_hewan2'        =>   $request->nama_hewan2,
                'nama_hewan3'        =>   $request->nama_hewan3,
                'gejala'            =>   $request->gejala
            );
            Daftars::create($form_data);
            return redirect()->route('layanan1')
            ->with(['success' => 'Nomor Antrian anda adalah '.($no +1)]);
        }
        else {
            session()->flash('failed','Maaf, jumlah pendaftar telah memenuhi kuota');
            return redirect()->route('daftar');
        }
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Daftars $daftar)
    {
        return view('daftars.show',compact('daftar'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Daftars $daftar, RekamPasif $rekampasif)
    {
        $daftar->update([
            'status_pendaftaran' => 1,
        ]);

       $form_data = array(
            'tanggal'       =>   $daftar->tanggal,
            'no' => $daftar->no,
            'nama'       =>   $daftar->nama,
            'ktp'       =>   $daftar->ktp,
            'hp'       =>   $daftar->hp,
            'jenis_hewan'       =>   $daftar->jenis_hewan,
            'hewan_lain' => $daftar->hl,
            'nama_hewan'        =>   $daftar->nama_hewan,
            'nama_hewan2'        =>   $daftar->nama_hewan2,
            'nama_hewan3'        =>   $daftar->nama_hewan3,
            'gejala'            =>   $daftar->gejala
        );

        $rekampasif = RekamPasif::create($form_data);
        // $rekampasif = DB::table('rekam_pasifs')
        //                 ->where('tanggal',$daftar->tanggal)
        //                 ->where('no',$daftar->no);
        // dd($daftar);

        return redirect()->route('daftars.index', compact('rekampasif'))
                        ->with(['berhasil' => ' ', 'rekampasif' => $rekampasif]);
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
    public function destroy(Daftars $daftar)
    {
        $daftar->delete();
        $rekampasif = DB::table('rekam_pasifs')
                        ->where('tanggal',$daftar->tanggal)
                        ->where('no',$daftar->no);
        $rekampasif->delete();
  
        return redirect()->route('daftars.index')
                        ->with(['success'=>'Antrian berhasil dihapus']);
    }
}
