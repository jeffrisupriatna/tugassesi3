<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function loadAllComment(){
        $all_comment = Comment::all();
        return view('tabel-comment',compact('all_comment'));
    }

    public function loadAddCommentform(){
        return view ('add-comment');
    }

    public function AddComment(Request $request){
        $request->validate([
            'nama' => 'required|string',
            'komentar' => 'required|string',
        ]);

        try {
            $new_comment = new Comment;
            $new_comment->nama = $request->nama;
            $new_comment->komentar = $request->komentar;
            $new_comment->save();
    
            return redirect('/data-comment')->with('success','Komentar Berhasil Ditambahkan');
        } catch (\Exception $e) {
            return redirect('/add/comment')->with('fail',$e->getMessage());
        }


    }    

    public function loadEditCommentForm($id){
        $comment = Comment::find($id);

        return view('edit-comment',compact('comment'));
    }

    public function EditComment(Request $request){
        $request->validate([
            'nama' => 'required|string',
            'komentar' => 'required|string',
        ]);

        try {
            $update_comment = Comment::where('id',$request->comment_id)->update([
                'nama' => $request->nama,
                'komentar' => $request->komentar,
            ]);
    
            return redirect('/data-comment')->with('success','Komentar Berhasil Diubah');
        } catch (\Exception $e) {
            return redirect('/edit/comment')->with('fail',$e->getMessage());
        }


    }

    public function hapusComment($id){
        try {
            Comment::where('id',$id)->delete();
            return redirect('/data-comment')->with('success','Komentar Berhasil Terhapus');
        } catch (\Exception $e) {
            return redirect('/data-comment')->with('fail',$e->getMessage());

        }
    }
}
