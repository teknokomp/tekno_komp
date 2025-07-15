<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? '' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    {{ $style ?? '' }}

    <style>
        body {
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
        }

        .category-card,
        .product-card {
            transition: transform 0.3s, box-shadow 0.3s;
            height: 100%;
        }

        .category-card:hover,
        .product-card:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 12px rgba(0, 123, 255, 0.3);
        }

        .category-img,
        .product-img {
            height: 140px;
            object-fit: cover;
        }

        .card-body {
            padding: 0.75rem;
        }

        .card-title {
            font-size: 1rem;
            margin-bottom: 0.5rem;
            font-weight: 600;
        }

        .card-text {
            font-size: 0.85rem;
            margin-bottom: 0.5rem;
            color: #6c757d;
        }

        .btn-sm {
            font-size: 0.8rem;
            padding: 0.25rem 0.5rem;
        }

        .rating {
            color: #ffc107;
            font-size: 0.85rem;
        }

        .cart-item {
            border-bottom: 1px solid #dee2e6;
            padding: 0.75rem 0;
        }

        .cart-img {
            width: 80px;
            height: 80px;
            object-fit: cover;
        }

        .cart-item-name {
            font-size: 1rem;
            font-weight: 500;
        }

        .cart-item-price,
        .cart-item-subtotal {
            font-size: 0.85rem;
        }

        .quantity-input {
            width: 60px;
            font-size: 0.85rem;
            padding: 0.25rem;
        }

        .total-section {
            font-size: 1rem;
        }

        @media (max-width: 576px) {
            .cart-img {
                width: 60px;
                height: 60px;
            }

            .cart-item-name {
                font-size: 0.9rem;
            }

            .cart-item-price,
            .cart-item-subtotal {
                font-size: 0.8rem;
            }

            .quantity-input {
                width: 50px;
            }
        }

        /* Footer Styling */
        footer {
            background:rgb(19, 79, 169); /* Bootstrap primary */
            color: #f8f9fa;
        }

        footer h5,
        footer h6 {
            font-weight: 600;
        }

        footer a {
            color: #f8f9fa;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        footer a:hover {
            color: #ffc107; /* Bootstrap warning (gold) for nice contrast */
        }

        footer hr {
            border-color: rgba(255, 255, 255, 0.2);
        }

        footer i {
            margin-right: 8px;
        }
    </style>
</head>

<body>

    <x-navbar></x-navbar>

    <div class="container-fluid py-4">
        {{ $slot }}
    </div>

    <footer class="pt-4 mt-5">
        <div class="container p-3">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <h5 class="mb-3">Tekno Komputer</h5>
                    <p class="small">Belanja perangkat komputer, aksesoris, dan kebutuhan teknologi dengan mudah dan terpercaya di toko kami.</p>
                </div>
                <div class="col-md-3 mb-3">
                    <h6 class="mb-3">Navigasi</h6>
                    <ul class="list-unstyled">
                        <li><a href="/">Beranda</a></li>
                        <li><a href="/products">Produk</a></li>
                        <li><a href="/categories">Kategori</a></li>
                        <li><a href="/contact">Kontak</a></li>
                    </ul>
                </div>
                <div class="col-md-3 mb-3">
                    <h6 class="mb-3">Kontak Kami</h6>
                    <ul class="list-unstyled small">
                        <li><i class="bi bi-envelope"></i>info@teknokomputer.com</li>
                        <li><i class="bi bi-telephone"></i> +62 856 6100 994</li>
                        <li><i class="bi bi-geo-alt"></i> Tegal, Indonesia</li>
                    </ul>
                </div>
            </div>
            <hr>
            <div class="text-center pb-3">
                <small>&copy; {{ date('Y') }} Tekno Komputer. All rights reserved.</small>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
