
@extends('layouts.app')
@section('content')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <div class="container py-4 px-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-md-flex align-items-center mb-3 mx-2">
                        <h3 class="font-weight-bold mb-0">
                            List Produk
                        </h3>
                        <div class="d-flex align-items-center mb-0 ms-md-auto mb-sm-0 mb-2 me-2">
                            <button onclick="refreshPage()" class="btn btn-dark bi bi-arrow-clockwise"> Refresh</button>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="my-3">
            <div class="row">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-10">
                            <div class="pull-right">
                                <a class="btn btn-success" href="{{ route('products.create') }}"> Create New Product</a>
                                <a href="{{ route('products.exportExcel') }}" class="btn btn-outline-success">
                                    <i class="bi bi-download me-1"></i> to Excel
                                </a>
                            </div>
                        </div>
                    </div>
					<table id="productsTable" class="table table-bordered" datatable>
						<thead>
							<tr class="text-center">
								<th>No</th>
								<th>Name</th>
								<th>Description</th>
								<th>Price</th>
								<th>Kategori</th>
								<th>Image</th>
								<th width="280px">Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($products as $product)
							<tr class="text-center">
								<td>{{ $loop->iteration }}</td>
								<td>{{ $product->name }}</td>
								<td>{{ Str::limit(html_entity_decode(strip_tags($product->description)), 50) }}</td>
								<td>{{ $product->price }}</td>
								<td>{{ optional($product->category)->name }}</td>
								@php
                                    // Decode the images JSON string into an array
                                    $images = is_string($product->images) ? json_decode($product->images, true) : $product->images;
                                @endphp

                                <td>
                                    @if (is_array($images) && !empty($images))
                                        <img src="{{ asset($images[0]) }}" alt="{{ $product->name }}" width="100">
                                    @else
                                        <span>No image available</span>
                                    @endif
                                </td>

								<td>
									<form action="{{ route('products.destroy', $product->id) }}" method="POST">
										<a class="btn btn-dark" href="{{ route('products.show', $product->id) }}"><i class="bi bi-eye"></i></a>
										<a class="btn btn-primary" href="{{ route('products.edit', $product->id) }}"><i class="bi bi-pencil-square"></i></a>
										@csrf
										@method('DELETE')
										<button type="button" class="btn btn-danger btn-delete" data-id="{{ $product->id }}" data-name="{{ $product->name }}"><i class="bi bi-trash3"></i></button>
									</form>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
                </div>
            </div>
        </div>
    </main>
    @push('scripts')
        <script type="module">
            $(document).ready(function() {
                $('#productsTable').DataTable();

                $('.btn-delete').on('click', function(e) {
                    e.preventDefault();
                    var form = $(this).closest('form');
                    var productId = $(this).data('id');
                    var name = $(this).data("name");

                    Swal.fire({
                        title: 'Anda yakin ingin menghapus\n' + name + '?' ,
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        </script>
        <script>
            function refreshPage() {
                window.location.reload();
            }
        </script>
    @endpush
@endsection

