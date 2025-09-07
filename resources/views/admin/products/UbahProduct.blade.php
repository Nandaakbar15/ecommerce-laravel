@extends('admin.layouts.main')

@section('content')
    <div class="row">
        <h1>Form Ubah Produk</h1>
        <div class="card">
            <div class="card-body">
                <form action="/admin/update-product/{{ $product->id_produk }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    {{-- Input Nama Produk --}}
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Produk</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" autofocus value="{{ old('name', $product->name) }}">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Input Deskripsi --}}
                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{ old('description', $product->description) }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Input Stock --}}
                    <div class="mb-3">
                        <label for="stock" class="form-label">Stock</label>
                        <input type="number" class="form-control @error('stock') is-invalid @enderror" id="stock" name="stock" autofocus value="{{ old('stock', $product->stock) }}">
                        @error('stock')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Pilih Kategori --}}
                    <div class="mb-3">
                        <label for="id_kategori" class="form-label">Category</label>
                        <select class="form-control @error('id_kategori') is-invalid @enderror" id="id_kategori" name="id_kategori">
                            <option value="">Pilih Kategori</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id_kategori }}" {{ (old('id_kategori', $product->id_kategori) == $category->id_kategori) ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('id_kategori')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Input Gambar --}}
                    <div class="mb-3">
                        <label for="image" class="form-label">Gambar Produk</label>
                        @if ($product->image)
                            <img src="{{ asset('images/' . $product->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block" alt="Gambar produk lama">
                        @else
                            <img class="img-preview img-fluid mb-3 col-sm-5">
                        @endif
                        <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" id="image" onchange="previewImage()">
                        @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Ubah</button>
                </form>
            </div>
        </div>
        <h2><a href="/admin/products" class="btn btn-secondary">Kembali</a></h2>
    </div>

    <script>
        function previewImage() {
            const imageInput = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(imageInput.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection
