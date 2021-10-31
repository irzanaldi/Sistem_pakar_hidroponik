<?php

namespace App\Http\Controllers;

use App\Models\Gejala;
use App\Models\Tanaman;
use App\Models\UnsurHara;
use App\Models\Bagian;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;



class GejalaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $gejala = Gejala::paginate(10);
        return view('admin.gejala')->with('gejala', $gejala);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $unsur = UnsurHara::all();
        $tanaman = Tanaman::all();
        $bagian = Bagian::all();
        return view('FormGejala', ['unsur' => $unsur, 'tanaman' => $tanaman, 'bagian' => $bagian]);
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
        $rules = [
            'nama_gejala' => 'required'
        ];
        $pesan = [
            'gejala.required' => 'nama gejala tidak boleh kosong'
        ];

        $validator = Validator::make($request->all(), $rules, $pesan);
        if ($validator->fails()) {
            return redirect()->back()->witherror($validator);
        }

        $gejala = new Gejala;
        $gejala->id_bagian = $request->id_bagian;
        $gejala->id_unsur = $request->id_unsur;
        $gejala->id_tanaman = $request->id_tanaman;
        $gejala->nama_gejala = $request->nama_gejala;
        $save = $gejala->save();
        if ($save) {
            Session::flash('succes', 'data berhasil disimpan');
            return redirect()->route('login');
        } else {
            Session::flash('error', ['' => 'register gagal']);
            return redirect()->route('register');
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
        $gejala = Gejala::find($id);
        return redirect('detailGejala', compact('gejala'));
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
        $gejala = Gejala::find($id);
        return redirect('editGejala', compact('gejala'));
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
        $request->validate([
            'nama_gejala' => 'required'
        ]);
        Gejala::find($id)->update($request->all());
        return redirect()->route('gejala')
            ->with('success', 'Gejala Berhasil Diubah');
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
        Gejala::find($id)->delete();
        return redirect()->route('unsur')
            ->with('success', 'Gejala Berhasil Dihapus');
    }
}
