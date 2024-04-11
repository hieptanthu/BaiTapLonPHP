<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Invoice #6</title>

    <style>
        html,
        body {
            margin: 10px;
            padding: 10px;
            font-family: sans-serif;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        p,
        span,
        label {
            font-family: sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 0px !important;
        }

        table thead th {
            height: 28px;
            text-align: left;
            font-size: 16px;
            font-family: sans-serif;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            font-size: 14px;
        }

        .heading {
            font-size: 24px;
            margin-top: 12px;
            margin-bottom: 12px;
            font-family: sans-serif;
        }

        .small-heading {
            font-size: 18px;
            font-family: sans-serif;
        }

        .total-heading {
            font-size: 18px;
            font-weight: 700;
            font-family: sans-serif;
        }

        .order-details tbody tr td:nth-child(1) {
            width: 20%;
        }

        .order-details tbody tr td:nth-child(3) {
            width: 20%;
        }

        .text-start {
            text-align: left;
        }

        .text-end {
            text-align: right;
        }

        .text-center {
            text-align: center;
        }

        .company-data span {
            margin-bottom: 4px;
            display: inline-block;
            font-family: sans-serif;
            font-size: 14px;
            font-weight: 400;
        }

        .no-border {
            border: 1px solid #fff !important;
        }

        .bg-blue {
            background-color: #414ab1;
            color: #fff;
        }
    </style>
</head>

<body>

    <table class="order-details">
        <thead>
            <tr>
                <th width="50%" colspan="2">
                    <h2 class="text-start">đức Hiệp Ecommerce</h2>
                </th>
                <th width="50%" colspan="2" class="text-end company-data">
                    <span>Invoice Id: {{ $dd->id }}</span> <br>
                    <span id="currentDate"> </span><br>
                    <span>Zip code : 560077</span> <br>
                    <span>Address: #555, Main road, shivaji nagar, Bangalore, India</span> <br>
                </th>
            </tr>
            <tr class="bg-blue">
                <th width="50%" colspan="2">Order Details</th>
                <th width="50%" colspan="2">User Details</th>
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

    <table>
        <thead>
            <tr>
                <th class="no-border text-start heading" colspan="5">
                    Order Items
                </th>
            </tr>
            <tr class="bg-blue">
                <th>STT</th>
                <th>Tên sản phẩm</th>
                <th>loại</th>
                <th>Giá tiền</th>
                <th>Số lượng</th>
                <th>total_money</th>
            </tr>
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
                <td colspan="4" class="total-heading">Total Amount  </td>
                <td colspan="1" class="total-heading">{{ number_format($dd->total_money) }}</td>
            </tr>
        </tbody>
    </table>

    <br>
    <p class="text-center">
        Thank your for shopping with Funda of Web IT
    </p>

    <script>
        window.onload = function() {
            var currentDate = new Date();
            var day = currentDate.getDate();
            var month = currentDate.getMonth() + 1; // Tháng bắt đầu từ 0
            var year = currentDate.getFullYear();
            
            // Định dạng ngày tháng năm
            var formattedDate = 'today '+ day + '/' + month + '/' + year;
            
            // Hiển thị ngày tháng năm trong một phần tử HTML có id là "currentDate"
            document.getElementById('currentDate').innerHTML = formattedDate;
        }
    </script>
</body>

</html>
