<?php

namespace App\Http\Controllers;

use App\Models\Gejala;
use App\Models\Tanaman;
use App\Models\UnsurHara;
use App\Models\Bagian;
use App\Models\BagianTanaman;
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
        $gejala = Gejala::paginate(5);
        $tanaman = Tanaman::get();
        $unsur = UnsurHara::get();
        $bagian = BagianTanaman::get();
        return view('admin.gejala')->with([
            'gejala' => $gejala,
            'tanamen' => $tanaman,
            'unsurs' => $unsur,
            'bagians' => $bagian,
        ]);
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
        $rules = [
            'nama' => 'required',
            'unsur' => 'required',
            'tumbuhan' => 'required',
            'bagian' => 'required',
        ];
        $pesan = [
            'nama.required' => 'nama gejala tidak boleh kosong'
        ];

        $validator = Validator::make($request->all(), $rules, $pesan);
        if ($validator->fails()) {
            return redirect()->back()->witherror($validator);
        }

        $gejala = Gejala::create([
            'bagian_tanamen_id' => $request->bagian,
            'unsur_id' => $request->unsur,
            'tanamen_id' => $request->tumbuhan,
            'name' => $request->nama,
        ]);

        if ($gejala) {
            Session::flash('succes', 'data berhasil disimpan');
            return redirect()->route('gejala.index');
        } else {
            Session::flash('error', ['' => 'data gagal disimpan']);
            return redirect()->route('gejala.index');
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
        return redirect()->route('gejala')
            ->with('success', 'Gejala Berhasil Dihapus');
    }
}
