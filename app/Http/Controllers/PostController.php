<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function loadAllPost(){
        $all_post = Post::all();
        return view('tabel-post',compact('all_post'));
    }

    public function loadAddPostform(){
        return view ('add-post');
    }

    public function AddPost(Request $request){
        $request->validate([
            'judul_artikel' => 'required|string',
            'isi_artikel' => 'required|string',
        ]);

        try {
            $new_post = new Post;
            $new_post->judul_artikel = $request->judul_artikel;
            $new_post->isi_artikel = $request->isi_artikel;
            $new_post->save();
    
            return redirect('/data-post')->with('success','Post Berhasil Ditambahkan');
        } catch (\Exception $e) {
            return redirect('/add/post')->with('fail',$e->getMessage());
        }


    }    

    public function loadEditPostForm($id){
        $post = Post::find($id);

        return view('edit-post',compact('post'));
    }

    public function EditPost(Request $request){
        $request->validate([
            'judul_artikel' => 'required|string',
            'isi_artikel' => 'required|string',
        ]);

        try {
            $update_post = Post::where('id',$request->post_id)->update([
                'judul_artikel' => $request->judul_artikel,
                'isi_artikel' => $request->isi_artikel,
            ]);
    
            return redirect('/data-post')->with('success','Post Berhasil Diubah');
        } catch (\Exception $e) {
            return redirect('/edit/post')->with('fail',$e->getMessage());
        }


    }

    public function hapusPost($id){
        try {
            Post::where('id',$id)->delete();
            return redirect('/data-post')->with('success','Post Berhasil Terhapus');
        } catch (\Exception $e) {
            return redirect('/data-post')->with('fail',$e->getMessage());

        }
    }
}
