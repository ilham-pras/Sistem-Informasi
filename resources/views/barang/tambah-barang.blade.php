<!DOCTYPE html>
<html lang="en">

<!-- Head Title -->
@extends('app-layout.head')
@section('title', 'Tambah Barang')

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
                            <h1><b>Tambah Barang</b></h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Barang</li>
                                <li class="breadcrumb-item active">Tambah Barang</li>
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
                                    <h3 class="card-title">Tambah Barang</h3>
                                </div>
                                
                                <!-- form contents -->
                                <form action="{{ route('simpan-barang') }}" method="POST"
                                enctype="multipart/form-data">
                                {{ csrf_field() }}
                                
                                    <!-- card-body -->
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Nama Barang</label>
                                            <select id="id_produksi" name="id_produksi" class="form-control" required>
                                                <option disabled value selected>Pilih Barang</option>
                                                @foreach ($dataproduksi as $item)
                                                    <option value="{{ $item->id_produksi }}">
                                                        {{ $item->nama_barang }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Kategori</label>
                                            <select id="id_kategori_barang" name="id_kategori_barang" class="form-control" required>
                                                <option disabled value selected>Pilih Kategori</option>
                                                @foreach ($datakategori as $item)
                                                    <option value="{{ $item->id_kategori_barang }}">
                                                        {{ $item->nama_kategori }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Harga Jual</label>
                                            <input type="number" id="harga_jual" name="harga_jual" class="form-control" placeholder="Harga Jual Barang" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Status</label>
                                            <input type="text" id="status" name="status" class="form-control" placeholder="Status Barang" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="image" class="form-label">Foto Barang</label>
                                            <input type="file" id="image" name="image" class="form-control-file" required>
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
