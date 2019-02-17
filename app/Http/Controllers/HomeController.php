<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Perhitungan;
use App\PerhitunganJatim;
use App\Desa;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (auth()->user()->hasRole('Admin')) {
            $rekapitulasi = Perhitungan::Rekapperhitungan();
            $rekapitulasijatim = PerhitunganJatim::Rekapperhitungan();
            return view('home', compact('rekapitulasi', 'rekapitulasijatim'));
        } elseif (auth()->user()->hasRole('Kordinator Dapil VI')) {
            $id_desa = auth()->user()->id_desa;
            $desa = Desa::getNamaKec($id_desa);
            $nm_kecamatan = $desa->nm_kecamatan;
            $rekapitulasi = Perhitungan::Rekapperhitungankordinator($id_desa);
            $rekapitulasijatim = PerhitunganJatim::Rekapperhitungankordinator($id_desa);
        } else {
            $id_desa = auth()->user()->id_desa;
            $desa = Desa::getNamaKec($id_desa);
            $nm_kecamatan = $desa->nm_kecamatan;
            $rekapitulasi = Perhitungan::Rekapperhitungan();
            $rekapitulasijatim = PerhitunganJatim::Rekapperhitungankordinator($id_desa);
        }
        return view('home', compact('rekapitulasi', 'rekapitulasijatim', 'nm_kecamatan'));


    }
}