<!DOCTYPE html>
<html lang="en">

<!-- Title -->
@extends('app-layout.head')
@section('title', 'Barang')

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
                            <h1><b>Data Barang</b></h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">Home</li>
                                <li class="breadcrumb-item active">Barang</li>
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
                                    <a href="{{ route('tambah-barang') }}" class="btn btn-primary">
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
                                                <th class="align-middle">Gambar</th>
                                                <th class="align-middle">Nama Barang</th>
                                                <th class="align-middle">Kategori</th>
                                                <th class="align-middle">Harga Jual</th>
                                                <th class="align-middle">Status</th>
                                                <th class="align-middle">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($databarang as $item)
                                                <tr>
                                                    <td class="text-center align-middle">{{ $loop->iteration }}</td>
                                                    <td class="text-center align-middle">
                                                        <img src="{{ asset('foto-barang/' . $item->image) }}" width="200px">
                                                    </td>
                                                    <td class="align-middle">{{ $item->nama_barang }}</td>
                                                    <td class="align-middle">{{ $item->nama_kategori }}</td>
                                                    <td class="align-middle">Rp {{ number_format($item->harga_jual, 0, ',', '.') }}</td>
                                                    <td class="align-middle">{{ $item->status }}</td>
                                                    <td class="text-center align-middle">
                                                        <a href="{{ route('edit-barang', $item->id_barang) }}">
                                                            <i class="fas fa-edit btn-sm btn-primary"></i></a> |
                                                        <a href="{{ route('delete-barang', $item->id_barang) }}">
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
