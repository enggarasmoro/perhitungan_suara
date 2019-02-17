<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kecamatan;
use App\Kabupaten;
use Validator;


class KecamatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware(['role:Admin']);
    }

    public function index()
    {
        $kabupaten = Kabupaten::all();
        return view('kecamatan.index', compact('kabupaten'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'nm_kecamatan' => 'required|max:50',
            ]);

            $input = $request->all();

            if ($validator->passes()) {
    
                // Store your user in database 
                $kecamatan = new Kecamatan;

                $kecamatan->nm_kecamatan = $request->nm_kecamatan;
                $kecamatan->id_kab = $request->id_kab;

                $kecamatan->save();

                return response()->json(['success' => '1']);

            }

            return response()->json(['errorsvalidation' => $validator->errors()]);
        } catch (Exception $e) {
            return response()->json(['errors' => '1']);
        }

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
    public function edit(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'namakecamatan' => 'required|max:50',
            ]);

            if ($validator->passes()) {

                $kecamatan = Kecamatan::find($request->id);

                $kecamatan->nm_kecamatan = $request->namakecamatan;

                $kecamatan->id_kab = $request->idkab;

                $kecamatan->save();

                return response()->json(['success' => '1']);
            }
            return response()->json(['errorsvalidation' => $validator->errors()]);
        } catch (Exception $e) {
            return response()->json(['errors' => '1']);
        }


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
    public function destroy(Request $request)
    {
        try {
            $kecamatan = Kecamatan::find($request->id);
            $kecamatan->delete();
            return response()->json(['success' => '1']);
        } catch (Exception $e) {
            return response()->json(['errors' => '1']);
        }

    }

    public function getKecamatan()
    {
        $kecamatan = Kecamatan::with('getKabupaten')->orderBy('id_kab', 'desc')->orderBy('id', 'desc')->get();

        return response()->json(array('data' => $kecamatan));
    }
}