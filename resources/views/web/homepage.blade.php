<x-layout>
    <x-slot name="title">Homepage</x-slot>

    <!-- Hero Section Full Width Blue -->
    <section class="py-5 text-white w-100" style="background: #0d6efd;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 mb-4 mb-md-0">
                    <h1 class="display-5 fw-bold mb-3">Selamat Datang di Tekno Komputer</h1>
                    <p class="lead mb-4">Temukan berbagai produk komputer dan teknologi berkualitas dengan harga terbaik. Belanja lebih mudah dan cepat di toko online kami.</p>
                    <a href="{{ url('/products') }}" class="btn btn-light btn-md me-2">Belanja Sekarang</a>
                    <a href="{{ url('/categories') }}" class="btn btn-outline-light btn-md">Lihat Kategori</a>
                </div>
                <div class="col-md-5 offset-md-1">
                    <img src="/logo-fix.png" alt="Tekno Komputer illustration" class="img-fluid rounded shadow">
                </div>
            </div>
        </div>
    </section>

    <div class="container py-3">
        <!-- Kategori Section -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 style="font-size: 1.5rem;">Kategori Produk</h3>
            <a href="{{ URL::to('/categories') }}" class="btn btn-outline-primary btn-sm">Lihat Semua Kategori</a>
        </div>
        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 g-3">
            @foreach ($categories as $category)
                <div class="col">
                    <a href="{{ URL::to('/category/' . $category->slug) }}" class="card text-decoration-none">
                        <div class="card category-card text-center h-100 py-3 border-0 shadow-sm">
                            <div class="mx-auto mb-2" style="width:64px;height:64px;display:flex;align-items:center;justify-content:center;background:#f8f9fa;border-radius:50%;">
                                <img src="{{ Storage::url($category->image) }}" alt="{{ $category->name }}" style="width:36px;height:36px;object-fit:contain;">
                            </div>
                            <div class="card-body p-2">
                                <h6 class="card-title mb-1 text-dark">{{ $category->name }}</h6>
                                <p class="card-text text-muted small text-truncate">{{ $category->description }}</p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>

    <div class="container py-3">
        <!-- Produk Section -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 style="font-size: 1.5rem;">Produk Kami</h3>
            <a href="{{ URL::to('/products') }}" class="btn btn-outline-primary btn-sm">Lihat Semua Produk</a>
        </div>
        <div class="row">
            @forelse($products as $product)
                <div class="col-md-3 mb-4">
                    <div class="card product-card h-100 shadow-sm">
                        <img src="{{ Storage::url($product->image_url) }}" class="card-img-top" alt="{{ $product->name }}">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text text-truncate">{{ $product->description }}</p>
                            <div class="mt-auto">
                                <span class="fw-bold text-primary">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                                <a href="{{ route('product.show', $product->slug) }}" class="btn btn-outline-primary btn-sm float-end">Lihat Detail</a>
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
