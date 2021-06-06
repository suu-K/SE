<html>

<head>
    <link href="{{ asset('css/ordersebu.css') }}" rel="stylesheet" type="text/css" />

    <title>TEAM NO.14의 게임 쇼핑몰</title>
    <meta name="description" content="TEAM NO.14의 게임 쇼핑몰" />

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+KR:wght@200&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a5f3739fb3.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
</head>

<body>
    <ul id="a">
        <li>
            <ul class="cover">
                <li class="what">배송지 :</li>
                <li class="explane">{{ $orderList->destination }}</li>
            </ul>
        </li>
        <li>
            <ul class="cover">
                <li class="what">수량 :</li>
                <li class="explane">{{ $orderProduct->num}}</li>
            </ul>
        </li>
        <li>
            <ul class="cover">
                <li class="what">개당 금액 :</li>
                <li class="explane">{{ $orderProduct->price}}</li>
            </ul>
        </li>
    </ul>
</body>


</html>
