<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use PDF;

class MahasiswaController extends Controller
{
    public function index(Request $request){
        if($request->has('search')){
            $data = Mahasiswa::where('nama','LIKE','%' .$request->search. '%')->paginate(5);
        }else
            $data = Mahasiswa::all();
        return view('mahasiswa',compact('data'));
    }

    public function tambahdata(){
        return view('tambahdata');
    }

    public function insertdata(Request $request){
        $data = Mahasiswa::create($request->all());
        if($request->hasFile('foto')){
            $request->file('foto')->move('fotomahasiswa/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route('mahasiswa')->with('success',' Data Berhasil Ditambakan');
    }

    public function tampilkandata($id){
        $data = Mahasiswa::find($id);
        return view('tampilkandata',compact('data'));
    }

    public function updatedata(Request $request, $id){
        $data = Mahasiswa::find($id);
        $data->update($request->all());
        return redirect()->route('mahasiswa')->with('success',' Data Berhasil Diupdate');
    }

    public function deletedata($id){
        $data = Mahasiswa::find($id);
        $data->delete();
        return redirect()->route('mahasiswa')->with('success',' Data Berhasil Dihapus');
    }

    public function exportpdf(){
        $data = Mahasiswa::all();
        view()->share('data', $data);
        $pdf = PDF::loadview('mahasiswa-pdf');
        return $pdf->download('Data Mahasiswa Magang PT Kimia Farma Tbk.pdf');
    }
}
