<html>

<head>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        table {
            margin-top: 15px;
            width: 100%;
        }

        body {
            width: 900px;
            margin: 0 auto;
        }

        tr {
            line-height: 27px;
        }

        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
            text-align: center;
        }

        .ngay {
            font-style: italic;
            font-size: 15px;
            margin-bottom: 5px;
        }

        .ban {
            font-style: italic;
            font-size: 15px;
            margin: 3px 0px;
        }

        .dam {
            font-weight: bold;
        }

        .le {
            margin-bottom: 4px;
            font-size: 15px;
        }

        .doi {
            width: 50%;
            float: left;
        }

        .ky {
            text-align: center;
            margin-top: 20px;
        }

        .ky1 {
            font-style: italic;
            text-align: center;
            margin-top: 5px;
        }

        img {
            width: 60px;
            height: 60px;
        }
    </style>
</head>

<body onload="window.print()">
    <section style="text-align: center;">
        <h1>HÓA ĐƠN GIÁ TRỊ GIA TĂNG</h1>
        <div class="ban">(Bản thể hiện hóa đơn điện tử)</div>
        <div class="ngay">
            <p id="date"></p>
            <script>
                n = new Date();
                y = n.getFullYear();
                m = n.getMonth() + 1;
                d = n.getDate();
                document.getElementById("date").innerHTML = "Ngày " + d + " tháng " + m + " năm " + y;
            </script>
        </div>
    </section>

    <div class="le dam">Tên đơn vị bán hàng: FlowerShop</div>
    <div class="le">Mã số thuế: 3269289058</div>
    <div class="le">Địa chỉ: 195 Nguyễn Chế Nghĩa, Gia Lộc, Hải Dương</div>
    <div class="le doi">Điện thoại: 0948.098.195</div>
    <div class="le doi">Số tài khoản: 762618652671614</div>
    <div class="le dam">Người mua hàng: {{ $order->cus_name }}</div>
    <div class="le">Điện thoại: {{ $order->cus_phone}}</div>
    <div class="le">Địa chỉ: {{ $order->cus_address}}</div>
    <div class="le doi">Hình thức thanh toán: Chuyển khoản</div>
    <div class="le">Ghi chú: </div>
    <table>
        <tr>
            <th>STT</th>
            <th>Tên sản phẩm</th>
            <th>Hình ảnh</th>
            <th>Số lượng</th>
            <th>Thành tiền</th>
        </tr>
        @php
        $stt = 1;
        @endphp
        @foreach ($order_detail as $key => $detail)
        <tr>
            <td>{{ $stt }}</td>
            <td>{{ $products[$key]->pr_name }}</td>
            <td><img src="{{ asset('user/assets/img/' . $products[$key]->pr_image) }}" alt=""></td>
            <td>{{ $detail->od_quanlity}}</td>
            <td>{{ number_format($detail->od_price,0,',','.')}}</td>
        </tr>
        @php
        $stt++;
        @endphp
        @endforeach

        <tr>

            <td colspan="4" class="dam">Tổng</td>
            <td class="dam">{{ number_format($order -> order_price,0,',','.')}} VND</td>
        </tr>
    </table>
    <div class="doi dam ky">Người mua hàng</div>
    <div class="doi dam ky">Người bán hàng</div>
    <div class="doi ky1">(Ký, ghi rõ họ tên)</div>
    <div class="doi ky1">(Ký, ghi rõ họ tên)</div>

</body>

</html>