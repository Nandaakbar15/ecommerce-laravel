@extends('admin.layouts.main')

@section('content')
    <div class="row">
        <h1>Data Karyawan</h1>
        <h2><a href="/admin/createEmployee" class="btn btn-primary">Tambah Karyawan</a></h2>
        <div class="card">
            <div class="card-body">
                <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nama Karyawan</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Nomor HP</th>
                        <th scope="col">Jabatan</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employee as $data)
                        <tr>
                            <td>{{ $data->nama_karyawan }}</td>
                            <td>{{ $data->alamat }}</td>
                            <td>{{ $data->no_hp }}</td>
                            <td>{{ $data->jabatan }}</td>
                            <td>
                                <a href="/admin/edit-employee/{{ $data->id }}" class="btn btn-info">Edit</a>
                            </td>
                            <td>
                                <form action="/admin/delete-employee/{{ $data->id }}" method="POST">
                                    @method('delete')
                                    <button class="btn btn-danger" onclick="return confirm('Yakin mau hapus data ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
