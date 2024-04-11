<x-app-layout>
   
   
    <div class="page-heading" id="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-content">
                        
                        <h2>Check Our Products</h2>
                        <span>sản phẩm đến từ Hiệp</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-products :menu="$menu" :items="$products" />
   
</x-app-layout>