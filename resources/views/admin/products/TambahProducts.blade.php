@extends('admin.layouts.main')

@section('content')
    <div class="row">
        <h1>Form Tambah Produk</h1>
        <div class="card">
            <div class="card-body">
                <form action="/admin/addProduct" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Produk</label>
                        <input type="email" class="form-control @error('name') is-invalid @enderror" id="name" name="name">

                        @error('name')
                            <div class="is-invalid">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi</label>
                        <input type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description">

                        @error('description')
                            <div class="is-invalid">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="stock" class="form-label">Stock</label>
                        <input type="number" class="form-control @error('stock') is-invalid @enderror" id="stock" name="stock">

                        @error('stock')
                            <div class="is-invalid">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Deskripsi</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">

                        @error('image')
                            <div class="is-invalid">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
        <h2><a href="/admin/home" class="btn btn-secondary">Kembali</a></h2>
    </div>
@endsection
