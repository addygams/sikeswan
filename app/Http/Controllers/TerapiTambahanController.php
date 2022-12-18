<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\TerapiTambahan;

class TerapiTambahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tambahans = DB::table('terapi_tambahans')->get();
        return view('tambahans.index',compact('tambahans'));
    }

    public function showTambahan(Request $request)
    {
        $employees = TerapiTambahan::all();
        if($request->keyword != ''){
            $employees = TerapiTambahan::where('nama','LIKE','%'.$request->keyword.'%')->get();
        }
        return response()->json([
            'employees' => $employees
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tambahans.create');
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
            'keterangan' => 'required',
        ]);

        $form_data = array(
            'nama' => $request->nama,
            'keterangan' => $request->keterangan,
        );

        TerapiTambahan::create($form_data);

        return redirect()->route('tambahans.index')
                        ->with(['success' => 'Berhasil Menambah '.($request->nama)]);
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
    public function edit(TerapiTambahan $tambahan)
    {
        return view('tambahans.edit',compact('tambahan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TerapiTambahan $tambahan)
    {
        TerapiTambahan::where('id',$tambahan->id)->update([
            'nama' => $request->nama,
            'keterangan' => $request->keterangan,
        ]);
        
        return redirect()->route('tambahans.index')
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
        $deleteTambahan = TerapiTambahan::find($id);

        $deleteTambahan->delete();
        return back()->with('success',' Penghapusan berhasil.');
    }
}
