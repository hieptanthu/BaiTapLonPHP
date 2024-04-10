@props(['item', 'menu', 'maus'])
<div class="page-heading" id="top">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="inner-content">
                    <h2>Single Product Page</h2>
                    <span>Awesome &amp; Creative HTML CSS layout by TemplateMo</span>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="section" id="product">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="left-images">
                    <img src="/{{ $item->thumbnail }}" alt="">
                    <img src="/{{ $item->thumbnail2 }}" alt="">
                </div>
            </div>

            <div class="col-lg-4">
                <form action="{{ route('addCart') }}" method="get">
                    @csrf
                    @method('put')
                    <div class="right-content">
                        <h4>{{ $item->name }}</h4>
                        <span class="price">{{ $item->discount }}</span>
                        <ul class="stars">
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                        </ul>
                        <span>{{ $item->title }}</span>
                        <div class="quote">
                            <i class="fa fa-quote-left"></i>
                            <p>{{ $item->description }}</p>
                        </div>
                        <div class="quantity-content">
                            <div>
                                <label class="" for="mau">màu </label>
                                <select style="    width: 80%;" id="" name="mau">

                                    @foreach ($maus as $item)
                                        <option value="{{ $item->id }}">{{ $item->color }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="left-content">

                            </div>
                            <div class="right-content">
                                <div class="quantity buttons_added">
                                    <input type="button" value="-" class="minus" control-id="ControlID-1"><input
                                        type="number" step="1" min="1" max="" name="quantity"
                                        value="1" title="Qty" class="input-text qty text" size="4"
                                        pattern="" inputmode="" control-id="ControlID-2"><input type="button"
                                        value="+" class="plus" control-id="ControlID-3">
                                </div>
                            </div>
                        </div>
                        <div class="total">
                            <h4>Total: $<span id="totalPrice">{{ $item->discount }}</span></h4>
                            <div class="main-border-button"><button style="border: solid #333">Add To Cart</button></div>
                        </div>
                    </div>
                <form>
            </div>
        </div>

    </div>


    <script src="/assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="/assets/js/popper.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="/assets/js/owl-carousel.js"></script>
    <script src="/assets/js/accordions.js"></script>
    <script src="/assets/js/datepicker.js"></script>
    <script src="/assets/js/scrollreveal.min.js"></script>
    <script src="/assets/js/waypoints.min.js"></script>
    <script src="/assets/js/jquery.counterup.min.js"></script>
    <script src="/assets/js/imgfix.min.js"></script>
    <script src="/assets/js/slick.js"></script>
    <script src="/assets/js/lightbox.js"></script>
    <script src="/assets/js/isotope.js"></script>
    <script src="/assets/js/quantity.js"></script>

    <!-- Global Init -->
    <script src="/assets/js/custom.js"></script>


    <script>
        // JavaScript code
        document.addEventListener("DOMContentLoaded", function() {
            var price = parseFloat(document.querySelector(".price").innerText); // Lấy giá trị giảm giá ban đầu
            var quantityInput = document.querySelector("input[name='quantity']"); // Lấy input số lượng

            $(document).ready(function() {
                // Lắng nghe sự kiện khi giá trị số lượng thay đổi
                $('input[name="quantity"]').on('input', function() {
                    var price = parseFloat($('.price').text()); // Lấy giá trị giảm giá
                    var quantity = parseInt($(this).val()); // Lấy giá trị số lượng

                    // Tính toán tổng giá trị mới
                    var totalPrice = price * quantity;

                    // Cập nhật nội dung của thẻ <h4>
                    $('#totalPrice').text(totalPrice.toFixed(
                        2)); // Hiển thị giá trị mới với hai số sau dấu thập phân
                });
            });
        });

        $(function() {
            var selectedClass = "";
            $("p").click(function() {
                selectedClass = $(this).attr("data-rel");
                $("#portfolio").fadeTo(50, 0.1);
                $("#portfolio div").not("." + selectedClass).fadeOut();
                setTimeout(function() {
                    $("." + selectedClass).fadeIn();
                    $("#portfolio").fadeTo(50, 1);
                }, 500);

            });
        });
    </script>




</section>
