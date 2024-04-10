<x-layout>
    <div id="page-wrapper">
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">


                        <div style="distplay" class="panel-heading">
                            <h1>product_details</h1>
                            <a style="margin-left: 80%;" class="btn btn-primary"
                                href="{{ route('Product_details.create') }}">add</a>

                        </div>


                        <div class="panel-body">
                            <div class="table-responsive">
                                <form action="{{route('Product_detail.update', $product_details)}}"
                                method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>stt</th>
                                                <th>màu sắc</th>
                                                <th>quantity</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($product_details as $product_detail)
                                            <tr class="{{ $loop->index % 2 == 0 ? 'info' : '' }}">
                                                <td>
                                                    {{ $loop->index + 1 }}
                                                </td>
                                               <td> <input type="text" name="mauId{{$product_detail->id}}" value="{{$product_detail->color}}"></td>
                                               <td> {{$product_detail->quantity}}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </form>
                            </div>


                        </div>

                    </div>
               
                </div>
            </div>
        </div>
    </div>






</x-layout>
