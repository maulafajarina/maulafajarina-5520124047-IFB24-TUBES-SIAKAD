<!DOCTYPE html>
<html>
<head>
    <title>KRS Mahasiswa</title>
    <style>
        body{
            font-family: Arial, sans-serif;
        }

        table{
            width:100%;
            border-collapse:collapse;
            margin-top:20px;
        }

        table, th, td{
            border:1px solid #000;
        }

        th, td{
            padding:8px;
            text-align:left;
        }

        h2{
            text-align:center;
        }
    </style>
</head>
<body>

<h2>KARTU RENCANA STUDI</h2>

<p><b>Nama :</b> {{ auth()->user()->name }}</p>
<p><b>NPM :</b> {{ auth()->user()->npm }}</p>

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Kode MK</th>
            <th>Mata Kuliah</th>
            <th>SKS</th>
        </tr>
    </thead>
    <tbody>
        @foreach($krs as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->matakuliah->kode_matakuliah }}</td>
            <td>{{ $item->matakuliah->nama_matakuliah }}</td>
            <td>{{ $item->matakuliah->sks }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>