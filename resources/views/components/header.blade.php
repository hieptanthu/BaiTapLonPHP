@props(['menu'])
<header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="index.html" class="logo">
                        <img src="/assets/images/logo.png">
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
                        <li class="scroll-to-section"><a href="#women">block</a></li>

                        <li class="submenu">
                            <a href="javascript:;">Categor</a>
                            <ul>
                                @foreach ($menu as $item)
                                    <li><a href="{{ route('CategoryProduct', $item) }}">{{ $item->name }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="scroll-to-section"><a href="#kids">Contact Us</a></li>
                        <li class="scroll-to-section"><a href="#explore">About Us</a></li>
                        
                        <li class="scroll-to-section">
                            @if (Route::has('login'))
                                @auth
                                    <a href="{{ url('/dashboard') }}">
                                        Quản lý
                                    </a>
                                @else
                                    <a href="{{ route('login') }}">
                                        Log in
                                    </a>
                                @endauth
                            @endif
                        </li>
                        <li class="scroll-to-section"><a href="#explore"><svg xmlns="http://www.w3.org/2000/svg"width="26" height="26" fill="currentColor" class="bi bi-cart"viewBox="0 0 16 16"><path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l1.313 7h8.17l1.313-7zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2" /></svg></a></li>

                    </ul>
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
</header>
