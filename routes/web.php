<?php

use App\Http\Controllers\SiswaController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserController;
use App\Models\Siswa;
use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
//     return view('index', ['datas' => Siswa::all()]); 
// });
Route::get('/', function () {
    return view('index');
});

Route::get('/data-tabel',[SiswaController::class,'loadAllSiswa']);
Route::get('/data-post',[PostController::class,'loadAllPost']);
Route::get('/data-comment',[CommentController::class,'loadAllComment']);
Route::get('/data-user',[UserController::class,'loadAllUser']);

Route::get('/add/siswa',[SiswaController::class,'loadAddSiswaform']);
Route::get('/add/post',[PostController::class,'loadAddPostform']);
Route::get('/add/comment',[CommentController::class,'loadAddCommentform']);
Route::get('/add/user',[UserController::class,'loadAddUserform']);

Route::post('/add/siswa',[SiswaController::class,'AddSiswa'])->name('AddSiswa');
Route::post('/add/post',[PostController::class,'AddPost'])->name('AddPost');
Route::post('/add/comment',[CommentController::class,'AddComment'])->name('AddComment');
Route::post('/add/user',[UserController::class,'AddUser'])->name('AddUser');

Route::get('/edit/{id}',[SiswaController::class,'loadEditSiswaform']);
Route::get('/edit/{id}',[PostController::class,'loadEditPostform']);
Route::get('/edit/{id}',[CommentController::class,'loadEditCommentform']);


Route::post('/edit/siswa',[SiswaController::class,'EditSiswa'])->name('EditSiswa');
Route::post('/edit/post',[PostController::class,'EditPost'])->name('EditPost');
Route::post('/edit/comment',[CommentController::class,'EditComment'])->name('EditComment');
Route::post('/edit/user',[UserController::class,'EditUser'])->name('EditUser');

Route::get('/hapus/{id}',[SiswaController::class,'hapusSiswa']);
Route::get('/hapus/{id}',[PostController::class,'hapusPost']);
Route::get('/hapus/{id}',[CommentController::class,'hapusComment']);



Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});