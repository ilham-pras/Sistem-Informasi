<!DOCTYPE html>
<html>

<head>
    <title>Laporan Produksi | SI SCM2</title>
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
        <h5 class="mb-3">Laporan Produksi</h5>
    </center>

    <table class="table table-bordered">
        <thead class="thead-dark justify-content-center">
            <tr class="text-center">
                <th class="align-middle">No</th>
                <th class="align-middle">Tanggal<br> Produksi</th>
                <th class="align-middle">Barang</th>
                <th class="align-middle">Jumlah<br> Bahan Baku</th>
                <th class="align-middle">Jumlah<br> Tenaga kerja</th>
                <th class="align-middle">Jumlah<br> Produksi</th>
                <th class="align-middle">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td class="text-center align-middle">{{ $loop->iteration }}</td>
                    <td class="align-middle">{{ $item->tgl_produksi }}</td>
                    <td class="align-middle">{{ $item->nama_barang }}</td>
                    <td class="align-middle">{{ $item->jmlh_bahan }}</td>
                    <td class="align-middle">{{ $item->jmlh_tenaga }}</td>
                    <td class="align-middle">{{ $item->jmlh_produksi }}</td>
                    <td class="align-middle">{{ $item->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
