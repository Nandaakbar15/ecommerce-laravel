@extends('admin.layouts.main')

@section('content')
    <div class="row">
        <h1>Form Tambah Karyawan</h1>
        <div class="card">
            <div class="card-body">
                <form action="/admin/add-employee" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="nama_karyawan" class="form-label">Nama Karyawan</label>
                        <input type="text" class="form-control @error('nama_karyawan') is-invalid @enderror" id="nama_karyawan" name="nama_karyawan">

                        @error('nama_karyawan')
                            <div class="is-invalid">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat">

                        @error('alamat')
                            <div class="is-invalid">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="no_hp" class="form-label">Nomor HP</label>
                        <input type="text" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" name="no_hp">

                        @error('no_hp')
                            <div class="is-invalid">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="jabatan" class="form-label">Jabatan</label>
                        <input type="text" class="form-control @error('jabatan') is-invalid @enderror" id="jabatan" name="jabatan">

                        @error('jabatan')
                            <div class="is-invalid">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
            </div>
        </div>
    </div>
@endsection
