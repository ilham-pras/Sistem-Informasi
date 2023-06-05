<!DOCTYPE html>
<html lang="en">

<!-- Title -->
@extends('app-layout.head')
@section('title', 'Pegawai')

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
                            <h1><b>Data Pegawai</b></h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">Home</li>
                                <li class="breadcrumb-item active">Pegawai</li>
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
                                <div class="card-header">
                                    <a href="{{ route('tambah-pegawai') }}" class="btn btn-primary">
                                        <i class="fas fa-plus mr-2"></i>Tambah Data
                                    </a>
                                    <a href="#" class="btn btn-dark">
                                        <i class="fas fa-print mr-2"></i>Cetak PDF
                                    </a>
                                </div>


                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example2" class="table table-bordered table-striped table-head-fixed text-nowrap">
                                        <thead>
                                            <tr class="text-center">
                                                <th class="align-middle">No</th>
                                                <th class="align-middle">Nama</th>
                                                <th class="align-middle">Jabatan</th>
                                                <th class="align-middle">Alamat</th>
                                                <th class="align-middle">No Hp</th>
                                                <th class="align-middle">Email</th>
                                                <th class="align-middle">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($datapegawai as $item)
                                                <tr>
                                                    <td class="text-center align-middle">{{ $loop->iteration }}</td>
                                                    {{-- <td class="align-middle w-25">
                                                        <div class="d-flex px-2 py-1">
                                                            <div>
                                                                <img src="{{ asset('foto-barang/' . $item->image) }}" width="120px">
                                                            </div>
                                                            <div class="d-flex flex-column justify-content-center">
                                                                <h6 class="mb-0 text-sm">{{ $item->nama_barang }}</h6>
                                                                <p class="text-xs text-secondary mb-0">{{ $item->harga_jual }}</p>
                                                            </div>
                                                        </div>
                                                    </td> --}}
                                                    <td class="align-middle">{{ $item->nama_pegawai }}</td>
                                                    <td class="align-middle">{{ $item->level }}</td>
                                                    <td class="align-middle">{{ $item->alamat }}</td>
                                                    <td class="align-middle">{{ $item->no_hp }}</td>
                                                    <td class="align-middle">{{ $item->email }}</td>
                                                    <td class="text-center align-middle">
                                                        <a href="{{ route('edit-pegawai', $item->id_pegawai) }}">
                                                            <i class="fas fa-edit btn-sm btn-primary"></i></a> |
                                                        <a href="{{ route('delete-pegawai', $item->id_pegawai) }}">
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
