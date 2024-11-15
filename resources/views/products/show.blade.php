<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nama: Yusran Haliq Larisi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet" />
</head>

<body style="background-color: #f0f0f0;">
    <div class="nav bg-danger  w-100 py-3 px-5">
        <h2 class="text-center text-white">Kelola Data Penjualan Sepatu</h2>
    </div>
    <div class="container mt-5 mb-5">
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
                        <p class="mt-2 m   b-0">
                            4.8
                            <i class="bi bi-star-fill text-warning "></i>
                            <i class="bi bi-star-fill text-warning "></i>
                            <i class="bi bi-star-fill text-warning "></i>
                            <i class="bi bi-star-fill text-warning "></i>
                            <i class="bi bi-star-fill text-warning me-2"></i>|
                            10K+ Sold
                        </p>
                        <hr />
                        <div class="container">
                            <h3 class=" bg-warning p-2 m-0">Flash Shale</h3>
                            <div class="price px-4 py-3 m-0" style="background-color: #f0f0f0;">
                                <h1 > <span class="fw-bold text-success">{{ "Rp " . number_format($product->price,2,',','.') }}</span></h1>
                                <h4>Stock : {{ $product->stock }}</h4>
                            </div>
                            <p>
                            <p>{!! $product->description !!}</p>
                            </p>
                            <hr />
                        </div>

                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-primary"><i class="bi bi-pencil-fill"></i> Edit Data</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>