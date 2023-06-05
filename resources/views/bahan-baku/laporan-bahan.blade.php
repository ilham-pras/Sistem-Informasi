<!DOCTYPE html>
<html>

<head>
    <title>Laporan Bahan Baku | SI SCM2</title>
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
        <h5 class="mb-3">Laporan Bahan Baku</h5>
    </center>

    <table class="table table-bordered">
        <thead class="thead-dark justify-content-center">
            <tr class="text-center">
                <th class="align-middle">No</th>
                <th class="align-middle">Nama</th>
                <th class="align-middle">Keterangan</th>
                <th class="align-middle">Harga Beli Satuan</th>
                <th class="align-middle">Jumlah</th>
                <th class="align-middle">Tanggal Masuk</th>
                <th class="align-middle">Nama Supplier</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td class="text-center align-middle">{{ $loop->iteration }}</td>
                    <td class="align-middle">{{ $item->nama_bahan }}</td>
                    <td class="align-middle">{{ $item->keterangan }}</td>
                    <td class="align-middle">Rp {{ number_format($item->harga_beli, 0, ',', '.') }}</td>
                    <td class="align-middle">{{ $item->jumlah_bahan }}</td>
                    <td class="align-middle">{{ $item->tgl_masuk }}</td>
                    <td class="align-middle">{{ $item->nama_supplier }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
