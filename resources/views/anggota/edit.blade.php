@extends('layout.index')
@section('title')
    <title>{{ $title }}</title>
@endsection

@section('content')
    <div class="d-flex align-items-center justify-content-between">
        <h1>{{ $title }}</h1>
        <a class="btn btn-danger btn-lg" href="{{ route('anggota.index') }}">Batal</a>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            Ada Error<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('anggota.update', $anggota->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="d-flex flex-column gap-2 mt-4">
            <div class="input-group mt-1">
                <span class="input-group-text">Nama</span>
                <input type="text" class="form-control" name="nama" value="{{$anggota->nama}}">
            </div>
            <div class="input-group mt-1">
                <label class="input-group-text">Jenis Kelamin</label>
                <select class="form-select" name="jenis_kelamin" value="{{$anggota->jenis_kelamin}}">
                    <option selected>Pilih...</option>
                    <option value="L">Laki laki</option>
                    <option value="P">Perempuan</option>
                </select>
            </div>
            <div class="input-group mt-1">
                <span class="input-group-text">Alamat</span>
                <input type="text" class="form-control" name="alamat" value="{{$anggota->alamat}}">
            </div>
            <div class="input-group mt-1">
                <span class="input-group-text">No Telpon</span>
                <input type="text" class="form-control" name="telp" value="{{$anggota->telp}}">
            </div>
        </div>

        <div class="d-grid gap-2 mt-5">
            <button class="btn btn-primary" type="submit">Kirim</button>
        </div>
    </form>
@endsection
