<?php

namespace App\Http\Controllers;

use App\Models\Kesimpulan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UnsurHara;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class KesimpulanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kesimpulan = Kesimpulan::paginate(5);
        $unsur = UnsurHara::get();
        return view('admin.kesimpulan')->with([
            'kesimpulan' => $kesimpulan,
            'unsur' => $unsur,
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
            'solusi' => 'required',
        ];
        $pesan = [
            'nama.required' => 'nama tidak boleh kosong',
            'unsur.required' => 'unsur hara tidak boleh kosong',
            'solusi.required' => 'solusi tidak boleh kosong',
        ];

        $validator = Validator::make($request->all(), $rules, $pesan);
        if ($validator->fails()) {
            return redirect()->back()->witherror($validator);
        }

        $kesimpulan = Kesimpulan::create([
            'unsur_id' => $request->unsur,
            'name' => $request->nama,
            'solusi' => $request->solusi,
        ]);

        if ($kesimpulan) {
            Session::flash('succes', 'data berhasil disimpan');
            return redirect()->route('kesimpulan.index');
        } else {
            Session::flash('error', ['' => 'data gagal disimpan']);
            return redirect()->route('kesimpulan.index');
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
            'name' => 'required',
            'unsur' => 'required'
        ]);
        Kesimpulan::find($id)->update($request->all());
        return redirect()->route('kesimpulan.index')
            ->with('success', 'Kesimpulan Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Kesimpulan::find($id)->delete();
        return redirect()->route('kesimpulan.index')
            ->with('success', 'Kesimpulan Berhasil Dihapus');
    }
}
