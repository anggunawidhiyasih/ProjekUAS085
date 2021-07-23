<?php

namespace App\Http\Controllers;

use App\Wisata;
use Illuminate\Http\Request;

class WisataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   // public function __construct()
   // {
    //    $this->middleware('auth:api', ['except' => ['index','show']]);
   // }
    public function index()
    {
        //$wisatas =Wisata::all();
        $wisatas =Wisata::with('detailwisata')->get();
        return response()->json($wisatas);
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
        $request->validate([
            'nama_wisata'       => 'nullable',
            'lokasi'       => 'nullable',
            'jenis_wisata' => 'nullable'
         ]);
    
        $wisata = Wisata::create($request->all());
    
        return response()->json([
            'message' => 'DATA BERHASIL DISIMPAN',
            'wisata' => $wisata
        ]);
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Wisata  $wisata
     * @return \Illuminate\Http\Response
     */
    public function show( $wisata)
    {
      // return $wisata;
      $wisatas =Wisata::with('detailwisata')->where('id',$wisata)-> first();
      return response()->json($wisatas);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Wisata  $wisata
     * @return \Illuminate\Http\Response
     */
    public function edit(Wisata $wisata)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Wisata  $wisata
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Wisata $wisata)
    {
        $request->validate([
            'nama_wisata'       => 'nullable',
            'lokasi'       => 'nullable',
            'jenis_wisata' => 'nullable'
         ]);
 
         $wisata->update($request->all());
 
         return response()->json([
             'message' => 'DATA BERHASIL DI UPDATE',
             'wisata' => $wisata
         ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Wisata  $wisata
     * @return \Illuminate\Http\Response
     */
    public function destroy(Wisata $wisata)
    {
        $wisata->delete();
        return response()->json([
          'message' => 'DATA SUKSES DIHAPUS!'
         ]);
    }
}
