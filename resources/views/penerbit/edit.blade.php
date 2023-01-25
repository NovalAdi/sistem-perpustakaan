@extends('layout.index')
@section('title')
    <title>{{ $title }}</title>
@endsection

@section('content')
    <div class="d-flex align-items-center justify-content-between">
        <h1>{{ $title }}</h1>
        <a class="btn btn-danger btn-lg" href="{{ route('penerbit.index') }}">Batal</a>
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

    <form action="{{ route('penerbit.update', $penerbit->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="d-flex flex-column gap-2 mt-4">
            <div class="input-group mt-1">
                <span class="input-group-text">Nama</span>
                <input type="text" class="form-control" name="nama" value="{{$penerbit->nama}}">
            </div>
            <div class="input-group mt-1">
                <span class="input-group-text">Alamat</span>
                <input type="text" class="form-control" name="alamat" value="{{$penerbit->alamat}}">
            </div>
            <div class="input-group mt-1">
                <span class="input-group-text">No Telpon</span>
                <input type="text" class="form-control" name="telp" value="{{$penerbit->telp}}">
            </div>
        </div>

        <div class="d-grid gap-2 mt-5">
            <button class="btn btn-primary" type="submit">Kirim</button>
        </div>
    </form>
@endsection
