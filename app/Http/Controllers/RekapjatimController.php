<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PerhitunganJatim;


class RekapjatimController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('rekapjatim.index');

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
        //
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
        //
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
    public function destroy($id)
    {
        //
    }

    public function getPerhitungan()
    {
        if (auth()->user()->hasRole('Admin')) {
            $perhitungan = PerhitunganJatim::Listinputperhitungan();
        } else {
            $id_desa = auth()->user()->id_desa;
            $perhitungan = PerhitunganJatim::Listkordinator($id_desa);
        }

        return response()->json(array('data' => $perhitungan));
    }

    public function updateSuara(Request $request)
    {
        try {
            $perhitungan = PerhitunganJatim::find($request->pk);
            $nama = $request->name;
            $perhitungan->$nama = $request->value;

            $perhitungan->save();
            return response()->json(['status' => 'success', 'msg' => 'Sukses Melakukan update data']);
        } catch (Exception $e) {
            return response()->json(['status' => 'error', 'msg' => 'Gagal Melakukan update data']);
        }
    }
}