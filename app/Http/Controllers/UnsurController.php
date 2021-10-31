<?php

namespace App\Http\Controllers;

use App\Models\Tanaman;
use App\Models\UnsurHara;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;


class UnsurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $unsur = UnsurHara::all();
        $tanaman = Tanaman::all();

        return view('admin.unsur', ['unsur' => $unsur, 'tanaman' => $tanaman]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $tanaman = Tanaman::all();
        return view('FormUnsur', ['tanaman' => $tanaman]);
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
            'nama_unsur' => 'required'
        ];
        $pesan = [
            'nama_unsur.required' => 'nama unsur tidak boleh kosong'
        ];

        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), $rules, $pesan);
        if ($validator->fails()) {
            return redirect()->back()->witherror($validator);
        }

        $unsur = new UnsurHara;
        $unsur->nama_unsur = $request->nama_unsur;
        $unsur->id_tanaman = $request->id_tanaman;
        $save = $unsur->save();
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
        $unsur = UnsurHara::find($id);
        return view('DetailUnsur', compact('unsur'));
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
        $unsur = UnsurHara::find($id);
        return view('EditUnsur', compact('unsur'));
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
            'nama_unsur' => 'required'
        ]);
        UnsurHara::find($id)->update($request->all());
        return redirect()->route('unsur')
            ->with('success', 'Unsur Hara Berhasil Diubah');
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
        UnsurHara::find($id)->delete();
        return redirect()->route('unsur')
            ->with('success', 'Unsur Hara Berhasil Dihapus');
    }
}
