@extends('admin.layouts.main')

@section('content')
    <div class="row">
        <h1>Data Category</h1>
        <h2><a href="/admin/addnewcategories" class="btn btn-primary">Tambah Kategori</a></h2>
        <div class="card">
            <div class="card-body">
                <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID Kategori</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Jumlah Produk</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $data)
                        <tr>
                            <th scope="row">{{ $data->id_kategori }}</th>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->quantity }}</td>
                            <td>
                                <a href="/admin/ubahkategori/{{ $data->id_kategori }}" class="btn btn-info">Edit</a>
                            </td>
                            <td>
                                <form action="/admin/deletekategori/{{ $data->id_kategori }}">
                                    @method('delete')
                                    <button class="btn btn-danger" onclick="return confirm('Yakin mau hapus data ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    {{ $categories->links() }}
                </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
