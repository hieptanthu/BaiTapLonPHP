<x-app-layout>
   
    <x-header :menu="$menu"/>
    <div class="page-heading" id="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-content">
                        
                        <h2>giỏ Hàng Của bạn</h2>
                        <span>sản phẩm đến từ Hiệp</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-cart  :cart="$cart"></x-cart>

    <x-footer/>
    <h1>okd</h1>
</x-app-layout>