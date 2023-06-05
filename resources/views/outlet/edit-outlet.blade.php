<!DOCTYPE html>
<html lang="en">

<!-- Head Title -->
@extends('app-layout.head')
@section('title', 'Edit Outlet')

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
                            <h1><b>Edit Outlet</b></h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">Home</a></li>
                                <li class="breadcrumb-item">Outlet</li>
                                <li class="breadcrumb-item active">Edit Outlet</li>
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
                                    <h3 class="card-title">Edit Outlet</h3>
                                </div>

                                <!-- form contents -->
                                <form action="{{ route('update-outlet', $outlet->id_outlet) }}" method="POST">
                                    {{ csrf_field() }}

                                    <!-- card-body -->
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Outlet</label>
                                            <input type="text" id="nama_outlet" name="nama_outlet" class="form-control"
                                                placeholder="Nama Outlet" value="{{ $outlet->nama_outlet }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <textarea type="text" id="alamat" name="alamat" class="form-control" placeholder="Alamat Outlet">{{ $outlet->alamat }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Email</label>
                                            <input type="text" id="email" name="email" class="form-control"
                                                placeholder="Email Outlet" value="{{ $outlet->email }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Barang</label>
                                            <select id="id_gudang" name="id_gudang" class="form-control" required>
                                                <option disabled value>Pilih Barang</option>
                                                @foreach ($gudang as $item)
                                                    <option {{ $item->id_gudang == $outlet->id_gudang ? 'selected' : '' }}
                                                        value="{{ $item->id_gudang }}"> {{ $item->nama_barang }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Jumlah Stok</label>
                                            <input type="number" id="jumlah_stok" name="jumlah_stok" class="form-control"
                                                placeholder="Stok Outlet" value="{{ $outlet->jumlah_stok }}">
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
