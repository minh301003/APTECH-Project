<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Xác nhận đặt hàng</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
    <h1> Chào {{ $order->user_name}}! </h1>
    <p> Đơn hàng của bạn đã được ghi nhận.</p>

    <div class="col-md-12">
        <h1>Thông tin đơn hàng</h1>
        <hr>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Tên sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Giá tiền</th>
                    <th>Thành tiền</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order->orderDetails as $item)
                <tr>
                    <th>{{ $item->products->name }}</th>
                    <th>{{$item->amount}}</th>
                    <th>{{number_format($item->total / $item->amount) }}</th>
                    <th>{{number_format($item->total) }}</th>
                </tr>
                @endforeach
            </tbody>
        </table>
        <h4 class="text-xl text-danger">Tổng tiền: {{ number_format($order->total) }}</h4>
    </div>
    <p>Cảm ơn bạn đã mua hàng tại Tiny shop!</p>

</body>
</html>
