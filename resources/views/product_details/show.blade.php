<x-layout>
    <div id="page-wrapper">
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">


                        <div style="distplay" class="panel-heading">
                            <h1>product_details</h1>
                            <button class="btn btn-primary btn-lg" style="margin-left: 80%;" data-toggle="modal"
                                data-target="#myModal">
                                ADD
                            </button>
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog"
                                aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="{{ route('Product_detail.store') }}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-hidden="true">&times;</button>
                                                <h4 class="modal-title" id="myModalLabel">Product_details </h4>
                                            </div>
                                            <input type="hidden" name="product_id" value="{{ $productId }}">
                                            <div class="modal-body">
                                                <label class="control-label" for="color">Input Name color</label>
                                                <input style="max-width: 500;" type="text" class="form-control"
                                                    id="color" name="color">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary active">ADD</button>
                                                <!-- Changed from type="button" to type="submit" -->
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>


                        </div>


                        <div class="panel-body">
                            <div class="table-responsive">
                                <form action="{{ route('Product_detail.update', $productId) }}" method="post"
                                    enctype="multipart/form-data">
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
                                                    <td> <input type="text" name="{{ $product_detail->id }}"
                                                            value="{{ $product_detail->color }}"></td>
                                                    <td> {{ $product_detail->quantity }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>




                                    <div style=" with:100%;">
                                        <a class="btn btn-primary active" href="{{ route('Product.index') }}"> Close</a>
                                        <button type="submit" style="float: right"
                                            class="btn btn-primary active">Update</button>
                                    </div>
                                </form>



                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>






</x-layout>
