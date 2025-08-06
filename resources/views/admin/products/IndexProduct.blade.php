@extends('admin.layouts.main')

@section('content')
    <div class="row">
        <h1>Data Produk</h1>
        <h2><a href="/admin/addnewproducts" class="btn btn-primary">Tambah Produk</a></h2>
        <div class="card">
            <div class="card-body">
                <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nama Produk</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Stok</th>
                        <th scope="col">Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $data)
                        <tr>
                            <td>{{ $data['name_product'] }}</td>
                            <td>{{ $data['price'] }}</td>
                            <td>{{ $data['stock'] }}</td>
                            <td>{{ $data['quantity'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
