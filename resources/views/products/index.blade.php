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
    <style>
        .card img:hover {
            transform: scale(1.1);
            transition: all 0.3s ease-in-out;
        }
    </style>
</head>

<body style="background-color: #f0f0f0;">
    <div class="nav bg-danger  w-100 py-3 px-5">
        <h2 class="text-center text-white">Kelola Data Penjualan Sepatu</h2>
    </div>
    <div class="px-5 py-3 bg-white w-100">
        <!-- <img src=".../storage/app/public/products/uFtv9I7CLoplcs5Dj4ZXwaFySJKVJ2RBFk3FTyR6.jpg" alt=""> -->
        <div class="row px-5 py-3 ">
            <div class="col-md-4">
                <img src="{{ asset('/storage/Toko-sepatu.jpg') }}" class="rounded " style="width: 350px; height:180px; background-size: cover; object-fit: cover">
            </div>
            <div class="col-md-3 d-flex justify-content-end flex-column gap-1">
                <h6> <i class="bi bi-shop me-2 fs-4"></i> Jenis Product : 50</h6>
                <h6><i class="bi bi-inboxes-fill me-2 fs-4"></i> Total Stock : 50</h6>
                <h6>
                    <p class=" mt-2  b-0">
                        4.8
                        <i class="bi bi-star-fill text-warning "></i>
                        <i class="bi bi-star-fill text-warning "></i>
                        <i class="bi bi-star-fill text-warning "></i>
                        <i class="bi bi-star-fill text-warning "></i>
                        <i class="bi bi-star-fill text-warning me-2"></i>|
                        10K+ Sold
                    </p>
                </h6>
                <a href="{{ route('products.create') }}" class="btn btn-md btn-primary mb-3 " style="width: 15rem;">Add Product</a>
            </div>
            <div class="col-md-4 d-flex justify-content-end align-items-end flex-column gap-3">
                <span class="mb-3 text-success">
                    <h4>Total Penjualan : Rp. 6.000.000</h4>
                </span>

            </div>
        </div>
    </div>


    <div class="list px-5 mt-5">
        <h2>Your List Product</h2>
        <div class="w-100 row d-flex justify-content-center gap-3 ">
            <!-- Card Product -->
            @forelse ($products as $product)
            <div class="card p-2" style="width: 16rem; overflow: hidden;">
                <a href="{{ route('products.show', $product->id) }}" style="height: 100%; text-decoration: none; margin: -4px;">
                    <img src="{{ asset('/storage/products/'.$product->image) }}" class="rounded" style="width: 100%; height:180px; background-size: cover; object-fit: cover">
                    <div class="card-body">
                        <h6 class="text-dark">{{ $product->title }}</h6>
                        <h5><span class="fw-bold text-success">{{ "Rp." . number_format($product->price,2,',','.') }}</span></h5>
                        <form id="delete-form-{{ $product->id }}" action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                        <hr class="mb-1">
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-primary mx-1"><i class="bi bi-pencil-fill"></i> </a>
                        <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete('{{ $product->id }}')"><i class="bi bi-trash3-fill"></i> </button>
                        <a type="text" class="btn btn-sm  border text-warning text-end ms-3">Discount 25%</a>

                        <hr class="mt-1">
                        <p class="mt-2 mb-0"><i class="bi bi-star-fill text-warning me-2"></i>4.8 10K+ Sold</p>
                    </div>
                </a>
            </div>
            @empty
            <div class="alert alert-danger">
                Data Products belum Tersedia.
            </div>
            @endforelse
        </div>
    </div>

    <!-- Modal Detail Produk -->
    <!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content rounded-15 px-4 ">
                <div class="modal-header py-5 ">
                    <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close" style="z-index:12; border:3px solid #fff; border-radius:50%;"></button>
                    <div class="background gradient rounded-15 px-4" style="position:absolute; top:0; left:0; width: 100%;  height:7rem; overflow:hidden;"></div>
                </div>
                <div class="col-sm-12 d-flex flex-column justify-content-start align-items-start mb-2 ">
                    <span class="d-flex justify-content-end gap-2 col-md-12 w-100">
                        <a type="submit" class="mt-1 text-decoration-none rounded text-dark px-2 py-1" data-bs-dismiss="modal" style="background-color: #fff; border: 1px solid #ddd; font-size:14px;">
                            <i class="bi bi-gear"></i> Options
                        </a>
                        <a type="submit" class="mt-1 text-decoration-none rounded text-dark px-2 py-1" data-bs-dismiss="modal" style="background-color: #fff; border: 1px solid #ddd; font-size:14px;">
                            <i class="bi bi-link"></i> Copy link
                        </a>
                    </span>
                    <img src="https://loremflickr.com/200/200?random=1" data-bs-toggle="modal" data-bs-target="#modal_employe" data-id="1" style="position:relative; margin-top:-7.5rem; margin-left:0.2rem; height: 8rem; width: 8rem; border-radius: 50%; border: 3px solid #fff; cursor:pointer" alt="" />
                    <div class="text-dark p-0 mb-2 mt-2">
                        <div class="d-flex align-items-center">
                        </div>
                        <h3 class="m-0">aaaaa</h3>
                        <div class="row d-flex">
                            <div class="d-flex align-items-center">
                                <div class="dot m-0" style="height: 12px; width: 12px; border-radius: 50%; z-index:1;background-color: #22DD22; border:2px solid white; position:relative;"></div>
                                <p class="m-0 fs-6 ms-2">aaaaa</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-body">
                    <hr style="border: 0.8px solid #3333;">
                    <div class="mb-3 row d-flex align-items-center">
                        <h6 class="col-sm-4">Divisi</h6>
                        <div class="col-sm-8" style="height: auto; padding: 0.375rem 0.75rem; font-size: 1rem; font-weight: 600; border: 1px solid #ddd; border-radius: 0.25rem;">
                            <h6>aaaaa</h6>
                        </div>
                    </div>
                    <hr style="border: 0.8px solid #3333;">
                    <div class="mb-3 row d-flex align-items-center">
                        <h6 class="col-sm-4">Email</h6>
                        <div class="col-sm-8" style="height: auto; padding: 0.375rem 0.75rem; font-size: 1rem; font-weight: 600; border: 1px solid #ddd; border-radius: 0.25rem;">
                            <h6>aaaaaa</h6>
                        </div>
                    </div>
                    <hr style="border: 0.8px solid #3333;">
                    <div class="mb-3 row d-flex align-items-center">
                        <h6 class="col-sm-4">ID</h6>
                        <div class="col-sm-8" style="height: auto; padding: 0.375rem 0.75rem; font-size: 1rem; font-weight: 600; border: 1px solid #ddd; border-radius: 0.25rem;">
                            <h6>aaaaaaaa</h6>
                        </div>
                    </div>
                    <hr style="border: 0.8px solid #3333;">
                    <div class="mb-3 row d-flex align-items-center">
                        <h6 class="col-sm-4">Address</h6>
                        <div class="col-sm-8" style="height: auto; padding: 0.375rem 0.75rem; font-size: 1rem; font-weight: 600; border: 1px solid #ddd; border-radius: 0.25rem;">
                            <h6>aaaaaaaa</h6>
                        </div>
                    </div>
                    <hr style="border: 0.8px solid #3333;">
                    <a type="submit" class="mt-1 text-decoration-none" data-bs-dismiss="modal" style="color: red;"><i class="bi bi-trash3-fill me-2"></i> Delete user</a>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card border-0 shadow-sm rounded">
                            <div class="card-body">
                                <img src="{{ asset('/storage/products/'.$product->image) }}" class="rounded" style="width: 100%">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card border-0 shadow-sm rounded">
                            <div class="card-body">
                                <h3>{{ $product->title }}</h3>
                                <hr />
                                <h6>{{ "Rp " . number_format($product->price,2,',','.') }}</h6>
                                <h6>Stock : {{ $product->stock }}</h6>
                                <p>
                                <p>{!! $product->description !!}</p>
                                </p>
                                <hr />

                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-primary"><i class="bi bi-pencil-fill"></i> Edit Data</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div> -->

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="container my-5 bg-white p-4">
                    <p class="lead text-center">Tes Interview Main Dealer Anugerah Perdana CRUD menggunakan Laravel.</p>
                    <h5 class="text-center">
                        <span class="text-danger">*</span>Link GDrive Soal No. 1 DFD:<a href="https://drive.google.com/file/d/1Qlz-nHEXEfpUOCaWnxH42D0ZVpbDoqkV/view?usp=sharing"> DFD sederhana mengenai penjualan Sepatu</a>
                    </h5>
                    <div class="text-center">
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
            console.log(@json(session('success'))); // Debug output di console
        });
    </script>

</body>

</html>