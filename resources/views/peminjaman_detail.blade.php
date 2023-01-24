<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <tbody>
        @foreach($peminjaman as $p)
        <tr>
            <td>{{$p->tanggal_peminjaman}}</td>
            <td>
                <ul>
                    @foreach($p->bukus as $b)
                    <li> {{$b->judul}}</li>
                    @endforeach
                </ul>
            </td>
        </tr>
        @endforeach
    </tbody>
</body>
</html>