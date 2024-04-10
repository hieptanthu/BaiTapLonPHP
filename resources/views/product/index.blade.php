<x-layout>
    <div id="page-wrapper">
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('Product.index') }}" method="GET">
                        @csrf @method('post')
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="dataTables_length" id="dataTables-example_length">
                                    <label>
                                        <select name="quantity" aria-controls="dataTables-example"
                                            class="form-control input-sm" control-id="ControlID-1">
                                            <option value="10">10</option>
                                            <option value="25">25</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                        </select> records per page
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div id="dataTables-example_filter" class="dataTables_filter">
                                    <label for="keyword">Search:<input type="search" class="form-control input-sm"
                                        aria-controls="dataTables-example" name="keyword" control-id="ControlID-2"></label>
                            </div>

                        </div>
                       
                    
                        <button style="margin-left: 50%;" class="btn btn-primary">tìm kiếm</button>
                    </form>
                    {{-- <form>
                        <form action="{{ route('Product.index') }}" method="GET">
                            @csrf
                            @method('post')
                            <label for="keyword">Search:<input type="search" class="form-control input-sm"
                                    aria-controls="dataTables-example" name="keyword" control-id="ControlID-2"></label>
                           
                        </form> --}}



                    <div class="panel panel-default">


                        <div style="distplay" class="panel-heading">
                            <h1>products</h1>
                            <a style="margin-left: 80%;" class="btn btn-primary"
                                href="{{ route('Product.create') }}">add</a>

                        </div>


                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>stt</th>
                                            <th>img</th>
                                            <th>name</th>
                                            <th>price</th>
                                            <th>discount</th>
                                            <th>details</th>
                                            <th>Off & On</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($productes as $product)
                                            <tr class="{{ $loop->index % 2 == 0 ? 'info' : '' }}">
                                                <td>
                                                    {{ $loop->index + 1 }}
                                                </td>
                                                <td>
                                                    
                                                    <img width="100px" src="/{{ $product->thumbnail }}" alt="">


                                                </td>
                                                <td>
                                                    {{ $product->name }}

                                                </td>
                                                <td>
                                                    {{ number_format($product->price, 0, ',', '.') }}
                                                    VND
                                                </td>
                                                <td>
                                                    {{ number_format($product->discount, 0, ',', '.') }}
                                                    VND

                                                </td>
                                                <td>
                                                    <a class="btn btn-primary"
                                                    href="{{ route('Product_details.show', $product) }}">Product details </a>
                                                  
                                                   
                    
                                                   
                                                    <a class="btn btn-warning"
                                                        href="{{ route('Product.edit', $product) }}">show </a>
                                                </td>
                                                <td>
                                                    @if ($product->delete != 2)
                                                        <form action="{{ route('Product.OnAndOffproduct', $product) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('put')
                                                            @if ($product->delete == 0)
                                                                <button class="btn btn-primary">on</button>
                                                            @else
                                                                <button class="btn btn-danger">off</button>
                                                            @endif
                                                        </form>
                                                    @else
                                                        <p>Category off</p>
                                                    @endif


                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>

                    </div>
                    <div style="Page custom-pagination">
                        <ul class="pagination custom-pagination" style="">
                            <li class="page-item">
                                <a class="page-link bi bi-caret-left-fill"
                                    @if($productes->currentPage() == 1) disabled @endif
                                    href="/Product?page={{ $productes->currentPage() - 1 }}">
                                    trang trước
                                </a>
                            </li>
                            
                            {{-- {{dd($productes->links())}} --}}
                            @foreach ($productes->links()->elements as $item)
                                @if ($item == '...')
                                    <li class="disabled"><span>...</span></li>
                                @else
                                    @foreach ($item as $index => $url)
                                        <li class="page-item {{ $productes->currentPage() == $index ? 'active' : '' }}">
                                            <a class="page-link" href="{{ $url }}">{{ $index }}</a>
                                        </li>
                                    @endforeach
                                @endif
                            @endforeach
                            <li class="page-item">
                                <a class="page-link bi bi-caret-right-fill"
                                    href="/Product?page={{ $productes->currentPage() + 1 }}">Trang Sau</a>
                            </li>
                        </ul>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="#searchResults"></div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


</x-layout>
