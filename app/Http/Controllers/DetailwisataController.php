<?php

namespace App\Http\Controllers;
use App\Detailwisata;
use Illuminate\Http\Request;

class DetailwisataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $detailwisatas =Detailwisata::with('wisata')->get();
        return response()->json($detailwisatas);
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
            'kota/kabupaten'       => 'nullable',
            'informasi'       => 'nullable'
         ]);
         $data = $request->all();
       
        $data = Detailwisata::create($request->all());
    
        return response()->json([
            'message' => 'DATA BERHASIL DISIMPAN',
            'detailwisata' => $data
        ]);
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( $detailwisata)
    {
      // return $wisata;
      $detailwisatas =Detailwisata::with('wisata')->where('id',$detailwisata)-> first();
      return response()->json($detailwisatas);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Detailwisata $detailwisata)
    {
        $request->validate([
            'kota/kabupaten'       => 'nullable',
            'informasi'       => 'nullable'
         ]);
 
         $detailwisata->update($request->all());
 
         return response()->json([
             'message' => 'DATA BERHASIL DI UPDATE',
             'detailwisata' => $detailwisata
         ]);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Detailwisata $detailwisatas)
    {
        $detailwisata->delete();
        return response()->json([
          'message' => 'DATA SUKSES DIHAPUS!'
         ]);
    }

}