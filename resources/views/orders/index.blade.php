<x-layout>

    <div id="page-wrapper">
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    {{-- <form action="{{ route('Product.index') }}" method="GET">
                        @csrf @method('post')
                      
                        <button style="margin-left: 50%;" class="btn btn-primary">tìm kiếm</button>
                    </form> --}}
                  



                    <div class="panel panel-default">

                        


                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>stt</th>
                                            <th>fullname</th>
                                            <th>email</th>
                                            <th>note</th>
                                            <th>total_money</th>
                                            <th>trạng thái</th>
                                            <th>hoạt động</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($dd as $index =>$item)
                                        <tr class="{{ $loop->index % 2 == 0 ? 'info' : '' }}">
                                            <td>
                                                {{ $loop->index + 1 }}
                                            </td>
                                            <td>
                                                {{ $item->fullname}}
                                            </td>
                                            <td>
                                                {{ $item->email}}
                                            </td>
                                            <td>
                                                {{ $item->note}}
                                            </td>
                                            <td>
                                                {{ $item->total_money}}
                                            </td>
                                            <td>
                                                
                                                @if ( $item->status==0)
                                                    Chưa xử lý
                                                @else
                                                    đã sử lý
                                                @endif
                                            </td>
                                            <td>
                                                <a class="btn btn-warning"
                                                href="{{ route('oders.show', $item) }}">show </a>
                                            </td>
                                        @endforeach
                                          



                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>

                    </div>
                    <div style="Page custom-pagination">
                        <ul class="pagination custom-pagination" style="">
                            <li class="page-item">
                                <a class="page-link bi bi-caret-left-fill"
                                    @if($dd->currentPage() == 1) disabled @endif
                                    href="/oders?page={{ $dd->currentPage() - 1 }}">
                                    trang trước
                                </a>
                            </li>
                            
                            {{-- {{dd($productes->links())}} --}}
                            @foreach ($dd->links()->elements as $item)
                                @if ($item == '...')
                                    <li class="disabled"><span>...</span></li>
                                @else
                                    @foreach ($item as $index => $url)
                                        <li class="page-item {{ $dd->currentPage() == $index ? 'active' : '' }}">
                                            <a class="page-link" href="{{ $url }}">{{ $index }}</a>
                                        </li>
                                    @endforeach
                                @endif
                            @endforeach
                            <li class="page-item">
                                <a class="page-link bi bi-caret-right-fill"
                                    href="/oders?page={{ $dd->currentPage() + 1 }}">Trang Sau</a>
                            </li>
                        </ul>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

  


</x-layout>
