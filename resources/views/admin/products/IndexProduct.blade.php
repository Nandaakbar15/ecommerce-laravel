@extends('admin.layouts.main')

@section('content')
    <div class="row">
        <h1>Data Produk</h1>
        <h2><a href="/admin/create-products" class="btn btn-primary">Tambah Produk</a></h2>
        <div class="card">
            <div class="card-body">
                <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID Produk</th>
                        <th scope="col">Gambar Produk</th>
                        <th scope="col">Nama Produk</th>
                        <th scope="col">Description</th>
                        <th scope="col">Stok</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $data)
                        <tr>
                            <td>{{ $data->id_produk }}</td>
                            <td><img src="{{ asset('images/' . $data->image) }}" width="200px" height="200px"></td>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->description }}</td>
                            <td>{{ $data->stock }}</td>
                            <td>
                                <a href="/admin/edit-product/{{ $data->id_produk }}" class="btn btn-info">Edit</a>
                            </td>
                            <td>
                                <form action="/admin/delete-product/{{ $data->id_produk }}" class="d-inline" method="POST">
                                    @method("delete")
                                    <button class="btn btn-danger" onclick="return confirm('Yakin mau hapus data ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    {{ $products->links() }}
                </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
