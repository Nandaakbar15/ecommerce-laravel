@extends('admin.layouts.main')

@section('content')
    <div class="row">
        <h1>Form Ubah Kategori</h1>
        <div class="card">
            <div class="card-body">
                <form action="/admin/updatecategories/{{ $categories->id_kategori }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Kategori</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" autofocus value="{{ old('name', $categori->name) }}">

                        @error('name')
                            <div class="is-invalid">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="quantity" class="form-label">Jumlah Produk</label>
                        <input type="number" class="form-control @error('quantity') is-invalid @enderror" id="quantity" name="quantity" autofocus value="{{ old('quantity', $category->quantity) }}">

                        @error('quantity')
                            <div class="is-invalid">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Ubah</button>
                </form>
            </div>
        </div>
        <h2><a href="/admin/categories" class="btn btn-secondary">Kembali</a></h2>
    </div>
@endsection
