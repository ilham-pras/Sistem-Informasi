<!DOCTYPE html>
<html lang="en">

<!-- Head Title -->
@extends('app-layout.head')
@section('title', 'Tambah Gudang')

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
                            <h1><b>Tambah Gudang</b></h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">Home</a></li>
                                <li class="breadcrumb-item">Gudang</li>
                                <li class="breadcrumb-item active">Tambah Gudang</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-8">
                            <div class="card">
                                <!-- card-header -->
                                <div class="card-header bg-primary">
                                    <h3 class="card-title">Tambah Gudang</h3>
                                </div>

                                <!-- form contents -->
                                <form action="{{ route('simpan-gudang') }}" method="POST">
                                    {{ csrf_field() }}

                                    <!-- card-body -->
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Gudang</label>
                                            <input type="text" id="nama_gudang" name="nama_gudang" class="form-control" placeholder="Nama Gudang" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <textarea type="text" id="alamat" name="alamat" class="form-control" placeholder="Alamat Gudang" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Barang</label>
                                            <select id="id_barang" name="id_barang" class="form-control" required>
                                                <option disabled value selected>Pilih Barang</option>
                                                @foreach ($databarang as $item)
                                                    <option value="{{ $item->id_barang }}">
                                                        {{ $item->nama_barang }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal Barang Masuk</label>
                                            <input type="date" id="tgl_masuk" name="tgl_masuk" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal Barang Keluar</label>
                                            <input type="date" id="tgl_keluar" name="tgl_keluar" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Kapasitas</label>
                                            <input type="number" id="kapasitas" name="kapasitas" class="form-control" placeholder="Kapasitas gudang" required>
                                        </div>
                                    </div>
                                    
                                    <!-- card-footer -->
                                    <div class="card-footer">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Simpan Data</button>
                                        </div>
                                    </div>
                                </form>
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
