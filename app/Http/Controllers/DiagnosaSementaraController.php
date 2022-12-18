<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DiagnosaSementara;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;

class DiagnosaSementaraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $diagnosasementaras = DB::table('diagnosa_sementaras')->get();
        return view('diagnosasementaras.index', compact('diagnosasementaras'));
    }
    
    // public function index(Request $request)
    // {
    //     $diagnosasementaras = DB::table('diagnosa_sementaras');
    //     return view('diagnosasementaras.index ', compact('diagnosasementaras'));
    // }

    // public function showDiagnosa(Request $request)
    // {
    //     $employees = DiagnosaSementara::all();
    //     if($request->keyword != ''){
    //         $employees = DiagnosaSementara::where('nama','LIKE','%'.$request->keyword.'%')->get();
    //     }
    //     return response()->json([
    //         'employees' => $employees
    //     ]);
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('diagnosasementaras.create');
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
            'kepanjangan' => 'required',
            'inisial' => 'required',
        ]);

        $form_data = array(
            'kepanjangan' => $request->kepanjangan,
            'inisial' => $request->inisial,
        );

        DiagnosaSementara::create($form_data);

        return redirect()->route('diagnosasementaras.index')
                            ->with('success','Berhasil menambah diagnosa');
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
    public function edit(DiagnosaSementara $diagnosasementara)
    {
        return view('diagnosasementaras.edit',compact('diagnosasementara'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DiagnosaSementara $diagnosasementara)
    {
        DiagnosaSementara::where('id',$diagnosasementara->id)->update([
            'kepanjangan' => $request->kepanjangan,
            'inisial' => $request->inisial,
        ]);
        
        return redirect()->route('diagnosasementaras.index')
        ->with(['success'=>'Tabel Berhasil Disunting !']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted_phase = DiagnosaSementara::find($id);
        $deleted_phase->delete();
        return redirect()->route('diagnosasementaras.index')
                        ->with(['success'=>'Daftar berhasil dihapus']);
    }
}
