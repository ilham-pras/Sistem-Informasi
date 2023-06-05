<!DOCTYPE html>
<html lang="en">

<!-- Head Title -->
@extends('app-layout.head')
@section('title', 'Tambah Bahan Baku')

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
                            <h1><b>Tambah Bahan Baku</b></h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Bahan Baku</li>
                                <li class="breadcrumb-item active">Tambah Bahan</li>
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
                                    <h3 class="card-title">Tambah Bahan Baku</h3>
                                </div>

                                <!-- form contents -->
                                <form action="{{ route('simpan-bahan') }}" method="POST">
                                    {{ csrf_field() }}

                                    <!-- card-body -->
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input type="text" id="nama_bahan" name="nama_bahan" class="form-control"
                                                placeholder="Nama Bahan Baku" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Keterangan</label>
                                            <textarea type="text" id="keterangan" name="keterangan" class="form-control" placeholder="Keterangan" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Harga Beli Satuan</label>
                                            <input type="number" id="harga_beli" name="harga_beli" class="form-control"
                                                placeholder="Harga Beli" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Jumlah</label>
                                            <input type="number" id="jumlah_bahan" name="jumlah_bahan" class="form-control"
                                                placeholder="Jumlah Bahan" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal Masuk</label>
                                            <input type="date" id="tgl_masuk" name="tgl_masuk" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Nama Supplier</label>
                                            <select id="id_supplier" name="id_supplier" class="form-control" required>
                                                <option disabled value selected>Pilih Supplier</option>
                                                @foreach ($datasupplier as $item)
                                                    <option value="{{ $item->id_supplier }}"> {{ $item->nama_supplier }}
                                                    </option>
                                                @endforeach
                                            </select>
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