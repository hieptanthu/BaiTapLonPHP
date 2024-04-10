@props(['items', 'menu'])

@if ($items->items() == [])
    <x-khongCoSanpham></x-khongCoSanpham>
@else
    <x-app-layout>

        <!-- ***** Products Area Starts ***** -->
        <section class="section" id="products">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-heading">
                            @if ($menu == null)
                                <h2>Our Latest Products</h2>
                                <span>Check out all of our products.</span>
                            @else
                                @foreach ($menu as $item)
                                    @if ($item->id == $items[0]->category_id)
                                        <h2>sản phẩm của {{ $item->name }}</h2>
                                        <span>kiểm tra tất cả sản phẩm của {{ $item->name }}</span>
                                    @endif
                                @endforeach

                            @endif

                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    @foreach ($items as $item)
                        <div class="col-lg-3">
                            <div class="item">
                                <div class="thumb">
                                    <div class="hover-content">
                                        <ul>
                                            <li><a href="{{ route('product', $item->id) }}"><i class="fa fa-eye"></i></a>
                                            </li>
                                            <li><a href="single-product.html"><i class="fa fa-star"></i></a></li>
                                            <li><a href="{{ route('product', $item->id) }}"><i class="fa fa-eye"></i></a>

                                        </ul>
                                    </div>
                                    <img src="/{{ $item->thumbnail }}" alt="">
                                </div>
                                <div class="down-content">
                                    <h4>{{ $item->name }}</h4>
                                    <span>{{ $item->discount }}Vnd</span>
                                    <ul class="stars">
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="col-lg-12">
                        <div class="pagination">
                            <ul>
                                <li class="page-item">
                                    <a class="page-link bi bi-caret-left-fill "
                                        href="/Category/products/38?page={{ $items->currentPage() - 1 }}">
                                        < </a>
                                </li>

                                {{-- {{dd($productes->links())}} --}}
                                @foreach ($items->links()->elements as $item)
                                    @if ($item == '...')
                                        <li class="disabled"><span>...</span></li>
                                    @else
                                        @foreach ($item as $index => $url)
                                            <li class="page-item {{ $items->currentPage() == $index ? 'active' : '' }}">
                                                <a class="page-link" href="{{ $url }}">{{ $index }}</a>
                                            </li>
                                        @endforeach
                                    @endif
                                @endforeach
                                <li class="page-item">
                                    <a class="page-link bi bi-caret-right-fill"
                                        href="/Category/products/38?page={{ $items->currentPage() + 1 }}">></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script>
            function addtoCart(event) {
                // event.preventDefault();
                let urlcart = $(this).data('url');

                $.ajax({
                    type: "GET",
                    url: urlcart,
                    dataTyper: 'json',
                    success: function(data) {

                    },
                    error: function(xhr) {
                        // Xử lý lỗi
                    }
                });

            }
            $(function() {
                $('.addCart').on('click', addtoCart);


            })
        </script>


    </x-app-layout>

@endif

<!-- ***** Products Area Ends ***** -->
