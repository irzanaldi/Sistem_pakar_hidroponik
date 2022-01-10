<?php

namespace App\Http\Controllers;

use App\Models\UnsurHara;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


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
        $unsur = UnsurHara::paginate(5);
        // dd($unsur);
        return view('admin.unsur', compact('unsur'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // //
        // $tanaman = Tanaman::all();
        // return view('FormUnsur', ['tanaman' => $tanaman]);
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
            'nama' => 'required'
        ];
        $pesan = [
            'nama.required' => 'nama unsur tidak boleh kosong'
        ];

        $validator = Validator::make($request->all(), $rules, $pesan);
        if ($validator->fails()) {
            return redirect()->back()->witherror($validator);
        }

        $unsur = new UnsurHara;
        $unsur->nama = $request->nama;
        $save = $unsur->save();
        if ($save) {
            Session::flash('success', 'data berhasil disimpan');
            return redirect()->route('unsur.index');
        } else {
            Session::flash('errors', ['' => 'register gagal']);
            return redirect()->route('unsur.index');
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
        $request->validate([
            'nama' => 'required'
        ]);

        $unsur = UnsurHara::find($id);
        $unsur->nama = $request->nama;
        $unsur->save();
        // dd($tanaman->nama);
        return redirect()->route('unsur.index')
            ->with('success', 'Tanaman Berhasil Diubah');
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
        return redirect()->route('unsur.index')
            ->with('success', 'Unsur Hara Berhasil Dihapus');
    }
}
