<?php

namespace App\Http\Controllers;

use App\Models\RekamPasif;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\TenagaMedik;
use App\Models\TransaksiMedis;

class TenagaMedikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mediks = DB::table('tenaga_mediks')->get();
        return view('tenagamediks.index',compact('mediks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tenagamediks.create');
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
            'nama' => 'required',
            'nomor' => 'required',
            'jenis' => 'required',
        ]);

        $name = $request->foto->getClientOriginalName();
        $request->foto->storeAs('public/packages/', $name);
        
        $form_data = array(
            'nama' => $request->nama,
            'nomor' => $request->nomor,
            'jenis' => $request->jenis,
            'foto' => $name,
        );

        TenagaMedik::create($form_data);

        return redirect()->route('tenagamediks.index')
                        ->with(['success' => 'Berhasil Menambah '.($request->jenis)]);
                        // ->with('success','Berhasil Menambah'.($request->jenis));
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
    public function edit(TenagaMedik $tenagamedik)
    {
        return view('tenagamediks.edit',compact('tenagamedik'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TenagaMedik $tenagamedik)
    {
        if($request->foto){
            $name = $request->foto->getClientOriginalName();
            $request->foto->storeAs('public/packages/', $name);
            TenagaMedik::where('id',$tenagamedik->id)->update([
                'foto' => $name,
            ]);
        }
            

        TenagaMedik::where('id',$tenagamedik->id)->update([
            'nama' => $request->nama,
            'nomor' => $request->nomor,
            'jenis' => $request->jenis,
        ]);

        return redirect()->route('tenagamediks.index')
        ->with(['success'=>'Tenaga Medis Berhasil Disunting !']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function test(FilterRequest $request)
    //     {

    //         $data = $this->filter($request);
    //         $mapsData = $data->original;

    //         return response()->json(['activities'=> $mapsData['filter']], 200);
    //     }

    public function destroy($id)
    {
        $medis = TenagaMedik::find($id);
        $tenagamedis = TransaksiMedis::where('id_tenagamedis',$id)->get();

        
        $rekampasif = DB::table('rekam_pasifs')->get();
        for ($i=0; $i < count($tenagamedis) ; $i++) { 
            TransaksiMedis::where('id_tenagamedis',$id)->delete();
        }
        
        $medis->delete();

        return back()->with('success',' Penghapusan berhasil.');
    }
}
