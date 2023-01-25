@extends('layout.index')
@section('title')
    <title>{{ $title }}</title>
@endsection

@section('content')
    <div class="d-flex align-items-center justify-content-between">
        <h1>{{ $title }}</h1>
        <a class="btn btn-primary btn-lg" href="{{ route('penerbit.create') }}">Create</a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Alamat</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($penerbit as $p)
                <tr>
                    <th scope="row">{{ ++$i }}</th>
                    <td>{{ $p->nama }}</td>
                    <td>{{ $p->alamat }}</td>
                    <td>{{ $p->telp }}</td>
                    <td>
                        <div class="d-grid gap-2 d-md-block">
                            <a class="btn btn-primary" href="{{ route('penerbit.edit', $p->id) }}">Edit</a>
                            <a class="btn btn-danger" href="{{ route('penerbit.delete', $p->id) }}">Delete</a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="justify-content-center">
        {{ $penerbit->links() }}
    </div>
@endsection
