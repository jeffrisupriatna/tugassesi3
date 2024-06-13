@extends('index')
@section('submain')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Tambah Data</h3></div>
                    @if (Session::has('fail'))
                         <span class="alert alert-danger p-2">{{ Session::get('fail') }}</span>                    
                    @endif
                    <div class="card-body">
                        <form action="{{ route('AddComment') }}" method="POST">
                            @csrf
                            <div class="row mb-3">
                                    <div class="form-floating">
                                        <input class="form-control" name="nama" type="text" placeholder="Enter name" />
                                        <label for="nama">Nama</label>
                                        @error('nama')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" name="komentar" type="text" placeholder="Enter komentar" />
                                        <label for="komentar">Komentar</label>
                                        @error('komentar')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                            </div>
                            <div class="mt-4 mb-0">
                                <div class="d-grid"><button type="submit" class="btn btn-primary btn-block" >Simpan</button></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection