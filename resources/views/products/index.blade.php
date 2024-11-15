<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nama: Yusran Haliq Larisi</title>
    <!-- Link CDN Bootstrap 5-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet" />
</head>

<body>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="container mt-5">
                    <h1 class="text-center">Kelola Data Penjualan Sepatu</h1>
                    <p class="lead text-center">Tes Interview Main Dealer Anugerah Perdana CRUD menggunakan Laravel, dengan konsep SPA ( Single Page Application ) .</p>
                    <div class="text-center">

                        <a href="{{ route('products.create') }}" class="btn btn-md btn-primary mb-3">Tambah Data</a>
                    </div>
                </div>
                <div class="card border-2 shadow-sm rounded">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Product</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Stock</th>
                                    <th scope="col" style="width: 12%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($products as $product)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="text-start">
                                        <img src="{{ asset('/storage/products/'.$product->image) }}" class="rounded" style="width: 200px; height:120px; background-size: cover; object-fit: cover">
                                        <!-- <img src="{{ asset('/storage/products/running-shoes-2048px-9718.jpg') }}" class="rounded" style="width: 150px"> -->
                                    </td>
                                    <td>{{ $product->title }}</td>
                                    <td>{{ "Rp." . number_format($product->price,2,',','.') }}</td>
                                    <td>{{ $product->stock }}</td>
                                    <!-- <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('products.destroy', $product->id) }}" method="POST">
                                            <a href="{{ route('products.show', $product->id) }}" class="btn btn-sm btn-success"><i class="bi bi-search"></i> </a>
                                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-primary"><i class="bi bi-pencil-fill"></i> </a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"><i class="bi bi-trash3-fill"></i> </button>
                                        </form>
                                    </td> -->
                                    <td class="text-center">
                                        <form id="delete-form-{{ $product->id }}" action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-sm btn-success"><i class="bi bi-search"></i> </a>
                                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-primary"><i class="bi bi-pencil-fill"></i> </a>
                                        <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete({{ $product->id }})"><i class="bi bi-trash3-fill"></i> </button>
                                    </td>
                                </tr>
                                @empty
                                <div class="alert alert-danger">
                                    Data Products belum Tersedia.
                                </div>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11" defer></script>
    <!--  jQuery Ajax-->
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->


    <script>
    function confirmDelete(productId) {
        Swal.fire({
            title: 'Apakah Kamu Yakin?',
            text: "Anda tidak bisa mengembalikan data setelah dihapus!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus jo!'
        }).then((result) => {
            if (result.isConfirmed) {
                // If confirmed, submit the form
                document.getElementById('delete-form-' + productId).submit();
            }
        });
    }
</script>

    <script>
        // SweetAlert untuk pesan berhasil dan gagal
        document.addEventListener('DOMContentLoaded', function() {
            @if(session('success'))
            Swal.fire({
                icon: "success",
                title: "BERHASIL",
                text: @json(session('success')),
                showConfirmButton: false,
                timer: 2000
            });
            @elseif(session('error'))
            Swal.fire({
                icon: "error",
                title: "GAGAL!",
                text: @json(session('error')),
                showConfirmButton: false,
                timer: 2000
            });
            @endif
        });
    </script>

</body>

</html>