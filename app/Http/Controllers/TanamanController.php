<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tanaman;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class TanamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tanaman = Tanaman::paginate(5);
        return view('admin.tanaman', compact('tanaman'));
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
        // 
        $rules = [
            'nama_tanaman' => 'required'
        ];
        $pesan = [
            'nama_tanaman.required' => 'nama tanaman tidak boleh kosong'
        ];

        $validator = Validator::make($request->all(), $rules, $pesan);
        if ($validator->fails()) {
            return redirect()->back()->witherror($validator);
        }

        $tanaman = new Tanaman;
        $tanaman->nama_tanaman = $request->nama_tanaman;
        $save = $tanaman->save();
        if ($save) {
            Session::flash('succes', 'data berhasil disimpan');
            return redirect()->route('tanaman.index');
        } else {
            Session::flash('error', ['' => 'register gagal']);
            return redirect()->route('tanaman.index');
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
        $tanaman = Tanaman::find($id);
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
        $tanaman = Tanaman::find($id);
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
        //
        $request->validate([
            'nama_tanaman' => 'required'
        ]);

        Tanaman::find($id)->update($request->all());
        return redirect()->route('tanaman')
            ->with('success', 'Tanaman Berhasil Diubah');
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
