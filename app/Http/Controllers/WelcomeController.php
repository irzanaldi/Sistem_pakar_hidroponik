<?php

namespace App\Http\Controllers;

use App\Models\Gejala;
use App\Models\Tanaman;
use App\Models\UnsurHara;
use App\Models\Kesimpulan;
use Illuminate\Http\Request;
use App\Models\BagianTanaman;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class WelcomeController extends Controller
{
    public function index()
    {
        $gejalaDaun = Gejala::where('bagian_tanamen_id', 1)->get();
        $gejalaBatang = Gejala::where('bagian_tanamen_id', 2)->get();
        $gejalaAkar = Gejala::where('bagian_tanamen_id', 3)->get();
        $gejalaProses = Gejala::where('bagian_tanamen_id', 4)->get();
        $tanaman = Tanaman::get();
        $bagian = BagianTanaman::get();
        return view('welcome')->with([
            'gejalaDaun' => $gejalaDaun,
            'gejalaBatang' => $gejalaBatang,
            'gejalaAkar' => $gejalaAkar,
            'gejalaProses' => $gejalaProses,
            'tanamen' => $tanaman,
            'bagians' => $bagian,
        ]);
    }

    public function cekPakar(Request $request)
    {
        $rules = [
            'tanaman' => 'required',
            'batang' => 'required',
            'daun' => 'required',
            'akar' => 'required',
            'prosesTumbuh' => 'required',
        ];
        $pesan = [
            'tanaman.required' => 'nama tidak boleh kosong',
        ];

        // dd($request->all());

        $validator = Validator::make($request->all(), $rules, $pesan);
// dd($validator);
        if ($validator->fails()) {
        return redirect()->back()->withErrors($validator);
            // dd($validator);
        }

        $gejala = Gejala::where('tanamen_id', $request->tanaman)->where('id', $request->daun)->first();
        $unsur = $gejala->unsur_id;
        $kesimpulan = Kesimpulan::where('unsur_id', $unsur)->first();

        $gejalaDaun = Gejala::where('bagian_tanamen_id', 1)->get();
        $gejalaBatang = Gejala::where('bagian_tanamen_id', 2)->get();
        $gejalaAkar = Gejala::where('bagian_tanamen_id', 3)->get();
        $gejalaProses = Gejala::where('bagian_tanamen_id', 4)->get();
        $tanaman = Tanaman::get();
        $bagian = BagianTanaman::get();
        return view('welcome')->with([
            'gejalaDaun' => $gejalaDaun,
            'gejalaBatang' => $gejalaBatang,
            'gejalaAkar' => $gejalaAkar,
            'gejalaProses' => $gejalaProses,
            'tanamen' => $tanaman,
            'bagians' => $bagian,
            'kesimpulan' => $kesimpulan
        ]);
    }
}
