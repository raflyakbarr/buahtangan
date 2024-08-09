
@extends('layouts.app')
@section('content')
<style>
    .custom-file-upload {
        position: relative;
        overflow: hidden;
        display: inline-block;
        width: 100%;
    }
    .file-input {
        position: absolute;
        left: 0;
        top: 0;
        opacity: 0;
        cursor: pointer;
        width: 100%;
        height: 100%;
    }
    .file-label {
        display: inline-block;
        padding: 10px 15px;
        background-color: #f8f9fa;
        border: 1px solid #ced4da;
        border-radius: 4px;
        cursor: pointer;
        width: 100%;
        text-align: center;
        transition: all 0.3s;
    }
    .file-label:hover {
        background-color: #e9ecef;
    }
    .file-name {
        margin-top: 5px;
        display: block;
        font-size: 0.9em;
        color: #6c757d;
    }
</style>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <div class="container-fluid py-4 px-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-md-flex align-items-center mb-3 mx-2">
                        <a href="{{ route('products.index') }}" class="mb-md-0 mb-3">
                            <button type="button" class="btn btn-dark bi bi-arrow-left">Kembali</button>
                        </a>
                        <div class="d-flex align-items-center mb-0 ms-md-auto mb-sm-0 mb-2 me-2">
                            <h3 class="font-weight-bold mb-0">
                                Tambah Produk
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="my-3">
                    <form id="product-form" action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Name:</strong>
                                    <input type="text" name="name" class="form-control" placeholder="Name" required>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Description:</strong>
                                    <textarea class="form-control" style="height:150px" name="description" placeholder="Description"></textarea>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Price:</strong>
                                    <input type="text" name="price" class="form-control" placeholder="Price" required>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Kategori Produk:</strong>
                                    <select name="category_id" class="form-control">
                                        <option value="">Pilih Kategori</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Url Produk:</strong>
                                    <input type="text" name="product_url" class="form-control" placeholder="Url Produk">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                                <div id="image-preview" class="row"></div>
                                <div class="form-group">
                                    <div class="custom-file-upload mt-3">
                                        <input type="file" name="images[]" id="images" multiple onchange="previewImages()" hidden>
                                        <label for="images" class="file-label">
                                            <i class="bi bi-cloud-upload"></i> Pilih Gambar
                                        </label>
                                        <span class="file-name">Tidak ada gambar dipilih.</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-3">
                                <button type="submit" class="btn btn-dark">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
        </div>
    </main>
    <script>
        document.getElementById('product-form').addEventListener('submit', function(event) {
            event.preventDefault();

            let form = document.getElementById('product-form');
            let formData = new FormData(form);

            fetch(form.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Added Successfully',
                        text: data.message,
                    }).then(() => {
                        window.location.href = form.action.replace('/store', '/index');
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: data.message,
                    });
                }
            })
            .catch(error => {
                Swal.fire({
                    icon: 'error',
                    title: 'An Error Occurred',
                    text: 'Something went wrong with the request.',
                });
            });
        });
        document.getElementById('images').addEventListener('change', function(e) {
        var files = e.target.files;
        var fileNames = [];
        
            for (var i = 0; i < files.length; i++) {
                fileNames.push(files[i].name);
            }

            if (fileNames.length > 0) {
                document.querySelector('.file-name').textContent = fileNames.join(', ');
            } else {
                document.querySelector('.file-name').textContent = 'Tidak ada gambar dipilih.';
            }
        });
        function previewImages() {
        var preview = document.getElementById('image-preview');
        preview.innerHTML = ""; // Kosongkan area preview sebelum menambahkan gambar baru
        var files = document.getElementById('images').files;

        if (files) {
            for (var i = 0; i < files.length; i++) {
                var reader = new FileReader();

                reader.onload = function(event) {
                    var colDiv = document.createElement('div');
                    colDiv.className = 'col-md-3';
                    var img = document.createElement('img');
                    img.src = event.target.result;
                    img.style.maxWidth = '100%';
                    img.style.marginBottom = '10px';
                    img.className = 'img-thumbnail'; // Menambahkan kelas Bootstrap untuk thumbnail
                    colDiv.appendChild(img);
                    preview.appendChild(colDiv);
                };

                reader.readAsDataURL(files[i]);
            }
        }
    }
    </script>
@endsection
