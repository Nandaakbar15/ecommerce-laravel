@extends('admin.layouts.main')

@section('content')
    <div class="row">
        <h1>Form Ubah Produk</h1>
        <input type="hidden" name="gambarLama" value="{{ $product->image }}">
        <div class="card">
            <div class="card-body">
                <form action="/admin/updateProduct" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Produk</label>
                        <input type="email" class="form-control @error('name') is-invalid @enderror" id="name" name="name" autofocus value="{{ old('name', $product->name) }}">

                        @error('name')
                            <div class="is-invalid">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi</label>
                        <input type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description" autofocus value="{{ old('description', $product->description) }}">

                        @error('description')
                            <div class="is-invalid">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="stock" class="form-label">Stock</label>
                        <input type="number" class="form-control @error('stock') is-invalid @enderror" id="stock" name="stock" autofocus value="{{ old('stock', $product->stock) }}">

                        @error('stock')
                            <div class="is-invalid">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        @if ($product->image)
                            <img src="{{ asset($product->image) }}" alt="" width="300px" height="200px">
                        @else
                            <img class="img-preview img-fluid mb-3 col-sm-5">
                        @endif
                        <div class="img-preview">
                            <label class="form-label" for="image">image</label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" id="image" onchange="previewImage()">

                            @error('image')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
        <script text="text/javascript">
            function previewImage() {
                const foto = document.querySelector('#foto');
                const imgPreview = document.querySelector('.img-preview');

                imgPreview.style.display = 'block';

                const oFReader = new FileReader();
                oFReader.readAsDataURL(foto.files[0]);

                oFReader.onload = function(oFREvent) {
                    imgPreview.src = oFREvent.target.result;
                }
            }
        </script>
        <h2><a href="/admin/products" class="btn btn-secondary">Kembali</a></h2>
    </div>
@endsection
