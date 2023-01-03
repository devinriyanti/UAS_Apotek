<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Kategori::all();
        $jumlah = $data->count();
        // dd($data);
        return view('kategori.index', ['data' => $data, 'jumlah' => $jumlah]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Kategori();
        $data->name = $request->get('name');
        $data->save();
        return redirect()->route('kategori.index')->with('status', 'Kategori berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function edit(Kategori $kategori)
    {
        $kategori = Kategori::find($kategori);
        // dd($kategori);
        return view('kategori.edit',['kategori' => $kategori]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kategori $kategori)
    {
        $kategori = Kategori::find($kategori);
        $kategori->name = $request->get('name');
        $kategori->save();
        return redirect()->route('kategori.index')->with('status', 'Kategori berhasil terupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kategori $kategori)
    {
        $kategori = Kategori::find($kategori);
        try {
            $kategori->delete();
            return redirect()->route('kategori.index')->with('status', 'Kategori berhasil dihapus');
        } catch (\PDOException $e) {
            $msg = "Kategori gagal dihapus. Data masih berhubungan dengan fitur lain";

            return redirect()->route('kategori.index') - with('error', $msg);
        }
    }
    public function getEditForm(Request $request)
    {
        $id = $request->get('id');
        $data = Kategori::find($id);
        return response()->json(array(
            'status' => 'oke',
            'msg' => view('kategori.getEditForm', compact('data'))->render()
        ), 200);
    }

    public function saveData(Request $request)
    {
        $id = $request->get('id');
        $Kategori = Kategori::find($id);
        $Kategori->name = $request->get('name');
        $Kategori->save();
        return response()->json(
            array(
                'status' => 'ok',
                'msg' => 'Kategori berhasil diupdate'
            ),
            200
        );
    }
    public function deleteData(Request $request)
    {
        try {
            $id = $request->get('id');
            $Kategori = Kategori::find($id);
            $Kategori->delete();
            return response()->json(array(
                'status' => 'ok',
                'msg' => 'Kategori berhasil dihapus'
            ), 200);
        } catch (\PDOException $e) {
            return response()->json(array(
                'status ' => ' error',
                'msg' => 'Kategori gagal terhapus. Data masih berhubungan dengan fitur lain'
            ), 200);
        }
    }
    public function saveDataField(Request $request)
    {
        $id = $request->get('id');
        $fname = $request->get('fname');
        $value = $request->get('value');


        $Kategori = Kategori::find($id);
        $Kategori->$fname = $value;
        $Kategori->save();
        return response()->json(
            array(
                'status' => 'ok',
                'msg' => 'Kategori berhasil diupdate'
            ),
            200
        );
    }
}
