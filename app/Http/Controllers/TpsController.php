<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tps;
use App\Desa;
use Validator;

class TpsController extends Controller
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
        $desa = Desa::all();
        return view('tps.index', compact('desa'));
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
                'nm_tps' => 'required|max:50',
            ]);

            if ($validator->passes()) {
    
                // Store your user in database 
                $tps = new Tps;

                $tps->nm_tps = $request->nm_tps;
                $tps->id_desa = $request->id_desa;

                $tps->save();

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
                'namatps' => 'required|max:50',
            ]);

            if ($validator->passes()) {

                $tps = Tps::find($request->id);
                $tps->id_desa = $request->iddesa;
                $tps->nm_tps = $request->namatps;
                $tps->save();

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
            $tps = Tps::find($request->id);
            $tps->delete();
            return response()->json(['success' => '1']);
        } catch (Exception $e) {
            return response()->json(['errors' => '1']);
        }
    }

    public function getTps()
    {
        $desa = Tps::getDesa();

        return response()->json(array('data' => $desa));
    }
}