@extends('layout.index')
@section('title')
    <title>{{ $title }}</title>
@endsection

@section('content')
    <div class="d-flex align-items-center justify-content-between">
        <h1>{{ $title }}</h1>
        <a class="btn btn-primary btn-lg" href="{{ route('anggota.create') }}">Create</a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Jenis Kelamin</th>
                <th scope="col">Alamat</th>
                <th scope="col">No Telpon</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($anggotas as $anggota)
                <tr>
                    <th scope="row">{{ ++$i }}</th>
                    <td>{{ $anggota->nama }}</td>
                    <td>{{ $anggota->jenis_kelamin }}</td>
                    <td>{{ $anggota->alamat }}</td>
                    <td>{{ $anggota->telp }}</td>
                    <td>
                        <div class="d-grid gap-2 d-md-block">
                            <a class="btn btn-primary" href="{{ route('anggota.edit', $anggota->id) }}">Edit</a>
                            <a class="btn btn-danger" href="{{ route('anggota.delete', $anggota->id) }}">Delete</a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="justify-content-center">
        {{ $anggotas->links() }}
    </div>
@endsection
