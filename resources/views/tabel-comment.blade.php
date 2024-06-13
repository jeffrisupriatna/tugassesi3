@extends('index')
@section('submain')
    <div class="container-fluid px-4">                           
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Data Komentar
                <a href="/add/comment" class="btn btn-success btn-sm float-end">Tambah Data</a>
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
                            <th>Nama</th>
                            <th>Komentar</th>
                            <th colspan="2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($all_comment as $d )
                        <tr>
                            <td>{{ $d['nama'] }}</td>
                            <td>{{ $d['komentar'] }}</td>
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
