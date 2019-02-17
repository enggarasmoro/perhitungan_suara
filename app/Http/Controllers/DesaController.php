<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Desa;
use Validator;
use App\Kecamatan;

class DesaController extends Controller
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
        $kecamatan = Kecamatan::all();
        return view('desa.index', compact('kecamatan'));
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
                'nm_desa' => 'required|max:50',
            ]);

            $input = $request->all();

            if ($validator->passes()) {
    
                // Store your user in database 
                $desa = new Desa;

                $desa->nm_desa = $request->nm_desa;
                $desa->id_kec = $request->id_kec;

                $desa->save();

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
                'namadesa' => 'required|max:50',
            ]);

            if ($validator->passes()) {

                $desa = Desa::find($request->id);
                $desa->id_kec = $request->idkec;
                $desa->nm_desa = $request->namadesa;
                $desa->save();

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
            $desa = Desa::find($request->id);
            $desa->delete();
            return response()->json(['success' => '1']);
        } catch (Exception $e) {
            return response()->json(['errors' => '1']);
        }
    }

    public function getDesa()
    {
        $desa = Desa::Listdesa();
        return response()->json(array('data' => $desa));
    }
}