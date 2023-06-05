<!DOCTYPE html>
<html>

<head>
    <title>Laporan Supplier | SI SCM2</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 10pt;
        }
    </style>

    <center>
        <h5 class="mb-3">Laporan Supplier</h5>
    </center>

    <table class="table table-bordered">
        <thead class="thead-dark justify-content-center">
            <thead>
                <tr class="text-center">
                    <th class="align-middle">No</th>
                    <th class="align-middle">Nama</th>
                    <th class="align-middle">Alamat</th>
                    <th class="align-middle">Email</th>
                </tr>
            </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td class="text-center align-middle">{{ $loop->iteration }}</td>
                    <td class="align-middle">{{ $item->nama_supplier }}</td>
                    <td class="align-middle">{{ $item->alamat }}</td>
                    <td class="align-middle">{{ $item->email }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
