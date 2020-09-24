<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Aset;
class AsetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aset = Aset::all();
       return response([
           'success' => true,
           'message' => 'List Semua Aset',
           'data' => $aset
       ], 200);
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
    public function tambah(Request $request) {    
    $this->validate($request,[ 
      'kode_aset'     => 'required|unique:tb_aset',
      'nama_aset'     => 'required',
      'jumlah'        => 'required',
      'merk'          => 'required', 
    ]);   
    
     $asset = new Aset();
     $asset->kode_aset = $request->kode_aset;
     $asset->nama_aset = $request->nama_aset;
     $asset->jumlah    = $request->jumlah;
     $asset->merk      = $request->merk;
     $asset->desc      = $request->desc;
     $asset->save();
     return response()->json(['success'=> $asset],200); 
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
    public function edit($id)
    {
        $aset = Aset::find($id);
        return response([
        'success' => true,
        'message' => 'Get Id',
        'data' => $aset
        ], 200);
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
    
     $kode_aset = $request->kode_aset;
     $nama_aset = $request->nama_aset;
     $jumlah = $request->jumlah;
     $merk = $request->merk;
     $desc = $request->desc;

     $asset = Aset::find($id);
     $asset->kode_aset = $kode_aset;
     $asset->nama_aset = $nama_aset;
     $asset->jumlah    = $jumlah;
     $asset->merk      = $merk;
     $asset->desc      = $desc;
     $asset->save();
     return response()->json(['success'=> $asset],200); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $asset = Aset::find($id);
        $asset->delete();
        return response()->json(['success'=> $asset],200);
    }
}
