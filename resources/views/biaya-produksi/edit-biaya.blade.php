<!DOCTYPE html>
<html lang="en">

<!-- Head Title -->
@extends('app-layout.head')
@section('title', 'Edit Biaya Produksi')

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
                            <h1><b>Edit Biaya Produksi</b></h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Biaya Produksi</li>
                                <li class="breadcrumb-item active">Edit Biaya Produksi</li>
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
                                    <h3 class="card-title">Edit Biaya Produksi</h3>
                                </div>

                                <!-- form contents -->
                                <form action="{{ route('update-biaya', $biayaproduksi->id_biaya_produksi) }}" method="POST">
                                    {{ csrf_field() }}

                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Nama Barang</label>
                                            <select name="id_produksi" class="form-control" required>
                                                <option disabled value>Pilih Barang</option>
                                                @foreach ($produksi as $item)
                                                    <option {{ $item->id_produksi == $biayaproduksi->id_produksi ? 'selected' : '' }}
                                                        value="{{ $item->id_produksi }}">{{ $item->nama_barang }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Biaya Bahan Baku</label>
                                            <input type="number" name="biaya_bahan_baku" class="form-control"
                                                value="{{ $biayaproduksi->biaya_bahan_baku }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Biaya Tenaga Kerja</label>
                                            <input type="number" name="biaya_tenaga_kerja" class="form-control"
                                                value="{{ $biayaproduksi->biaya_tenaga_kerja }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Biaya Overhead</label>
                                            <input type="number" name="biaya_overhead" class="form-control"
                                                value="{{ $biayaproduksi->biaya_overhead }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Total Biaya Produksi</label>
                                            <input type="number" name="total_biaya_produksi" class="form-control"
                                                value="{{ $biayaproduksi->total_biaya_produksi }}" readonly>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Ubah Data</button>
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
