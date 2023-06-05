<!DOCTYPE html>
<html lang="en">

<!-- Head Title -->
@extends('app-layout.head')
@section('title', 'Tambah Pegawai')

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
                            <h1><b>Tambah Pegawai</b></h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">Home</li>
                                <li class="breadcrumb-item">Pegawai</li>
                                <li class="breadcrumb-item active">Tambah Pegawai</li>
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
                                    <h3 class="card-title">Tambah Pegawai</h3>
                                </div>

                                <!-- form contents -->
                                <form action="{{ route('update-pegawai', $pegawai->id_pegawai) }}" method="POST">
                                    {{ csrf_field() }}

                                    <!-- card-body -->
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input type="text" id="nama_pegawai" name="nama_pegawai" class="form-control"
                                                placeholder="Nama Pegawai" value="{{ $pegawai->nama_pegawai }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Jabatan</label>
                                            <select id="id_pengguna" name="id_pengguna" class="form-control" required>
                                                <option disabled value>Pilih Jabatan</option>
                                                @foreach ($pengguna as $item)
                                                    <option {{ $item->id_pengguna == $pegawai->id_pengguna ? 'selected' : '' }}
                                                        value="{{ $item->id_pengguna }}"> {{ $item->level }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Alamat</label>
                                            <textarea type="text" id="alamat" name="alamat" class="form-control"
                                                placeholder="Alamat Pegawai" required>{{ $pegawai->alamat }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">No Hp</label>
                                            <input type="number" id="no_hp" name="no_hp" class="form-control"
                                                placeholder="Nomor Hp" value="{{ $pegawai->no_hp }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Email</label>
                                            <input type="text" id="email" name="email" class="form-control"
                                                placeholder="Email" value="{{ $pegawai->email }}" required>
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
