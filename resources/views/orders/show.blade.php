<x-layout>
    <div id="page-wrapper">
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div style="float: right;" >
                        <a class=" btn btn-warning " href="{{ route('oders.print', $dd->id) }}">xem PDF</a>
                        <a  class="btn btn-primary" href="{{ route('oders.DownloadOder', $dd->id) }}">tải PDF</a>
                    </div>
                    <section class="content-header">
                        <h1>
                            Chi tiết đơn hàng
                        </h1>
                    </section>
                    <!-- Main content -->
                    <section class="content">
                        <!-- Default box -->
                        <div class="box">
                            <div class="box-header with-border">
                                <div class="row">
                                    
                                    <div class="col-md-12">
                                        <div class="container123  col-md-6" style="">
                                            <h4></h4>
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th class="col-md-4">Thông tin khách hàng</th>
                                                        <th class="col-md-6"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Thông tin người đặt hàng</td>
                                                        <td>{{ $dd->fullname }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Ngày đặt hàng</td>
                                                        <td>{{ $dd->created_at }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Số điện thoại</td>
                                                        <td>{{ $dd->phone_number }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Địa chỉ</td>
                                                        <td>{{ $dd->address }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Email</td>
                                                        <td>{{ $dd->email }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Ghi chú</td>
                                                        <td>{{ $dd->note }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <table id="myTable" class="table table-bordered table-hover dataTable"
                                            role="grid" aria-describedby="example2_info">
                                            <thead>
                                                <tr role="row">
                                                    <th class="sorting col-md-1">STT</th>
                                                    <th class="sorting_asc col-md-4">Tên sản phẩm</th>
                                                    <th class="sorting_asc col-md-4">loại</th>
                                                    <th class="">Giá tiền</th>
                                                    <th class="sorting col-md-2">Số lượng</th>
                                                    <th class="sorting col-md-2">total_money</th>
                                            </thead>
                                            <tbody>
                                            
                                          
                                               
                                                @foreach ($details as $key => $item)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $item['name'] }}</td>
                                                    <td>{{ $item['color'] }}</td>
                                                    <td>{{ number_format($item['discount']) }} VNĐ</td>
                                                    <td>{{ $item['quantily'] }}</td>
                                                    <td>{{ number_format($item['total_money']) }} VNĐ</td>
                                                </tr>
                                            @endforeach
                                                
                                                <tr>
                                                    <td colspan="3"><b>Tổng tiền</b></td>
                                                    <td colspan="1"><b
                                                            class="text-red">{{ number_format($dd->total_money) }} VNĐ</b>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <form action="{{ route('oders.update', $dd->id) }}" method="POST">
                                        <input type="hidden" name="_method" value="PUT">
                                        {{ csrf_field() }}
                                        <div class="col-md-8"></div>
                                        <div class="col-md-4">
                                            <div class="form-inline">
                                                <label>Trạng thái giao hàng: </label>
                                                <select name="status" class="form-control input-inline" style="width: 200px">
                                                    <option value="1" {{ $dd->status == 1 ? 'selected' : '' }}>Chưa giao</option>
                                                    <option value="2" {{ $dd->status == 2 ? 'selected' : '' }}>Đang giao</option>
                                                    <option value="3" {{ $dd->status == 3 ? 'selected' : '' }}>Đã giao</option>
                                                </select>
                                                <button class="btn btn-primary">Xử lý </button>
                                               
                                            </div>


                                        </div>
                                    </form>
                                </div>
                               
                            </div>
                        </div>
                    </section>

                </div>
            </div>
        </div>
    </div>






</x-layout>
