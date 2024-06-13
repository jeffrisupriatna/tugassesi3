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
                        <form action="{{ route('AddPost') }}" method="POST">
                            @csrf
                            <div class="row mb-3">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" name="judul_artikel" type="text" placeholder="Enter Judul" />
                                        <label for="nis">Judul Artikel</label>
                                        @error('judul_artikel')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-floating">
                                        <textarea class="form-control" name="isi_artikel" id="" cols="30" rows="10"></textarea>
                                        <label for="nama">Isi Artikel</label>
                                        @error('isi_artikel')
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