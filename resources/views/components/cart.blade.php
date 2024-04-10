@props(['cart'])

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">stt</th>
                        <th scope="col" >img</th>
                        <th scope="col" >name</th>
                        <th scope="col" >loại </th>
                        <th scope="col" >số lượng</th>
                        <th scope="col" >Sup Total</th>
                        <th scope="col" >Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $total = 0;
                    ?>

                    @foreach ($cart as $index => $item)
                        <tr>
                            <td scope="row">{{ $index }}</td>
                           
                            <td><img width="100px" src="{{ $item['img'] }}" alt=""/></td>
                            <td>{{ $item['name'] }}</td>
                            <td>{{ $item['mau'] }}</td>
                            <td>
                                <form action="{{ route('updateCard', $index) }}" method="GET">
                                    @csrf @method('post')
                                    <input type="number" name="quantity" value="{{ $item['quantity'] }}">
                                    <button class="btn btn-warning" type="submit">Cập nhật</button>
                                </form>
                            </td>
                            <td>{{ $item['total'] }}</td>

                            <td>
                                <form action="{{ route('deleteCard', $index) }}" method="GET">
                                    @csrf @method('post')
                                    <button class="btn btn-danger" type="submit">Xóa</button>
                                </form>
                            </td>
                        </tr>


                        <?php
                        $total += $item['total'];
                        ?>
                    @endforeach
                </tbody>

            </table>
            <div class="row">
                <div class="col-lg-6"> <h1>tổng tiền : <?php
                    echo $total 
                    ?></h1></div>
                <div class="col-lg-6"> <form  style="float: right; " action="{{ route('VaoThanhToan') }}"> <button  class="btn btn-primary" >Thanh Toán</button></form> </div>

            </div>
            
        </div>
    </div>
</div>
