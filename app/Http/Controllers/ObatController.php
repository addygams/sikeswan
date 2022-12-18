<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Obat;
use App\Models\Golongan;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $golongan = DB::table('golongans')->get();
        // return $golongan;
        // $obats = Obat::latest()->paginate(5);
        // $obats = DB::table('obats')->orderBy('id_golongan')->paginate(8);

        $obatt = DB::table('obats')
                ->join('golongans','golongans.id_golongan', '=', 'obats.id_golongan')
                ->where('obats.nama', 'LIKE', "%{$search}%")
                ->orWhere('golongans.nama_golongan', 'LIKE', "%{$search}%")
                ->orderBy('obats.id_golongan')
                ->get();
        // $obat = DB::table('obats')->get();
        $obattt = Obat::query()->where('nama', 'LIKE', "%{$search}%")->orderBy('nama')->get();

        return view('obats.index',compact('obatt','golongan','search','obattt'));
        // return view('obats.index',compact('obatt','golongan'))
        //     ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $obatt = DB::table('obats')
        ->rightjoin('golongans','golongans.id_golongan', '=', 'obats.id_golongan', 'right outer')
        ->distinct()
        ->get();

        $golongan = DB::table('golongans')->get();

        $obats = DB::table('obats')->get();

        return view('obats.create',compact('obatt','golongan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_golongan' => 'required',
            'nama' => 'required',
            'jenis' => 'required',
            'kapasitas' => 'required',
            'stok' => 'required',
            'satuan' => 'required'
        ]);

        $form_data = array(
            'id_golongan' => $request->id_golongan,
            'nama' => $request->nama,
            'jenis' => $request->jenis,
            'kapasitas' => $request->kapasitas,
            'stok' => $request->stok,
            'satuan' => $request->satuan,
        );

        Obat::create($form_data);

        return redirect()->route('obats.index')
                        ->with('success','Berhasil Menambah Obat');
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
    public function edit(Obat $obat)
    {
        $golongan = Golongan::pluck("nama_golongan","id_golongan");
        // dd($golongan);

        return view('obats.edit',compact('golongan','obat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Obat $obat)
    {
        Obat::where('id',$obat->id)->update([
            'nama'       =>   $request->nama,
        'id_golongan'       =>   $request->golongan,
            'jenis'       =>   $request->jenis,
            'kapasitas'       =>   $request->kapasitas,
            'stok'       =>   $request->stok,
            'sisa'       =>   $request->sisa,
        ]);

        return redirect()->route('obats.index')
        ->with(['success'=>'Obat Berhasil Disunting !']);
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
