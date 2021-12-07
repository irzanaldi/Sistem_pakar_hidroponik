<?php

namespace App\Http\Controllers;

use App\Models\Bagian;
use App\Models\BagianTanaman;
use App\Models\Gejala;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class BagianTumbuhanController extends Controller
{
    public function index()
    {
        $bagian = BagianTanaman::paginate(5);
        return view('admin.bagianTumbuhan', compact('bagian'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('createTanaman');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'nama' => 'required'
        ];
        $pesan = [
            'nama.required' => 'nama tanaman tidak boleh kosong'
        ];

        $validator = Validator::make($request->all(), $rules, $pesan);
        if ($validator->fails()) {
            return redirect()->back()->witherror($validator);
        }

        $bagian = new BagianTanaman();
        $bagian->nama = $request->nama;
        $save = $bagian->save();
        if ($save) {
            Session::flash('succes', 'data berhasil disimpan');
            return redirect()->route('bagian.index');
        } else {
            Session::flash('error', ['' => 'Create data gagal']);
            return redirect()->route('bagian.index');
        }
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
        $tanaman = BagianTanaman::find($id);
        return view('detailTanaman')->with('tanaman', $tanaman);
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
        $tanaman = BagianTanaman::find($id);
        return view('editTanaman')->with('tanaman', $tanaman);
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
        $request->validate([
            'nama' => 'required'
        ]);

        $bagian = BagianTanaman::find($id);
        $bagian->nama = $request->nama;
        $bagian->save();
        // dd($tanaman->nama);
        return redirect()->route('bagian.index')
            ->with('success', 'Bagian Tanaman Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id_tanaman)
    {
        //
        DB::table('tanamen')->where('id_tanaman', '=', $id_tanaman)->delete();

        return redirect()->route('tanaman.index')
            ->with('success', 'Tanaman Berhasil Dihapus');
    }
}
