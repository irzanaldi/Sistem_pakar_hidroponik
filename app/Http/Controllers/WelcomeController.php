<?php

namespace App\Http\Controllers;

use App\Models\Gejala;
use App\Models\Tanaman;
use App\Models\UnsurHara;
use Illuminate\Http\Request;
use App\Models\BagianTanaman;

class WelcomeController extends Controller
{
    public function index()
    {
        $gejalaDaun = Gejala::where('bagian_tanamen_id', 1)->get();
        $gejalaBatang = Gejala::where('bagian_tanamen_id', 2)->get();
        $gejalaAkar = Gejala::where('bagian_tanamen_id', 3)->get();
        $gejalaProses = Gejala::where('bagian_tanamen_id', 4)->get();
        $tanaman = Tanaman::get();
        $unsur = UnsurHara::get();
        $bagian = BagianTanaman::get();
        return view('welcome')->with([
            'gejalaDaun' => $gejalaDaun,
            'gejalaBatang' => $gejalaBatang,
            'gejalaAkar' => $gejalaAkar,
            'gejalaProses' => $gejalaProses,
            'tanamen' => $tanaman,
            'unsurs' => $unsur,
            'bagians' => $bagian,
        ]);
    }

    public function cekPakar(Request $request)
    {

    }
}
