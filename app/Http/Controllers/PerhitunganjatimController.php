<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PerhitunganJatim;
use App\Desa;
use App\Tps;
use App\Kecamatan;



class PerhitunganjatimController extends Controller
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
        // $desa = Tps::all();
        $kecamatan = Kecamatan::DropdownkecamatanAll();
        return view('perhitunganjatim.index', compact('kecamatan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        try {
            $count = PerhitunganJatim::where(['status' => 1, 'id_tps' => $request->id_desa])->count();

            if ($count == 0) {
                // Store your user in database 
                $perhitunganjatim = new PerhitunganJatim;
                $perhitunganjatim->id_tps = $request->id_desa;
                if ($perhitunganjatim->save()) {
                    return response()->json(['success' => '1']);
                }
                return response()->json(['errors' => '1', 'msg' => "Gagal Menambahkan Data Dapil V(Jember-Lumajang)"]);
            } else {
                return response()->json(['errors' => '1', 'msg' => 'Data Tps Sudah Ada']);
            }
        } catch (Exception $e) {
            return response()->json(['errors' => '1', 'msg' => "Gagal Menambahkan Data Dapil V(Jember-Lumajang)"]);
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
            $perhitungan = PerhitunganJatim::find($request->id);
            $perhitungan->id_tps = $request->iddesa;

            if ($perhitungan->save()) {
                return response()->json(['success' => '1']);
            }

            return response()->json(['errors' => '1']);
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
            $perhitungan = PerhitunganJatim::find($request->id);
            $perhitungan->status = 0;
            $perhitungan->save();
            return response()->json(['success' => '1']);
        } catch (Exception $e) {
            return response()->json(['errors' => '1']);
        }
    }

    public function getPerhitunganjatim()
    {
        $perhitungan = PerhitunganJatim::Listperhitungan();

        return response()->json(array('data' => $perhitungan));
    }

    public function getDesajatim(Request $request)
    {
        $id_kec = $request->id_kec;
        $desa = Desa::Listdropdownjatim($id_kec);
        if ($desa != []) {
            $result = json_decode($desa, true);
            $arrdesa = array();
            foreach ($result as $key => $value) {
                $arrdesa[$value['id']] = $value['nm_desa'] . '-' . $value['nm_tps'];
            }
        } else {
            $arrdesa = array();
        }
        // var_dump(json_encode($arrdesa));
        return json_encode($arrdesa);
    }
}