<!DOCTYPE html>
<html>
<head>
    <title>Absensi Guru PSDI</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <style type="text/css">
        table tr td,
        table tr th{
            font-size: 9pt;
        }
    </style>
    <center>
        <h5>Absensi Guru PSDI</h4>
<!--         <h6><a target="_blank" href="https://www.malasngoding.com/membuat-laporan-…n-dompdf-laravel/">www.malasngoding.com</a></h5> -->
    </center>

    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>NO</th>
                <th>NIP</th>
                <th>Nama</th>
                <th>Absen</th>
                <th>Tanggal</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <?php $nomer = 1; ?>
                @foreach ($users as $guru)
                <tr>
                    <td>{{$nomer}}</td>
                    <td>{{ $guru->nip}}</td>
                    <td>{{ $guru->nama}}</td>
                    <td>{{ $guru->absen}}</td>
                    <td>{{ $guru->tgl_absen}}</td>
                    <td>{{ $guru->keterangan}}</td>
            
                <?php $nomer++; ?>
                </tr>
                @endforeach
        </tbody>
    </table>

</body>
</html>