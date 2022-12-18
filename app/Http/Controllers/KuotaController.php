<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Kuota;
use Illuminate\Support\Carbon;
use Carbon\CarbonPeriod;

use function PHPUnit\Framework\isEmpty;

class KuotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
    */
    public function index(Request $request)
    {
        $startDate = Carbon::now()->toDateString();
        $kuotaToday = DB::table('kuotas')->where('tanggal',$startDate)->first();
        $search = $request->input('search');
        $searchmonth = $request->input('search');
        $endDate = Carbon::createFromFormat('Y/m/d', '9999/07/01');
        $kuotas = DB::table('kuotas')->orderBy('tanggal','desc')->paginate(8);
        $kuotaa = DB::table('kuotas')
                    ->whereBetween('tanggal', [$startDate, $endDate])
                    ->where('kuotas.tanggal', 'LIKE', "%{$search}%")
                    ->orWhereMonth('kuotas.tanggal', '=', "%{$searchmonth}%")
                    ->orderBy('tanggal')
                    ->get();
        
        return view('kuotas.index', compact('kuotas','kuotaa','search','searchmonth'));
            // ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function lihatsemua(Request $request)
    {
        $search = $request->input('search');
        $searchmonth = $request->input('search');
        $startDate = Carbon::now()->toDateString();
        $endDate = Carbon::createFromFormat('Y/m/d', '9999/07/01');
        $kuotas = DB::table('kuotas')->orderBy('tanggal','desc')->paginate(8);
        $kuotaa = DB::table('kuotas')
                    ->whereBetween('tanggal', [$startDate, $endDate])
                    ->where('kuotas.tanggal', 'LIKE', "%{$search}%")
                    ->orWhereMonth('kuotas.tanggal', '=', "%{$searchmonth}%")
                    ->orderBy('tanggal')
                    ->paginate(10);
        
        return view('kuotas.index', compact('kuotas','kuotaa','search','searchmonth'));
            // ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kuotas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Kuota $kuota)
    {
        $start = Carbon::parse($request->tanggal_awal);
        $end = Carbon::parse($request->tanggal_akhir);
        
        // dd($request->tanggal_awal);
        // dd(is_null($request->tanggal_akhir));

        if (is_null($request->tanggal_akhir)) {
            $form_data = array(
                'tanggal' => $start,
                'kuota' => $request->kuota
            );
            $tanggalExist = Kuota::where('tanggal', '=', $start)->first();
            if ($tanggalExist){
                Kuota::where('tanggal', '=', $start)->update([
                    'kuota'       =>   $request->kuota,
                ]);
            } else {
                Kuota::create($form_data);
            }
        } else {
            for($i = $start; $i <= $end; $i->modify('+1 day')){
                $form_data = array(
                    'tanggal' => $i,
                    'kuota' => $request->kuota
                );
                $tanggalExist = Kuota::where('tanggal', '=', $i)->first();
                if ($tanggalExist){
                    Kuota::where('tanggal', '=', $i)->update([
                        'kuota'       =>   $request->kuota,
                    ]);
                } else{
                    Kuota::create($form_data);
                }
            }
        }

        return redirect()->route('kuotas.index')->with(['success'=>'Kuota Berhasil Disunting !']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Kuota $kuota)
    {
        $daftars = DB::table('daftars')->where('tanggal', '=', $kuota->tanggal)->paginate(8);
        return view('kuotas.show',compact('kuota','daftars'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Kuota $kuota)
    {
        return view('kuotas.edit',compact('kuota'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kuota $kuota)
    {

        Kuota::where('id',$kuota->id)->update([
            'kuota'       =>   $request->kuota,
        ]);
        
        return redirect()->route('kuotas.index')
        ->with(['success'=>'Kuota Berhasil Disunting !']);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kuota $kuota)
    {
        $kuota->delete();
        // return $request;
        // return redirect()->route('kuotas.index')
        //     ->with(['success'=>'Kuota Berhasil Dihapus !']);

        return redirect()->route('kuotas.index')
                        // ->with(['success'=>'Antrian berhasil dihapus']);
                        // ->with(['success' => 'Nomor Antrian anda adalah '.($no +1)]);
                        ->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
