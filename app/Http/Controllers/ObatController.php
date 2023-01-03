<?php

namespace App\Http\Controllers;

use App\Kategori;
use App\Obat;
use App\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_data = DB::table('obat')->get();
        $kategori =Kategori::all();
        $supplier =Supplier::all();
        return view('obat.index',['data'=>$list_data,'kategori'=>$kategori,'supplier'=>$supplier]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $supplier =Supplier::all();
        $kategori =Kategori::all();
        return view('obat.create' , compact('supplier','kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $obat= new Obat();
        $obat->nama_obat=$request->get('nama_obat');
        $obat->formula=$request->get('formula');
        $obat->restriction_formula=$request->get('restriction_formula');
        $obat->deskripsi=$request->get('deskripsi');
        $obat->faskes_tk1 = !empty($request->get('faskes_tk1'))  ? 1 : 0; 
        $obat->faskes_tk2 = !empty($request->get('faskes_tk2'))  ? 1 : 0; 
        $obat->faskes_tk3 = !empty($request->get('faskes_tk3'))  ? 1 : 0; 
        $obat->kategori_id=$request->get('rdoKategori');
        $obat->supplier_id=$request->get('rdoSupplier');
        // dd($request->get('rdoSupplier'));
        $obat->harga=$request->get('harga');
        
        $file = $request->file('gambar');
        $img_folder = 'images';
        $img_file = $file->getClientOriginalName();
        $file->move($img_folder, $img_file);

        $obat->gambar =$img_file;
        $obat->save();
        return redirect()->route('obat.index')->with('status','Obat berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Obat  $obat
     * @return \Illuminate\Http\Response
     */
    public function show(Obat $obat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Obat  $obat
     * @return \Illuminate\Http\Response
     */
    public function edit(Obat $obat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Obat  $obat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Obat $obat)
    {
        $obat = Obat::find($obat);
        $obat->nama_obat=$request->get('nama_obat');
        $obat->formula=$request->get('formula');
        $obat->restriction_formula=$request->get('restriction_formula');
        $obat->deskripsi=$request->get('deskripsi');
        $obat->faskes_tk1 = !empty($request->get('faskes_tk1'))  ? 1 : 0; 
        $obat->faskes_tk2 = !empty($request->get('faskes_tk2'))  ? 1 : 0; 
        $obat->faskes_tk3 = !empty($request->get('faskes_tk3'))  ? 1 : 0; 
        $obat->harga=$request->get('harga');
        // $obat->gambar="Fentanil.jpg";
        // $obat->gambar=$request->get('gambar');

        $file = $request->file('gambar');
        $img_folder = 'images';
        $img_file = $file->getClientOriginalName();
        $file->move($img_folder, $img_file);

        $obat->gambar =$img_file;

        $obat->kategori_id=$request->get('kategori_id');
        $obat->supplier_id=$request->get('supplier_id');

        $obat->save();
        return redirect()->route('obat.index')->with('status','Obat berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Obat  $obat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Obat $obat)
    {
        $obat = obat::find($obat);
        try{
            $obat->delete();
            return redirect()->route('obat.index')->with('status','Obat berhasil dihapus');
        }catch (\PDOException $e) {
            $msg="Obat gagal dihapus. Data masih berhubungan dengan fitur lain";

            return redirect()->route('obat.index')-with('error',$msg);
        }
    }

    public function front_index(){
        $obat = Obat::all();
        return view('frontend.product', compact('obat'));
    }
    
    public function addToCart($id){
        $o = Obat::find($id);
        $cart = session()->get('cart');
        if(!isset($cart[$id])){
            $cart[$id] = [
                "name"=>$o->nama_obat,
                "quantity"=>1,
                "price"=>$o->harga,
                "photo"=>$o->gambar
            ];
        }else{
            $cart[$id]['quantity']++;
        }
        session()->put('cart',$cart);
        return redirect()->back()->with('success', "Obat berhasil ditambahkan ke keranjang!");
    }

    public function cart(){
        return view('frontend.cart');
    }

    public function deleteItemCart($id)
    {
        $cart = session()->get("cart");
        unset($cart[$id]);
        session()->put("cart", $cart);
        return redirect()->back()->with("status","Obat berhasil dihapus dari keranjang");
    }
}
