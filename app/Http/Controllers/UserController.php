<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function loadAllUser(){
        $all_user = User::all();
        return view('tabel-user',compact('all_user'));
    }

    public function loadAddUserform(){
        return view ('add-user');
    }

    public function AddUser(Request $request){
        $request->validate([
            'nama' => 'required|string',
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        try {
            $new_user = new User;
            $new_user->nama = $request->nama;
            $new_user->komentar = $request->komentar;
            $new_user->save();
    
            return redirect('/data-user')->with('success','User Berhasil Ditambahkan');
        } catch (\Exception $e) {
            return redirect('/add/user')->with('fail',$e->getMessage());
        }


    }    

    public function loadEditUserForm($id){
        $user = User::find($id);

        return view('edit-user',compact('user'));
    }

    public function EditUser(Request $request){
        $request->validate([
            'nama' => 'required|string',
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        try {
            $update_user = User::where('id',$request->user_id)->update([
                'nama' => $request->nama,
                'email' => $request->komentar,
                'password' => $request->password,
            ]);
    
            return redirect('/data-user')->with('success','User Berhasil Diubah');
        } catch (\Exception $e) {
            return redirect('/edit/user')->with('fail',$e->getMessage());
        }


    }

    public function hapusComment($id){
        try {
            User::where('id',$id)->delete();
            return redirect('/data-comment')->with('success','Komentar Berhasil Terhapus');
        } catch (\Exception $e) {
            return redirect('/data-comment')->with('fail',$e->getMessage());

        }
    }
}
