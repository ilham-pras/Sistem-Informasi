<!DOCTYPE html>
<html lang="en">

<!-- Title -->
@extends('app-layout.head')
@section('title', 'Gudang')

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
                            <h1><b>Data Gudang</b></h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">Home</li>
                                <li class="breadcrumb-item active">Gudang</li>
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
                                    <a href="{{ route('tambah-gudang') }}" class="btn btn-primary">
                                        <i class="fas fa-plus mr-2"></i>Tambah Data
                                    </a>
                                    <a href="#" class="btn btn-dark">
                                        <i class="fas fa-print mr-2"></i>Cetak PDF
                                    </a>
                                </div>

                                <!-- card-body -->
                                <div class="card-body">
                                    <table id="example2" class="table table-bordered table-striped table-head-fixed text-nowrap">
                                        <thead>
                                            <tr class="text-center">
                                                <th class="align-middle">No</th>
                                                <th class="align-middle">Gudang</th>
                                                <th class="align-middle">Alamat</th>
                                                <th class="align-middle">Nama Barang</th>
                                                <th class="align-middle">Tanggal <br>Masuk</th>
                                                <th class="align-middle">Tanggal <br>Keluar</th>
                                                <th class="align-middle">Kapasitas</th>
                                                <th class="align-middle">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($datagudang as $item)
                                                <tr>
                                                    <td class="text-center align-middle">{{ $loop->iteration }}</td>
                                                    <td class="align-middle">{{ $item->nama_gudang }}</td>
                                                    <td class="align-middle">{{ $item->alamat }}</td>
                                                    <td class="align-middle">{{ $item->nama_barang }}</td>
                                                    <td class="align-middle">{{ $item->tgl_masuk }}</td>
                                                    <td class="align-middle">{{ $item->tgl_keluar }}</td>
                                                    <td class="align-middle">{{ number_format($item->kapasitas, 0, ',', '.') }}</td>
                                                    <td class="text-center align-middle">
                                                        <a href="{{ route('edit-gudang', $item->id_gudang) }}">
                                                            <i class="fas fa-edit btn-sm btn-primary"></i></a> |
                                                        <a href="{{ route('delete-gudang', $item->id_gudang) }}">
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
