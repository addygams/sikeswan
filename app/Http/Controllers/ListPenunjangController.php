<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ListPenunjang;

class ListPenunjangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listpenunjangs = DB::table('list_penunjangs')->get();
        return view('listpenunjangs.index',compact('listpenunjangs'));
    }

    public function showPenunjang(Request $request)
    {
        $employees = ListPenunjang::all();
        if($request->keyword != ''){
            $employees = ListPenunjang::where('nama','LIKE','%'.$request->keyword.'%')->get();
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
        return view('listpenunjangs.create');
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

        ListPenunjang::create($form_data);

        return redirect()->route('listpenunjangs.index')
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
    public function edit(ListPenunjang $listpenunjang)
    {
        return view('listpenunjangs.edit',compact('listpenunjang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ListPenunjang $listpenunjang)
    {
        ListPenunjang::where('id',$listpenunjang->id)->update([
            'nama' => $request->nama,
            'keterangan' => $request->keterangan,
        ]);
        
        return redirect()->route('listpenunjangs.index')
        ->with(['success'=>'Penunjang Berhasil Disunting !']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deletePenunjang = ListPenunjang::find($id);

        $deletePenunjang->delete();
        return back()->with('success',' Penghapusan berhasil.');
    }
}
