<x-layout>
    <x-slot name="title">Homepage</x-slot>

    <!-- Hero Section Full Width Blue -->
    <section class="py-5 text-white w-100" style="background: rgb(19, 79, 169);">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 mb-4 mb-md-0">
                    <h1 class="display-5 fw-bold mb-3">Selamat Datang di Tekno Komputer</h1>
                    <p class="lead mb-4">Temukan berbagai produk komputer dan teknologi berkualitas dengan harga terbaik. Belanja lebih mudah dan cepat di toko online kami.</p>
                    <a href="{{ url('/products') }}" class="btn btn-light btn-md me-2">Belanja Sekarang</a>
                    <a href="{{ url('/categories') }}" class="btn btn-outline-light btn-md">Lihat Kategori</a>
                                    </div>
                    <div class="col-md-5 offset-md-1 text-center">
                        <img src="/logo-fix.png" alt="Tekno Komputer illustration" class="img-fluid rounded shadow text-end" style="max-height: 250px; object-fit: contain;">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Kategori Section -->
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold">Kategori Produk</h3>
            <a href="{{ URL::to('/categories') }}" class="btn btn-outline-primary btn-sm">Lihat Semua Kategori</a>
        </div>
        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 g-4">
            @foreach ($categories as $category)
                <div class="col">
                    <a href="{{ URL::to('/category/' . $category->slug) }}" class="text-decoration-none">
                        <div class="card text-center h-100 border-0 shadow-sm rounded-4 category-card">
                            <div class="mx-auto mt-4 mb-2" style="width: 64px; height: 64px; background: #f8f9fa; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                <img src="{{ Storage::url($category->image) }}" alt="{{ $category->name }}" style="width: 36px; height: 36px; object-fit: contain;">
                            </div>
                            <div class="card-body p-3">
                                <h6 class="card-title mb-1 text-dark">{{ $category->name }}</h6>
                                <p class="card-text text-muted small text-truncate">{{ $category->description }}</p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Produk Section -->
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold">Produk Kami</h3>
            <a href="{{ URL::to('/products') }}" class="btn btn-outline-primary btn-sm">Lihat Semua Produk</a>
        </div>
        <div class="row">
            @forelse($products as $product)
                <div class="col-md-3 mb-4">
                    <div class="card h-100 shadow-sm rounded-4 product-card border-0">
                        <img src="{{ Storage::url($product->image_url) }}" class="card-img-top rounded-top-4" alt="{{ $product->name }}" style="height: 180px; object-fit: cover;">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-semibold">{{ $product->name }}</h5>
                            <p class="card-text text-muted small text-truncate">{{ $product->description }}</p>
                            <div class="mt-auto d-flex justify-content-between align-items-center">
                                <span class="fw-bold text-primary">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                                <a href="{{ route('product.show', $product->slug) }}" class="btn btn-primary btn-sm rounded-pill">Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col">
                    <div class="alert alert-info">Belum ada produk pada kategori ini.</div>
                </div>
            @endforelse
        </div>

        <div class="d-flex justify-content-center w-100 mt-4">
            {{ $products->links('vendor.pagination.simple-bootstrap-5') }}
        </div>
    </div>
</x-layout>
