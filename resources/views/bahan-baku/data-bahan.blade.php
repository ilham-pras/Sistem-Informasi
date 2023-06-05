<!DOCTYPE html>
<html lang="en">

<!-- Title -->
@extends('app-layout.head')
@section('title', 'Bahan Baku')

<!-- Head -->
@include('app-layout.head')

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        @include('app-layout.navbar')

        <!-- Main Sidebar Container -->
        @include('app-layout.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1><b>Data Bahan Baku</b></h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">Home</li>
                                <li class="breadcrumb-item active">Bahan Baku</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <!-- card-header -->
                                <div class="card-header">
                                    <a href="{{ route('tambah-bahan') }}" class="btn btn-primary">
                                        <i class="fas fa-plus mr-2"></i>Tambah Data
                                    </a>
                                    <a href="{{ 'print-bahan-baku' }}" class="btn btn-dark">
                                        <i class="fas fa-print mr-2"></i>Cetak PDF
                                    </a>
                                </div>

                                <!-- card-body -->
                                <div class="card-body">
                                    <table id="example2" class="table table-bordered table-striped table-head-fixed text-nowrap">
                                        <thead>
                                            <tr class="text-center">
                                                <th class="align-middle">No</th>
                                                <th class="align-middle">Nama</th>
                                                <th class="align-middle">Keterangan</th>
                                                <th class="align-middle">Harga Beli Satuan</th>
                                                <th class="align-middle">Jumlah</th>
                                                <th class="align-middle">Tanggal Masuk</th>
                                                <th class="align-middle">Nama Supplier</th>
                                                <th class="align-middle">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($databahan as $item)
                                                <tr>
                                                    <td class="text-center align-middle">{{ $loop->iteration }}</td>
                                                    <td class="align-middle">{{ $item->nama_bahan }}</td>
                                                    <td class="align-middle">{{ $item->keterangan }}</td>
                                                    <td class="align-middle">Rp {{ number_format($item->harga_beli, 0, ',', '.') }}</td>
                                                    <td class="align-middle">{{ $item->jumlah_bahan }}</td>
                                                    <td class="align-middle">{{ $item->tgl_masuk }}</td>
                                                    <td class="align-middle">{{ $item->nama_supplier }}</td>
                                                    <td class="text-center align-middle">
                                                        <a href="{{ route('edit-bahan', $item->id_bahan_baku) }}">
                                                            <i class="fas fa-edit btn-sm btn-primary"></i></a> |
                                                        <a href="{{ route('delete-bahan', $item->id_bahan_baku) }}">
                                                            <i class="fas fa-trash-alt btn-sm btn-danger"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- card-footer -->
                                <div class="card-footer"></div>
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- footer -->
        @include('app-layout.footer')
    </div>
    <!-- ./wrapper -->

    <!-- script -->
    @include('app-layout.script')
    <!-- notif sweet alert -->
    @include('sweetalert::alert')
</body>

</html>
