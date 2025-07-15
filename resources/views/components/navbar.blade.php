<div>
    <nav class="navbar navbar-expand-lg p-3 bg-white shadow-sm">
    <div class="container d-flex justify-content-between align-items-center">
        <a class="navbar-brand text-gray-800 fw-semibold fs-4" href="/">Tekno Komputer</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
            <ul class="navbar-nav mb-2 mb-lg-0 mx-auto">
                <li class="nav-item">
                    <a class="nav-link active text-gray-700 fw-medium custom-underline-hover" aria-current="page" href="/">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-gray-700 fw-medium custom-underline-hover" href="/categories">Kategori</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-gray-700 fw-medium custom-underline-hover" href="/products">Produk</a>
                </li>
            </ul>

            <div class="d-flex align-items-center">
                @if (auth()->guard('customer')->check())
                    <x-cart-icon class="text-gray-600 me-3"></x-cart-icon>

                    <div class="dropdown">
                        <a class="btn btn-outline-secondary dropdown-toggle" href="#" role="button" id="userDropdown"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::guard('customer')->user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end shadow-lg" aria-labelledby="userDropdown">
                            <li><a class="dropdown-item text-gray-700" href="#">Dashboard</a></li>
                            <li>
                                <form method="POST" action="{{ route('customer.logout') }}">
                                    @csrf
                                    <button class="dropdown-item text-gray-700" type="submit">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @else
                    <a class="btn text-white me-2" style="background:rgb(19, 79, 169);" href="{{ route('customer.login') }}">Login</a>
                    <a class="btn text-white" style="background:rgb(19, 79, 169);" href="{{ route('customer.register') }}">Register</a>
                @endif
            </div>
        </div>
    </div>
</nav>
<style>
    .custom-underline-hover {
        position: relative;
        display: inline-block;
        text-decoration: none;
        color: #4a4a4a; /* Default gray */
        transition: color 0.3s ease;
    }

    .custom-underline-hover::after {
        content: "";
        position: absolute;
        width: 0;
        height: 2px;
        display: block;
        margin-top: 5px;
        right: 0;
        background: #007bff; /* Bootstrap primary blue */
        transition: width 0.3s ease;
        -webkit-transition: width 0.3s ease;
    }

    .custom-underline-hover:hover {
        color: #007bff; /* Bootstrap primary blue */
    }

    .custom-underline-hover:hover::after {
        width: 100%;
        left: 0;
        background: #007bff;
    }
</style>

</div>