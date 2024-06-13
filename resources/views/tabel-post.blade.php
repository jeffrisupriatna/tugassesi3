@extends('index')
@section('submain')
    <div class="container-fluid px-4">                           
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Data Post
                <a href="/add/post" class="btn btn-success btn-sm float-end">Tambah Data</a>
                @if (Session::has('success'))
                         <span class="alert alert-success p-2">{{ Session::get('success') }}</span>                    
                @endif
                @if (Session::has('fail'))
                         <span class="alert alert-danger p-2">{{ Session::get('fail') }}</span>                    
                @endif
            </div>
            <div class="card-body">
                <table id="datatablesSimple" class="table table-sm table-striped table-border">
                    <thead>
                        
                        <tr>
                            <th>Judul Artikel</th>
                            <th>Isi Artikel</th>
                            <th colspan="2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($all_post as $d )
                        <tr>
                            <td>{{ $d['judul_artikel'] }}</td>
                            <td>{{ $d['isi_artikel'] }}</td>
                            <td><a href="/edit/{{ $d->id }}" class="btn btn-primary btn-sm">Edit</a></td>
                            <td><a href="/hapus/{{ $d->id }}" class="btn btn-danger btn-sm">Hapus</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
