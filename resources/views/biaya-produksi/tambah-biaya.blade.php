<!DOCTYPE html>
<html lang="en">

<!-- Head Title -->
@extends('app-layout.head')
@section('title', 'Tambah Biaya Produksi')

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
                            <h1><b>Tambah Biaya Produksi</b></h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Biaya Produksi</li>
                                <li class="breadcrumb-item active">Tambah Biaya Produksi</li>
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
                                    <h3 class="card-title">Tambah Biaya Produksi</h3>
                                </div>

                                <!-- form contents -->
                                <form action="{{ route('simpan-biaya') }}" method="POST">
                                    {{ csrf_field() }}

                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Nama Barang</label>
                                            <select name="id_produksi" class="form-control" required>
                                                <option disabled value selected>Pilih Barang</option>
                                                @foreach ($dataproduksi as $item)
                                                    <option value="{{ $item->id_produksi }}">
                                                        {{ $item->nama_barang }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Biaya Bahan Baku</label>
                                            <input type="number" name="biaya_bahan_baku" class="form-control"
                                                placeholder="Biaya Bahan Baku" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Biaya Tenaga Kerja</label>
                                            <input type="number" name="biaya_tenaga_kerja" class="form-control"
                                                placeholder="Biaya Tenaga Kerja" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Biaya Overhead</label>
                                            <input type="number" name="biaya_overhead" class="form-control"
                                                placeholder="Biaya Overhead" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Total Biaya Produksi</label>
                                            <input type="number" name="total_biaya_produksi" class="form-control"
                                                placeholder="Total Biaya" readonly>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->

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
