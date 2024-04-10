@props(['items', 'menu'])
<x-app-layout>
    <section class="section productHome" >
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-heading">
                        <h2>
                            @foreach ($menu as $item)
                                @if ($item->id == $items[0]->category_id)
                                    {{ $item->name }}
                                @endif
                            @endforeach
                        </h2>
                        <span>giới thiệu danh mục</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="women-item-carousel">
                        <div class="owl-women-item owl-carousel owl-loaded owl-drag">




                            <div class="owl-stage-outer">
                                <div
                                    class="owl-stage"style="width: 3800px; transform: translate3d(-1140px, 0px, 0px); transition: all 0s ease 0s;">
                                    @foreach ($items as $item)
                                        <div class="owl-item " style="width: 350px; margin-right: 30px;">
                                            <div class="item">
                                                <div class="thumb">
                                                    <div class="hover-content">
                                                        <ul>
                                                            <li><a href="{{ route('product', $item->id) }}"><i
                                                                        class="fa fa-eye"></i></a>
                                                            </li>
                                                            <li><a href="single-product.html"><i
                                                                        class="fa fa-star"></i></a>
                                                            </li>
                                                            <li><a href="{{ route('product', $item->id) }}"><i class="fa fa-eye"></i></a>
                                                        </ul>
                                                    </div>
                                                    <img src="{{ $item->thumbnail }}" alt="">
                                                </div>
                                                <div class="down-content">
                                                    <h4>{{ $item->name }}</h4>
                                                    <span>{{ $item->discount }}</span>
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


                                </div>
                            </div>
                            <div class="owl-nav"><button type="button" role="presentation" class="owl-prev"><span
                                        aria-label="Previous">‹</span></button><button type="button"
                                    role="presentation" class="owl-next"><span aria-label="Next">›</span></button>
                            </div>
                            <div class="owl-dots"><button role="button"
                                    class="owl-dot active"><span></span></button><button role="button"
                                    class="owl-dot"><span></span></button></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
