<x-layout>
    <div id="page-wrapper">
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class=" row panel-heading">
                            <div class="col-md-10">
                                <h2> Create Product</h2>
                            </div>
                            <div class="col-md-2">
                                <a class="btn btn-default" href="{{ route('Product.index') }}">Close</a>
                            </div>



                        </div>

                        <div class="  panel-body">
                            <form style="margin: 0 auto;" action="{{ route('Product.update', $product) }}"
                                method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group has-success modal-body">
                                            <label class="control-label" for="name">Input Name Product</label>
                                            <input style="max-width: 500;" type="text" class="form-control"
                                                id="name" value="{{ $product->name }}" name="name">
                                        </div>
                                        <div class="form-group modal-body">
                                            <label class="control-label" for="category_id">Category </label>
                                            <select style="max-width: 500;" id="category_id" name="category_id"
                                                class="form-control" control-id="ControlID-23">
                                                @foreach ($categories as $category)
                                                    @if ($category->delete == 0)
                                                        <option value="{{ $category->id }}"@if ($category->id == $product->category_id)
                                                            selected
                                                        @endif>{{ $category->name }}
                                                        </option>

                                                    @else
                                                        {{-- {{dd($category->id == $product->category_id)}} --}}
                                                        @if($category->id == $product->category_id)
                                                            <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                                                        @endif
                                                    @endif
                                                @endforeach
                                                {{-- @foreach ($categories as $category)
                                                
                                                    <option value="{{$category->id}}"@if ($category->id == $product->category_id)
                                                        selected
                                                    @endif>{{$category->name}}</option>
                                                @endforeach --}}
                                            </select>
                                        </div>
                                        <div class="form-group modal-body">
                                            <label class="control-label" for="">Input Title Product</label>
                                            <input style="max-width: 500;" type="text" class="form-control"
                                                id="title" value="{{ $product->title }}" name="title">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group has-success modal-body">
                                            <label class="control-label" for="price">Input Price Product</label>
                                            <input style="max-width: 500;" type="number" class="form-control"
                                                id="price" value="{{ $product->price }}" name="price">
                                        </div>
                                        <div class="form-group has-success modal-body">
                                            <label class="control-label" for="discount">Input Discount Product</label>
                                            <input style="max-width: 500;" type="number" class="form-control"
                                                id="discount" value="{{ $product->discount }}" name="discount">
                                        </div>
                                        <div class="row">
                                            <div class=" col-md-6 form-group has-success modal-body ">
                                                <label class="control-label" for="image">Input IMG Product</label>
                                                <input id="image" name="image" type="file">
                                                <img width="200px" src="/{{ $product->thumbnail }}" alt="">
                                            </div>
                                            <div class=" col-md-6 form-group has-success modal-body ">
                                                <label class="control-label" for="image2">Input IMG Product 2</label>
                                                <input id="image2" name="image2" type="file">
                                                <img width="200px" src="/{{ $product->thumbnail2 }}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group has-success modal-body">
                                        <label class="control-label" for="description">Input Description Product</label>
                                        <textarea id="description" name="description" class="form-control" rows="3" control-id="ControlID-4">{{ $product->description }} </textarea>
                                    </div>
                                </div>

                                <p style="float:right ">
                                    <button class="btn btn-primary" name="btn_add">Add</button>
                                </p>
                            </form>


                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
