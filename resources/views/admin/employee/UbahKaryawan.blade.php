@extends('admin.layouts.main')

@section('content')
    <div class="row">
        <h2>Form Ubah data karyawan</h2>
        <div class="card">
            <div class="card-body">
                <form action="/admin/update-employee" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="nama_karyawan" class="form-label">Nama Karyawan</label>
                        <input type="text" class="form-control @error('nama_karyawan') is-invalid @enderror" id="nama_karyawan" autofocus value="{{ old('nama_karyawan', $employee->nama_karyawan) }}">

                        @error('nama_karyawan')
                            <div class="is-invalid">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat Karyawan</label>
                        <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" autofocus value="{{ old('alamat', $employee->alamat) }}">

                        @error('alamat')
                            {{ $message }}
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="no_hp" class="form-label">Nomor Telepon Karyawan</label>
                        <input type="text" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" autofocus value="{{ old('no_hp', $employee->no_hp) }}">

                        @error('no_hp')
                            {{ $message }}
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="jabatan" class="form-label">Jabatan Karyawan</label>
                        <input type="text" class="form-control @error('jabatan') is-invalid @enderror" id="jabatan" autofocus value="{{ old('jabatan', $employee->jabatan) }}">

                        @error('jabatan')
                            {{ $message }}
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Ubah</button>
                </form>
            </div>
        </div>
        <h2><a href="/admin/employee" class="btn btn-secondary">Kembali</a></h2>
    </div>
@endsection
