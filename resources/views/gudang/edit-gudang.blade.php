<!DOCTYPE html>
<html lang="en">

<!-- Head Title -->
@extends('app-layout.head')
@section('title', 'Edit Gudang')

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
                            <h1><b>Edit Gudang</b></h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">Home</a></li>
                                <li class="breadcrumb-item">Gudang</li>
                                <li class="breadcrumb-item active">Edit Gudang</li>
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
                                    <h3 class="card-title">Edit Gudang</h3>
                                </div>

                                <!-- form contents -->
                                <form action="{{ route('update-gudang', $gudang->id_gudang) }}" method="POST">
                                    {{ csrf_field() }}

                                    <!-- card-body -->
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Gudang</label>
                                            <input type="text" name="nama_gudang" class="form-control"
                                                value="{{ $gudang->nama_gudang }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <textarea type="text" name="alamat" class="form-control" required>{{ $gudang->alamat }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Barang</label>
                                            <select name="id_barang" class="form-control" required>
                                                <option disabled value>Pilih Barang</option>
                                                @foreach ($barang as $item)
                                                    <option {{ $item->id_barang == $gudang->id_barang ? 'selected' : '' }}
                                                        value="{{ $item->id_barang }}">{{ $item->nama_barang }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal Barang Masuk</label>
                                            <input type="date" name="tgl_masuk" class="form-control"
                                                value="{{ $gudang->tgl_masuk }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal Barang Keluar</label>
                                            <input type="date" name="tgl_keluar" class="form-control"
                                                value="{{ $gudang->tgl_keluar }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Kapasitas</label>
                                            <input type="number" name="kapasitas" class="form-control"
                                                value="{{ $gudang->kapasitas }}" required>
                                        </div>
                                    </div>

                                    <!-- card-footer -->
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
