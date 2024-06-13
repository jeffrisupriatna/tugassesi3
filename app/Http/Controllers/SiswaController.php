<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    //
    public function loadAllSiswa(){
        $all_siswa = Siswa::all();
        return view('tabel-siswa',compact('all_siswa'));
    }

    public function loadAddSiswaform(){
        return view ('add-siswa');
    }

    public function AddSiswa(Request $request){
        $request->validate([
            'nis' => 'required|min:3|max:8',
            'nama' => 'required|string',
            'alamat' => 'required',
        ]);

        try {
            $new_siswa = new Siswa;
            $new_siswa->nis = $request->nis;
            $new_siswa->nama = $request->nama;
            $new_siswa->alamat = $request->alamat;
            $new_siswa->save();
    
            return redirect('/data-tabel')->with('success','Siswa Berhasil Ditambahkan');
        } catch (\Exception $e) {
            return redirect('/add/siswa')->with('fail',$e->getMessage());
        }


    }

    public function EditSiswa(Request $request){
        $request->validate([
            'nis' => 'required|min:3|max:8',
            'nama' => 'required|string',
            'alamat' => 'required',
        ]);

        try {
            $update_siswa = Siswa::where('id',$request->siswa_id)->update([
                'nis' => $request->nis,
                'nama' => $request->nama,
                'alamat' => $request->alamat,
            ]);
    
            return redirect('/data-tabel')->with('success','Siswa Berhasil Diubah');
        } catch (\Exception $e) {
            return redirect('/edit/siswa')->with('fail',$e->getMessage());
        }


    }

    public function loadEditSiswaForm($id){
        $siswa = Siswa::find($id);

        return view('edit-siswa',compact('siswa'));
    }

    public function hapusSiswa($id){
        try {
            Siswa::where('id',$id)->delete();
            return redirect('/data-tabel')->with('success','Siswa Berhasil Terhapus');
        } catch (\Exception $e) {
            return redirect('/data-tabel')->with('fail',$e->getMessage());

        }
    }
}
